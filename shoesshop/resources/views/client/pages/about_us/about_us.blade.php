@extends('client.index_layout')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Cửa Hàng</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--about section area -->
@foreach ($all_about_us as $key=>$about_us)
    <div class="about_section section_two">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="about_content">
                    <h1>{{ $about_us->cuahang_tieu_de }}</h1>
                   <p>{{ $about_us->cuahang_mo_ta }} </p>
                   <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $about_us->cuahang_dia_chi }}</p>
                   <p><i class="fa fa-mobile" aria-hidden="true"></i> (84+) {{ $about_us->cuahang_so_dien_thoai }}</p>
                   <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $about_us->cuahang_email }} </a>
                </div>
            </div>
            <div class="col-12">
                <div class="about_thumb">
                    <img src="{{asset('/uploads/admin/aboutstore/'.$about_us->cuahang_anh)}}" width="710px" height="340px"  alt="">
                </div>
            </div>
            <div><br></div>
            <div class="col-12 map">
                <div class="about_thumb">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8273293750813!2d105.7669915141112!3d10.03110357525191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2zVHLGsOG7nW5nIEPDtG5nIE5naOG7hyBUaMO0bmcgVGluIHbDoCBUcnV54buBbiBUaMO0bmcgKENUVSk!5e0!3m2!1svi!2s!4v1667723812012!5m2!1svi!2s" width="900" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!--about section end-->

@endsection
