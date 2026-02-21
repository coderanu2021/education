@extends('layouts.app')

@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">About Us</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <i class="ti ti-home"></i>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<!-- page-title end -->

<div class="site-main">
    <section class="ttm-row about-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ttm_single_image-wrapper text-center">
                        <img class="img-fluid rounded shadow" src="{{ asset('images/bg-image/col-bgimage-1.jpg') }}" alt="About Uniaro">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pt-30">
                        <div class="section-title">
                            <div class="title-header">
                                <h3>About Our University</h3>
                                <h2 class="title">We Provide Quality Education since 1920</h2>
                            </div>
                            <div class="title-desc">
                                <p>Uniaro University is a leading institution dedicated to providing high-quality education and fostering innovation. Our campus offers a vibrant community for students to learn, grow, and succeed in their chosen fields.</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
                                    <li><i class="fa fa-check-circle"></i> Professional Faculty</li>
                                    <li><i class="fa fa-check-circle"></i> Modern Facilities</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor">
                                    <li><i class="fa fa-check-circle"></i> Global Recognition</li>
                                    <li><i class="fa fa-check-circle"></i> Research Centers</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-40">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor" href="/courses">Explore Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ttm-row history-section ttm-bgcolor-grey clearfix">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <div class="section-title">
                        <div class="title-header">
                            <h3>Our History</h3>
                            <h2 class="title">Our Journey Through Years</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="featured-icon-box icon-align-top-content style1 border p-4 bg-white rounded">
                        <div class="featured-content">
                            <div class="featured-title"><h3>1920</h3></div>
                            <div class="featured-desc"><p>Founded as a small technical training institute with a vision to empower the youth.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-icon-box icon-align-top-content style1 border p-4 bg-white rounded">
                        <div class="featured-content">
                            <div class="featured-title"><h3>1975</h3></div>
                            <div class="featured-desc"><p>Expanded into a full-scale university offering diverse degrees in Science and Arts.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-icon-box icon-align-top-content style1 border p-4 bg-white rounded">
                        <div class="featured-content">
                            <div class="featured-title"><h3>2020</h3></div>
                            <div class="featured-desc"><p>Ranked among top 100 global universities for innovation and student satisfaction.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
