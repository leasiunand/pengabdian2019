<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="#">
    <meta name="keywords"
          content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('img/logo/favicon.ico')}}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/ekko-lightbox/css/ekko-lightbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/lightbox2/css/lightbox.css')}}">
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/datedropper/css/datedropper.min.css')}}" />
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/icofont/css/icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/feather/css/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/pages/social-timeline/timeline.css')}}">
    <!-- Flag-icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/flag-icons/css/flag-icon.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- ion-icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/ion-icon/css/ionicons.min.css')}}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{asset('editor/bower_components/select2/css/select2.min.css')}}"/>
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/multiselect/css/multi-select.css')}}"/>
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/css/component.css')}}">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css')}}">

    @yield('css-lib')
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/scss/partials/menu/_pcmenu.scss"> -->
    @yield('css')
</head>

<body>
<!-- Pre-loader start -->
  @include('komponen.preloader')
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @include('komponen.headerbar')

        <!-- Sidebar chat start -->
        @include('komponen.chatbar')
        <!-- Sidebar inner chat start-->
        @include('komponen.chatdetail')
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('komponen.sidebar')
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="">
                                        <div class="caption-breadcrumb">
                                            <div class="breadcrumb-header">
                                                <h5>@yield('title-breadcrumb')</h5>
                                                <span>@yield('keterangan-breadcrumb')</span>
                                            </div>
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="#!">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    @yield('icon-breadcrumb')
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                <div class="page-body">
                                  @include('komponen.eror')
                                    <div class="row">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Required Jquery -->
<script data-cfasync="false" src="{{asset('editor/email-decode.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('editor/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('editor/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- light-box js -->
<script type="text/javascript" src="{{asset('editor/bower_components/ekko-lightbox/js/ekko-lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/lightbox2/js/lightbox.js')}}"></script>
<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="{{asset('editor/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="{{asset('editor/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<!-- Date-dropper js -->
<script type="text/javascript" src="{{asset('editor/bower_components/datedropper/js/datedropper.min.js')}}"></script>

<!-- data-table js -->
<script src="{{asset('editor/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
<script src="{{asset('editor/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('editor/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- sweet alert js -->
<script type="text/javascript" src="{{asset('editor/bower_components/sweetalert/js/sweetalert.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('editor/assets/js/modal.js')}}"></script> -->
<!-- sweet alert modal.js intialize js -->
<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="{{asset('editor/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/assets/js/classie.js')}}"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('editor/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
<script src="{{asset('editor/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('editor/assets/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('editor/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="{{asset('editor/bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="{{asset('editor/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('editor/assets/js/jquery.quicksearch.js')}}"></script>
@yield('script-lib')
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset('editor/assets/pages/advance-elements/select2-custom.js')}}"></script>
    <script src="{{asset('editor/assets/js/pcoded.min.js')}}"></script>
    <!-- <script src="{{asset('editor/assets/js/vartical-layout.min.js')}}"></script> -->
    <script src="{{asset('editor/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(function(){
            var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
            // now grab every link from the navigation

            $('div.main-menu ul li a').each(function(){
                // and test its normalized href against the url pathname regexp
                if(urlRegExp.test(this.href.replace(/\/$/,''))){
                    // $(this).addClass('active');
                    $(this).parent('li').addClass('active');
                    $(this).parent('li').parent('ul').parent('li').addClass('pcoded-trigger');
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{asset('editor/assets/js/script.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

@yield('script')
</body>


<!-- Mirrored from colorlib.com//polygon/adminty/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Nov 2018 03:09:49 GMT -->
</html>
