@extends('layouts.app')

@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">{{ $course->title }}</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <i class="ti ti-home"></i>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span><a href="/courses">Courses</a></span>
                        <span>{{ $course->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<!-- page-title end -->

<div class="site-main">
    <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 content-area">
                    <article class="course single-lp_course">
                        <div class="ttm-course-single-content">
                            <div class="ttm-single-course-box mb-4">
                                <img class="img-fluid w-100 rounded shadow-sm mb-4" src="{{ $course->image_url ?? 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $course->title }}" style="max-height: 500px; object-fit: cover;">
                                
                                <ul class="ttm-coursedetails-box d-flex flex-wrap justify-content-between p-4 ttm-bgcolor-grey rounded">
                                    <li class="ttm-meta-line py-2"> 
                                        <strong>Level</strong> {{ $course->level }}
                                    </li>
                                    <li class="ttm-meta-line py-2"> 
                                        <strong>Duration</strong> {{ $course->duration }}
                                    </li>
                                    <li class="ttm-meta-line py-2"> 
                                        <strong>Price</strong> ${{ number_format($course->price, 2) }}
                                    </li>
                                    <li class="ttm-meta-line py-2"> 
                                        <div class="lp-course-buttons">
                                            <a href="{{ route('contact.show') }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor">Enroll Now</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="ttm-tabs course-tabs" data-effect="fadeIn">
                                <ul class="tabs clearfix">
                                    <li class="tab active"><a href="javascript:void(0)">Overview</a></li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner active p-4 border rounded">
                                        <h4>About This Course</h4>
                                        <div class="course-description mb-5">
                                            {!! $course->description !!}
                                        </div>

                                        @if($course->features && count($course->features) > 0)
                                        <h4 class="mt-4">What You Will Learn?</h4>
                                        <ul class="ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor mb-4">
                                            @foreach($course->features as $feature)
                                            <li><i class="fa fa-check-circle"></i><span class="ttm-list-li-content">{{ $feature['feature'] ?? $feature }}</span></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-xl-3 col-lg-4 widget-area sidebar-right">
                    <aside class="widget widget-download border p-4 rounded mb-4">
                        <h3 class="widget-title h5 mb-3">Quick Info</h3>
                        <ul class="download-list list-unstyled">
                            <li class="mb-2"><i class="fa fa-clock-o mr-2 text-primary"></i> <strong>Duration:</strong> {{ $course->duration }}</li>
                            <li class="mb-2"><i class="fa fa-signal mr-2 text-primary"></i> <strong>Level:</strong> {{ $course->level }}</li>
                            <li class="mb-2"><i class="fa fa-money mr-2 text-primary"></i> <strong>Price:</strong> ${{ number_format($course->price, 2) }}</li>
                        </ul>
                    </aside>

                    <aside class="widget contact-widget border p-4 rounded">
                        <h3 class="widget-title h5 mb-3">Need Help?</h3>      
                        <ul class="contact-widget-wrapper list-unstyled">
                            <li class="mb-2"><i class="fa fa-phone mr-2 text-primary"></i> +1 (800) 123-4567</li>
                            <li><i class="fa fa-envelope-o mr-2 text-primary"></i> <a href="mailto:info@uniaro.com">info@uniaro.com</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
