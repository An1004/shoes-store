@extends('client.index_layout')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Tin Tức</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--about section area -->

    <div class="about_section section_two">
        <div class="row align-items-center">

            <div class="col-12">
                <div class="about_content">
                    <h1>{{ $blog->baiviet_tieu_de }}</h1>
                    <div class="blog_thumb">
                        <a href="{{URL::to('/blog-detail/'.$blog->id)}}"><img src="{{asset('/uploads/admin/productnews/'.$blog->baiviet_anh)}}" alt="" width="610px" height="340px"></a>
                     </div>
                   
                   
                </div>
                
            </div>
            <div class="col-12">
                <div style="margin-right: 150px; margin-left:150px">
                    <p style="">{!!$blog->baiviet_noi_dung !!} </p>
                </div>
               
            </div>
            {{-- <div class="col-12">
                <div class="about_thumb">
                    <img src="{{asset('/uploads/admin/aboutstore/'.$get_blog->cuahang_anh)}}" width="710px" height="340px"  alt="">
                </div>
            </div> --}}
        </div>
    </div>

<!--about section end-->

@endsection
