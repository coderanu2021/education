<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo e(settings('site_name', 'CSA Education')); ?>, Computer Education, IT Training, Bhawanigarh, Computer Classes" />
    <meta name="description" content="<?php echo e(settings('site_description', 'CSA Education Bhawanigarh - Best Computer Education and IT Training Center')); ?>" />
    <meta name="author" content="<?php echo e(settings('site_name', 'CSA Education')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $__env->yieldContent('title', settings('site_name', 'CSA Education') . ' - Computer Education & IT Training Center'); ?></title>

    <link rel="shortcut icon" href="<?php echo e(settings('favicon') ? asset('storage/' . settings('favicon')) : asset('images/favicon.png')); ?>" />
    
    <!-- Google Fonts - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animate.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fontello.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/flaticon.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome.css')); ?>"/>
    <!-- Font Awesome CDN Backup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/themify-icons.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/slick.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/prettyPhoto.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/shortcodes.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/megamenu.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/responsive.css')); ?>"/>
    <link rel='stylesheet' id='rs-plugin-settings-css' href="<?php echo e(asset('revolution/css/rs6.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>"/>
    
    <?php echo $__env->yieldContent('extra_css'); ?>
    
    <style>
        /* Poppins Font Family */
        body,
        h1, h2, h3, h4, h5, h6,
        p, a, span, div,
        button, input, textarea, select,
        .btn, .nav-link, .menu-item {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('primary_color') || settings('secondary_color')): ?>
    <style>
        :root {
            --primary-color: <?php echo e(settings('primary_color', '#F96D17')); ?>;
            --secondary-color: <?php echo e(settings('secondary_color', '#0F1B31')); ?>;
            --accent-color: <?php echo e(settings('accent_color', '#F96D17')); ?>;
        }
        
        /* Apply Primary Color (Orange #F96D17) */
        .ttm-bgcolor-skincolor,
        .ttm-btn-color-skincolor,
        .btn-primary,
        .featured-icon-box:hover .featured-icon,
        .ttm-btn,
        .btn {
            background-color: var(--primary-color) !important;
        }
        
        .ttm-textcolor-skincolor,
        a:hover,
        .text-primary,
        h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
            color: var(--primary-color) !important;
        }
        
        /* Apply Secondary Color (Dark Blue #0F1B31) */
        .ttm-bgcolor-darkgrey,
        .top_bar,
        .footer,
        .site-header-menu,
        header {
            background-color: var(--secondary-color) !important;
        }
        
        .ttm-textcolor-darkgrey,
        h1, h2, h3, h4, h5, h6 {
            color: var(--secondary-color) !important;
        }
        
        /* Buttons and Links */
        .btn-primary:hover,
        .ttm-btn:hover {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }
        
        /* Course Cards - Apply Primary Color */
        .featured-imagebox-course .featured-content,
        .card-header,
        .badge-primary {
            background-color: var(--primary-color) !important;
        }
        
        /* Override any cyan/blue colors */
        .bg-info,
        .text-info,
        [style*="background-color: #1db6c5"],
        [style*="color: #1db6c5"] {
            background-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        
        /* Course Cards Styling */
        .featured-imagebox-course {
            background-color: #ffffff !important;
            border: 1px solid #e0e0e0 !important;
        }
        
        .featured-imagebox-course .featured-content {
            background-color: #ffffff !important;
        }
        
        .featured-imagebox-course .ttm-lp-price {
            background-color: var(--primary-color) !important;
            color: #ffffff !important;
            padding: 8px 16px;
            border-radius: 5px;
            display: inline-block;
        }
        
        .featured-imagebox-course h3 a {
            color: var(--secondary-color) !important;
        }
        
        .featured-imagebox-course h3 a:hover {
            color: var(--primary-color) !important;
        }
    </style>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('email')): ?>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-envelope-o"></i></div><a href="mailto:<?php echo e(settings('email')); ?>"><?php echo e(settings('email')); ?></a>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('city') || settings('address')): ?>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><i class="fa fa-map-marker"></i></div><?php echo e(settings('city') ?: settings('address')); ?>

                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="col-lg-6 d-flex flex-row align-items-center">
                            <div class="top_bar_contact_item ms-auto">
                                <div class="top_bar_social d-flex align-items-center">
                                    <span class="mr-2">Follow Us :</span>
                                    <ul class="social-icons">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('facebook_url')): ?>
                                        <li><a href="<?php echo e(settings('facebook_url')); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('twitter_url')): ?>
                                        <li><a href="<?php echo e(settings('twitter_url')); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('linkedin_url')): ?>
                                        <li><a href="<?php echo e(settings('linkedin_url')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('instagram_url')): ?>
                                        <li><a href="<?php echo e(settings('instagram_url')); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('youtube_url')): ?>
                                        <li><a href="<?php echo e(settings('youtube_url')); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="top_bar_contact_item">
                                <a href="<?php echo e(route('students.register')); ?>">Register Now</a>
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
                                        <a class="home-link" href="/" title="<?php echo e(settings('site_name', 'CSA Education')); ?>" rel="home">
                                            <img id="logo-img" class="img-fluid auto_size" alt="<?php echo e(settings('site_name', 'CSA Education')); ?>" width="200" height="60" src="<?php echo e(asset('uploads/logo.png')); ?>">
                                        </a>
                                    </div>
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box"><span class="menubar-inner"></span></span>
                                    </div>
                                    <nav class="main-menu menu-mobile" id="menu">
                                        <ul class="menu">
                                            <li class="mega-menu-item <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                                                <a href="/">Home</a>
                                            </li>
                                            <li class="mega-menu-item <?php echo e(request()->is('about') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(route('about')); ?>">About Us</a>
                                            </li>
                                            <li class="mega-menu-item <?php echo e(request()->is('courses*') ? 'active' : ''); ?>">
                                                <a href="/courses">Courses</a>
                                            </li>
                                            <li class="mega-menu-item <?php echo e(request()->is('verify-certificate') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(route('certificates.verify')); ?>">Verify Certificate</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="<?php echo e(route('gallery')); ?>">Gallery</a>
                                            </li>
                                            <li class="mega-menu-item <?php echo e(request()->is('contact') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(route('contact.show')); ?>">Contact Us</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end ms-auto">
                                        <div class="header_btn" style="padding-right:45px;">
                                            <a class="ttm-btn ttm-btn-style-fill ttm-btn-size-md ttm-btn-color-skincolor" href="/courses" >Get Course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php echo $__env->yieldContent('content'); ?>

        <!--footer start-->
        <footer class="footer ttm-bgcolor-darkgrey clearfix">
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_text clearfix">
                                <div class="footer-logo">
                                    <img id="footer-logo-img" class="img-fluid auto_size" alt="<?php echo e(settings('site_name', 'CSA Education')); ?>" width="200" height="60" src="<?php echo e(settings('footer_logo') ? asset('storage/' . settings('footer_logo')) : asset('images/csa-footer-logo.svg')); ?>">
                                </div>
                                <div class="textwidget widget-text">
                                    <p><?php echo e(settings('footer_text', 'CSA Education Bhawanigarh - Best place for learning latest technology for IT industry. Huge experience in multimedia and web technologies.')); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                               <h3 class="widget-title" style="color:#fff;">Quick Links</h3>
                                <ul id="menu-footer-quick-links">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                                    <li><a href="/courses">Our Courses</a></li>
                                    <li><a href="<?php echo e(route('gallery')); ?>">Gallery</a></li>
                                    <li><a href="<?php echo e(route('certificates.verify')); ?>">Verify Certificate</a></li>
                                    <li><a href="<?php echo e(route('contact.show')); ?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 widget-area">
                            <div class="widget widget_nav_menu clearfix">
                               <h3 class="widget-title" style="color:#fff;">Contact Us</h3>
                                <ul class="widget_contact_wrapper">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('address') || settings('city')): ?>
                                    <li><h3 style="color:#fff;">location:</h3> <?php echo e(settings('address')); ?><?php echo e(settings('city') ? ', ' . settings('city') : ''); ?><?php echo e(settings('state') ? ', ' . settings('state') : ''); ?></li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('email')): ?>
                                    <li><h3>Email Us:</h3> <a href="mailto:<?php echo e(settings('email')); ?>"><?php echo e(settings('email')); ?></a></li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(settings('phone')): ?>
                                    <li><h3>Call Us:</h3> <?php echo e(settings('phone')); ?></li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                <div class="pb-5"><?php echo e(settings('copyright_text', 'Copyright © ' . date('Y') . ' ' . settings('site_name', 'CSA Education') . '. All Rights Reserved.')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Javascript -->
    <script src="<?php echo e(asset('js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-migrate-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('js/jquery.easing.js')); ?>"></script> 
    <script src="<?php echo e(asset('js/jquery-waypoints.js')); ?>"></script>    
    <script src="<?php echo e(asset('js/jquery-validate.js')); ?>"></script> 
    <script src="<?php echo e(asset('js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/numinate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src='<?php echo e(asset('revolution/js/revolution.tools.min.js')); ?>'></script>
    <script src='<?php echo e(asset('revolution/js/rs6.min.js')); ?>'></script>
    <script src="<?php echo e(asset('revolution/js/slider.js')); ?>"></script>
    
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
    
    <?php echo $__env->yieldContent('extra_js'); ?>
</body>
</html>
<?php /**PATH E:\wamp64\www\education\resources\views/layouts/app.blade.php ENDPATH**/ ?>