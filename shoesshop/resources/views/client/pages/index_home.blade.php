@extends('client.index_layout')
@section('content')
<div class="pos_home_section">
    
    <div class="row">
       <!--banner slider start-->
       @include('client.blocks.slideshow')
         <!--banner slider end -->
    </div>
     <!--new product area start-->
     {{-- <div class="new_product_area product_two ml-3">
        <form class="form-inline" action="{{URL::to('/search-product-filter-customer')}}" method="GET">
            <table class="col-md-12">
               <tr>
                <td>
                   
                        <select name="search_customer_brand" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Thương Hiệu---</option>
                            @foreach ($product_brand as $key => $brand)
                                @if(isset($search_filter_customer))
                                    @foreach ($search_filter_customer as $key=>$brd)
                                        @if($brand->id==$brd['search_customer_brand'])
                                            <option selected value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                                        @else
                                        <option value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                                        @endif
                                    @endforeach
                                @else
                                <option value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                                @endif
                            @endforeach
                        </select>
               
                </td>
                <td>
                 
                        <select name="search_customer_product_type" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Loại Sản Phẩm---</option>
                            @foreach ($product_type as $key => $pro_type)
                                @if(isset($search_filter_customer))
                                    @foreach ($search_filter_customer as $key=>$type_pro)
                                        @if($pro_type->id==$type_pro['search_customer_product_type'])
                                            <option selected value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                                        @else
                                            <option value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                                        @endif
                                    @endforeach
                                @else
                                <option value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                                @endif
                            @endforeach
                        </select>
                    
                </td>
                <td>
                    
                        <select name="search_customer_collection" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Dòng Sản Phẩm---</option>
                            @foreach ($product_collection as $key => $collection)
                                @if(isset($search_filter_customer))
                                    @foreach ($search_filter_customer as $key=>$collec)
                                        @if($collection->id==$collec['search_customer_collection'])
                                            <option selected value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                                        @else
                                            <option value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                                        @endif
                                    @endforeach
                                @else
                                <option value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                                @endif
                            @endforeach
                        </select>
                    
                </td>
                
                <td>
                    
                        <select name="search_customer_gender" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Giới Tính---</option>
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$gender)
                                    @if($gender['search_customer_gender']==1)
                                        <option selected value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Unisex</option>
                                        <option value="4">Trẻ Em</option>
                                    @elseif($gender['search_customer_gender']==2)
                                        <option value="1">Nam</option>
                                        <option selected value="2">Nữ</option>
                                        <option value="3">Unisex</option>
                                        <option value="4">Trẻ Em</option>
                                    @elseif($gender['search_customer_gender']==3)
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option selected value="3">Unisex</option>
                                        <option value="4">Trẻ Em</option>
                                    @elseif($gender['search_customer_gender']==4)
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Unisex</option>
                                        <option selected value="4">Trẻ Em</option>
                                    @else
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Unisex</option>
                                        <option value="4">Trẻ Em</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Unisex</option>
                                <option value="4">Trẻ Em</option>
                            @endif
                        </select>
                    
                </td>
                <td>
                   
                        <select name="search_customer_size" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Size---</option>
                            @foreach ($all_size as $key => $size)
                                @if(isset($search_filter_customer))
                                    @foreach ($search_filter_customer as $key=>$si)
                                        @if($size->id==$si['search_customer_size'])
                                            <option selected value="{{ $size->id }}">{{ $size->size}}</option>
                                        @else
                                            <option value="{{ $size->id }}">{{ $size->size}}</option>
                                        @endif
                                    @endforeach
                                @else
                                <option value="{{ $size->id }}">{{ $size->size}}</option>
                                @endif
                            @endforeach
                        </select>
                    
                </td>
                <td>
                    
                        <select name="search_customer_price" class="custom-select" id="status-select" style="width:150px">
                            <option value="" selected="">---Giá---</option>
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$price)
                                    @if($price['search_customer_price']==1)
                                        <option selected value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @elseif($price['search_customer_price']==2)
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option selected value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @elseif($price['search_customer_price']==3)
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option selected value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @elseif($price['search_customer_price']==4)
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option selected value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @elseif($price['search_customer_price']==5)
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option selected value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @elseif($price['search_customer_price']==6)
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option selected value="6">Tất Cả</option>
                                    @else
                                        <option value="1">< 500.000 VNĐ</option>
                                        <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                        <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                        <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                        <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                        <option value="6">Tất Cả</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="1">< 500.000 VNĐ</option>
                                <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                <option value="6">Tất Cả</option>
                            @endif
                        </select>
                   
                </td>
               </tr>
               <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right">
                      
                        <button type="submit" class="btn btn-danger waves-effect waves-light mt-3 mr-3"><i class="mdi mdi-search-web mr-1"></i>Tìm</button>
                        <a href="{{URL::to('/shop-now')}}" class="btn btn-success waves-effect waves-light mt-3"><i class="mdi mdi-search-web mr-1"></i>Tất Cả</a>
                </td>
               </tr>
              
            </table>
            
           
        </form>
    </div> --}}
    <div class="new_product_area product_two">
        <div style="text-align: right" id='viewAll'><a href="{{URL::to('/shop-now')}}">Xem tất cả sản phẩm &#62;&#62;</a></div>
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                <h3>Sản phẩm mới</h3>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @if($all_product)
                @foreach ($all_product as $key => $product)
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                           <a href="{{URL::to('/product-detail/'.$product->id)}}"><img id="wishlist_viewed_product_image{{ $product->id }}" src="{{asset('/uploads/admin/product/'.$product->sanpham_anh)}}" alt=""></a>
                           <div class="img_icone">
                               <img src="{{asset('/frontend/img/cart/span-new.png')}}" alt="">
                           </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">
                                {{number_format( $product->sanpham_gia_ban,0,',','.').' VNĐ' }}
                            </span>
                            <h3 class="product_title"><a href="{{URL::to('/product-detail/'.$product->id)}}">{{ $product->sanpham_ten }}</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <input type="hidden" value="{{ $product->sanpham_ten }}" id="wishlist_viewed_product_name{{ $product->id }}">
                                <input type="hidden" value="{{number_format($product->sanpham_gia_ban,0,',','.').' VNĐ' }}" id="wishlist_viewed_product_price{{ $product->id }}">
                                @if(Session::get('customer_id')==true)
                                <li><a type="button" onclick="add_wistlist(this.id);" id="{{ $product->id }}" title=" Add to Wishlist ">Thêm Yêu Thích</a></li>
                                @endif
                                <li><a class="views-product-detail" data-views_product_id="{{$product->id}}" id="wishlist_viewed_product_url{{ $product->id }}"href="{{URL::to('/product-detail/'.$product->id)}}"title="Quick view">Chi Tiết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <br>
    <!--new product area start-->
    <!--featured product area start-->
    <div class="new_product_area product_two">
        {{-- <div class="col-md-12 mb-35">
            <form class="form-inline" action="{{URL::to('/search-product-filter-customer')}}" method="GET">
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_brand" class="custom-select" id="status-select">
                        <option value="" selected="">---Thương Hiệu---</option>
                        @foreach ($product_brand as $key => $brand)
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$brd)
                                    @if($brand->id==$brd['search_customer_brand'])
                                        <option selected value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                                    @else
                                    <option value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                                    @endif
                                @endforeach
                            @else
                            <option value="{{ $brand->id }}">{{ $brand->thuonghieu_ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_product_type" class="custom-select" id="status-select">
                        <option value="" selected="">---Loại Sản Phẩm---</option>
                        @foreach ($product_type as $key => $pro_type)
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$type_pro)
                                    @if($pro_type->id==$type_pro['search_customer_product_type'])
                                        <option selected value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                                    @else
                                        <option value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                                    @endif
                                @endforeach
                            @else
                            <option value="{{ $pro_type->id }}">{{ $pro_type->loaisanpham_ten}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_collection" class="custom-select" id="status-select">
                        <option value="" selected="">---Dòng Sản Phẩm---</option>
                        @foreach ($product_collection as $key => $collection)
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$collec)
                                    @if($collection->id==$collec['search_customer_collection'])
                                        <option selected value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                                    @endif
                                @endforeach
                            @else
                            <option value="{{ $collection->id }}">{{ $collection->dongsanpham_ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_price" class="custom-select" id="status-select">
                        <option value="" selected="">---Giá---</option>
                        @if(isset($search_filter_customer))
                            @foreach ($search_filter_customer as $key=>$price)
                                @if($price['search_customer_price']==1)
                                    <option selected value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @elseif($price['search_customer_price']==2)
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option selected value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @elseif($price['search_customer_price']==3)
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option selected value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @elseif($price['search_customer_price']==4)
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option selected value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @elseif($price['search_customer_price']==5)
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option selected value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @elseif($price['search_customer_price']==6)
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option selected value="6">Tất Cả</option>
                                @else
                                    <option value="1">< 500.000 VNĐ</option>
                                    <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                                    <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                                    <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                                    <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="6">Tất Cả</option>
                                @endif
                            @endforeach
                        @else
                            <option value="1">< 500.000 VNĐ</option>
                            <option value="2">500.000 VNĐ - 1.000.000 VNĐ</option>
                            <option value="3">1.000.000 VNĐ - 2.000.000 VNĐ</option>
                            <option value="4">2.000.000 VNĐ - 5.000.000 VNĐ</option>
                            <option value="5">5.000.000 VNĐ - 10.000.000 VNĐ</option>
                            <option value="6">Tất Cả</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_gender" class="custom-select" id="status-select">
                        <option value="" selected="">---Giới Tính---</option>
                        @if(isset($search_filter_customer))
                            @foreach ($search_filter_customer as $key=>$gender)
                                @if($gender['search_customer_gender']==1)
                                    <option selected value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Unisex</option>
                                    <option value="4">Trẻ Em</option>
                                @elseif($gender['search_customer_gender']==2)
                                    <option value="1">Nam</option>
                                    <option selected value="2">Nữ</option>
                                    <option value="3">Unisex</option>
                                    <option value="4">Trẻ Em</option>
                                @elseif($gender['search_customer_gender']==3)
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option selected value="3">Unisex</option>
                                    <option value="4">Trẻ Em</option>
                                @elseif($gender['search_customer_gender']==4)
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Unisex</option>
                                    <option selected value="4">Trẻ Em</option>
                                @else
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Unisex</option>
                                    <option value="4">Trẻ Em</option>
                                @endif
                            @endforeach
                        @else
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Unisex</option>
                            <option value="4">Trẻ Em</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-lg-3 mt-3">
                    <select name="search_customer_size" class="custom-select" id="status-select">
                        <option value="" selected="">---Size---</option>
                        @foreach ($all_size as $key => $size)
                            @if(isset($search_filter_customer))
                                @foreach ($search_filter_customer as $key=>$si)
                                    @if($size->id==$si['search_customer_size'])
                                        <option selected value="{{ $size->id }}">{{ $size->size}}</option>
                                    @else
                                        <option value="{{ $size->id }}">{{ $size->size}}</option>
                                    @endif
                                @endforeach
                            @else
                            <option value="{{ $size->id }}">{{ $size->size}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <button type="submit" class="btn btn-danger waves-effect waves-light mt-3 mr-3"><i class="mdi mdi-search-web mr-1"></i>Tìm</button>
                    <a href="{{URL::to('/shop-now')}}" class="btn btn-success waves-effect waves-light mt-3"><i class="mdi mdi-search-web mr-1"></i>Tất Cả</a>
                </div>
            </form>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                <h3>Sản phẩm nổi bật</h3>
            </div>
    
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @if($all_product_featured)
                @foreach ($all_product_featured as $key => $product)
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                           <a href="{{URL::to('/product-detail/'.$product->id)}}"><img id="wishlist_viewed_product_image{{ $product->id }}" src="{{asset('/uploads/admin/product/'.$product->sanpham_anh)}}" alt=""></a>
                           <div class="hot_img">
                               <img src="{{asset('/frontend/img/cart/span-hot.png')}}" alt="">
                           </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">
                                {{number_format( $product->sanpham_gia_ban,0,',','.'  ).' VNĐ' }}
                            </span>
                            <h3 class="product_title"><a href="{{URL::to('/product-detail/'.$product->id)}}">{{ $product->sanpham_ten }}</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <input type="hidden" value="{{ $product->sanpham_ten }}" id="wishlist_viewed_product_name{{ $product->id }}">
                                <input type="hidden" value="{{number_format($product->sanpham_gia_ban,0,',','.').' VNĐ' }}" id="wishlist_viewed_product_price{{ $product->id }}">
                                @if(Session::get('customer_id')==true)
                                <li><a type="button" onclick="add_wistlist(this.id);" id="{{ $product->id }}" title=" Add to Wishlist ">Thêm Yêu Thích</a></li>
                                @endif
                                <li><a class="views-product-detail" data-views_product_id="{{$product->id}}" id="wishlist_viewed_product_url{{ $product->id }}"href="{{URL::to('/product-detail/'.$product->id)}}"title="Quick view">Chi Tiết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
  <br>
    <!--featured product area start-->
    <!--featured product area start-->
    <div class="new_product_area product_two">
        <div style="text-align: right" id='viewAll'><a href="{{URL::to('/blog')}}">Xem tất cả tin tức &#62;&#62;</a></div>
            
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                <h3>Tin Tức</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="single_p_active owl-carousel">
                @if($all_blog)
                @foreach ($all_blog as $key => $blog)
                <div class="col-lg-3">
                    <div class="single_blog">
                        <div class="blog_thumb">
                           <a href="{{URL::to('/blog-detail/'.$blog->id)}}"><img src="{{asset('/uploads/admin/productnews/'.$blog->baiviet_anh)}}" alt="" height="150px"></a>
                        </div>
                        <div class="blog_content">
                            <h3 class="blog_title"><a href="{{URL::to('/blog-detail/'.$blog->id)}}">{{ $blog->baiviet_tieu_de }}</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                {{-- <input type="hidden" value="{{ $product->sanpham_ten }}" id="wishlist_viewed_product_name{{ $blog->id }}">
                                <input type="hidden" value="{{number_format($product->sanpham_gia_ban,0,',','.').' VNĐ' }}" id="wishlist_viewed_product_price{{ $blog->id }}">
                                <li><a type="button" onclick="add_wistlist(this.id);" id="{{ $blog->id }}" title=" Add to Wishlist ">Thêm Yêu Thích</a></li> --}}
                                {{-- <li><a class="views-product-detail" id="wishlist_viewed_product_url{{ $blog->id }}"href="{{URL::to('/blog-detail/'.$blog->id)}}"title="Quick view">Chi Tiết</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <!--featured product area start-->
    <!-- blog area start-->
    <!-- <div class="blog_area blog_two">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="{{asset('/frontend/img/blog/blog1.jpg')}}" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    cua hang
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively pursue multidisciplinary human capital for interoperable.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--blog area end-->  
    <!--brand logo strat-->
    <br>
    <div class="brand_logo brand_two">
        <div class="block_title">
            <h3>Thương Hiệu</h3>
        </div>
        
        <div class="row">
            <div class="brand_active owl-carousel">
                @if($product_brand)
                @foreach ($product_brand as $key => $brand)
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="{{URL::to ('/product-brand/'.$brand->id)}}"><img src="{{asset('/uploads/admin/brand/'.$brand->thuonghieu_anh) }}" alt=""></a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!--brand logo end-->
</div>
@endsection
