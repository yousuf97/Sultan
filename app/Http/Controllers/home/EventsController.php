<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Owenoj\LaravelGetId3\GetId3;

class EventsController extends Controller
{
    public function list_events(Request $request)
    {
        $where = array('is_active' => '1');
        if ($request->has('category')) {
            $where['category'] = $request->input('category');
        }
        $all_events = DB::table('events')->select('*')->where($where);
        if ($request->has('search_key')) {
            $all_events = $all_events->orWhere('title', 'like', '%' . $request->input('search_key') . '%');
        }
        $all_events = $all_events->get();
        $wraper_class = "ms_content_wrapper padder_top80";
        return view('home.theme1.list_events')->with(['wraper_class' => $wraper_class, 'all_events' => $all_events]);
    }

    public function event_details($encrypt_id = null)
    {
        if ($encrypt_id != null) {
            $id = decript($encrypt_id);
            $event_details = DB::table('events')->select('*')->where('id', '=', $id)->first();
            $where = array('is_active' => '1');
            $other_events = DB::table('events')->select('*')->where($where)->whereNotIn('id', [$id])->get();
            $event_categories = DB::table('event_categories')->select('*')->get();
            $wraper_class = "ms_content_wrapper padder_top80";
            $where = array('is_active' => 'yes', 'created_by' => Auth::id(), 'title' => 'Competition');
            $play_list = DB::table('play_list')->where($where)->select('*')->get();
            $tags = DB::table('tags')->select('*')->where('is_active', '=', 'yes')->get();
            $total_registration = DB::table('event_registrations')->where('event_id', '=', $id)->count();

            return view('home.theme1.event_details')->with(['wraper_class' => $wraper_class, 'tags' => $tags, 'event_details' => $event_details, 'other_events' => $other_events, 'event_categories' => $event_categories, 'encrypt_id' => $encrypt_id, 'play_lists' => $play_list, 'total_registration' => $total_registration]);
        } else {
            return abort(404);
        }
    }

    public function accept_registration(Request $request)
    {

        $media_type = strtolower($request->input('media_type'));
        $event_id = $request->input('event_id');
        $idDecrypted = decript($event_id);
        $auth_user_id = Auth::id();
        /* Validate Prerequisite  */
        $participation = DB::table('event_registrations')->select('*')->where(array('event_id' => $idDecrypted, 'participant_id' => $auth_user_id))->get();

        if ($participation->count() > 0) {
            $flash = array('type' => 'error', 'msg' => 'You have already applied to this competetion.');
            $request->session()->flash('flash', $flash);
            return redirect('competition/details/' . $event_id);
        }

        $user_detail = DB::table('user_details')->where('user_id', '=', $auth_user_id)->first();
        if ($user_detail->address_proof == '-') {
            $flash = array('type' => 'error', 'msg' => 'Please upload your address proof, Passport or national id preffered.');
            $request->session()->flash('flash', $flash);
            return redirect('competition/details/' . $event_id);
        }
        /* Validate Prerequisite  */

        $event_details = DB::table('events')->select('*')->where('id', '=', $idDecrypted)->first();
        $total_registration = DB::table('event_registrations')->where('event_id', '=', $idDecrypted)->count();

        if ($total_registration >= $event_details->max_entry_limit) {
            $flash = array('type' => 'error', 'msg' => 'Sorry, Registration failed, maximum number of application exceeded to the limit');
            $request->session()->flash('flash', $flash);
            return redirect('competition/details/' . $event_id);
        }

        $event_category = $event_details->category;
        $possible_video_mimes = array("video/x-flv", "video/mp4", "application/x-mpegURL", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv");
        $possible_audio_mimes = array("audio/ogg", "audio/mpeg", "audio/x-wav");
        $rules = [
            'title' => 'required|max:200',
            'description' => 'required',
            'play_list' => 'required|max:100',
            'visibility' => 'required|max:20',
            'media_thumbnail' => 'required|mimes:jpg,jpeg,png,gif,ttf|max:2009',
            'media_file' => 'required',
            'media_type' => 'required'
        ];

        if ($media_type == 'video') {
            $requested_media_mime = $request->file('media_file')->getMimeType();
            if (!in_array($requested_media_mime, $possible_video_mimes)) {
                $flash = array('type' => 'error', 'msg' => 'Uploaded video format does not supported');
                $request->session()->flash('flash', $flash);
                return redirect('competition/details/' . $event_id);
            }
        } elseif ($media_type == 'audio') {
            $requested_media_mime = $request->file('media_file')->getMimeType();
            if (!in_array($requested_media_mime, $possible_audio_mimes)) {
                $flash = array('type' => 'error', 'msg' => 'Uploaded audio format does not supported');
                $request->session()->flash('flash', $flash);
                return redirect('competition/details/' . $event_id);
            }
        } elseif ($media_type == 'image') {
            $rules['media_file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:10009';
        }

        $request->validate($rules);

        if ($request->hasFile('media_thumbnail')) {
            $file = $request->file('media_thumbnail');
            $destinationPath = 'media/thumbnails';
            $fileName = $auth_user_id . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_thumbnail_path = $destinationPath . '/' . $fileName;
        } else {
            $media_thumbnail_path = '';
        }

        if ($request->hasFile('media_file')) {

            $file = $request->file('media_file');
            $destinationPath = 'media/media_source';
            $fileName = $auth_user_id . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_path = $destinationPath . '/' . $fileName;

            if ($media_type == 'video' || $media_type == 'audio') {
                $track = new GetId3($file);
                $track_info = $track->extractInfo();
                $track_size = $track_info['filesize'];
                $track_duration = $track_info['playtime_seconds'];
                $file_type = $requested_media_mime;
            } else {
                $track_size = 0;
                $track_duration = 0;
                $file_type = $file->getClientOriginalExtension();
            }

            $file_info = array(
                'file_name' => $fileName,
                'file_url' => $media_path,
                'file_type' => $file_type,
                'file_size' => $track_size,
                'file_duration' => $track_duration,
                'visibility' => 'yes',
                'uploaded_by' => $auth_user_id,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            );
            try {
                $media_file_id = DB::table('media_files')->insertGetId($file_info);
            } catch (QueryException $ex) {
                dd($ex->getMessage());
            }
        } else {
            $media_file_id = 0;
        }

        $data = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $event_category,
            'play_list' => $request->input('play_list'),
            'visibility' => $request->input('visibility'),
            'media_thumbnail' => $media_thumbnail_path,
            'media_file_id' => $media_file_id,
            'media_type' => $media_type,
            'status' => 'under_review',
            'status_comment' => 'Recently uploaded and waiting for the approval',
            'created_by' => $auth_user_id,
            'tags' => 'Competition',
            'search_keys' => $request->input('search_keys'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        );

        try {
            $media_entries_id = DB::table('media_entries')->insertGetId($data);
            $participant = array(
                'participant_id' => $auth_user_id,
                'event_id' => $idDecrypted,
                'media_entries_id' => $media_entries_id,
                'score' => 0,
                'comments' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            );
            DB::table('event_registrations')->insert($participant);

            $flash = array('type' => 'success', 'msg' => 'Thank you. We have recieved your application.');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
        return redirect('my_account/my_playlist');
    }
}
