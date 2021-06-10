<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $wraper_class = "ms_content_wrapper padder_top80";
        $recently_uploaded = DB::table('media_entries')->where(array('status' => 'published', 'visibility' => 'public'))->orderBy('created_at', 'desc')->take(10)->get();
        $fine_arts = DB::table('media_entries')->where(array('status' => 'published', 'visibility' => 'public', 'category' => 'Fine Art'))->inRandomOrder()->orderBy('created_at', 'desc')->take(10)->get();
        $ballets = DB::table('media_entries')->where(array('status' => 'published', 'visibility' => 'public', 'category' => 'Ballet'))->inRandomOrder()->orderBy('created_at', 'desc')->take(10)->get();
        $musics = DB::table('media_entries')->where(array('status' => 'published', 'visibility' => 'public', 'category' => 'Music'))->inRandomOrder()->orderBy('created_at', 'desc')->take(10)->get();
        $top_score_media = DB::table('media_entries as me')
            ->join('event_registrations as er', 'er.media_entries_id', '=', 'me.id')
            ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
            ->select('me.id as media_entry_id', 'me.title as mTitle', 'mf.file_duration as mFileDuration', 'me.category as mCategory', 'me.description as mDescription', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt')
            ->where(array('me.status' => 'published', 'me.visibility' => 'public'))
            ->take(15)->get();

        $top_score_media_chunks = array_chunk($top_score_media->toArray(), 3, true);

        return view('home.theme1.home')->with(['wraper_class' => $wraper_class, 'recently_uploaded' => $recently_uploaded, 'fine_arts' => $fine_arts, 'ballets' => $ballets, 'musics' => $musics, 'top_score_media_chunks' => $top_score_media_chunks]);
    }

    public function sultan_khatib()
    {
        $wraper_class = "ms_content_wrapper padder_top80";
        $where = array('status' => 'published', 'created_by' => 1);
        $medias = DB::table('media_entries')->where($where)->paginate(24);
        return view('home.theme1.sultan_khatib')->with(['wraper_class' => $wraper_class, 'medias' => $medias]);
    }

    public function media_list(Request $request, $type)
    {
        $wraper_class = "ms_content_wrapper padder_top80";
        if ($type == 'ballets') {
            $title = 'Best of Ballet';
            $search_category = "Ballet";
            $where = array('status' => 'published', 'visibility' => 'public', 'category' => $search_category);
        } elseif ($type == 'finearts') {
            $title = 'Best of Fine Art';
            $search_category = "Fine Art";
            $where = array('status' => 'published', 'visibility' => 'public', 'category' => $search_category);
        } elseif ($type == 'pantomime') {
            $title = 'Best of Pantomime';
            $search_category = "Pantomime";
            $where = array('status' => 'published', 'visibility' => 'public', 'category' => $search_category);
        } elseif ($type == 'music') {
            $title = 'Best of Music';
            $search_category = "Music";
            $where = array('status' => 'published', 'visibility' => 'public', 'category' => $search_category);
        } elseif ($type == 'my_favs') {
            if (Auth::check()) {
                $title = 'My Favourites';
                $user_id = Auth::id();
                $medias = DB::table('favourite_play_list as fp')
                    ->join('media_entries as me', 'me.id', '=', 'fp.media_id')
                    ->select('me.*')
                    ->where(array('me.status' => 'published', 'me.visibility' => 'public', 'fp.user_id' => $user_id))
                    ->get();
                return view('home.theme1.media_list')->with(['wraper_class' => $wraper_class, 'type' => $title, 'medias' => $medias]);
            } else {
                $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
                $request->session()->flash('flash', $flash);
                return redirect('/');
            }
        } elseif ($type == 'my_history') {
            if (Auth::check()) {
                $title = 'My History';
                $user_id = Auth::id();
                $medias = DB::table('my_history as mh')
                    ->join('media_entries as me', 'me.id', '=', 'mh.media_id')
                    ->select('me.*')
                    ->where(array('me.status' => 'published', 'me.visibility' => 'public', 'mh.user_id' => $user_id))
                    ->paginate(24);
                return view('home.theme1.media_list')->with(['wraper_class' => $wraper_class, 'type' => $title, 'medias' => $medias]);
            } else {
                $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
                $request->session()->flash('flash', $flash);
                return redirect('/');
            }
        } else {
            $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
            $request->session()->flash('flash', $flash);
            return redirect('/');
        }
        // $medias = DB::table('media_entries')->where($where)->inRandomOrder()->take(10)->get();
        $medias = DB::table('media_entries')->where($where)->paginate(24);
        return view('home.theme1.media_list')->with(['wraper_class' => $wraper_class, 'type' => $title, 'medias' => $medias]);
    }

    public function media_search(Request $request)
    {

        $wraper_class = "ms_content_wrapper padder_top80";
        $where = array('status' => 'published', 'visibility' => 'public');
        $medias = DB::table('media_entries');
        if ($request->has('category')) {
            $where['category'] = $request->input('category');
        }
        $medias->where($where);
        if ($request->has('search_str')) {
            $searchTerm = $request->input('search_str');
            $medias->orWhere('search_keys', 'LIKE', "%{$searchTerm}%");
            $medias->orWhere('title', 'LIKE', "%{$searchTerm}%");
            $medias->orWhere('description', 'LIKE', "%{$searchTerm}%");
        }

        if ($request->has('tag')) {
            $searchTerm = $request->input('tag');
            $medias->orWhere('tags', 'LIKE', "%{$searchTerm}%");
        }
        $medias = $medias->get();

        $event_categories = DB::table('event_categories')->select('*')->get();
        $tags = DB::table('tags')->select('*')->where('is_active', '=', 'yes')->get();

        return view('home.theme1.search_list')->with(['wraper_class' => $wraper_class, 'medias' => $medias, 'event_categories' => $event_categories, 'tags' => $tags]);
    }

    public function media_play(Request $request, $media_entry_id = null)
    {
        $media_entry_id = decript($media_entry_id);
        $m_cnt = DB::table('media_entries')->where('id', '=', $media_entry_id)->count();
        if ($m_cnt <= 0) {
            $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
            $request->session()->flash('flash', $flash);
            return redirect('/');
        }

        if ($media_entry_id) {
            $wraper_class = "ms_main_wrapper";
            $media = DB::table('media_entries as me')
                ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
                ->join('users as ud', 'me.created_by', '=', 'ud.id')
                ->select('me.id as media_entry_id', 'ud.name as uName', 'me.title as mTitle', 'me.description as mDescription', 'me.created_by as mCreated_by', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.category as mcategory', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt', 'mf.file_url as fUrl', 'mf.file_type as mimeType')
                ->where('me.id', '=', $media_entry_id)
                ->first();
            $category_based_medias = DB::table('media_entries')->where(array('status' => 'published', 'category' => $media->mcategory))->inRandomOrder()->orderBy('created_at', 'desc')->take(10)->get();
            $artist_based_medias = DB::table('media_entries')->where(array('status' => 'published', 'created_by' => $media->mCreated_by))->inRandomOrder()->orderBy('created_at', 'desc')->take(10)->get();

            if (Auth::check()) {
                $user_id = Auth::id();
                add_to_history($media_entry_id, $user_id);
                $request->session()->push('recently_viewers', $media_entry_id);
            } else {
                $request->session()->push('recently_viewers', $media_entry_id);
            }
            if ($request->session()->has('recently_viewers')) {
                $recent_views = session('recently_viewers');
                if (count($recent_views) > 0) {
                    $recent_ids = array_unique(session('recently_viewers'));
                } else {
                    $recent_ids = [];
                }
            } else {
                $recent_ids = [];
            }


            $recent_views = DB::table('media_entries as me')
                ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
                ->join('users as ud', 'me.created_by', '=', 'ud.id')
                ->select('me.id as media_entry_id', 'ud.name as uName', 'me.title as mTitle', 'me.description as mDescription', 'me.created_by as mCreated_by', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.category as mcategory', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt', 'mf.file_url as fUrl', 'mf.file_type as mimeType', 'mf.file_duration as mDuration')
                ->whereIn('me.id', $recent_ids)
                ->get();

            // $recent_views = DB::table('media_entries')->where(array('status' => 'published', 'created_by' => $media->mCreated_by))->whereIn('id', $recent_ids)->take(10)->get();

            return view('home.theme1.media_play')->with(['wraper_class' => $wraper_class, 'media' => $media, 'category_based_medias' => $category_based_medias, 'artist_based_medias' => $artist_based_medias, 'recent_views' => $recent_views]);
        } else {
            $flash = array('type' => 'error', 'msg' => 'Requested for Invalid Url');
            $request->session()->flash('flash', $flash);
            return redirect('/');
        }
    }

    public function media_downloads()
    {
        $wraper_class = "ms_main_wrapper";
        return view('home.theme1.downloads')->with(['wraper_class' => $wraper_class]);
    }

    public function my_playlist()
    {
        $wraper_class = "ms_content_wrapper padder_top90";
        $user_id = Auth::id();
        $medias = DB::table('media_entries')->where(array('created_by' => $user_id))->inRandomOrder()->take(10)->get();
        // DB::table('media_entries')->select('COUNT(play_list)')->where(play_list'P.id')
        $qry = "SELECT *, (SELECT COUNT(play_list) FROM media_entries WHERE play_list = play_list.id) as line_count FROM play_list where play_list.created_by = $user_id AND play_list.is_active = 'yes' ";
        $play_list = DB::select($qry);

        // $play_list = DB::table('play_list as P')->select('P.*', DB::raw('COUNT(created_at) as last_post_created_at'))->where(array('created_by' => $user_id, 'is_active' => 'yes'))->get();
        return view('home.theme1.my_play_list')->with(['wraper_class' => $wraper_class, 'medias' => $medias, 'play_lists' => $play_list]);
    }

    public function upload_track()
    {
        $event_categories = DB::table('event_categories')->select('*')->get();
        // $play_list = DB::table('play_list')->where('is_active', 'yes')->select('*')->get();
        $where = array('is_active' => 'yes', 'created_by' => Auth::id());
        $play_list = DB::table('play_list')->where($where)->whereNotIn('title', ['Competition'])->select('*')->get();
        $tags = DB::table('tags')->where('is_active', 'yes')->select('*')->get();
        $wraper_class = "padder_top80";
        return view('home.theme1.upload_media')->with(['wraper_class' => $wraper_class, 'event_categories' => $event_categories, 'play_lists' => $play_list, 'tags' => $tags]);
    }

    public function profile()
    {
        $wraper_class = "padder_top80";
        $user_id = Auth::id();
        $user_detail = DB::table('user_details')->where('user_id', '=', $user_id);
        $countries = DB::table('countries')->select('*')->get();
        $all_institutes = DB::table('institutions')->select('*')->get();
        $profile_pic = 'upload/profile_pic/default.png';
        if ($user_detail->count() > 0) {
            $user_detail = $user_detail->first();
            if ($user_detail->profile_pic == '-') {
                $profile_pic = 'upload/profile_pic/default.png';
            } else {
                $profile_pic = $user_detail->profile_pic;
            }
        }
        return view('home.theme1.my_profile')->with(['wraper_class' => $wraper_class, 'user_detail' => $user_detail, 'profile_pic' => $profile_pic, 'countries' => $countries, 'all_institutes' => $all_institutes]);
    }


    public function process_signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:200',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        try {
            $user = User::where('email', '=', $request->input('email'))->get();
            if ($user->count() == 0) {
                $user = User::create(request(['name', 'email', 'password']));
                $role = DB::table('roles')->where('name', '=', 'participant')->first();
                // event(new Registered($user));
                $user->attachRole($role->id);
                Auth::loginUsingId($user->id, true);

                /* Cread user seeds */
                save_user_seeds($user->id);
                /* Cread user seeds */

                $flash = array('type' => 'success', 'msg' => 'Thank you for registering with us.');
                $request->session()->flash('flash', $flash);
            } else {
                $flash = array('type' => 'error', 'msg' => 'This email address already registered with us');
                $request->session()->flash('flash', $flash);
            }
        } catch (QueryException $ex) {
            $flash = array('type' => 'error', 'msg' => $ex->getMessage());
            $request->session()->flash('flash', $flash);
        }
        return redirect('/');
    }

    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember_me = $request->input('remember_me');
        if (!$request->has('remember_me')) {
            $remember_me = false;
        }

        $credentials = $request->except(['_token', 'remember_me']);
        $user = User::where('email', $request->email)->first();
        if (Auth::attempt($credentials, $remember_me)) {
            $flash = array('type' => 'success', 'msg' => 'Login success');
            $request->session()->flash('flash', $flash);
        } else {
            $flash = array('type' => 'error', 'msg' => 'Failed: Invalid username password');
            $request->session()->flash('flash', $flash);
        }
        return redirect(url()->previous());
    }

    public function save_profile_pic(Request $request)
    {
        $folder = 'upload/profile_pic/';
        $folderPath = public_path($folder);

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $name = uniqid() . '.png';
        $file = $folderPath . $name;
        $local_path = $folder . $name;

        $save = file_put_contents($file, $image_base64);
        $user_id = Auth::id();

        $user_detail = DB::table('user_details')->where('user_id', '=', $user_id)->first();
        if ($user_detail->profile_pic != '-') {
            if (file_exists($user_detail->profile_pic)) {
                unlink($user_detail->profile_pic);
            }
        }
        $data = array(
            'profile_pic' => $local_path
        );
        DB::table('user_details')->where('user_id', '=', $user_id)->update($data);

        if ($save) {
            $finalResult = setResponse(0, 'message_key', "Profile Pic updated", 0, $local_path, 1);
        } else {
            $finalResult = setResponse(0, 'message_key', "Something went wrong", 0, [], 0);
        }
        return response()->json($finalResult);
    }

    public function save_profile_details(Request $request)
    {
        $rules = [
            'name' => 'required|max:150',
            'country' => 'required',
            'institution' => 'required',
            'address' => 'required',
            // 'idProof' => 'required|mimes:jpg,jpeg,png,gif,ttf|max:2009',
        ];
        $request->validate($rules);

        $user_id = Auth::id();
        DB::table('users')->where('id', '=', $user_id)->update(array('name' => $request->input('name')));

        $user_details = array(
            'country_id' => $request->input('country'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country'),
            'institution_id' => $request->input('institution'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        DB::table('user_details')->where('user_id', '=', $user_id)->update($user_details);

        if ($request->hasFile('idProof')) {
            $user_detail = DB::table('user_details')->where('user_id', '=', $user_id)->first();
            $current_file = 'public/' . $user_detail->address_proof;
            if (Storage::exists($current_file)) {
                Storage::delete($current_file);
            }

            $file = $request->file('idProof');
            $destinationPath = 'profile_proof';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->storeAs($destinationPath, $fileName, 'public');
            $media_path = $destinationPath . '/' . $fileName;
            DB::table('user_details')->where('user_id', '=', $user_id)->update(array('address_proof' => $media_path));
        }

        $flash = array('type' => 'success', 'msg' => 'Details updated');
        $request->session()->flash('flash', $flash);
        return redirect('my_account/profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function save_subscription(Request $request)
    {
        $rules = [
            'name' => 'required|max:150',
            'email' => 'required',
        ];
        $request->validate($rules);
        $name = $request->input('name');
        $email = $request->input('email');
        $existing_subs = DB::table('subscriberes_list')->where(array('email' => $email));
        if ($existing_subs->count() > 0) {
            $ins_data = array(
                'name' => $name,
                'email' => $email,
                'is_subscribed' => 1,
                'updated_at' => Carbon::now()->toDateTimeString()
            );
            $action = DB::table('subscriberes_list')->where('email', '=', $email)->update($ins_data);
            $flash = array('type' => 'success', 'msg' => 'Subscription details updated');
        } else {
            $ins_data = array(
                'name' => $name,
                'email' => $email,
                'is_subscribed' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            );
            $action = DB::table('subscriberes_list')->insert($ins_data);
            $flash = array('type' => 'success', 'msg' => 'Thank you for subscribing with us.');
        }

        $request->session()->flash('flash', $flash);
        return redirect(url()->previous());
    }
}
