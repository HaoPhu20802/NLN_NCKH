<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class FacultyList extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }   

    public function add_faculty(){
        $this->AuthLogin();
        return view('admin.faculty.add_faculty');
    }
    public function all_faculty(){
        $this->AuthLogin();
        $all_faculty = DB::table('tbl_khoa')->get();
        $manager_faculty = view('admin.faculty.all_faculty')->with('all_faculty',$all_faculty);
       return view('admin_layout')->with('admin.faculty.all_faculty',$manager_faculty); 
    }
    public function save_faculty(Request $request){
        $data = array();
        $data['khoa_ten'] = $request->faculty_name;

        DB::table('tbl_khoa')->insert($data);
        Session::put('message','Thêm khoa thành công');
        return Redirect::to('add-faculty');
    }
    public function edit_faculty($khoa_id){
        $this->AuthLogin();
        $edit_faculty = DB::table('tbl_khoa')->where('khoa_id',$khoa_id)->get();
        $manager_faculty = view('admin.faculty.edit_faculty')->with('edit_faculty',$edit_faculty);

        return view('admin_layout')->with('admin.faculty.edit_faculty',$manager_faculty);
    }

    public function update_faculty(Request $request, $khoa_id){
        $data = array();
        $data['khoa_ten'] = $request->faculty_name;

        DB::table('tbl_khoa')->where('khoa_id',$khoa_id)->update($data);
        Session::put('message','Cập nhật khoa thành công');
        return Redirect::to('all-faculty');
    }
    public function delete_faculty($khoa_id){
        $this->AuthLogin();
        DB::table('tbl_khoa')->where('khoa_id',$khoa_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-faculty');
    }
}
