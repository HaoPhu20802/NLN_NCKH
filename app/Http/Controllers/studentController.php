<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class studentController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }  

    public function add_student(){
        $this->AuthLogin();
        // Lấy danh sách các ngành
        $majors = DB::table('tbl_major')->orderBy('nganh_id','desc')->get();
    
        // Lấy danh sách các tài khoản sinh viên chưa được gán cho sinh viên nào
        $availableAccountIds = DB::table('tbl_students')->pluck('user_id')->toArray();
        $accounts = DB::table('tbl_accounts')->where('user_role', 0)
                                             ->whereNotIn('user_id', $availableAccountIds)
                                             ->orderBy('user_id', 'ASC')
                                             ->select('user_id', 'user_email')
                                             ->get();
        if($accounts->isEmpty() || $accounts->first()->user_email == NULL){
            Session::put('message','Không còn tài khoản sinh viên để thêm');
            return Redirect::to('all-student');
        } else {
            return view('admin.student.add_student', compact('majors', 'accounts'));   
        }
           
    }
    

    public function all_student(){
        $this->AuthLogin();
        $all_student = DB::table('tbl_students')
            ->join('tbl_major', 'tbl_major.nganh_id', '=', 'tbl_students.nganh_id')
            ->join('tbl_khoa', 'tbl_khoa.khoa_id', '=', 'tbl_major.khoa_id')
            ->join('tbl_accounts', 'tbl_accounts.user_id', '=', 'tbl_students.user_id')
            ->get();
        $manager_student = view('admin.student.all_student')->with('all_student', $all_student);
        return view('admin_layout')->with('admin.student.all_student', $manager_student); 
    }
    

    public function save_student(Request $request){
        // Lấy sinh viên cuối cùng từ cơ sở dữ liệu
        $latest_student = DB::table('tbl_students')->orderBy('student_id', 'desc')->first();
    
        // Kiểm tra xem có sinh viên cuối cùng không
        if ($latest_student) {
            // Nếu có sinh viên cuối cùng, lấy số thứ tự từ student_id của sinh viên đó và tăng lên một
            $latest_id_number = substr($latest_student->student_id, 1);
            $next_id_number = $latest_id_number + 1;
        } else {
            // Nếu không có sinh viên trong cơ sở dữ liệu, bắt đầu từ số 1
            $next_id_number = 1;
        }
    
        // Tạo student_id mới
        $student_id = 'B' . sprintf('%05d', $next_id_number);
    
        $data = array();
        $data['student_id'] = $student_id;
        $data['nganh_id'] = $request->major;
        $data['user_id'] = $request->user;
        $data['student_name'] = $request->ten;
        $data['student_ngaysinh'] = $request->date;
        $data['student_gioitinh'] = $request->gt;
        $data['student_khoahoc'] = $request->nk;
    
        // Thêm sinh viên vào cơ sở dữ liệu

        DB::table('tbl_students')->insert($data);
        Session::put('message','Thêm sinh viên thành công');
        return Redirect::to('all-student');
    }    
    

    public function edit_student($student_id){
        $this->AuthLogin();
        $nganh = DB::table('tbl_major')->orderby('nganh_id','desc')->get();
        
        $edit_student = DB::table('tbl_students')->where('student_id',$student_id)->get();
        $manager_student = view('admin.student.edit_student')->with('edit_student',$edit_student)->with('nganh',$nganh);

        return view('admin_layout')->with('admin.student.edit_student',$manager_student);
    }

    public function update_student(Request $request, $student_id){
        $data = array();
        $data['student_id'] = $student_id;
        $data['nganh_id'] = $request->major;
        $data['student_name'] = $request->ten;
        $data['student_ngaysinh'] = $request->date;
        $data['student_gioitinh'] = $request->gt;
        $data['student_khoahoc'] = $request->nk;
        // $data['student_role'] = $request->role;
        DB::table('tbl_students')->where('student_id',$student_id)->update($data);
        Session::put('message','Cập nhật thông tin sinh viên thành công');
        return Redirect::to('all-student');
    }
    public function delete_student($student_id){
        $this->AuthLogin();
        DB::table('tbl_students')->where('student_id',$student_id)->delete();
        // Session::put('message','Xóa thành công');
        return Redirect::to('all-student');
    }
}
