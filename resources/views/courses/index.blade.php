@extends('layouts.app')

@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">All Courses</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <i class="ti ti-home"></i>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span>Courses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<!-- page-title end -->

<div class="site-main">
    <section class="ttm-row grid-section clearfix">
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                <div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-imagebox-course -->
                    <div class="featured-imagebox featured-imagebox-course card shadow-sm" style="background-color: #ffffff; border: 1px solid #e0e0e0;">
                        <div class="featured-thumbnail"> 
                            <img class="img-fluid w-100" src="{{ $course->image_url ?? 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $course->title }}" style="height: 250px; object-fit: cover;"> 
                        </div>
                        <div class="featured-content p-4" style="background-color: #ffffff;">
                            <div class="ttm-lp-price font-weight-bold mb-2" style="background-color: #F96D17; color: #ffffff; padding: 8px 16px; border-radius: 5px; display: inline-block;">${{ number_format($course->price, 2) }}</div>
                            <div class="featured-title mb-3">
                                <h3 class="h5"><a href="/courses/{{ $course->slug }}" style="color: #0F1B31;">{{ $course->title }}</a></h3>
                            </div>
                            <div class="ttm-course-box-meta text-muted small">
                                <span class="mr-3"><i class="fa fa-clock-o mr-1"></i> {{ $course->duration }}</span>
                                <span><i class="fa fa-signal mr-1"></i> {{ $course->level }}</span>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-course end-->
                </div>
                @endforeach
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-12">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
