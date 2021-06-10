<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function admin_login()
    {
        return view('admin.login');
    }

    public function home(Request $request)
    {
        if (Auth::check()) {
            $count_published_media = DB::table('media_entries')->where('status', '=', 'published')->count();
            $under_review_cnt = DB::table('media_entries')->where('status', '=', 'under_review')->count();
            $participants_cnt = DB::table('role_user')->where('role_id', '=', 7)->count();
            $active_competition_cnt = DB::table('events')->where('is_active', '=', 1)->count();

            $latest_uploads = DB::table('media_entries as me')
                ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
                ->select('me.id as media_entry_id', 'me.title as mTitle', 'mf.file_duration as mFileDuration', 'me.category as mCategory', 'me.description as mDescription', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.status as mStatus')
                ->orderBy('me.id', 'desc')
                ->take(6)->get();

            $latest_registrations = DB::table('users as U')
                ->join('user_details as UD', 'U.id', '=', 'UD.user_id')
                ->select('U.name as uName', 'U.created_at as uCreatedat', 'UD.profile_pic as uProfilepic')
                ->orderBy('U.id', 'desc')
                ->take(8)->get();

            $data = [
                'count_published_media' => $count_published_media,
                'under_review_cnt' => $under_review_cnt,
                'participants_cnt' => $participants_cnt,
                'active_competition_cnt' => $active_competition_cnt,
                'latest_uploads' => $latest_uploads,
                'latest_registrations' => $latest_registrations
            ];
            return view('admin.home')->with($data);
        } else {
            return redirect('admin/login');
        }
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt(array('email' => $request->input('username'), 'password' => $request->input('password')))) {
            return redirect('admin/home');
        } else {
            $request->session()->flash('login_msg', "Invalid Username / Password");
            return view('admin.login');
        }
    }
}
