<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ settings('site_name', 'CSA Education') }}, Computer Education, IT Training, Bhawanigarh, Computer Classes" />
    <meta name="description" content="{{ settings('site_description', 'CSA Education Bhawanigarh - Best Computer Education and IT Training Center') }}" />
    <meta name="author" content="{{ settings('site_name', 'CSA Education') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', settings('site_name', 'CSA Education') . ' - Computer Education & IT Training Center')</title>

    <link rel="shortcut icon" href="{{ settings('favicon') ? asset('storage/' . settings('favicon')) : asset('images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontello.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}"/>
    <!-- Font Awesome CDN Backup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/megamenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"/>
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('revolution/css/rs6.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"/>
    
    @yield('extra_css')
    
    @if(settings('primary_color') || settings('secondary_color'))
    <style>
        :root {
            --primary-color: {{ settings('primary_color', '#1db6c5') }};
            --secondary-color: {{ settings('secondary_color', '#001848') }};
            --accent-color: {{ settings('accent_color', '#1db6c5') }};
        }
        
        /* Apply dynamic colors */
        .ttm-bgcolor-skincolor,
        .ttm-btn-color-skincolor {
            background-color: var(--primary-color) !important;
        }
        
        .ttm-textcolor-skincolor,
        a:hover {
            color: var(--primary-color) !important;
        }
        
        .ttm-bgcolor-darkgrey {
            background-color: var(--secondary-color) !important;
        }
        
        .ttm-textcolor-darkgrey {
            color: var(--secondary-color) !important;
        }
    </style>
    @endif
    <script>
        window.onerror = function(msg, url, lineNo, columnNo, error) {
            console.error("Error: " + msg + "\nScript: " + url + "\nLine: " + lineNo);
            // alert("JS Error: " + msg); // Uncomment if needed
            return false;
        };
    </script>
</head>

<body>
    <div class="page">        
        <!--header start-->
        <header id="masthead" class="header ttm-header-style-01">
            <div class="top_bar ttm-textcolor-white ttm-bgcolor-darkgrey clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            @if(settings('email'))
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a href="mailto:{{ settings('email') }}">{{ settings('email') }}</a>
                            </div>
                            @endif
                            @if(settings('city') || settings('address'))
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-map-marker"></i></div>{{ settings('city') ?: settings('address') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item ms-auto">
                                <div class="top_bar_social d-flex align-items-center">
                                    <span class="mr-2">Follow Us :</span>
                                    <ul class="social-icons">
                                        @if(settings('facebook_url'))
                                        <li><a href="{{ settings('facebook_url') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        @endif
                                        @if(settings('twitter_url'))
                                        <li><a href="{{ settings('twitter_url') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        @endif
                                        @if(settings('linkedin_url'))
                                        <li><a href="{{ settings('linkedin_url') }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        @endif
                                        @if(settings('instagram_url'))
                                        <li><a href="{{ settings('instagram_url') }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        @endif
                                        @if(settings('youtube_url'))
                                        <li><a href="{{ settings('youtube_url') }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="top_bar_contact_item">
                                <a href="{{ route('students.register') }}">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="site-header-menu" class="site-header-menu ttm-textcolor-dark">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="container">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-white res-ttm-left-span z-index-2">
                            <div class="ttm-col-wrapper-bg-layer"></div>
                            <div class="layer-content">
                                <div class="site-navigation d-flex flex-row">
                                    <div class="site-branding">
                                        <a class="home-link" href="/" title="{{ settings('site_name', 'CSA Education') }}" rel="home">
                                            <img id="logo-img" class="img-fluid auto_size" alt="{{ settings('site_name', 'CSA Education') }}" width="200" height="60" src="{{ asset('uploads/logo.png')}}">
                                        </a>
                                    </div>
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box"><span class="menubar-inner"></span></span>
                                    </div>
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item {{ request()->is('/') ? 'active' : '' }}">
                                                <a href="/">Home</a>
                                            </li>
                                            <li class="mega-menu-item {{ request()->is('about') ? 'active' : '' }}">
                                                <a href="{{ route('about') }}">About Us</a>
                                            </li>
                                            <li class="mega-menu-item {{ request()->is('courses*') ? 'active' : '' }}">
                                                <a href="/courses">Courses</a>
                                            </li>
                                            <li class="mega-menu-item {{ request()->is('verify-certificate') ? 'active' : '' }}">
                                                <a href="{{ route('certificates.verify') }}">Verify Certificate</a>
                                            </li>
                                            <li class="mega-menu-item {{ request()->is('contact') ? 'active' : '' }}">
                                                <a href="{{ route('contact.show') }}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end ms-auto">
                                        <div class="header_btn">
                                            <a class="ttm-btn ttm-btn-style-fill ttm-btn-size-md ttm-btn-color-skincolor" href="/courses">Get Course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <!--footer start-->
        <footer class="footer ttm-bgcolor-darkgrey clearfix">
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text clearfix">
                                <div class="footer-logo">
                                    <img id="footer-logo-img" class="img-fluid auto_size" alt="{{ settings('site_name', 'CSA Education') }}" width="200" height="60" src="{{ settings('footer_logo') ? asset('storage/' . settings('footer_logo')) : asset('images/csa-footer-logo.svg') }}">
                                </div>
                                <div class="textwidget widget-text">
                                    <p>{{ settings('footer_text', 'CSA Education Bhawanigarh - Best place for learning latest technology for IT industry. Huge experience in multimedia and web technologies.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                               <h3 class="widget-title">Quick Links</h3>
                                <ul id="menu-footer-quick-links">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="/courses">Our Courses</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('certificates.verify') }}">Verify Certificate</a></li>
                                    <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                               <h3 class="widget-title">Contact Us</h3>
                                <ul class="widget_contact_wrapper">
                                    @if(settings('address') || settings('city'))
                                    <li><h3>location:</h3> {{ settings('address') }}{{ settings('city') ? ', ' . settings('city') : '' }}{{ settings('state') ? ', ' . settings('state') : '' }}</li>
                                    @endif
                                    @if(settings('email'))
                                    <li><h3>Email Us:</h3> <a href="mailto:{{ settings('email') }}">{{ settings('email') }}</a></li>
                                    @endif
                                    @if(settings('phone'))
                                    <li><h3>Call Us:</h3> {{ settings('phone') }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="bottom-lt-side-footer">
                                <div class="pb-5">{{ settings('copyright_text', 'Copyright © ' . date('Y') . ' ' . settings('site_name', 'CSA Education') . '. All Rights Reserved.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.easing.js') }}"></script> 
    <script src="{{ asset('js/jquery-waypoints.js') }}"></script>    
    <script src="{{ asset('js/jquery-validate.js') }}"></script> 
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-isotope.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src='{{ asset('revolution/js/revolution.tools.min.js') }}'></script>
    <script src='{{ asset('revolution/js/rs6.min.js') }}'></script>
    <script src="{{ asset('revolution/js/slider.js') }}"></script>
    
    <!-- Banner Carousel Script -->
    <script>
        jQuery(document).ready(function($) {
            // Initialize carousel
            $('#bannerCarousel').carousel({
                interval: 3000,
                pause: 'hover',
                wrap: true
            });
            
            // Manual controls
            $('.carousel-control-prev').click(function(e) {
                e.preventDefault();
                $('#bannerCarousel').carousel('prev');
            });
            
            $('.carousel-control-next').click(function(e) {
                e.preventDefault();
                $('#bannerCarousel').carousel('next');
            });
            
            // Indicator controls
            $('.carousel-indicators li').click(function(e) {
                e.preventDefault();
                var slideTo = $(this).data('slide-to');
                $('#bannerCarousel').carousel(slideTo);
            });
        });
    </script>
    
    @yield('extra_js')
</body>
</html>
