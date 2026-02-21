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
                    <div class="featured-imagebox featured-imagebox-course">
                        <div class="featured-thumbnail"> 
                            <img class="img-fluid w-100" src="{{ \Illuminate\Support\Str::startsWith($course->image, ['http://', 'https://']) ? $course->image : ($course->image ? asset('storage/' . $course->image) : 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800') }}" alt="{{ $course->title }}" style="height: 250px; object-fit: cover;"> 
                        </div>
                        <div class="featured-content p-4">
                            <div class="ttm-lp-price text-primary font-weight-bold mb-2">${{ number_format($course->price, 2) }}</div>
                            <div class="featured-title mb-3">
                                <h3 class="h5"><a href="/courses/{{ $course->slug }}">{{ $course->title }}</a></h3>
                            </div>
                            <div class="ttm-course-box-meta text-muted small">
                                <div class="ttm-enrolled">
                                    <span class="ttm-lessons ttm-meta-line mr-3"><i class="fa fa-clock-o mr-1"></i> {{ $course->duration }}</span>
                                    <span class="ttm-students ttm-meta-line"><i class="fa fa-signal mr-1"></i> {{ $course->level }}</span>
                                </div>  
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
