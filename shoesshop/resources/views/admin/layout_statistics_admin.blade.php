<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOES ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{URL::asset('/backend/images/favicon.png')}}"> --}}
    <!-- App css -->
    <link href="{{URL::asset('/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/css/icons.min.css')}}"rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/css/datatable.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/multiselect/multi-select.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <link href="{{URL::asset('/backend/libs/footable/footable.core.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/custombox/custombox.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{URL::asset('/backend/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/libs/switchery/switchery.min.css')}}"  rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/backend/css/sweetalert.css')}}" rel="stylesheet">
    <!-- charts -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('admin.blocks.header_admin')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.blocks.menu_admin')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
      <script src="{{URL::asset('/backend/js/sweetalert.min.js')}}"></script>
    {{--  <script src="{{URL::asset('/backend/libs/datatables/dataTables.buttons.min.js')}}"></script>  --}}
    {{--  <script src="{{URL::asset('/backend/js/pages/datatables.init.js')}}"></script>  --}}
    {{--  <script src="{{URL::asset('/backend/libs/datatables/dataTables.bootstrap4.js')}}"></script>  --}}
	{{--  <script src="{{URL::asset('/backend/libs/datatables/buttons.html5.min.js')}}"></script>  --}}
    <script src="{{URL::asset('/backend/js/vendor.min.js')}}"></script>
	<script src="{{URL::asset('/backend/js/app.min.js')}}"></script>
    <script src="{{URL::asset('/backend/js/jquery.js')}}"></script>
    {{--  <script src="{{URL::asset('/backend/js/jquery2.js')}}"></script>  --}}
    {{--  <script src="{{URL::asset('/backend/js/pages/form-fileuploads.init.js')}}"></script>  --}}
	{{--  <script src="{{URL::asset('/backend/js/pages/form-advanced.init.js')}}"></script>  --}}
	{{--  <script src="{{URL::asset('/backend/js/pages/form-pickers.init.js')}}"></script>  --}}

	<script src="{{URL::asset('/backend/libs/jquery-quicksearch/jquery.quicksearch.min.js')}}"></script>

	<script src="{{URL::asset('/backend/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{URL::asset('/backend/libs/moment/moment.min.js')}}"></script>

	<script src="{{URL::asset('/backend/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('/backend/libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{URL::asset('/backend/libs/dropzone/dropzone.min.js')}}"></script>

	<script src="{{URL::asset('/backend/libs/multiselect/jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('/backend/libs/select2/select2.min.js')}}"></script>

	<script src="{{URL::asset('/backend/libs/custombox/custombox.min.js')}}"></script>

	<script src="{{URL::asset('/backend/libs/footable/footable.all.min.js')}}"></script>
	{{--  <script src="{{URL::asset('/backend/js/pages/foo-tables.init.js')}}"></script>  --}}
    <script src="{{URL::asset('/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset('/backend/js/pages/sweet-alerts.init.js')}}"></script>

    <script src="{{URL::asset('/backend/libs/datatables/jquery-3.5.1.js')}}"></script>
    {{--  <script src="{{URL::asset('/backend/libs/datatables/my-datatable.js')}}"></script>  --}}

    <script src="{{URL::asset('/backend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{URL::asset('/backend/js/jquery3.js')}}"></script>
    <script src="{{URL::asset('/backend/js/sweetalert.min.js')}}"></script>
    {{--  <script src="{{URL::asset('/libs/switchery/switchery.min.js')}}" ></script>  --}}
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  --}}
    <script src="{{URL::asset('/backend/ckeditor/ckeditor.js')}}"></script>

    <!-- charts js -->
    
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- charts js -->

</body>

</html>
<!-- {{--  <script>
      Date.prototype.toDateInputValue == (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });  
    {{--  $(document).ready( function() {
        var from_day = document.getElementById('get_search_admin_from_day_order').value;
        var to_day = document.getElementById('get_search_admin_to_day_order').value;
        if(from_day!=null){
            $('.search_admin_from_day_order').val(from_day);
        }else{
            $('.search_admin_from_day_order').val(new Date().toDateInputValue());
        }
        if(to_day!=null){
            $('.search_admin_to_day_order').val(to_day);
        }else{
            $('.search_admin_to_day_order').val(new Date().toDateInputValue());
        }
    });  --}}
{{--  </script>  --}} -->
<script>
    $(document).ready(function(){
        $('.search-type-statistical-order').on('change',function(){
            var search=$('.search-type-statistical-order option:selected').val();
            $.ajax({
                url:"{{url('/search-select-order-statistics')}}",
                method:"GET",
                data:{search_type:search},
                success:function(data){
                   $('.show_search_order_statistics').html(data);
                   
                }
            });
        });
        $('.search-type-statistical-order').on('change',function(){
            var search=$('.search-type-statistical-order option:selected').val();
            $.ajax({
                url:"{{url('/search-select-order-statistics-chart')}}",
                method:"GET",
                data:{search_type:search},
                success:function(responsive){
                    // $('.show_search_order_statistics').html(data);
                    $('#chart').html('<canvas id="chartsearch"></canvas>');
                   var items = JSON.parse(responsive);
                   var sluong =[];
                   var tongtien= [];
                   var donhang = [];
                   var ngay = [];
                   var len = items.length;
                   for (var i=0 ; i<len;i++){
                       sluong.push(items[i].sl)
                       tongtien.push(items[i].money)
                       donhang.push(items[i].tdon)
                       ngay.push(items[i].day)
                      
                   }
                  
                   
                   new Chart(document.getElementById("chartsearch"), {
                    type: 'bar',
                    data: {
                    labels: ngay,
                    datasets: [
                        {
                        label: 'Tổng đơn hàng',
                        backgroundColor: "#F8C4B4",
                        data: donhang
                        },
                        {
                        label: 'Số lượng đã bán',
                        backgroundColor: "#8e5ea2",
                        data: sluong
                        },
                        {
                        label: 'Doanh thu',
                        backgroundColor: "#3cba9f",
                        data: tongtien
                        }
                    ]
                    },
                    options: {
                
                    title: {
                        display: true,
                        text: 'Thống kê doanh thu'
                    }
                    }
                });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.clear-search-statistical-order').click(function() {
            $(this).closest('form').find("input[type=date]").val("");
            $(this).closest('form').find("select").val("0");
            var from_day = document.getElementById('search_from_day_statistical_order').value;
            var to_day =document.getElementById('search_to_day_statistical_order').value;
            $.ajax({
                url:"{{url('/search-order-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_search_order_statistics').html(data);
                }
            });
        });
        $('#search_from_day_statistical_order').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_order').value;
            var to_day =document.getElementById('search_to_day_statistical_order').value;
            $.ajax({
                url:"{{url('/search-order-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                    $('.show_search_order_statistics').html(data);
                   
                }
                
            });
        });
        $('#search_from_day_statistical_order').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_order').value;
            var to_day =document.getElementById('search_to_day_statistical_order').value;
            $.ajax({
                url:"{{url('/search-order-statistics-chart')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(responsive){
                    // $('.show_search_order_statistics').html(data);
                    $('#chart').html('<canvas id="chartsearch"></canvas>');
                   var items = JSON.parse(responsive);
                   var sluong =[];
                   var tongtien= [];
                   var donhang = [];
                   var ngay = [];
                   var len = items.length;
                   
                   for (var i=0 ; i<len;i++){
                       sluong.push(items[i].sl)
                       tongtien.push(items[i].money)
                       donhang.push(items[i].tdon)
                       ngay.push(items[i].day)
                      
                   }
                   new Chart(document.getElementById("chartsearch"), {
                    type: 'bar',
                    data: {
                    labels: ngay,
                    datasets: [
                        {
                        label: 'Tổng đơn hàng',
                        backgroundColor: "#F8C4B4",
                        data: donhang
                        },
                        {
                        label: 'Số lượng đã bán',
                        backgroundColor: "#8e5ea2",
                        data: sluong
                        },
                        {
                        label: 'Doanh thu',
                        backgroundColor: "#3cba9f",
                        data: tongtien
                        }
                    ]
                    },
                    options: {
                
                    title: {
                        display: true,
                        text: 'Thống kê doanh thu'
                    }
                    }
                });
                }
                
            });
        });
        
        $('#search_to_day_statistical_order').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_order').value;
            var to_day =document.getElementById('search_to_day_statistical_order').value;
            $.ajax({
                url:"{{url('/search-order-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_search_order_statistics').html(data);
                   
                }
            });
        });
        $('#search_to_day_statistical_order').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_order').value;
            var to_day =document.getElementById('search_to_day_statistical_order').value;
           $.ajax({
                url:"{{url('/search-order-statistics-chart')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(responsive){
                    // $('.show_search_order_statistics').html(data);
                    $('#chart').html('<canvas id="chartsearch"></canvas>');
                   var items = JSON.parse(responsive);
                   var sluong =[];
                   var tongtien= [];
                   var donhang = [];
                   var ngay = [];
                   var len = items.length;
                   for (var i=0 ; i<len;i++){
                       sluong.push(items[i].sl)
                       tongtien.push(items[i].money)
                       donhang.push(items[i].tdon)
                       ngay.push(items[i].day)
                      
                   }
                   new Chart(document.getElementById("chartsearch"), {
                    type: 'bar',
                    data: {
                    labels: ngay,
                    datasets: [
                        {
                        label: 'Tổng đơn hàng',
                        backgroundColor: "#3e95cd",
                        data: donhang
                        },
                        {
                        label: 'Số lượng đã bán',
                        backgroundColor: "#8e5ea2",
                        data: sluong
                        },
                        {
                        label: 'Doanh thu',
                        backgroundColor: "#3cba9f",
                        data: tongtien
                        }
                    ]
                    },
                    options: {
                
                    title: {
                        display: true,
                        text: 'Thống kê doanh thu'
                    }
                    }
                });
                }
                
            });
        });
        
        
    });
</script>

<script>
    $(document).ready(function(){
        $('.search-type-statistical-product-import').on('change',function(){
            var search=$('.search-type-statistical-product-import option:selected').val();
            $.ajax({
                url:"{{url('/search-select-product-import')}}",
                method:"GET",
                data:{search_type:search},
                success:function(data){
                   $('.show_search_import_product_statistics').html(data);
                }
            });
        })
    });
</script>
<script>
    $(document).ready(function(){
        $('.clear-search-statistical-product-import').click(function() {
            $(this).closest('form').find("input[type=date]").val("");
            $(this).closest('form').find("select").val("0");
            var from_day = document.getElementById('search_from_day_statistical_product_import').value;
            var to_day =document.getElementById('search_to_day_statistical_product_import').value;
            $.ajax({
                url:"{{url('/search-import-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_search_import_product_statistics').html(data);
                }
            });
        });
        $('#search_from_day_statistical_product_import').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_product_import').value;
            var to_day =document.getElementById('search_to_day_statistical_product_import').value;
            $.ajax({
                url:"{{url('/search-import-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_search_import_product_statistics').html(data);
                }
            });
        });
        $('#search_to_day_statistical_product_import').on('change',function(){
            var from_day = document.getElementById('search_from_day_statistical_product_import').value;
            var to_day =document.getElementById('search_to_day_statistical_product_import').value;
            $.ajax({
                url:"{{url('/search-import-statistics')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_search_import_product_statistics').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.clear-search-statistics-product-in-stock').click(function() {
            $(this).closest('form').find("input[type=search]").val("");
            $(this).closest('form').find("select").val("0");
            var product_name = document.getElementById('search_name_statistics_product_in_stock').value;
            var product_size =document.getElementById('search_size_statistics_product_in_stock').value;
            $.ajax({
                url:"{{url('/search-product-in-stock-statistics')}}",
                method:"GET",
                data:{product_name:product_name,product_size:product_size},
                success:function(data){
                    // {{--  alert(data);  --}}
                   $('.show_in_stock_search').html(data);
                }
            });
        });

        $('.search_size_statistics_product_in_stock').on('change',function(){
            var product_name = document.getElementById('search_name_statistics_product_in_stock').value;
            var product_size =document.getElementById('search_size_statistics_product_in_stock').value;
            $.ajax({
                url:"{{url('/search-product-in-stock-statistics')}}",
                method:"GET",
                data:{product_name:product_name,product_size:product_size},
                success:function(data){
                    // {{--  alert(data);  --}}
                   $('.show_in_stock_search').html(data);
                }
            });
        });
        $('.search_name_statistics_product_in_stock').keyup(function(){
            var product_name = document.getElementById('search_name_statistics_product_in_stock').value;
            var product_size =document.getElementById('search_size_statistics_product_in_stock').value;
            $.ajax({
                url:"{{url('/search-product-in-stock-statistics')}}",
                method:"GET",
                data:{product_name:product_name,product_size:product_size},
                success:function(data){
                    // {{--  alert(data);  --}}
                   $('.show_in_stock_search').html(data);
                }
            });
        });

    });
</script>
<script>
    $(document).ready(function(){
        // {{--  $('.search-from-to-day-views').on('click',function(){
        //     var search=$('.search-view-select option:selected').val();
        //     if(search==0){
        //         var from_day = document.getElementById('search_from_day_views').value;
        //         var to_day =document.getElementById('search_to_day_views').value;
        //         if(!from_day && !to_day){
        //             alert("Please select a date to search");
        //         }else{
        //             $.ajax({
        //                 url:"{{url('/search-from-to-day-views')}}",
        //                 method:"GET",
        //                 data:{from_day:from_day,to_day:to_day},
        //                 success:function(data){
        //                    $('.show_views_type_search').html(data);
        //                 }
        //             });
        //         }
        //     }else{
        //         alert('You are searching by selection')
        //     }
        // });  --}}
        $('.clear-search-views').click(function() {
            $(this).closest('form').find("input[type=date]").val("");
            var from_day = document.getElementById('search_from_day_views').value;
            var to_day =document.getElementById('search_to_day_views').value;
            $.ajax({
                url:"{{url('/search-from-to-day-views')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_views_type_search').html(data);
                }
            });
        });
        $('.search_from_day_views').on('change',function(){
            var from_day = document.getElementById('search_from_day_views').value;
            var to_day =document.getElementById('search_to_day_views').value;
            $.ajax({
                url:"{{url('/search-from-to-day-views')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_views_type_search').html(data);
                }
            });
        });
        $('.search_to_day_views').on('change',function(){
            var from_day = document.getElementById('search_from_day_views').value;
            var to_day =document.getElementById('search_to_day_views').value;
            $.ajax({
                url:"{{url('/search-from-to-day-views')}}",
                method:"GET",
                data:{from_day:from_day,to_day:to_day},
                success:function(data){
                   $('.show_views_type_search').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.search-view-select').on('change',function(){
            var search=$('.search-view-select option:selected').val();
            $.ajax({
                url:"{{url('/search-view-select')}}",
                method:"GET",
                data:{search_type:search},
                success:function(data){
                   $('.show_views_type_search').html(data);
                 
                }
            });
        })
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function(){
            new Chart(document.getElementById("chartjs"), {
            type: 'bar',
            data: {
            labels:{!! json_encode($day) !!},
            datasets: [
                {
                label: 'Tổng đơn hàng',
                backgroundColor: "#F8C4B4",
                data: {!! json_encode($tdon) !!}
                },
                {
                label: 'Số lượng đã bán',
                backgroundColor: "#8e5ea2",
                data: {!! json_encode($sl) !!}
                },
                {
                label: 'Doanh thu',
                backgroundColor: "#3cba9f",
                data:{!! json_encode($money) !!}
                }
            ]
            },
            options: {
           
            title: {
                display: true,
                text: 'Thống kê doanh thu'
            }
            }
        });
       
        })
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- charts  -->


