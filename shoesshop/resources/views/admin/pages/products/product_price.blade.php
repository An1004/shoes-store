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
                        <div class="page-title-right">
                            <div class="text-lg-right mt-3 mt-lg-0">
                                <a href="{{URL::to('/product')}}" class="btn btn-success waves-effect waves-light"><i class="ti-arrow-left mr-1"></i>Quay Lại</a>
                            </div>
                        </div>
                        <ol class="breadcrumb page-title">
                            <li class="breadcrumb-item"><a href="index.php">SHOES</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                            <li class="breadcrumb-item active">Cập nhật giá theo Size</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- content -->
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
                    <div class="col-lg-4 col-xl-4">
                        <div class="card-box text-center">
                            {{-- <img src="{{asset('/uploads/admin/staff/'.$staff->admin_anh)}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"> --}}
                           
                                            <a href="javascript: void(0);">
                                                <img src="{{asset('/uploads/admin/product/'.$product->sanpham_anh)}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                            </a>
                                           
                            <h4 class="mb-0">{{$product->sanpham_ten}}</h4>
                            <p class="text-muted"></p>
                            {{--  <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>  --}}
                            <div class="text-left mt-3">
                                <h4 class="font-13 text-uppercase">Thông Tin Sản Phẩm :</h4>
                                <p class="text-muted mb-2 font-13"><strong>Mã SP :</strong> {{ $product->sanpham_ma_san_pham }} </p>
                                <p class="text-muted mb-2 font-13"><strong>Màu sắc :</strong> {{ $product->sanpham_mau_sac }}</p>
                                <p class="text-muted mb-2 font-13"><strong>Chất liệu :</strong> {{ $product->sanpham_chat_lieu }}</p>
                                <p class="text-muted mb-2 font-13"><strong>Giới tính  :</strong>  
                                   
                                      
                                    @if($product->sanpham_nguoi_su_dung==0)
                                    Nam
                                   
                                    @elseif ($product->sanpham_nguoi_su_dung==1)
                                    Nữ
                                    @elseif ($product->sanpham_nguoi_su_dung==2)
                                    Unisex
                                    @elseif ($product->sanpham_nguoi_su_dung==3)
                                    Trẻ Em
                                    @endif
                               
                            </p>
                                <p class="text-muted mb-2 font-13"><strong>Nơi sản xuất :</strong> {{ $product->sanpham_noi_san_xuat }}</p>
                                <p class="text-muted mb-1 font-13"><strong>Bảo hành :</strong> {{ $product->sanpham_bao_hanh }}</p>
                                <p class="text-muted mb-1 font-13"><strong>Phụ kiện kèm theo :</strong> {{ $product->sanpham_phu_kien }}</p>
                               
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col-->
                    <div class="col-lg-8 col-xl-8">
                        <div class="card-box">
                            <h4 class="header-title">Giá bán theo Size sản phẩm</h4>
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ URL::to('/product-size-price-save/'.$product->id) }}" class="form-horizontal" enctype="multipart/form-data" role="form"  method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Size</label>
                                                    <select name="get_size" required="" class="form-control">
                                                        @foreach ($get_size as $key => $size)
                                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('size')
                                                    <p class="alert alert-danger"> {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Giá Bán</label>
                                                   
                                                    <input type="text" name="price" required="" class="form-control" placeholder="Giá bán theo size sản phẩm">
                                                    @error('price')
                                                    <p class="alert alert-danger"> {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Trạng Thái</label>
                                                <div class="col-sm-10">
                                                    <label class="col-form-label">Trạng Thái</label>
                                                    <select name="size_status" class="form-control">
                                                        <option value="1">Hiển Thị</option>
                                                        <option value="0">Ẩn</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="text-lg-right mt-3 mt-lg-0">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-3"><i class="mdi mdi-content-save mr-1"></i>Lưu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h4 class="header-title">Giá sản phẩm</h4>
                            <hr>
                        <form action="{{URL::to('/product-price-save/'.$product->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                           
                            <div class="tab-content">
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" cellspacing="0" id="tickets-table">
                                <tr>
                                    <th class="font-weight-medium" style="text-align: center;">Size</th>
                                    <th class="font-weight-medium" style="text-align: center">Giá bán</th>
                                </tr> 
                                @foreach ($price as $key => $val)
                                <tr>
                                      <form action="{{URL::to('/product-price-save/'.$product->id)}}" class="form-horizontal"  enctype="multipart/form-data">
                                    <td style="text-align: center" > 
                                        <input type="hidden" readonly class="form-control" name="size_id" value="{{$val->size_id}}" required="">
                                        <input type="text" readonly class="form-control" name="size" value="{{$val->size}}" required="">
                                        
                                    </td>
                                    <td style="text-align: center" ><input type="text"  class="form-control" name="price" value="{{$val->gia_ban}}" required=""></td>
                                    <td> 
                                       <button type="submit" class="btn btn-success waves-effect waves-light "> Lưu</button>
                                       
                                  </td>
                                  <td>
                                    <a class="dropdown-item" href="{{URL::to('/price-size-delete/'.$val->id)}}" onclick="return confirm('Xóa size?')"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Xóa</a>
                                  </td>
                                       </form>
                                </tr>
                                @endforeach
                                </table>

                                <!-- end settings content-->
                            </div> <!-- end tab-content -->
                          
                   
                        </div>
                       
                        
                            
                       <!-- end card-box-->
                    </div> <!-- end col -->
                </div>
                <!-- end row-->
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


