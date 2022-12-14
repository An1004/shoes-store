@extends('admin.index_layout_admin')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <ol class="breadcrumb page-title">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SHOES</a></li>
                            <li class="breadcrumb-item active">Đổi Mật Khẩu Nhân Viên</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="header-title">Đổi Mật Khẩu Nhân Viên</h4>
                            <p class="sub-header">
                            <hr>
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
                            </p>
                            <form action="{{URL::to('/admin-change-password-staff-save')}}" class="parsley-form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pass1">Email<span class="text-danger">*</span></label>
                                    <input id="pass1" name="staff_email" type="email" placeholder="Email" required="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pass1">Mật Khẩu Mới<span class="text-danger">*</span></label>
                                    <input id="pass1" name="staff_new_password" type="password" placeholder="Mật khẩu mới" required="" class="form-control">
                                    @error('staff_new_password')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="passWord2">Xác Nhận Mật Khẩu Mới<span class="text-danger">*</span></label>
                                    <input data-parsley-equalto="#pass1" name="staff_confirm_new_password" type="password" required="" placeholder="Xác nhận mật khẩu mới" class="form-control" id="passWord2">
                                    @error('staff_confirm_new_password')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        Lưu
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            <!-- end content -->
            <!-- end page title -->
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    <!-- Footer Start -->
    @include('admin.blocks.footer_admin')
    <!-- end Footer -->
</div>
@endsection
