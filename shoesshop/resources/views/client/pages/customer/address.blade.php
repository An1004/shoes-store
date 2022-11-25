@extends('client.index_layout')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Tài khoản</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Địa chỉ</li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thêm địa chỉ</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!-- customer login start -->
<div class="customer_login">
<div class="row">
    <!--blog area start-->
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
    <div class="main_blog_area">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-6">
                <div class="blog_details_left">
                    <div class="blog_gallery">
                        <form action="{{URL::to('/customer-address-save/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                               
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Địa chỉ</label>
                                                    <input name="address_customer" required="" value="" placeholder="Vui lòng nhập địa chỉ" type="text">
                                                    @error('address_customer')
                                                    <p class="alert alert-danger"> {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                            <div class="form-group row">
                                               
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Thành Phố</label>
                                                    <select name="city" id="city" class="choose city form-control">
                                                        <option>---Chọn Thành Phố---</option>
                                                        @foreach ($city as $key=>$cty)
                                                            <option value="{{$cty->id}}">{{ $cty->tinhthanhpho_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                            
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Quận Huyện</label>
                                                    <select name="province" id="province" class="choose province form-control">
                                                        <option>---Chọn Quận Huyện---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                            
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Xã Phường</label>
                                                    <select name="wards" id="wards" class="wards form-control">
                                                        <option >---Chọn Xã Phường Thị Trấn---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="text-lg-right mt-3 mt-lg-0">
                                                        <button type="submit" name="transport_fee_add" class="transport-fee-add btn btn-success waves-effect waves-light mt-3"><i class="mdi mdi-content-save mr-1"></i>Thêm</button>
                                                    </div>
                                                </div>
                                            </div>
                        </form>
                    </div>
                </div>
            </div
        </div>
    </div>
    <!--blog area end-->
        </div>
</div>
<!-- customer login end -->
@endsection
