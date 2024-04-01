<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function all_account(){
        $this->AuthLogin();
        $all_user = Account::orderBy('user_id','DESC')->get();
        return view('admin.account.all_account')->with(compact('all_user'));
    }

    public function add_account(){
        $this->AuthLogin();
        return view('admin.account.add_account')  ;
    }



    public function save_account(Request $request){
        $this->AuthLogin();
    
        $get_image = $request->file('img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/imgUser',$new_image);
        } else {
            // Nếu không có hình ảnh được tải lên, bạn có thể đặt một hình ảnh mặc định ở đây
            $new_image = 'logo_user.png'; // Thay 'default.jpg' bằng đường dẫn của hình ảnh mặc định bạn muốn sử dụng
        }
    
        $data = new Account();

        $data->user_email = $request->email; // Assuming 'khoa_ten' is the column name
        $data->user_password = Hash::make($request->password);
        $data->user_role = $request->role;
        $data->user_image = $new_image;

        // if (!filter_var($data['student_email'], FILTER_VALIDATE_EMAIL)) {
        //     Session::put('message', 'Email không hợp lệ');
        //     return Redirect::to('all-student');
        // }
    
        // if (!preg_match("/^[0-9]{10}$/", $data['student_sdt'])) {
        //     Session::put('message', 'Số điện thoại không hợp lệ');
        //     return Redirect::to('add-student');
        // }
    
        // // Kiểm tra mật khẩu đủ mạnh
        // if (strlen($data['student_password']) < 8) {
        //     Session::put('message', 'Mật khẩu phải có ít nhất 8 ký tự');
        //     return Redirect::to('add-student');
        // }



        $data->save();
        Session::put('message','Thêm user thành công');
        return Redirect::to('all-account');
    }

    public function edit_account($user_id){
        $this->AuthLogin();
        
        $edit_account = Account::find($user_id);
        
        if(!$edit_account) {
            abort(404); // Trả về lỗi 404 nếu không tìm thấy tài khoản
        }
        
        return view('admin.account.edit_account', compact('edit_account'));
    }
    

    public function update_account(Request $request, $user_id){
        $data = array();
        $data['user_email'] = $request->email;
        $data['user_password'] = $request->password;
        $data['user_role'] = $request->role;
        $get_image = $request->file('img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/imgUser',$new_image);
            $data['user_image'] = $new_image;
            Account::where('user_id', $user_id)->update($data);
            Session::put('message','Cập nhật tài khoản thành công');
            return Redirect::to('all-account');
        }
        Account::where('user_id', $user_id)->update($data);
        Session::put('message','Cập nhật tài khoản thành công');
        return Redirect::to('all-account');
       
    }

    public function delete_account($user_id){
        $this->AuthLogin();
        Account::where('user_id',$user_id)->delete();
        Session::put('message','Xóa tài khoản thành công');
        return Redirect::to('all-account');
    }

}
