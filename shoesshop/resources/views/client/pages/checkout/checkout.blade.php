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
                    <li>Thanh Toán</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
           <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
            @endif

            <!-- PayPal -->
            @if(\Session::has('error'))
                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                {{ \Session::forget('error') }}
            @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">{{ \Session::get('success') }}</div>
                {{ \Session::forget('success') }}
            @endif
            <!-- PayPal -->
            
                <!-- <div class="user-actions mb-20">
                    <h3>
                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Tính Phí Vận Chuyến</a>
                    </h3>
                     <div id="checkout_login" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                            <p>Tính phí vận chuyển</p>
                            <form action="{{ URL::to('/check-transport-feeship')}}" method="POST">
                                @csrf
                                <div class="col-12 mb-30">
                                    <label for="country">Tỉnh, Thành Phố <span>*</span></label>
                                    <select name="city" id="city" required="" class="choose city form-control ">
                                        <option>---Tỉnh, Thành Phố---</option>
                                        @foreach ($city as $key=>$cty)
                                            <option value="{{$cty->id}}">{{ $cty->tinhthanhpho_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-30">
                                    <label for="country">Quận Huyện <span>*</span></label>
                                    <select name="province" required="" id="province" class="choose province form-control">
                                        <option>---Chọn Quận Huyện---</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-30">
                                    <label for="country">Xã, Phường <span>*</span></label>
                                    <select name="wards" required="" id="wards" class="wards form-control">
                                        <option >---Chọn Xã Phường Thị Trấn---</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-30">
                                    <div class="order_button">
                                        <button type="submit">Tính Phí Vận Chuyển</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="user-actions mb-20">
                    <h3>
                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Sử Dụng Mã Giảm Giá</a>
                    </h3>
                     <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                            @if(Session::get('cart'))
                                <form action="{{ URL::to('/check-coupon')}}" method="POST">
                                    @csrf
                                    <div class="coupon_inner">
                                        <input placeholder="Mã Giảm Giá" required="" name="cart_coupon" type="text">
                                        <input type="submit" class="check-coupon" name="check_coupon" value="Sử Dụng Mã">
                                    </div>
                                </form>
                            @else
                                <h4 style="text-align: center">Chưa có sản phẩm nào trong giỏ hàng!</h4>
                            @endif
                            {{-- <form action="#">
                                <input placeholder="Coupon code" type="text">
                                 <input value="Apply coupon" type="submit">
                            </form> --}}
                        </div>
                    </div>
                </div>
           </div>
        </div>
    <div class="checkout_form">
            <div class="row">
            <div class="col-lg-6 col-md-7 checkout_cart">
                        <form action="#">
                            <h3>Giỏ Hàng</h3>
                            <div class="order_table table-responsive mb-30" id="abc">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::get('cart')==true)
                                            @php
                                            $subtotal=0;
                                            @endphp
                                            @foreach (Session::get('cart') as $key =>$product)
                                                @php
                                                    $subtotal+=$product['product_price']*$product['product_quantity'];
                                                @endphp
                                                <tr>
                                                    <td> {{ $product['product_name'] }} <strong> × {{ $product['product_quantity'] }}</strong></td>
                                                    <td>{{number_format( $product['product_price'] * $product['product_quantity'] ,0,',','.').' VNĐ' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng</th>
                                            <td>
                                                @if(Session::get('cart')==true)
                                                    {{number_format($subtotal,0,',','.').' VNĐ' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Phí vận chuyển</th>
                                            <td>
                                                <strong >
                                                    {{-- @if(Session::get('feeship'))
                                                        @foreach (Session::get('feeship') as $k=>$fee)
                                                            @php
                                                                $fee_ship=$fee['fee'];
                                                               
                                                            @endphp
                                                            {{number_format($fee_ship,0,',','.').' VNĐ' }}
                                                        @endforeach
                                                        
                                                    @else
                                                    {{number_format(35000,0,',','.').' VNĐ' }}
                                                    @endif --}}
                                                    @if((Session::get('fee_ship')))
                                                        @php
                                                            $fee_ship=Session::get('fee_ship');
                                                        @endphp
                                                    {{number_format($fee_ship,0,',','.').' VNĐ' }}
                                                    @else
                                                    {{number_format($fee_ship,0,',','.').' VNĐ' }}
                                                    @endif
                                                    
                                                    
                                                </strong>
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mã khuyến mãi</th>
                                            <td>
                                                <strong >
                                                    @if(Session::get('coupon'))
                                                        @foreach (Session::get('coupon') as $key=>$cou)
                                                            @if($cou['coupon_type']==0)
                                                                @php
                                                                    $total_coupon =(($subtotal*$cou['coupon_number'])/100);
                                                                @endphp

                                                            @else
                                                                @php
                                                                    $total_coupon =$cou['coupon_number'];
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                       - {{number_format($total_coupon,0,',','.').' VNĐ' }}
                                                    @else
                                                       - {{number_format(0,0,',','.').' VNĐ' }}
                                                    @endif
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Tổng cộng</th>
                                            <td><strong >
                                            {{-- @if(Session::get('cart'))
                                                @if(Session::get('coupon'))
                                                   @if(Session::get('feeship'))
                                                        {{number_format($subtotal+$fee_ship-$total_coupon,0,',','.').' VNĐ' }}
                                                   @else
                                                    {{number_format($subtotal-$total_coupon,0,',','.').' VNĐ' }}
                                                   @endif
                                                @else
                                                    @if(Session::get('feeship'))
                                                            {{number_format($subtotal+$fee_ship,0,',','.').' VNĐ' }}
                                                    @else
                                                        {{number_format($subtotal+35000,0,',','.').' VNĐ' }}
                                                    @endif
                                                @endif
                                            @else
                                            {{number_format(0,0,',','.').' VNĐ' }}
                                            @endif --}}
                                           
                                            @if(Session::get('cart'))
                                                @if(Session::get('coupon'))
                                                     
                                                        {{number_format($subtotal+$fee_ship-$total_coupon,0,',','.').' VNĐ' }}
                                                    
                                                @else
                                               
                                                        {{number_format($subtotal+$fee_ship,0,',','.').' VNĐ' }}
                                                  
                                                @endif
                                            @else
                                            {{number_format(0,0,',','.').' VNĐ' }}
                                            @endif
                                            </strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method" style="text-align: center">
                                 <div class="order_button">
                                     <a type="button" class="btn btn-warning mr-3" href="{{ URL::to('/cart')}}">Quay Lại</a>
                                     <a type="button" class="btn btn-success mr-3" href="{{ URL::to('/shop-now')}}" >Tiếp Tục Mua Hàng</a>
                                     <a type="button" class="btn btn-danger mr-3" href="{{ URL::to('/delete-coupon-cart')}}" >Xóa Mã Khuyến Mãi</a>
                                     
                                     <!-- <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay $5</a> -->
                                     {{-- <a type="button" class="btn btn-danger mt-3" href="{{ URL::to('/delete-transport-fee-cart')}}" >Xóa Phí Vận Chuyển</a> --}}
                                 </div>
                             </div>
                        </form>
                   
            </div>
            <div class="col-lg-6 col-md-5">
                    <h3 style="background-color: #A1C298;">Chi tiết giao hàng</h3>
                    <div id="changeurl">
                    <form action="{{ URL::to('/order-checkout-save')}}" method="POST">
                    </div>
                        @csrf
                            <div class="col-lg-12 mb-30">
                                <label>Tên Người Nhận <span>*</span></label>
                                <input name="order_checkout_name" value="{{ $customer->khachhang_ho }} {{ $customer->khachhang_ten }}" required="" type="text">
                                @error('order_checkout_name')
                                <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-30">
                                <label> Email   <span>*</span></label>
                                  <input name="order_checkout_email" value="{{ $customer->khachhang_email }}" required="" type="text">
                                  @error('order_checkout_email')
                                  <p class="alert alert-danger"> {{ $message }}</p>
                                  @enderror
                            </div>
                            <div class="col-lg-12 mb-30">
                                <label>Số Điện Thoại<span>*</span></label>
                                <input name="order_checkout_phone_number" value="{{ $customer->khachhang_so_dien_thoai }}" required="" type="number">
                                @error('order_checkout_phone_number')
                                <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 mb-30">
                                <label>Địa Chỉ</label>
                                {{-- <select name="order_checkout_address" style="background-color: white" onchange="changeFeeship(this.options[this.selectedIndex].value)"> --}}
                                     @if(Session::get('add'))
                                     <select name="order_checkout_address"  style="background-color: white" onchange="changeFeeship(this.options[this.selectedIndex].value)">
                                        <option value="{{Session::get('add')}}">{{Session::get('add')}}</option>
                                        @foreach ($address as $key => $add)
                                        <option value="{{ $add->diachi_ten}}">{{ $add->diachi_ten}}</option>
                                    @endforeach
                                </select>
                                     @else 
                                      <select name="order_checkout_address" style="background-color: white" onchange="changeFeeship(this.options[this.selectedIndex].value)">
                                        @foreach ($address as $key => $add)
                                        <option value="{{ $add->diachi_ten}}">{{ $add->diachi_ten}}</option>
                                    @endforeach
                                </select>
                                     @endif
                                    
                                   
                                <div style="text-align: right">
                                    <a href="{{URL::to('/customer-address/'.$customer->id)}}"><img src="{{asset('/frontend/img/logo/add.png')}}" style="width:15px" alt=""><span style="color: rgb(4, 155, 29)"> Thêm địa chỉ mới</span></a>
                                </div>
                                @error('order_checkout_address')
                                <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror
                               {{-- <a href="{{URL::to('/customer-address/'.$customer->id)}}"><input name="order_checkout_address" readonly class="form-control" required="" value="{{ $address->diachi_ten}}" type="text"></a>
                                @error('order_checkout_address')
                                <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror --}}
                            </div>
                            <!-- <div class="col-12 mb-30">
                                <label for="country">Tỉnh Thành Phố <span>*</span></label>
                                <select name="order_city" id="order_city" required="" class="choose-address order_city form-control">
                                    <option value="-1">---Chọn Tỉnh Thành Phố ---</option>
                                    {{-- @foreach ($city as $key=>$cty) --}}
                                        {{-- <option value="{{$cty->id}}">{{ $cty->tinhthanhpho_name }}</option> --}}
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="col-12 mb-30">
                                <label for="country">Quận Huyện <span>*</span></label>
                                <select name="order_province" required="" id="order_province" class="choose-address select-province form-control">
                                    <option value="-1">---Chọn Quận Huyện---</option>
                                </select>
                            </div>
                            <div class="col-12 mb-30">
                                <label for="country">Xã Phường <span>*</span></label>
                                <select name="order_wards" required="" id="order_wards" class="select-wards form-control">
                                    <option value="-1">---Chọn Xã Phường Thị Trấn---</option>
                                </select>
                            </div> -->
                            <div class="col-lg-12 mb-30">
                                <div class="order-notes">
                                    <label for="order_note">Ghi Chú Đơn Hàng</label>
                                   <textarea id="order_note" name="order_checkout_note" placeholder="Ghi Chú"></textarea>
                                   @error('order_checkout_note')
                                   <p class="alert alert-danger"> {{ $message }}</p>
                                   @enderror
                               </div>
                            </div>
                            <div class="col-lg-12 mb-30">
                               @if(!Session::get('success_paypal')==true)
                               <div class="payment_method">
                                    <div class="panel-default">
                                         <input id="payment" value="0" checked name="order_checkout_pay_method" type="radio">
                                         <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh Toán Khi Nhận Hàng</label>
                                     </div>
                                    <div class="panel-default">
                                         
                                            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">
                                                <input id="payment_defult" value="1" name="order_checkout_pay_method" type="radio" >
                                                <img src="{{asset('/frontend/img/logo/download.png')}}" style="width:60px" alt="">
                                            </label>
                                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                             <div class="card-body1 changefeeship" style="color: brown">
                                             
                                                @if(Session::get('cart'))
                                                    @php
                                                    $vnd = 0
                                                    @endphp
                                                        @if(Session::get('coupon'))
                                                        
                                                                @php
                                                                $vnd = round((($subtotal+$fee_ship-$total_coupon)/23417),2);
                                                                \Session::put('total_paypal',$vnd);
                                                                @endphp
                                        
                                                        @else
                                                                    @php
                                                                    $vnd = round((($subtotal+$fee_ship)/23417),2);
                                                                    \Session::put('total_paypal',$vnd);
                                                                    @endphp
                                                            
                                                        @endif
                                    
                                                @else
                                                        @php
                                                                    $vnd = 0;
                                                                    \Session::put('total_paypal',$vnd);
                                                        @endphp
                                                @endif
                                                <a type="button" class="btn btn-warning mr-3" href="{{ route('processTransaction') }}" >Thanh toán {{Session::get('total_paypal')}}$ qua PayPal</a>
                                                <input type="hidden" id="vnd_to_usd" value="{{$vnd}}">
                                             </div>
                                               
                                                <!-- <div id="paypal-button"></div> -->
                                                
                                                                   
                                                
                                                </div>
                                            </div>
                                        
                                     </div>
                                 </div>
                            
                               @else
                               <div class="panel-default">
                                         <input id="payment" value="4" checked name="order_checkout_pay_method" type="radio">
                                         <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Đã thanh toán <img src="{{asset('/frontend/img/logo/download.png')}}" style="width:60px" alt=""></label>
                                </div>

                               @endif
                            </div>
                            {{-- <div class="col-12 mb-30">
                                <label for="account" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">
                                    <input id="account" name="order_checkout_create_account" value="1" type="checkbox" data-target="createp_account">
                                    Tạo Tài Khoản?
                                </label>
                                <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                       <label>Tên Tài Khoản<span>*</span></label>
                                        <input placeholder="Tên" name="checkout_order_user_name" type="text">
                                    </div>
                                    <br>
                                    <div class="card-body1">
                                        <label> Mật Khẩu<span>*</span></label>
                                         <input placeholder="Mật Khẩu" name="checkout_order_password" type="password">
                                     </div>
                                </div>
                            </div> --}}
                            <div class="col-12 mb-30 deletebuttonorder">
                                <div class="order_button" style="text-align: right" >
                                    <button  type="submit">Xác Nhận Đơn Hàng</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
    </div>
    <!--Checkout page section end-->
@endsection
