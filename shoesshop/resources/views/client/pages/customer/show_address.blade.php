@extends('client.index_layout')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{URL::to('/my-account/')}}">Tài khoản</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Địa chỉ</li>
                    
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
                    <div class="coron_table table-responsive">
                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($customer_address as $key=>$address)
                                                <tr>
                                                  <td>{{$address->diachi_ten}}</td>
                                                  <td>
                                                    @if($address->diachi_macdinh == 1)
                                                        <span class="address-hover">Mặc định</span>
                                                        
                                                        <!-- <span class="address-radio"><input type="radio" value="1" checked name="customer_address" checked></span> -->
                                                    @else
                                                        <a href="{{URL::to('/customer-address-choose/'.$address->id)}}" class="view" onclick="return confirm('Chọn làm mặc đinh?')"> <span class="address-hover" style="color:#ea3a3c">Chọn làm mặc định</span>
                                                        </a>
                                                        <!-- <a href="{{URL::to('/customer-address-edit/'.$address->id)}}"  onclick="return confirm('Chọn làm mặc đinh?')"><input type="radio" value="0" checked name="customer_address" checked></a> -->
                                                    @endif
                                                  </td>
                                                  <td><a href="{{URL::to('/customer-address-edit/'.$address->id)}}" class="view" > <span class="address-hover">Sửa</span>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                          
                                    </tbody>
                                </table>
                            </div>
                        
                            <a href="{{URL::to('/customer-address-add/')}}" class="btn btn-danger waves-effect waves-light mt-3 mr-3" style="color: white; margin-left:650px">Thêm địa chỉ</a>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
    <!--blog area end-->
        </div>
</div>
<!-- customer login end -->
@endsection
