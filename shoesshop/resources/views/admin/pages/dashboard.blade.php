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
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div>
        <!-- container -->
        <div class="row">
            <div class="col-12">
                <div class="card-box" >
                   <img src="{{asset('/uploads/admin/aboutstore/tai-hinh-anh-welcome-xin-chao-hinh-nen-powerpoint-mo-dau-slide-an-tuong-11.jpg')}}" alt="" > 
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
      
   
    </div>
    <!-- content -->

    <!-- Footer Start -->
    @include('admin.blocks.footer_admin')
    <!-- end Footer -->
</div>
@endsection
