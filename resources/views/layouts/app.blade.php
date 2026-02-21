<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Uniaro - Academics and Education Html Template" />
    <meta name="description" content="Uniaro- LMS Education Html Template" />
    <meta name="author" content="https://www.themetechmount.com/" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Uniaro - Academics and Education')</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontello.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/megamenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}"/>
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('revolution/css/rs6.css') }}">
    
    @yield('extra_css')
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
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a href="mailto:info.uniaro@support.com">info.uniaro@support.com</a>
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-map-marker"></i></div>207 South Chestnut Lane Staten Island.
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item ms-auto">
                                <div class="top_bar_social d-flex align-items-center">
                                    <span class="mr-2">Follow Us :</span>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="top_bar_contact_item">
                                <a href="/admin">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="site-header-menu" class="site-header-menu ttm-textcolor-dark">
                <div class="site-header-menu-inner ttm-stickable-header">
                    <div class="container">
                        <div class="ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-white res-ttm-left-span z-index-2">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <div class="site-navigation d-flex flex-row">
                                    <div class="site-branding">
                                        <a class="home-link" href="/" title="Uniaro" rel="home">
                                            <img id="logo-img" class="img-fluid auto_size" alt="image" width="136" height="42" src="{{ asset('images/logo-img.svg') }}">
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
                                    <img id="footer-logo-img" class="img-fluid auto_size" alt="image" width="136" height="42" src="{{ asset('images/footer-logo.svg') }}">
                                </div>
                                <div class="textwidget widget-text">
                                    <p>Uniaro University was established for the public benefit. Recognized globally for educational excellence.</p>
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
                                    <li><a href="{{ route('certificates.verify') }}">Verify Certificate</a></li>
                                    <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                               <h3 class="widget-title">Contact Us</h3>
                                <ul class="widget_contact_wrapper">
                                    <li><h3>location:</h3> 207 South Chestnut Lane Staten Island.</li>
                                    <li><h3>Email Us:</h3> <a href="mailto:info@uniaro.com">info@uniaro.com</a></li>
                                    <li><h3>Call Us:</h3> +1 (800) 123-4567</li>
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
                                <div class="pb-5">Copyright © {{ date('Y') }} Uniaro. All Rights Reserved.</div>
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
    
    @yield('extra_js')
</body>
</html>
