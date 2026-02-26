@extends('layouts.app')

@section('content')
<!-- Banner Slider -->
<!-- Debug: Total Banners = {{ $banners->count() }} -->
<div id="bannerCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="margin-top: 0;">
    <ol class="carousel-indicators">
        @foreach($banners as $index => $banner)
        <li data-target="#bannerCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @forelse($banners as $index => $banner)
        <!-- Debug Banner {{ $index + 1 }}: {{ $banner->image_url }} -->
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            @if($banner->link)
            <a href="{{ $banner->link }}">
                <img src="{{ $banner->image_url }}" class="d-block w-100" alt="Banner {{ $index + 1 }}" style="height: 600px; object-fit: cover;">
            </a>
            @else
            <img src="{{ $banner->image_url }}" class="d-block w-100" alt="Banner {{ $index + 1 }}" style="height: 600px; object-fit: cover;">
            @endif
        </div>
        @empty
        <!-- Debug: No banners found, showing default -->
        <div class="carousel-item active">
            <img src="{{ asset('images/slides/slider-mainbg-001.jpg') }}" class="d-block w-100" alt="Default Banner" style="height: 600px; object-fit: cover;">
        </div>
        @endforelse
    </div>
    <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="site-main">
    <!-- About Us Section -->
    <section class="ttm-row padding_zero-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-white spacing-4">
                        <div class="layer-content">
                            <div class="section-title">
                                <div class="title-header">
                                    <h3>About CSA Education</h3>
                                    <h2 class="title">Best Place for Learning at CSA</h2>
                                </div>
                                <div class="title-desc">
                                    <p>Students who want to learn latest technology based for IT industry, the best place for learning is at CSA. We have huge experience in multimedia and web technologies due to our professionals.</p>
                                    <p>We provide comprehensive computer education and IT training with experienced professionals dedicated to your success.</p>
                                </div>
                            </div>
                            <h3 class="fs-18 mt-35 mb-20">Professional training for successful careers in technology.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12" style="diplay:none">
                    <div class="ttm-bg ttm-col-bgcolor-yes ttm-bgcolor-white box-shadow spacing-5">
                        <div class="layer-content">
                            <div class="ttm-bgcolor-skincolor ttm-box-wrapper">
                                <h3>Verify Your Certificate Online</h3>
                            </div>
                            <div class="spacing-6 text-center">
                                <a href="{{ route('certificates.verify') }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor w-100 mt-5">Verify Certificate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="ttm-row services-section ttm-bgcolor-grey bg-img1 ttm-bg ttm-bgimage-yes clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <div class="section-title">
                        <div class="title-header">
                            <h3>Featured Courses</h3>
                            <h2 class="title">Explore Our Popular Courses</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="featured-imagebox featured-imagebox-course card shadow-sm">
                        <div class="featured-thumbnail">
                            <img class="img-fluid w-100" src="{{ $course->image_url ?? 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $course->title }}" style="height: 250px; object-fit: cover;">
                        </div>
                        <div class="featured-content p-4">
                            <div class="ttm-lp-price text-primary font-weight-bold mb-2">${{ number_format($course->price, 2) }}</div>
                            <div class="featured-title mb-3">
                                <h3 class="h5"><a href="/courses/{{ $course->slug }}" class="text-dark">{{ $course->title }}</a></h3>
                            </div>
                            <div class="ttm-course-box-meta text-muted small">
                                <span class="mr-3"><i class="fa fa-clock-o mr-1"></i> {{ $course->duration }}</span>
                                <span><i class="fa fa-signal mr-1"></i> {{ $course->level }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <a href="/courses" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-darkgrey">View All Courses</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="ttm-row testimonial-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <div class="section-title">
                        <div class="title-header">
                            <h3>Testimonials</h3>
                            <h2 class="title">What Our Students Say</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-box p-4 bg-white shadow-sm rounded">
                        <div class="testimonial-content mb-3">
                            <p class="text-muted">"Student want to learn latest technology based for IT industry the best place for learning at 'CSA'. we have a huge experience in multimedia and web technologies due to our professionals"</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-info">
                                <h5 class="mb-0">GURMAIL SINGH</h5>
                                <span class="text-muted small">PATWARI</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-box p-4 bg-white shadow-sm rounded">
                        <div class="testimonial-content mb-3">
                            <p class="text-muted">"i am very thankful to team CSA for my computer education, i am very sucessful today. GOD Bless All CSA."</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-info">
                                <h5 class="mb-0">Nirmal Singh</h5>
                                <span class="text-muted small">Suvida Centre</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-box p-4 bg-white shadow-sm rounded">
                        <div class="testimonial-content mb-3">
                            <p class="text-muted">"Student want to learn latest technology based for IT industry the best place for learning at 'CSA'. we have a huge experience in multimedia and web technologies due to our professionals"</p>
                        </div>
                        <div class="testimonial-author d-flex align-items-center">
                            <div class="author-info">
                                <h5 class="mb-0">Rajinder Singh</h5>
                                <span class="text-muted small">Inspector PUNSUP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="ttm-row cta-section ttm-bgcolor-skincolor clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-white">
                        <h2 class="text-white mb-3">Ready to Start Your Learning Journey?</h2>
                        <p class="mb-0">Join thousands of successful students who have transformed their careers with our professional training programs.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-right mt-4 mt-lg-0">
                    <a href="{{ route('students.register') }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-white">Register Now</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
