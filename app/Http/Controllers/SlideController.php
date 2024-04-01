<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Illuminate\Support\Facades\Redirect;

class SlideController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_banner(){
        $all_slide = Slider::orderBy('slider_id','DESC')->get();
        return view('admin.slider.list_slider')->with(compact('all_slide'));
    }

    public function add_slider(){
        return view('admin.slider.add_slider')  ;
    }

    public function insert_slider(Request $request){
        $data = $request->all();
        $this->AuthLogin();

        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);

            $slider = new Slider();

            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('add-slider');

        }else{
            Session::put('message','Vui lòng thêm hình ảnh');
            return Redirect::to('add-slider');
        }
    }

    public function unactive_slider($slider_id){
        Slider::where('slider_id',$slider_id)->update(['slider_status'=> 1]);
        Session::put('message','Không kích hoạt slider thành công');
        return Redirect::to('manage-banner');
    }
    
    public function active_slider($slider_id){
        Slider::where('slider_id',$slider_id)->update(['slider_status'=> 0]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manage-banner');
    }
}
