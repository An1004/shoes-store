<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Session;
use App\Models\AboutStore;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Delivery;
use App\Models\ProductType;
use App\Models\ProductInStock;
use App\Models\ProductImportDetail;
use App\Models\ProductImage;
use App\Models\ProductDiscount;
use App\Models\Discount;
use App\Models\Customer;
use App\Models\HeaderShow;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\SlideShow;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Mail;
session_start();


class AboutStoreController extends Controller
{
    public function ShowAboutUS(){
        $all_about_us=AboutStore::orderby('cuahang_thu_tu', 'ASC')->get();
        $all_product_type=ProductType::where('loaisanpham_trang_thai', '1')->orderBy('id', 'DESC')->get();
        $all_brand=Brand::where('thuonghieu_trang_thai', '1')->orderBy('id', 'DESC')->get();
        $all_collection=Collection::where('dongsanpham_trang_thai', '1')->orderBy('id', 'DESC')->get();
        $all_header=HeaderShow::where('headerquangcao_trang_thai', '1')
        ->orderby('headerquangcao_thu_tu', 'ASC')->get();
        if ($all_header->count()>0) {
            foreach ($all_header as $key=>$value) {
                $thu_tu_header=$value->headerquangcao_thu_tu;
                break;
            }
        } else {
            $all_header=null;
            $thu_tu_header=null;
        }
        $get_about_us_bottom=AboutStore::orderby('cuahang_thu_tu', 'ASC')->first();
        return view('client.pages.about_us.about_us')
        ->with('product_type', $all_product_type)
        ->with('product_brand', $all_brand)
        ->with('all_about_us', $all_about_us)
        ->with('get_about_us_bottom', $get_about_us_bottom)
        ->with('product_collection', $all_collection)
        ->with('header_show', $all_header)
        ->with('header_min', $thu_tu_header);

    }
    public function Index(){
        $this->AuthLogin();
        if (Session::get('admin_role')==3) {
            return Redirect::to('/dashboard');
        } else {
            $all_about_store=AboutStore::orderby('id', 'DESC')->paginate(5);
            return view('admin.pages.aboutstore.about_store')->with('all_about_store', $all_about_store);
        }
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function AboutStoreAdd(){
        $this->AuthLogin();
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            return view('admin.pages.aboutstore.about_store_add');
        }
    }

    public function AboutStoreSave(Request $request){
        $this->AuthLogin();
        $this->validate($request,[
            'about_store_title' => 'bail|required|max:255|min:5',
            'about_store_description' => 'bail|required|max:255|min:5',
            'about_store_address' => 'bail|required|max:255|min:5',
            'about_store_phone_number' => 'bail|required|max:12|min:10',
            'about_store_email' => 'bail|required|email|max:255',
            'about_store_number' => 'bail|required|max:255',
            'about_store_img' => 'bail|mimes:jpeg,jpg,png,gif|required|max:10000'
        ],[
            'required' => 'Kh??ng ???????c ????? tr???ng',
            'email' => 'Email sai ?????nh d???ng',
            'max' => 'Qu?? d??i',
            'min' => 'Qu?? ng???n',
            'mimes' => 'Sai ?????nh d???ng ???nh'
        ]);
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $data=$request->all();
            $get_about=AboutStore::where('cuahang_thu_tu', $data['about_store_number'])->first();
            if ($get_about) {
                return Redirect::to('/about-store-add')->with('error', 'Th??m kh??ng th??nh c??ng, s??? th??? t??? ???? t???n t???i!');
            } else {
                $about_store=new AboutStore();
                $about_store->cuahang_tieu_de = $data['about_store_title'];
                $about_store->cuahang_mo_ta = $data['about_store_description'];
                $about_store->cuahang_dia_chi = $data['about_store_address'];
                $about_store->cuahang_so_dien_thoai = $data['about_store_phone_number'];
                $about_store->cuahang_trang_thai = $data['about_store_status'];
                $about_store->cuahang_thu_tu = $data['about_store_number'];
                $about_store->cuahang_email = $data['about_store_email'];
                $get_image = $request->file('about_store_img');
                $path = '/uploads/admin/aboutstore';
                //them hinh anh
                if ($get_image) {
                    
                        $get_name_image = $get_image->getClientOriginalName();
                        $name_image = current(explode('.', $get_name_image));
                        $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
                        $get_image->move('uploads/admin/aboutstore', $new_image);
                        $about_store->cuahang_anh = $new_image;
                        $about_store->save();
                        return Redirect::to('/about-store')->with('message', 'Th??m th??nh c??ng');
                    
                } else {
                    return Redirect::to('/about-store-add')->with('error', 'Th??m kh??ng th??nh c??ng,vui l??ng ch???n ???nh!');
                }
            }
        }
    }

    public function UnactiveAboutStore($about_store_id){
        $this->AuthLogin();
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $unactive_about_store=AboutStore::find($about_store_id);
            if (!$unactive_about_store) {
                return Redirect::to('/about-store')->with('error', 'Kh??ng t???n t???i');
            } else {
                $unactive_about_store->cuahang_trang_thai=0;
                $unactive_about_store->save();
                return Redirect::to('/about-store')->with('message', '???n th??nh c??ng');
            }
        }
    }
    public function ActiveAboutStore($about_store_id){
        $this->AuthLogin();
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $active_about_store=AboutStore::find($about_store_id);
            if (!$active_about_store) {
                return Redirect::to('/about-store')->with('error', 'Kh??ng t???n t???i');
            } else {
                $active_about_store->cuahang_trang_thai=1;
                $active_about_store->save();
                return Redirect::to('/about-store')->with('message', 'Hi???n th??? th??nh c??ng');
            }
        }
    }

    public function AboutStoreEdit($about_store_id){
        $this->AuthLogin();
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $edit_about_store=AboutStore::find($about_store_id);
            if (!$edit_about_store) {
                return Redirect::to('/about-store')->with('error', 'Kh??ng t???n t???i');
            } else {
                return view('admin.pages.aboutstore.about_store_edit')
            ->with('about_store', $edit_about_store);
            }
        }
    }

    public function AboutStoreSaveEdit(Request $request,$about_store_id){
        $this->AuthLogin();
        $this->validate($request,[
            'about_store_title' => 'bail|required|max:255|min:5',
            'about_store_description' => 'bail|required|max:255|min:5',
            'about_store_address' => 'bail|required|max:255|min:5',
            'about_store_phone_number' => 'bail|required|max:12|min:10',
            'about_store_email' => 'bail|required|email|max:255',
            'about_store_number' => 'bail|required|max:255',
            'about_store_img' => 'bail|mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'required' => 'Kh??ng ???????c ????? tr???ng',
            'email' => 'Email sai ?????nh d???ng',
            'max' => 'Qu?? d??i',
            'min' => 'Qu?? ng???n',
            'mimes' => 'Sai ?????nh d???ng ???nh'
        ]);
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $data=$request->all();
            $about_store=AboutStore::find($about_store_id);
            if (!$about_store) {
                return Redirect::to('/about-store')->with('error', 'Kh??ng t???n t???i');
            } else {
                $about_store->cuahang_tieu_de = $data['about_store_title'];
                $about_store->cuahang_mo_ta = $data['about_store_description'];
                $about_store->cuahang_dia_chi = $data['about_store_address'];
                $about_store->cuahang_so_dien_thoai = $data['about_store_phone_number'];
                $about_store->cuahang_trang_thai = $data['about_store_status'];
                $about_store->cuahang_thu_tu = $data['about_store_number'];
                $about_store->cuahang_email = $data['about_store_email'];
                $old_name=$about_store->cuahang_anh;
                $get_image = $request->file('about_store_img');
                $path = '/uploads/admin/aboutstore/';
                if ($get_image) {
                    if($path.$get_image && $path.$get_image==$path.$old_name){
                        return Redirect::to('/about-store-edit/'.$about_store_id)->with('error', 'Th??m kh??ng th??nh c??ng, tr??ng t??n ???nh vui l??ng ch???n ???nh kh??c!');
                    }else{
                        // if ($old_name==null) {
                        //     unlink($path.$old_name);
                        // }
                        $get_name_image = $get_image->getClientOriginalName();
                        $name_image = current(explode('.', $get_name_image));
                        $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
                        $get_image->move('uploads/admin/aboutstore', $new_image);
                        $about_store->cuahang_anh= $new_image;
                        $about_store->save();
                        return Redirect::to('/about-store')->with('message', 'C???p nh???t th??nh c??ng');
                    }
                } else {
                    if ($old_name!=null) {
                        $about_store->cuahang_anh = $old_name;
                        $about_store->save();
                        return Redirect::to('/about-store')->with('message', 'C???p nh???t th??nh c??ng');
                    } else {
                        return Redirect::to('/about-store-edit/'.$about_store_id)->with('error', 'C???p nh???t kh??ng th??nh c??ng, vui l??ng ch???n ???nh!');
                    }
                }
            }
        }
    }
    public function AboutStoreDelete($about_store_id){
        $this->AuthLogin();
        if(Session::get('admin_role')==3){
            return Redirect::to('/dashboard');
        }else{
            $delete_about=AboutStore::find($about_store_id);
            if (!$delete_about) {
                return Redirect::to('/about-store')->with('error', 'Kh??ng t???n t???i');
            } else {
                $delete_about->delete();
                return Redirect::to('/about-store')->with('message', 'X??a th??nh c??ng');
            }
        }
    }
}
