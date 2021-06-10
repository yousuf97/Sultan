<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function web_settings()
    {
        // $roles = DB::table('roles')->get();
        // return view('admin.settings.web_settings.blade')->with(['roles' => $roles]);
        return view('admin.settings.web_settings');
    }

    public function save_banner(Request $request)
    {
        $term_id = 1; // Global Item ID for Home Page banner fixed to 1
        $rules = [
            'title1' => 'required',
            'title2' => 'required',
            'description' => 'required',
            'btn_1_label' => 'required',
            'btn_1_link' => 'required',
            'btn_2_label' => 'required',
            'btn_2_link' => 'required',
        ];

        if ($request->hasFile('file')) {
            $rules['file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009';
        }
        $request->validate($rules);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('web', $fileName, 'public');

            $name = time() . '_' . $request->file->getClientOriginalName();

            $existing_file = get_settings_meta_by_termid_metaKey($term_id, 'banner_img_file');

            if ($existing_file) {
                $current_file = 'public/' . $existing_file;
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }
            }
        } else {
            $filePath = '';
        }

        $data = array(
            'title1' => $request->input('title1'),
            'title2' => $request->input('title2'),
            'description' => $request->input('description'),
            'btn_1_label' => $request->input('btn_1_label'),
            'btn_1_link' => $request->input('btn_1_link'),
            'btn_2_label' => $request->input('btn_2_label'),
            'btn_2_link' => $request->input('btn_2_link'),
            'banner_img_file' => $filePath
        );

        $flag = save_settings_group_meta($data, $term_id);
        if ($flag) {
            $flash = array('type' => 'success', 'msg' => 'Banner details updated successfully');
            $request->session()->flash('flash', $flash);
        } else {
            $flash = array('type' => 'error', 'msg' => 'Something wen wrong');
            $request->session()->flash('flash', $flash);
        }
        return redirect('admin/settings/web');
    }

    public function save_web_icons(Request $request)
    {
        $term_id = 2; // Global Term ID for Logo & Fave icons fixed to 1
        if ($request->hasFile('open_logo')) {
            $file = $request->file('open_logo');
            save_meta_files($term_id, 'open_logo', $file);
        }

        if ($request->hasFile('close_logo')) {
            $file = $request->file('close_logo');
            save_meta_files($term_id, 'close_logo', $file);
        }

        if ($request->hasFile('fav_icon')) {
            $file = $request->file('fav_icon');
            save_meta_files($term_id, 'fav_icon', $file);
        }
        $flash = array('type' => 'success', 'msg' => 'Details saved successfully');
        $request->session()->flash('flash', $flash);
        return redirect('admin/settings/web');
    }

    public function save_footer_info(Request $request)
    {
        $term_id = 3;
        $data = $request->all();
        unset($data['_token']);
        $flag = save_settings_group_meta($data, $term_id);

        if ($request->hasFile('playstore_app')) {
            $file = $request->file('playstore_app');
            save_meta_files($term_id, 'playstore_app', $file);
        }

        if ($request->hasFile('appstore_app')) {
            $file = $request->file('appstore_app');
            save_meta_files($term_id, 'appstore_app', $file);
        }

        $flash = array('type' => 'success', 'msg' => 'Details saved successfully');
        $request->session()->flash('flash', $flash);
        return redirect('admin/settings/web');
    }

    public function save_ads_banner(Request $request)
    {
        $term_id = 4;
        if ($request->hasFile('ads_banner_1')) {
            $file = $request->file('ads_banner_1');
            save_meta_files($term_id, 'ads_banner_1', $file);
        }
        if ($request->hasFile('ads_banner_2')) {
            $file = $request->file('ads_banner_2');
            save_meta_files($term_id, 'ads_banner_2', $file);
        }
        if ($request->hasFile('ads_banner_3')) {
            $file = $request->file('ads_banner_3');
            save_meta_files($term_id, 'ads_banner_3', $file);
        }
        // ------------------------
        if ($request->hasFile('ads_banner_510x510')) {
            $file = $request->file('ads_banner_510x510');
            save_meta_files($term_id, 'ads_banner_510x510', $file);
        }
        if ($request->hasFile('ads_banner_240x240')) {
            $file = $request->file('ads_banner_240x240');
            save_meta_files($term_id, 'ads_banner_240x240', $file);
        }
        if ($request->hasFile('ads_banner_510x240')) {
            $file = $request->file('ads_banner_510x240');
            save_meta_files($term_id, 'ads_banner_510x240', $file);
        }
        if ($request->hasFile('ads_banner_240x510')) {
            $file = $request->file('ads_banner_240x510');
            save_meta_files($term_id, 'ads_banner_240x510', $file);
        }
        if ($request->hasFile('ads_banner_240x240_1')) {
            $file = $request->file('ads_banner_240x240_1');
            save_meta_files($term_id, 'ads_banner_240x240_1', $file);
        }
        if ($request->hasFile('ads_banner_510x240_1')) {
            $file = $request->file('ads_banner_510x240_1');
            save_meta_files($term_id, 'ads_banner_510x240_1', $file);
        }

        $flash = array('type' => 'success', 'msg' => 'Details saved successfully');
        $request->session()->flash('flash', $flash);
        return redirect('admin/settings/web');
    }
}
