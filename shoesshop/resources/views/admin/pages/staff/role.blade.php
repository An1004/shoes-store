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
                            {{-- <div class="text-lg-right mt-3 mt-lg-0">
                                <a href="{{URL::to('/staff-add')}}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i>Thêm Mới</a>
                            </div> --}}
                        </div>
                        <ol class="breadcrumb page-title">
                            <li class="breadcrumb-item"><a href="index.php">SHOES</a></li>
                            <li class="breadcrumb-item active">Vai trò</li>
                        </ol>
                    </div>

                </div>
            </div>

            <!-- content -->
            <div class="row">
                  
                <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" cellspacing="0" id="tickets-table">
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
                                <thead class="bg-light">
                                <tr>
                                    <th class="font-weight-medium">Tên vai trò</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Sản Phẩm</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Nhập Hàng</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Tin Tức</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Nhân viên</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Đơn Hàng</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Giao Hàng</th>
                                    <th class="font-weight-medium" align="center">Quản Lý Thống Kê</th>
                                    <th class="font-weight-medium" align="center">Thao tác</th>
                                   
                                </tr>
                                </thead>
                                <tbody class="font-14 change_role">
                                    @foreach ($role as $key=>$role_item)
                                    <tr class="role">
                                        <td>
                                            {{$role_item->loainguoidung_ten}}
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_sanpham==1)
                                                <input class="form-check-input product_role product_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input product_role product_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                            
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_nhaphang==1)
                                                <input class="form-check-input import_product_role import_product_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input import_product_role import_product_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                            
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_tintuc==1)
                                                <input class="form-check-input news_role news_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input news_role news_role_{{$role_item->loainguoidung_id}}" type="checkbox" data-id_role="{{ $role_item->loainguoidung_id}}" value="1" id="flexCheckChecked">
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_nhanvien==1)
                                                <input class="form-check-input staff_role staff_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input staff_role staff_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                           
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_donhang==1)
                                                <input class="form-check-input order_role order_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input order_role order_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}"  type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                          
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_giaohang==1)
                                                <input class="form-check-input shipping_role shipping_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input shipping_role shipping_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($role_item->quyen_thongke==1)
                                                <input class="form-check-input statistics_role statistics_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="0" id="flexCheckChecked" checked>
                                            @else
                                                <input class="form-check-input statistics_role statistics_role_{{$role_item->loainguoidung_id}}" data-id_role="{{ $role_item->loainguoidung_id}}" type="checkbox" value="1" id="flexCheckChecked">
                                            @endif
                                        </td>
                                        <td>
                                             <i class="fa fa-trash delete-role" data-id_role="{{ $role_item->loainguoidung_id}}"></i></a>
  
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            
                        
                        </div>
                        <div  class="card-box">
                            <h4>Thêm vai trò</h4>
                            <form action="{{URL::to('/role-add-save')}}" method="POST">
                                @csrf
                                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" cellspacing="0" id="tickets-table">
                                    <thead class="bg-light">
                                    <tr>
                                            <th class="font-weight-medium">Tên vai trò</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Sản Phẩm</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Nhập Hàng</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Tin Tức</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Nhân viên</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Đơn Hàng</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Giao Hàng</th>
                                            <th class="font-weight-medium" align="center">Quản Lý Thống Kê</th>
                                        
                                    </tr>
                                    </thead>
                                    <tr>
                                            <td>
                                                <input name="role_name" type="text" placeholder="Tên vai trò" required="" class="form-control">
                                            </td>
                                            <td align="center">
                                                    <input class="form-check-input" name="sanpham" value="1" type="checkbox" id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="nhaohang" value="1" type="checkbox" id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="tintuc" value="1" type="checkbox" id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="nhanvien" value="1" type="checkbox"  id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="donhang" value="1" type="checkbox"  id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="giaohang" value="1" type="checkbox" id="flexCheckChecked">
                                            </td>
                                            <td align="center">
                                                <input class="form-check-input" name="thongke" value="1" type="checkbox" id="flexCheckChecked">
                                            </td>
                                            
                                    </tr>
                                </table>
                                <div style="text-align: right">
                                    <button type="submit" class="btn btn-success waves-effect waves-light btn-sm add-queue" >
                                        <i class="mdi mdi-plus-circle mr-1"></i>Thêm mới</button> 
                                </div>
                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                <nav>
                
            </nav>
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
