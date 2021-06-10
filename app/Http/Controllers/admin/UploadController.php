<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Owenoj\LaravelGetId3\GetId3;

class UploadController extends Controller
{
    public function create_new_uploads()
    {
        $event_categories = DB::table('event_categories')->select('*')->get();
        $tags = DB::table('tags')->where('is_active', 'yes')->select('*')->get();
        $play_list = DB::table('play_list')->where('is_active', 'yes')->select('*')->get();
        return view('admin.uploads.create_uploads')->with(['event_categories' => $event_categories, 'tags' => $tags, 'play_lists' => $play_list]);
    }

    public function save_media_uploads(Request $request)
    {

        $requested_media_mime = $request->file('media_file')->getMimeType();
        $possible_mimes = array("video/x-flv", "video/mp4", "application/x-mpegURL", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv");
        $rules = [
            'title' => 'required|max:200',
            'description' => 'required',
            'category' => 'required|max:200',
            'tags' => 'required',
            'play_list' => 'required|max:100',
            'visibility' => 'required|max:20',
            'media_thumbnail' => 'required|mimes:jpg,jpeg,png,gif,ttf|max:2009',
            'media_file' => 'required'
        ];

        if (!in_array($requested_media_mime, $possible_mimes)) {
            $flash = array('type' => 'error', 'msg' => 'Uploaded video format not supported');
            $request->session()->flash('flash', $flash);
            return redirect('admin/uploads/create_new_uploads');
        }
        $request->validate($rules);

        if ($request->hasFile('media_thumbnail')) {
            $file = $request->file('media_thumbnail');
            $destinationPath = 'media/thumbnails';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_thumbnail_path = $destinationPath . '/' . $fileName;

            //delete existing file for the
            // if($request->input('update_id') != null){
            //     $current_institution = DB::table('events')->where('id', $request->input('update_id'))->pluck('file');
            //     $current_file = 'public/'.$current_institution[0];
            //         if(Storage::exists($current_file)){
            //         Storage::delete($current_file);
            //         }
            // }
        } else {
            $media_thumbnail_path = '';
        }

        if ($request->hasFile('media_file')) {

            $file = $request->file('media_file');
            $destinationPath = 'media/media_source';
            // $fileName = time().'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $fileName = time() . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_path = $destinationPath . '/' . $fileName;

            // $fileName = time().'_'.$request->file->getClientOriginalName();
            // $filePath = $request->file('file')->storeAs('media/media_source', $fileName, 'public');

            // $name = time().'_'.$request->file->getClientOriginalName();
            $track = new GetId3($file);
            $track_info = $track->extractInfo();
            $track_size = $track_info['filesize'];
            $track_duration = $track_info['playtime_seconds'];
            // $media = FFMpeg::open('public/'.$media_path);

            $file_info = array(
                'file_name' => $fileName,
                'file_url' => $media_path,
                'file_type' => $file->getClientOriginalExtension(),
                'file_size' => $track_size,
                'file_duration' => $track_duration,
                'visibility' => 'yes',
                'uploaded_by' => Auth::id()
            );
            var_dump($file_info);
            try {
                $media_file_id = DB::table('media_files')->insertGetId($file_info);
            } catch (QueryException $ex) {
                dd($ex->getMessage());
            }
        } else {
            $media_file_id = 0;
        }
        // echo "success"; exit;

        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'play_list' => $request->input('play_list'),
            'visibility' => $request->input('visibility'),
            'media_thumbnail' => $media_thumbnail_path,
            'media_file_id' => $media_file_id,
            'status' => 'under_review',
            'status_comment' => 'Recently uploaded and waiting for the approval',
            'created_by' => Auth::id(),
            'tags' => implode(",", $request->input('tags')),
            'search_keys' => $request->input('search_keys'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );

        try {
            DB::table('media_entries')->insert($data);
            $flash = array('type' => 'success', 'msg' => 'New Media file saved successfully.');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
        return redirect('admin/uploads/create_new_uploads');
    }

    public function list_all_uploads()
    {
        $uploads = DB::table('media_entries as me')
            ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
            ->join('users as ud', 'me.created_by', '=', 'ud.id')
            ->select('me.id as media_entry_id', 'ud.name as uName', 'me.title as mTitle', 'me.description as mDescription', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt', 'mf.file_url as fUrl', 'mf.file_type as mimeType')
            ->orderBy('me.id', 'desc')
            ->paginate(10);
        return view('admin.uploads.list_all_uploads')->with(['uploads' => $uploads]);
    }

    public function media_publish_unpublish(Request $request)
    {
        $media_entry_id = $request->media_entry_id;

        $upd = DB::table('media_entries')->where('id', '=', $media_entry_id)->update(array('status' => $request->status, 'status_comment' => $request->comments));
        if ($upd) {
            $finalResult = setResponse(0, 'message_key', "Updated successfully", 0, $upd, 1);
        } else {
            $finalResult = setResponse(0, 'message_key', "Updated successfully", 0, $upd, 3);
        }
        return response()->json($finalResult);
    }
}
