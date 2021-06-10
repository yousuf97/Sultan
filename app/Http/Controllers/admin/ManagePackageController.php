<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ManagePackageController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function create_package(){
        return view('admin.create_package');
    }

    public function save_package(Request $request){
        $dynamic_form = $request->input('dynamic_form');
        $dynamic_form = $dynamic_form['dynamic_form'];
        $packageData = array(
            'title' => $request->input('title'),
            'description' => $request->input('package_description'),
            'actual_price' => $request->input('actual_price'),
            'discount_price' => $request->input('discount_price'),
            'package_feature' => $request->input('package_feature'),
            'is_active' => 1,
            'file' => 'no_file',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'created_by' => Auth::id(),
            'category_id' => 1,
        );
        try {
            $package_id = DB::table('packages')->insertGetId($packageData);
            $groupAndTests = [];
            foreach ($dynamic_form as $row) {                
                $groupData = array(
                    'title' => $row['g_name'],
                    'package_id' => $package_id,
                    'test_names' => $row['tests'],
                    'is_active' => 1,
                    'created_by'=> Auth::id(),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                );
                $groupAndTests[] = $groupData;
            }
             try {
                 DB::table('test_group')->insert($groupAndTests);

             } catch(QueryException $ex){
                dd($ex->getMessage());
             }
            
        } catch(QueryException $ex){
            dd($ex->getMessage());
        }
        return redirect('admin/manage_package');
    }

    public function edit_package($id){
        try {
              $package_info = DB::table('packages as P')->where('P.id', '=', $id)->select('P.*')->get();                
              $package_test_info = DB::table('test_group')->where('package_id', '=', $id)->select('*')->orderBy('id', 'asc')->get();
              $formated_test_arr = [];
              foreach ($package_test_info as $row) {
                $formated_test_arr[] = array('g_name' => $row->title, 'tests' => $row->test_names);
              }
        } catch(QueryException $ex){
           dd($ex->getMessage());
        }
        return view('admin.create_package')->with(['package_info' => $package_info, 'package_test_info' => $formated_test_arr, 'id' => $id]);
    }

    public function update_package(Request $request, $id){
        
        $dynamic_form = $request->input('dynamic_form');
        $dynamic_form = $dynamic_form['dynamic_form'];
        $packageData = array(
            'title' => $request->input('title'),
            'description' => $request->input('package_description'),
            'actual_price' => $request->input('actual_price'),
            'discount_price' => $request->input('discount_price'),
            'package_feature' => $request->input('package_feature'),
            'is_active' => 1,
            'file' => 'no_file',
            'updated_at' => Carbon::now()->toDateTimeString(),
            'category_id' => 1,
        );
        try {
            DB::table('packages')->where('id', '=', $id)->update($packageData);
            DB::table('test_group')->where('package_id', '=', $id)->delete();
            $groupAndTests = [];
            foreach ($dynamic_form as $row) {                
                $groupData = array(
                    'title' => $row['g_name'],
                    'package_id' => $id,
                    'test_names' => $row['tests'],
                    'is_active' => 1,
                    'created_by'=> Auth::id(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                );
                $groupAndTests[] = $groupData;
            }
             try {
                 DB::table('test_group')->insert($groupAndTests);

             } catch(QueryException $ex){
                dd($ex->getMessage());
             }
            
        } catch(QueryException $ex){
            dd($ex->getMessage());
        }
        return redirect('admin/edit_package/'.$id);
    }

    public function manage_package(){    
         return view('admin.manage_package', [
         'packages' => DB::table('packages')->where('is_active', '=', 1)->select('*')->orderBy('id', 'asc')->paginate(15)
         ]);

    }
}
