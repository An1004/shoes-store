@extends('client.index_layout')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang Chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Đăng ký</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!-- customer login start -->
<div class="customer_login">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {!! session()->get('message') !!}
            {!! session()->forget('message') !!}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {!! session()->get('error') !!}
            {!! session()->forget('error') !!}
        </div>
    @endif
<div class="row">
            <!--register area start-->
            <div class="col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng ký tài khoản</h2>
                    <form action="{{ URL::to('/register-customer-save')}}" method="POST">
                        @csrf
                        <p>
                            <label>Tên<span>*</span></label>
                            <input type="text" required="" name="customer_user_name_register">
                            @error('customer_user_name_register')
                            <p class="alert alert-danger"> {{ $message }}</p>
                            @enderror
                        </p>
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="text" required="" name="customer_email_register">
                            @error('customer_email_register')
                            <p class="alert alert-danger"> {{ $message }}</p>
                            @enderror
                         </p>
                         <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" required="" name="customer_password_register">
                            @error('customer_password_register')
                            <p class="alert alert-danger"> {{ $message }}</p>
                            @enderror
                         </p>
                         <p>
                            <label>Xác nhận mật khẩu <span>*</span></label>
                            <input type="password" required="" name="customer_confirm_password_register">
                            @error('customer_confirm_password_register')
                            <p class="alert alert-danger"> {{ $message }}</p>
                            @enderror
                         </p>
                         <p>
                            <label>Mã xác thực<span>*</span></label>
                            <input type="text" required="" name="customer_verification_code_register" value=" ">
                         </p>
                        <div class="login_submit">
                            <button type="submit">Đăng ký</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
</div>
<!-- customer login end -->
@endsection
