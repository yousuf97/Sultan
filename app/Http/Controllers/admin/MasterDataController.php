<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MasterDataController extends Controller
{
    public function list_all_institutions(){
        return view('admin.all_institutions', [
        'institutions' => DB::table('institutions')->select('*')->orderBy('id', 'asc')->paginate(15)
        ]);
    }

    public function add_edit_institution_form($id = null){
        $countries = DB::table('countries')->select('*')->get();
        $event_categories = DB::table('event_categories')->select('*')->get();        
        if($id != null){        
            $institution = DB::table('institutions')->where('id', $id)->select('*')->get();
            return view('admin.add_institutions')->with(['institution' => $institution, 'countries' => $countries, 'event_categories' => $event_categories, 'update_id' => $id]);
        }else{
            return view('admin.add_institutions')->with(['countries' => $countries, 'event_categories' => $event_categories, 'update_id' => null]);
        }        
    }
  

    public function save_institution(Request $request){

        $rules = [
        'title' => 'required|max:150',
        'description' => 'required|max:500',
        'category' => 'required|max:50',
        'address' => 'required|max:500',
        'email' => 'required|max:50',
        'phone' => 'required|max:25',
        'country' => 'required|max:20',
        'web_url' => 'required|max:200'
        // 'file' => 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009',
        ];
        if($request->input('update_id') == null){
            $rules['file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009';
        }else{
            if ($request->hasFile('file')) {
                $rules['file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009';
            }
        }
        $request->validate($rules);
       
        if($request->hasFile('file')) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('institutions', $fileName, 'public');

            $name = time().'_'.$request->file->getClientOriginalName();
            
            //delete existing file for the 
            if($request->input('update_id') != null){
                $current_institution = DB::table('institutions')->where('id', $request->input('update_id'))->pluck('file');
                $current_file = 'public/'.$current_institution[0];
                 if(Storage::exists($current_file)){
                    Storage::delete($current_file);                
                 }
            }
        }else{
            $filePath = '';
        }

        $institution = array(
            'title' => $request->input('title'),
            'description' =>$request->input('description'),
            'category' =>implode(" #", $request->input('category')),
            'address' =>$request->input('address'),
            'email' =>$request->input('email'),
            'phone' =>$request->input('phone'),
            'is_active' =>$request->input('is_active'),
            'land_line' =>$request->input('land_line'),
            'country' =>$request->input('country'),
            'web_url' =>$request->input('web_url'),
            'social_url' =>$request->input('social_url'),
            'file' => $filePath,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
       
        try {
            if($request->input('update_id') == null){
                DB::table('institutions')->insert($institution);
                $flash = array('type' => 'success', 'msg' => 'Institution details saved successfully');
                $request->session()->flash('flash', $flash);
            }else{
                if(!$request->hasFile('file')){
                    unset($institution["file"]);
                }                
                unset($institution["created_at"]);
                $update_id = $request->input('update_id');
                DB::table('institutions')->where('id', $update_id)->update($institution);
                $flash = array('type' => 'success', 'msg' => 'Institution details updated successfully');
                $request->session()->flash('flash', $flash);
            }           
        }   
        catch(QueryException $ex){
            dd($ex->getMessage());
        }
        return redirect('admin/masterdata/manage_institutions');
    }

    public function test(){
     echo "test";
      
    }
    
}
