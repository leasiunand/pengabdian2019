<!DOCTYPE html>
<html lang="en">

  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
      <title>{{ config('app.name', 'Laravel') }} | Login Scan Code</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="#">
      <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="#">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('img/lea-logo.png')}}" type="image/x-icon">
      <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('editor/bower_components/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/icon/icofont/css/icofont.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('editor/assets/css/style.css')}}">
  </head>

  <body class="fix-menu">
      <!-- Pre-loader start -->
      <div class="theme-loader">
          <div class="ball-scale">
              <div class='contain'>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
                  <div class="ring"><div class="frame"></div></div>
              </div>
          </div>
      </div>
      <!-- Pre-loader end -->
      @include('komponen.eror')
      <section class="login-block">
          <!-- Container-fluid starts -->
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <!-- Authentication card start -->

                          <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="md-float-material form-material">
                              @csrf
                              <div class="text-center">
                                  <img src="{{asset('editor/assets/images/logo.png')}}" alt="logo.png">
                              </div>
                              <div class="auth-box card">
                                  <div class="card-block">
                                      <div class="row m-b-20">
                                          <div class="col-md-12">
                                              <h3 class="text-center">Sign In</h3>
                                          </div>
                                      </div>
                                      <div class="text-center">
                                        <div class="">
                                            <canvas id="canvas" width="300" height="300"></canvas>
                                          </div>
                                        </div>
                                        <div class="">
                                          <div id="message" class="text-center">
                                          </div>
                                        </div>
                                        <div class="text-center">
                                          <a href="{{url('login')}}"><b class="f-w-600">Login With Username & Password</b></a>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <!-- end of form -->
                  </div>
                  <!-- end of col-sm-12 -->
              </div>
              <!-- end of row -->
          </div>
          <!-- end of container-fluid -->
      </section>
      <script type="text/javascript" src="{{asset('editor/bower_components/jquery/js/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/popper.js/js/popper.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- jquery slimscroll js -->
      <script type="text/javascript" src="{{asset('editor/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
      <!-- modernizr js -->
      <script type="text/javascript" src="{{asset('editor/bower_components/modernizr/js/modernizr.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
      <!-- i18next.min.js -->
      <script type="text/javascript" src="{{asset('editor/bower_components/i18next/js/i18next.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('editor/assets/js/common-pages.js')}}"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
      </script>
      <script type="text/javascript" src="{{asset('js/scan/qrcodelib.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/scan/webcodecamjs.js')}}"></script>
      <script type="text/javascript">
      	var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
          var arg = {
              resultFunction: function(result) {
                if (result!='') {
                         $.ajax({
                            type: "POST",
                            cache: false,
                            url : "{{action('qrcodeController@postlogin')}}",
                            data: {"_token": "{{ csrf_token() }}",data:result.code},
                                  success: function(data) {
                                    console.log(data);
                                  if (data==1) {
                                    // location.reload();
                                    $(location).attr('href', '{{url('dashboard')}}');
                                  }else{
                                   return confirm('There is no user with this qr code');
                                  }
                                }
                            })

                }
                else{
                  return confirm('There is no  data');
                }
              }
          };
          new WebCodeCamJS("canvas").init(arg).play();

          $('#message').html('<span class="text-success send-true">Scanning now....</span>');
      </script>
  </body>
</html>
