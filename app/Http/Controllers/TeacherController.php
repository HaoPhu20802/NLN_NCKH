<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class TeacherController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_teacher(){
        $this->AuthLogin();
        $faculty = DB::table('tbl_khoa')->orderby('khoa_id','desc')->get();
    
        $availableAccountIds = DB::table('tbl_teachers')->pluck('user_id')->toArray();
        $accounts = DB::table('tbl_accounts')->where('user_role', 1)
                                             ->whereNotIn('user_id', $availableAccountIds)
                                             ->orderBy('user_id', 'ASC')
                                             ->select('user_id', 'user_email')
                                             ->get();
        if($accounts->isEmpty() || $accounts->first()->user_email == NULL){
            Session::put('message','Không còn tài khoản giảng viên để thêm');
            return Redirect::to('all-teacher');
        } else {
            return view('admin.teacher.add_teacher', compact('faculty', 'accounts'));   
        }
    }
    
        

    public function all_teacher(){
        $this->AuthLogin();
        $all_teacher = DB::table('tbl_teachers')
        ->join('tbl_khoa','tbl_khoa.khoa_id','=','tbl_teachers.khoa_id')->get();
        $manager_teacher = view('admin.teacher.all_teacher')->with('all_teacher',$all_teacher);
       return view('admin_layout')->with('admin.teacher.all_teacher',$manager_teacher); 
    }

    public function save_teacher(Request $request){
        // Lấy sinh viên cuối cùng từ cơ sở dữ liệu
        $latest_teacher = DB::table('tbl_teachers')->orderBy('teacher_id', 'desc')->first();

        // Kiểm tra xem có giáo viên cuối cùng không
        if ($latest_teacher) {
            // Nếu có giáo viên cuối cùng, lấy số thứ tự từ teacher_id của giáo viên đó và tăng lên một
            $latest_id_number = (int)$latest_teacher->teacher_id;
            $next_id_number = $latest_id_number + 1;
        } else {
            // Nếu không có giáo viên trong cơ sở dữ liệu, bắt đầu từ số 0
            $next_id_number = 0;
        }

        // Định dạng lại để có độ dài 5 ký tự, bắt đầu từ 00000
        $teacher_id = str_pad($next_id_number, 5, '0', STR_PAD_LEFT);

        $data = array();
        $data['teacher_id'] = $teacher_id;
        $data['khoa_id'] = $request->khoa;
        $data['user_id'] = $request->user;
        $data['teacher_name'] = $request->ten;
        $data['teacher_ngaysinh'] = $request->date;
        $data['teacher_gioitinh'] = $request->gt;
        $data['teacher_ngachvienchuc'] = $request->vienchuc;
        $data['teacher_trinhdo'] = $request->chuyenmon;

        // Thêm sinh viên vào cơ sở dữ liệu
        DB::table('tbl_teachers')->insert($data);
        Session::put('message','Thêm giảng viên thành công');



        return Redirect::to('all-teacher');
    }    
    

    public function edit_teacher($teacher_id){
        $this->AuthLogin();
        $khoa = DB::table('tbl_khoa')->orderby('khoa_id','desc')->get();

        $edit_teacher = DB::table('tbl_teachers')->where('teacher_id',$teacher_id)->get();
        $manager_teacher = view('admin.teacher.edit_teacher')->with('edit_teacher',$edit_teacher)->with('khoa',$khoa);

        return view('admin_layout')->with('admin.teacher.edit_teacher',$manager_teacher);
    }

    public function update_teacher(Request $request, $teacher_id){
        $data = array();
        $data['teacher_id'] = $teacher_id;
        $data['khoa_id'] = $request->khoa;
        $data['teacher_name'] = $request->ten;
        $data['teacher_ngaysinh'] = $request->date;
        $data['teacher_gioitinh'] = $request->gt;
        $data['teacher_ngachvienchuc'] = $request->vienchuc;
        $data['teacher_trinhdo'] = $request->chuyenmon;
        // $data['teacher_role'] = $request->role;
        DB::table('tbl_teachers')->where('teacher_id',$teacher_id)->update($data);
        Session::put('message','Cập nhật thông tin sinh viên thành công');
        return Redirect::to('all-teacher');
    }
    public function delete_teacher($teacher_id){
        $this->AuthLogin();
        DB::table('tbl_teachers')->where('teacher_id',$teacher_id)->delete();
        // Session::put('message','Xóa thành công');
        return Redirect::to('all-teacher');
    }
}
