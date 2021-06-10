<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Owenoj\LaravelGetId3\GetId3;


class MediaManagerController extends Controller
{

    public function media_uploads(Request $request)
    {
        $media_type = strtolower($request->input('media_type'));
        $possible_video_mimes = array("video/x-flv", "video/mp4", "application/x-mpegURL", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv");
        $possible_audio_mimes = array("audio/ogg", "audio/mpeg", "audio/x-wav");
        $rules = [
            'title' => 'required|max:200',
            'description' => 'required',
            'category' => 'required|max:200',
            'tags' => 'required',
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
                return redirect('my_account/upload_track');
            }
        } elseif ($media_type == 'audio') {
            $requested_media_mime = $request->file('media_file')->getMimeType();
            if (!in_array($requested_media_mime, $possible_audio_mimes)) {
                $flash = array('type' => 'error', 'msg' => 'Uploaded audio format does not supported');
                $request->session()->flash('flash', $flash);
                return redirect('my_account/upload_track');
            }
        } elseif ($media_type == 'image') {
            $rules['media_file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:10009';
        }

        $request->validate($rules);

        if ($request->hasFile('media_thumbnail')) {
            $file = $request->file('media_thumbnail');
            $destinationPath = 'media/thumbnails';
            $fileName = Auth::id() . time() . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_thumbnail_path = $destinationPath . '/' . $fileName;
        } else {
            $media_thumbnail_path = '';
        }

        if ($request->hasFile('media_file')) {

            $file = $request->file('media_file');
            $destinationPath = 'media/media_source';
            $fileName = Auth::id() . time() . '.' . $file->getClientOriginalExtension();
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
            //
            $file_info = array(
                'file_name' => $fileName,
                'file_url' => $media_path,
                'file_type' => $file_type,
                'file_size' => $track_size,
                'file_duration' => $track_duration,
                'visibility' => 'yes',
                'uploaded_by' => Auth::id()
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
            'category' => $request->input('category'),
            'play_list' => $request->input('play_list'),
            'visibility' => $request->input('visibility'),
            'media_thumbnail' => $media_thumbnail_path,
            'media_file_id' => $media_file_id,
            'media_type' => $media_type,
            'status' => 'under_review',
            'status_comment' => 'Recently uploaded and waiting for the approval',
            'created_by' => Auth::id(),
            'tags' => implode(",", $request->input('tags')),
            'search_keys' => $request->input('search_keys'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        );

        try {
            DB::table('media_entries')->insert($data);
            $flash = array('type' => 'success', 'msg' => 'New Media file saved successfully.');
            $request->session()->flash('flash', $flash);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
        return redirect('my_account/my_playlist');
    }

    public function get_audio_play_list(Request $request)
    {
        $audio_entry_id = $request->audio_entry_id;
        $myPlayListOtion = '<ul class="more_option"><li><a href="#"><span class="opt_icon" title="Add To Favourites"><span class="icon icon_fav"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Queue"><span class="icon icon_queue"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Download Now"><span class="icon icon_dwn"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Playlist"><span class="icon icon_playlst"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Share"><span class="icon icon_share"></span></span></a></li></ul>';
        $media = DB::table('media_entries as me')
            ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
            ->join('users as ud', 'me.created_by', '=', 'ud.id')
            ->select('me.id as media_entry_id', 'ud.name as uName', 'me.title as mTitle', 'me.description as mDescription', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt', 'mf.file_url as fUrl', 'mf.file_type as mimeType')
            ->where('me.id', '=', $audio_entry_id)
            ->first();

        $media_data = array(
            'id' => $media->media_entry_id,
            'image' => url('storage/' . $media->mThumbnail),
            'title' => $media->mTitle,
            'artist' => $media->uName,
            'mp3' => url('storage/' . $media->fUrl),
            'option' => $myPlayListOtion
        );

        if (Auth::check()) {
            $user_id = Auth::id();
            add_to_history($media->media_entry_id, $user_id);
        } else {
            $request->session()->push('recently_viewers', $media->media_entry_id);
        }

        if ($media) {
            $finalResult = setResponse(0, 'message_key', "Updated successfully", 0, $media_data, 1);
        } else {
            $finalResult = setResponse(0, 'message_key', "Updated successfully", 0, $media_data, 3);
        }
        return response()->json($finalResult);
    }

    public function post_action(Request $request)
    {
        $post_id = $request->post_id;
        $user_id = Auth::id();
        $input_action = $request->input_action;

        if ($input_action == 'like' || $input_action == 'dislike') {
            if ($input_action == 'like') {
                $like_val = 1;
                $msg = "Marked as like";
            } else {
                $like_val = 0;
                $msg = "Marked as dislike";
            }
            $where = array('post_id' => $post_id, 'user_id' => $user_id);
            $data_cnt = DB::table('likes_dislikes')->where($where)->count();
            if ($data_cnt == 0) {
                $insert_data = array(
                    'post_id' => $post_id,
                    'islike' => $like_val,
                    'user_id' => $user_id,
                    'created_at' => Carbon::now()->toDateTimeString()
                );
                $action = DB::table('likes_dislikes')->insert($insert_data);
            } else {
                $update_data = array(
                    'islike' => $like_val,
                    'updated_at' => Carbon::now()->toDateTimeString()
                );
                $action = DB::table('likes_dislikes')->where($where)->update($update_data);
            }
            if ($action) {
                $finalResult = setResponse(0, 'message_key', $msg, 0, [], 1);
            } else {
                $finalResult = setResponse(0, 'message_key', "Something went wrong, please try again", 0, [], 3);
            }
            return response()->json($finalResult);
        } elseif ($input_action == 'add_playlist') { // Adding Fav play list
            $where = array('media_id' => $post_id, 'user_id' => $user_id);
            $data_cnt = DB::table('favourite_play_list')->where($where)->count();
            if ($data_cnt == 0) {
                $insert_data = array(
                    'media_id' => $post_id,
                    'user_id' => $user_id,
                    'created_at' => Carbon::now()->toDateTimeString()
                );
                $action = DB::table('favourite_play_list')->insert($insert_data);
                $finalResult = setResponse(0, 'message_key', 'Added to your favourite list', 0, [], 1);
            } else {
                $finalResult = setResponse(0, 'message_key', "Already added in your favourite list", 0, [], 3);
            }
            return response()->json($finalResult);
        }
    }


    public function create_play_list(Request $request)
    {
        $rules = [
            'title' => 'required|max:200',
            'media_thumbnail' => 'required|mimes:jpg,jpeg,png,gif,ttf|max:2009',
        ];

        $update_id = $request->input('update_id');

        if ($update_id != '0') {
            $update_id = decript($update_id);
            if ($update_id) {
                unset($rules["media_thumbnail"]);
                $is_update = true;
            } else {
                $is_update = false;
                $flash = array('type' => 'error', 'msg' => 'Something went wrong, please try again!');
                $request->session()->flash('flash', $flash);
                return redirect('my_account/my_playlist');
            }
        } else {
            $is_update = false;
        }

        $request->validate($rules);

        $title = $request->input('title');
        if (strtolower($title) == 'competition') {
            $flash = array('type' => 'error', 'msg' => 'Playlist name "Competition" is reserved name, you cannot create with same name.');
            $request->session()->flash('flash', $flash);
            return redirect('my_account/my_playlist');
        }
        if ($request->hasFile('media_thumbnail')) {
            $file = $request->file('media_thumbnail');
            $destinationPath = 'media/thumbnails';
            $fileName = time() . '_playlist.' . $file->getClientOriginalExtension();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_thumbnail_path = $destinationPath . '/' . $fileName;
            if ($is_update) {
                $current_playlist = DB::table('play_list')->where('id', $update_id)->pluck('thumbnail');
                $current_file = 'public/' . $current_playlist[0];
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }
            }
        } else {
            $media_thumbnail_path = '';
        }

        $data = array(
            'title' => $title,
            'thumbnail' => $media_thumbnail_path,
            'is_featured' => 0,
            'is_active' => 'yes',
            'created_by' => Auth::id(),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        if (!$is_update) {
            $msg = "Playlist created";
            $action =  DB::table('play_list')->insert($data);
        } else {
            $msg = "Playlist updated";
            unset($data["created_at"]);
            if (!$request->hasFile('media_thumbnail')) {
                unset($data["thumbnail"]);
            }
            $action =  DB::table('play_list')->where('id', '=', $update_id)->update($data);
        }

        if ($action) {
            $flash = array('type' => 'success', 'msg' => $msg);
        } else {
            $flash = array('type' => 'error', 'msg' => 'Something went wrong, please try again!');
        }
        $request->session()->flash('flash', $flash);
        // return redirect('my_account/my_playlist');
        return redirect()->back();
    }

    public function delete_playlist(Request $request, $play_list_id = null)
    {
        $play_list_id = decript($play_list_id);
        if ($play_list_id) {
            $user_id = Auth::id();
            $where  = array('play_list' => $play_list_id, 'created_by' => $user_id);
            $medias_under_playlist_cnt = DB::table('media_entries')->where($where)->count();
            if ($medias_under_playlist_cnt > 0) {
                $flash = array('type' => 'error', 'msg' => $medias_under_playlist_cnt . ' media files attached with this playlist, please unlink the files before deleting');
            } else {
                $current_playlist = DB::table('play_list')->where('id', $play_list_id)->pluck('thumbnail');
                $current_file = 'public/' . $current_playlist[0];
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }
                $delete = DB::table('play_list')->where(array('id' => $play_list_id, 'created_by' => $user_id))->delete();
                if ($delete) {
                    $flash = array('type' => 'success', 'msg' => 'Playlist deleted');
                } else {
                    $flash = array('type' => 'error', 'msg' => 'Something went wrong');
                }
            }
        } else {
            $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
        }
        $request->session()->flash('flash', $flash);
        return redirect('my_account/my_playlist');
    }

    public function delete_my_media(Request $request, $media_entry_id = null)
    {
        $media_entry_id = decript($media_entry_id);
        if ($media_entry_id) {
            $user_id = Auth::id();
            $check_competetion_registration_cnt = DB::table('event_registrations')->where(array('media_entries_id' => $media_entry_id, 'participant_id' => $user_id))->count();
            if ($check_competetion_registration_cnt > 0) {
                $flash = array('type' => 'error', 'msg' => 'Sorry you cannot delete media files uploaded for the competetion.');
                $request->session()->flash('flash', $flash);
                return redirect('my_account/my_playlist');
            }

            $where  = array('id' => $media_entry_id, 'created_by' => $user_id);
            $media_entry = DB::table('media_entries')->where($where);
            if ($media_entry->count() > 0) {
                $media_entry_details = $media_entry->first();
                $media_thumbnail = $media_entry_details->media_thumbnail;
                /* Delete Thumbnail */
                $current_file = 'public/' . $media_thumbnail;
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }

                /* Delete main media file */
                $current_playlist_file_url = DB::table('media_files')->where(array('id' => $media_entry_details->media_file_id, 'uploaded_by' => $user_id))->pluck('file_url');
                $current_file = 'public/' . $current_playlist_file_url[0];
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }

                $delete_media = DB::table('media_files')->where(array('id' => $media_entry_details->media_file_id, 'uploaded_by' => $user_id))->delete();
                $delete_media = DB::table('media_entries')->where(array('id' => $media_entry_id, 'created_by' => $user_id))->delete();
                $flash = array('type' => 'success', 'msg' => 'Media entry deleted successfully');
            } else {
                $flash = array('type' => 'error', 'msg' => 'Could not find the record');
            }
        } else {
            $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
        }
        $request->session()->flash('flash', $flash);
        return redirect('my_account/my_playlist');
    }

    public function report_media(Request $request)
    {
        $issue = $request->input('issue');
        $media_id = $request->input('media_id');
        $user_id = Auth::id();
        $status = 'reported';
        $existing_issue = DB::table('media_reported_issues')->where(array('user_id' => $user_id, 'media_id' => $media_id));
        if ($existing_issue->count() > 0) {
            $flash = array('type' => 'warning', 'msg' => 'You have already reported to this media files, we will get back to you soon');
        } else {
            $ins_data = array(
                'media_id' => $media_id,
                'user_id' => $user_id,
                'issue' => $issue,
                'status' => $status,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            );
            DB::table('media_reported_issues')->insert($ins_data);
            $flash = array('type' => 'success', 'msg' => 'Thank you for reporting to us, we will review and get back to you soon.');
        }
        $request->session()->flash('flash', $flash);
        return redirect(url()->previous());
    }
}
