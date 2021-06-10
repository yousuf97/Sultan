<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

function setResponse($msgType, $msgKey, $msgText, $value, $data, $status)
{
    $finalResult = array(
        'messages' =>
        array(
            'messageType' => $msgType,
            'messageKey' => $msgKey,
            'messageText' => $msgText,
            'messageValueType' => $value
        ),
        'data' => $data,
        'status' => $status
    );
    return $finalResult;
}

function encript($string)
{
    return Crypt::encryptString($string);
}

function decript($encriptedString)
{
    try {
        return Crypt::decryptString($encriptedString);
    } catch (DecryptException $e) {
        return false;
    }
}

function acronym($str)
{
    $words = explode(" ", $str);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }
    return $acronym;
}

function save_user_seeds($user_id)
{
    $user_details = array(
        'user_id' => $user_id,
        'country_id' => 0,
        'phone_number' => 0,
        'address' => '-',
        'profile_pic' => '-',
        'address_proof' => '-',
        'institution_id' => 0,
        'created_at' => Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon::now()->toDateTimeString(),
    );
    DB::table('user_details')->insert($user_details);

    $play_list = array(
        'title' => 'Competition',
        'thumbnail' => '-',
        'is_featured' => 0,
        'is_active' => 'yes',
        'created_by' => $user_id
    );
    DB::table('play_list')->insert($play_list);
}

function get_all_participants($event_id)
{
    $all_participants = DB::table('event_registrations as er')
        ->join('user_details as ud', 'er.participant_id', '=', 'ud.user_id')
        ->select('ud.*')
        ->where('er.event_id', '=', $event_id)
        ->get();

    return $all_participants;
}

function save_settings_group_meta($data, $item_id)
{
    foreach ($data as $key => $value) {
        $where = array('term_id' => $item_id, 'meta_key' => $key);
        DB::table('settings_meta')->where($where)->update(array('meta_value' => $value));
    }
    return true;
}

function get_settings_meta_by_termid_metaKey($term_id, $meta_key)
{
    $where = array('meta_key' => $meta_key, 'term_id' => $term_id);
    $meta = DB::table('settings_meta')->where($where)->first();
    if ($meta) {
        return $meta->meta_value;
    } else {
        return false;
    }
}

function get_all_settings_meta_by_term_id($term_id)
{
    $where = array('term_id' => $term_id);
    $meta_details = DB::table('settings_meta')->where($where)->get();
    if ($meta_details) {
        return $meta_details;
    } else {
        return false;
    }
}

function save_meta_files($term_id, $meta_name, $file)
{
    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('web', $fileName, 'public');

    $name = time() . '_' . $file->getClientOriginalName();

    $existing_file = get_settings_meta_by_termid_metaKey($term_id, $meta_name);

    if ($existing_file) {
        $current_file = 'public/' . $existing_file;
        if (Storage::exists($current_file)) {
            Storage::delete($current_file);
        }
    }
    $data = array(
        $meta_name => $filePath
    );
    $flag = save_settings_group_meta($data, $term_id);
}

function add_to_history($post_id, $user_id)
{
    $where = array('media_id' => $post_id, 'user_id' => $user_id);
    $data_cnt = DB::table('my_history')->where($where)->count();
    if ($data_cnt == 0) {
        $insert_data = array(
            'media_id' => $post_id,
            'user_id' => $user_id,
            'created_at' => Carbon::now()->toDateTimeString()
        );
        $action = DB::table('my_history')->insert($insert_data);
    }
    return true;
}

function media_short_icons($post_id)
{
    // $html = '
    // <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add To Favourites</a></li>
    // <li><a href="#"><span class="opt_icon"><span class="icon icon_queue"></span></span>Add To Queue</a></li>
    // <li><a href="#"><span class="opt_icon"><span class="icon icon_dwn"></span></span>Download Now</a></li>
    // <li><a href="#"><span class="opt_icon"><span class="icon icon_playlst"></span></span>Add To Playlist</a></li>
    // <li><a href="#"><span class="opt_icon"><span class="icon icon_share"></span></span>Share</a></li>
    // ';
    if (Auth::check()) {
        $html = '
        <li class="c_media_icons" post_id = "' . $post_id . '" input_action="like" onclick="post_action(this)"><a><span class="opt_icon"><i class="fa fa-thumbs-up"></i></span>I Like this</a></li>
        <li class="c_media_icons" post_id = "' . $post_id . '" input_action="dislike" onclick="post_action(this)"><a><span class="opt_icon"><i class="fa fa-thumbs-down"></i></span>I Dislike this</a></li>
        <li class="c_media_icons" post_id = "' . $post_id . '" input_action="add_playlist" onclick="post_action(this)"><a><span class="opt_icon"><span class="icon icon_playlst"></span></span>Add to favourites</a></li>
        <li class="c_media_icons" post_id = "' . $post_id . '" input_action="report_this" onclick="post_action(this)"><a><span class="opt_icon"><i class="fa fa-flag"></i></span>Report this</a></li>';
    } else {
        $html = '
        <li class="c_media_icons" data-toggle="modal" data-target="#myModal1"><a><span class="opt_icon"><i class="fa fa-thumbs-up"></i></span>I Like this</a></li>
        <li class="c_media_icons" data-toggle="modal" data-target="#myModal1"><a><span class="opt_icon"><i class="fa fa-thumbs-down"></i></span>I Dislike this</a></li>
        <li class="c_media_icons" data-toggle="modal" data-target="#myModal1"><a><span class="opt_icon"><span class="icon icon_playlst"></span></span>Add to favourites</a></li>
        <li class="c_media_icons" data-toggle="modal" data-target="#myModal1"><a><span class="opt_icon"><i class="fa fa-flag"></i></span>Report this</a></li>';
    }
    return $html;
}

function formatDate($dateValue, $type = null)
{
    if ($type == 1) {
        //Format will be like Thu, Dec 25, 1975 2:15 PM
        $dt = Carbon::create($dateValue);
        return $dt->toDayDateTimeString();
    } elseif ($type == 2) {
        //Format will be like Dec 25, 1975
        $dt = Carbon::create($dateValue);
        return $dt->toFormattedDateString();
    } else {
        //Format will be like 1975-12-25
        $dt = Carbon::create($dateValue);
        return $dt->toFormattedDateString();
    }
}
