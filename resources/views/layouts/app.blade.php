<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('site_name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--================= Favicon =================-->
        <link rel="apple-touch-icon" href="{{asset('assets/images/fav.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/fav.png')}}">   

        <!--================= Bootstrap v5 css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!--================= Back Menus css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/back-menus.css')}}">               
        <!--================= Animate css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
        <!--================= owl carousel css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">        
        <!--================= Elegant icon css  =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/elegant-icon.css')}}">
        <!--================= Magnific Popup css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">
        <!--================= Back Animations css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/back-animations.css')}}"> 
        <!--================= style css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <!--================= Spacing css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/back-spacing.css')}}">
        <!--================= Responsive css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
    </head>
    <body  >
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
            <div class="back__loader_logo"><img src="{{asset('assets/images/preload.png')}}" alt="Preload"></div>
        </div> 
           <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer id="back-footer" class="back-footer back-footer-dark back-footer-dark2">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 md-mb-30">
                                <div class="footer-widget footer-widget-1">
                                    <div class="footer-logo white">
                                        <a href="?" class="logo-text"> <img src="{{asset('assets/images/logo-light.png')}}" alt="{{setting('site_name')}}"></a>
                                    </div>
                                    <h5 class="footer-subtitle">تواصل معنا</h5>
                                    <ul class="footer-address">
                                         <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f84e77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg><a href="tel:{{setting('mobile')}}">{{setting('mobile')}} </a></li>
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f84e77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><a href="mailto:{{setting('email')}}">{{setting('email')}}</a></li>
                                    </ul> 
                                    <h6 class="back-follow-us">تابعنا علي </h6>
                                    <ul class="social-links">
                                         <li><a href="{{setting('twitter')}}"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                     </ul>                                 
                                </div>
                            </div>
                            <div class="col-lg-3 md-mb-30">
                                <div class="footer-widget footer-widget-2">
                                    <h3 class="footer-title">روابط هامة</h3>
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="{{route('page.show','about-us')}}">عن الموقع</a></li>
                                            <li><a href="{{route('page.show','contact-us')}}">المنتجات</a></li>
                                            <li><a href="{{route('page.show','contact-us')}}">اتصل بنا</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 md-mb-30">
                                <div class="footer-widget footer-widget-2">
                                    <h3 class="footer-title">السياسة</h3>
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="{{route('page.show','pl')}}">سياسة الخصوصية</a></li>
                                            <li><a href="{{route('page.show','term')}}">سياسة الاستخدام</a></li>
                                            <li><a href="{{route('page.show','fql')}}">الاسئلة الشائعة</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                {{setting('site_description')}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="copyright">  
                    <div class="container">                  
                        <div class="back-copy-left">{{setting('site_name')}}</div>                    
                    </div>
                </div>
            </footer>
            <!--================= Footer Section End Here =================-->
            
            <!--================= Scroll to Top Start =================-->
            <div id="backscrollUp">
                <span aria-hidden="true" class="arrow_carrot-up"></span>
            </div> 
            <!--================= Scroll to Top End =================-->
            <x-toaster-hub />
            <!--================= jquery latest version =================-->
            <script src="{{asset('assets/js/jquery.min.js')}}"></script>
            <!--================= modernizr js =================-->
            <script src="{{asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
            <!--================= bootstrap js =================-->
            <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
            <!--================= owl.carousel js =================-->
            <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
            <!--================= magnific popup =================-->
            <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
            <!--================= counter up js =================-->
            <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
            <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
            <!--================= wow js =================-->
            <script src="{{asset('assets/js/wow.min.js')}}"></script>  
            <!-- isotope.pkgd.min js -->
            <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
            <!-- imagesloaded.pkgd.min js -->
            <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>               
            <!--================= Back menus js =================-->
            <script src="{{asset('assets/js/back-menus.js')}}"></script>
            <!--================= plugins js =================-->
            <script src="{{asset('assets/js/plugins.js')}}"></script>       
            <!--================= main js =================-->
            <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
