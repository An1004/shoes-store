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
        <table style="margin-left:25% ">
        @foreach($all_blog as $key=>$blog)
        <tr>
            <td>
                <div class="blog_thumb">
                    <a href="{{URL::to('/blog-detail/'.$blog->id)}}"><img src="{{asset('/uploads/admin/productnews/'.$blog->baiviet_anh)}}" alt="" width="200px" height="150px"></a>
                 </div>
               
            </td>
            <td>
                <div style="margin-right: 0px; margin-left:20px">
                    <p style="">{{$blog->baiviet_tieu_de}} </p>
                    <a class="btn btn-default readmore" style="background: #dd3434cc; color:white" href="{{URL::to('/blog-detail/'.$blog->id)}}">Xem thêm <i class="fa fa-angle-right"></i></a>
                </div>
                
                    
                
            </td>
        </tr>
        @endforeach
        {{-- <div class="row align-items-center">
            

            
                <div class="left-block">
                    <div class="blog_thumb">
                        <a href="{{URL::to('/blog-detail/'.$blog->id)}}"><img src="{{asset('/uploads/admin/productnews/'.$blog->baiviet_anh)}}" alt="" width="200px" height="150px"></a>
                     </div>
                   
                </div>
                <div class="new_tilte right-block">
                    <div style="margin-right: 150px; margin-left:150px">
                        <p style="">{{$blog->baiviet_tieu_de}} </p>
                    </div>
                </div>
                 --}}
               
            
            
            {{-- <div class="col-12">
                <div class="about_thumb">
                    <img src="{{asset('/uploads/admin/aboutstore/'.$get_blog->cuahang_anh)}}" width="710px" height="340px"  alt="">
                </div>
            </div> --}}
        {{-- </div> --}}
        </table>
        <ul class="pagination pagination-rounded mb-3" style="margin-left:50% ">
            {{ $all_blog->links('layout.paginationlinks') }}
        </ul>
    </div>

<!--about section end-->

@endsection
