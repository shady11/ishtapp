<!DOCTYPE html>

<html lang="en" >

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Админ панель
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <script>
        WebFont.load({
            google: {"families":["Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/admin/app.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}">
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

    @yield('styles')

</head>
<!-- end::Head -->

<!-- end::Body -->
<body id="kt_body" class="header-fixed subheader-enabled page-loading">
<!-- begin:: Page -->
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <!-- BEGIN: Header -->
        @include('admin.partials.header')
        <!-- END: Header -->
            <!-- begin::Body -->
            <div class="d-flex flex-row flex-column-fluid container">
    {{--            @include('admin.partials.nav')--}}
                <div class="main d-flex flex-column flex-row-fluid">

                    @yield('content')

                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
        @include('admin.partials.footer')
        <!-- end::Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->
<!-- begin::Scroll Top -->
{{--<div id="m_scroll_top" class="m-scroll-top">--}}
{{--    <i class="la la-arrow-up"></i>--}}
{{--</div>--}}
<!-- end::Scroll Top -->

<!--begin::Base Scripts -->
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM')}}"></script>
<script src="{{asset('assets/plugins/custom/gmaps/gmaps.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<!--end::Page Snippets -->

<script>

    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
    });

    $.fn.datepicker.dates['ru'] = {
        days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтр", "Птн", "Сбт"],
        daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
        monthsShort: ["Янв", "Фев", "Март", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        today: "Сегодня",
        clear: "Очистить",
        format: "dd.mm.yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 1
    };

    $('.nav-position').click(function(){
        event.preventDefault();
        var url = "{{ route('nav_toggle') }}";

        if($('body').hasClass('m-brand--minimize')){
            var mini = '1';
        }else{
            var mini = '0';
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            type: 'POST',
            url: url,
            data:{
                'mini': mini
            }
        });
    });

</script>

<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/vendor/jasny-bootstrap.min.js')}}" type="text/javascript"></script>

<!-- Froala -->
<script src="{{asset('js/admin/vendor/froala_editor.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/vendor/ru.js')}}" type="text/javascript"></script>
<script>
    $(function() {
        $('.fr-textarea, .froala').froalaEditor({
            key: 'LA1C2C3D2D2B4mH4A15C10D9E2D5D4D2E3J4c1zqiF4tnvpC8md1==',
            language: 'ru',
            height: 300,
            placeholderText: 'Введите описание',
            imageUploadParam: 'file',
            imageUploadURL: "{{ asset('froala/upload_image.php') }}",
            imageMaxSize: 1024 * 1024 * 10,
            fileUploadParam: 'file1',
            fileUploadURL: "{{ asset('froala/upload_file.php') }}",
            fileMaxSize: 1024 * 1024 * 100
        });
    });
</script>

<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script>
    $(".datepicker").datepicker({
        language: 'ru',
        todayHighlight: !0,
        orientation: "bottom left",
        templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    });
    $(".timepicker").timepicker({
        showMeridian:!1,
        minuteStep:1,
        defaultTime:""
    });
    // $(document).on('click', '.btn-to-alert', function (e) {

    //     var button = $(this);

    //     e.preventDefault();
    //     swal({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         type: "warning",
    //         showCancelButton: !0,
    //         confirmButtonText: "Yes, delete it!"
    //     }).then(function(e) {
    //         window.location.replace(button.attr('href'));
    //     })
    // });

    $(document).on('click', '.btn-to-alert', function (e) {

        var button = $(this);

        id = $(this).attr('data-id');
        e.preventDefault();

        swal({
            title: "Вы уверены?",
            text: "При удалении возврат невозможен!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Да, удалить!",
            cancelButtonText: "Отменить!"
        }).then(function(e) {
            if (e.value) {
                $.post({
                    type: 'DELETE',
                    url: button.attr('href'),
                    data: {
                        'id': id
                    }
                }).done(function (data) {
                    if(data == 'Success'){
                        $('.m_datatable').DataTable().ajax.reload();
                    }
                });
            }
        })
    });
</script>

@yield('scripts')

</body>
<!-- end::Body -->
</html>
