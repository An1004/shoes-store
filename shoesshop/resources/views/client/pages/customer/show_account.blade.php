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
                    <li>Tài Khoản</li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
<!--breadcrumbs area end-->
<!-- Start Maincontent  -->
<section class="main_content_area">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link" >Thông tin tài khoản</a></li>
                            <li> <a href="{{URL::to('/customer-address/'.$customer->id)}}"  class="nav-link">Địa chỉ</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link active" >Đơn Hàng</a></li>
                            <li> <a href="#coupon-code" data-toggle="tab" class="nav-link">Nhận Mã Giảm Giá</a></li>
                            <li> <a href="#change-password" data-toggle="tab" class="nav-link">Đổi Mật Khẩu</a></li>
                            <li><a href="{{URL::to('/logout-customer')}}" onclick="return confirm('Đăng Xuất?')" class="nav-link">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade " id="account-details">
                            <h3>Chi Tiết Tài Khoản </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="{{URL::to('/customer-edit-save/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            {{--  <p>Already have an account? <a href="#">Log in instead!</a></p>  --}}
                                            <div class="input-radio">
                                            @if ($customer->khachhang_gioi_tinh==0 || $customer->khachhang_gioi_tinh!=1 )
                                                <span class="custom-radio"><input type="radio" value="0" checked name="customer_gender" checked> Nữ</span>
                                                <span class="custom-radio"><input type="radio" value="1" name="customer_gender">Nam</span>
                                            @else
                                                <span class="custom-radio"><input type="radio" value="0" name="customer_gender"> Nữ</span>
                                                <span class="custom-radio"><input type="radio" value="1" checked name="customer_gender" checked> Nam</span>
                                            @endif
                                            </div> <br>
                                            <label>Họ</label>
                                            <input type="text" value="{{ $customer->khachhang_ho}}" name="customer_first_name">
                                            <label>Tên</label>
                                            <input type="text" value="{{ $customer->khachhang_ten }}" name="customer_last_name">
                                            <label>Email</label>
                                            <input type="text" value="{{ $customer->khachhang_email }}" readonly>
                                            <label>Số điện thoại</label>
                                            <input type="text" value="{{ $customer->khachhang_so_dien_thoai }}" name="customer_phone_number">
                                            <label>Ảnh</label>
                                            <input type="file" class="upload" name="customer_img" value="{{ $customer->khachhang_anh }}"multiple="" id="files">
                                            <img width="100px" height="100px" id="image" src="{{asset('/uploads/client/customer/'.$customer->khachhang_anh)}}"/>
                                            {{--  <span class="example">
                                              (E.g.: 05/31/1970)
                                            </span>  --}}
                                            <br>
                                            <span class="custom_checkbox">
                                                <label><br><em> </em></label>
                                            </span>
                                            <div class="save_button primary_btn default_button">
                                                <button class="btn btn-success">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade show active" id="orders">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                {{-- <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==0 || $order->dondathang_trang_thai==1)
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> --}}
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                  $huy = $huy+ 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                    </ul>

                                </div>
                                
                            </div>
                        </div>
                      
                        <div class="tab-pane fade" id="chos">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td style="background-color: #e1f7f0"><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                  $huy = $huy+ 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                        
                                    </ul>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                @if($order->dondathang_trang_thai==0)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==0)
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                                
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> 
                            </div>

                        </div>
                        <div class="tab-pane fade" id="xacnhan">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td style="background-color: #e1f7f0"><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                  $huy = $huy+ 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                        
                                    </ul>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                @if($order->dondathang_trang_thai==1)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==1 && $order->dondathang_tinh_trang_thanh_toan!=4 )
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                                
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> 
                            </div>

                        </div>

                        <div class="tab-pane fade" id="vanchuyen">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td style="background-color: #e1f7f0"><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                  $huy = $huy+ 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                        
                                    </ul>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                @if($order->dondathang_trang_thai==2)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==0 || $order->dondathang_trang_thai==1)
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                                
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> 
                            </div>

                        </div>

                        <div class="tab-pane fade" id="dagiao">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td ><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td ><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td style="background-color: #e1f7f0"><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                $huy = $huy + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                    </ul>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                @if($order->dondathang_trang_thai==3)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==0 || $order->dondathang_trang_thai==1)
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                                
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> 
                            </div>

                        </div>

                        <div class="tab-pane fade" id="huy">
                            <h3>Đơn Hàng</h3>
                            <div class="coron_table table-responsive">
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                        <table class="table">
                                            <tr>
                                                <td><a href="#chos" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/Untitled.png')}}" style="width:50px" alt=""><br>Chờ xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $chuaxacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==0){
                                                                $chuaxacnhan = $chuaxacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $chuaxacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#xacnhan" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/pay-ovo-image1.png')}}" style="width:50px" alt=""><br>Đã xác nhận
                                                    <p class="cart-total-full">
                                                        @php
                                                        $xacnhan = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==1){
                                                                $xacnhan = $xacnhan + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $xacnhan }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#vanchuyen" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/icon-giao-hang.png')}}" style="width:50px" alt=""><br>Đang vận chuyển
                                                    <p class="cart-total-full">
                                                        @php
                                                        $vanchuyen = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==2){
                                                                $vanchuyen = $vanchuyen + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $vanchuyen }}
                                                    </p>
                                                </a></td>
                                                <td><a href="#dagiao" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/download.jpg')}}" style="width:50px" alt="">
                                                    <br>Đã giao
                                                    <p class="cart-total-full">
                                                        @php
                                                        $dagiao = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==3){
                                                                $dagiao = $dagiao + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $dagiao }}
                                                    </p>
                                                </a>
                                                    
                                                </td>
                                                <td style="background-color: #e1f7f0"><a href="#huy" data-toggle="tab" class="nav-link"><img src="{{asset('/frontend/img/logo/images.jpg')}}" style="width:50px" alt=""><br>Đã hủy
                                                    <p class="cart-total-full">
                                                        @php
                                                        $huy = 0;
                                                        foreach ($customer_all_order as $key=>$order){
                                                            if($order->dondathang_trang_thai==4){
                                                                $huy = $huy + 1;
                                                            }
                                                            
                                                        }
                                                    @endphp
                                                    {{ $huy }}
                                                    </p>
                                                </a></td>
                                               
                                            </tr>
                                        </table>
                                        
                                        
                                    </ul>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Ngày Đặt Hàng</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi Tiết</th>
                                            <th>Hủy Đơn Hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customer_all_order !=null || $customer_all_order_email!=null)
                                            @foreach ($customer_all_order as $key=>$order)
                                                @if($order->dondathang_trang_thai==4)
                                                <tr>
                                                    <td>{{ $order->dondathang_ma_don_dat_hang }}</td>
                                                    <td>{{ $order->dondathang_ngay_dat_hang }}</td>
                                                    <td>
                                                        <span class="success">
                                                            @if($order->dondathang_trang_thai==0)
                                                           Chưa xác nhận
                                                            @elseif($order->dondathang_trang_thai==1)
                                                            Đã xác nhận
                                                            @elseif($order->dondathang_trang_thai==2)
                                                            Đang vận chuyển
                                                            @elseif($order->dondathang_trang_thai==3)
                                                           Đã giao hàng
                                                            @else
                                                           Đơn hàng đã bị hủy
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{number_format($order->dondathang_tong_tien  ,0,',','.').' VNĐ' }}</td>
                                                    <td><a href="{{URL::to('/customer-show-order/'.$order->id)}}" class="view">Chi Tiết</a></td>
                                                    @if($order->dondathang_trang_thai==0 || $order->dondathang_trang_thai==1)
                                                        <td>
                                                            <a href="{{URL::to('/customer-cancel-order/'.$order->id)}}" class="view" onclick="return confirm('Hủy Đơn Hàng?')">Hủy</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endif
                                                
                                            @endforeach
                                        @else
                                       Chưa có đơn hàng nào!
                                        @endif
                                    </tbody>
                                </table> 
                            </div>

                        </div>
                        <div class="tab-pane fade" id="coupon-code">
                            <h3>Mã Giảm Giá</h3>
                            <div class="coron_table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nội Dung</th>
                                            <th>Mã Giảm Giá</th>
                                            <th>Giá Trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($all_coupon_code!=null)
                                            @foreach ($all_coupon_code as $key=>$coupon)
                                                <tr>
                                                    <td>{{ $coupon->makhuyenmai_ten_ma }}</td>
                                                    <td>{{ $coupon->makhuyenmai_ma }}</td>
                                                    <td>
                                                        @if($coupon->makhuyenmai_loai_ma==1)
                                                        {{number_format($coupon->makhuyenmai_gia_tri,0,',','.' )." VND" }}
                                                        @else
                                                        {{number_format($coupon->makhuyenmai_gia_tri,0,',','' )." %" }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" >
                                                <h4 style="text-align: center" class="alert alert-danger">Không Có Mã Giảm Giá!</h4>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-password">
                            <h3>Đổi Mật Khẩu</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="{{URL::to('/customer-change-password-save/'.$customer->khachhang_email)}}" method="POST">
                                            @csrf
                                            <label>Mật Khẩu</label>
                                            <input type="password" name="change_old_password">
                                            <label>Mật Khẩu Mới</label>
                                            <input type="password" name="change_new_password">
                                            <label>Xác Nhận Mật Khẩu Mới</label>
                                            <input type="password" name="change_confirm_new_password">
                                            <br>
                                            <span class="custom_checkbox">
                                                <label><br><em> </em></label>
                                            </span>
                                            <div class="primary_btn">
                                                <button type="submit" class="btn btn-success">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Maincontent  -->

@endsection
