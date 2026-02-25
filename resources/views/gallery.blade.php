@extends('layouts.app')

@section('title', 'Gallery - CSA Education')

@section('content')
<!-- Page Title -->
<div class="ttm-page-title-row" style="background: linear-gradient(135deg, #1db6c5 0%, #001848 100%); padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box text-center">
                    <div class="page-title-heading">
                        <h1 class="title" style="color: white; font-size: 48px; margin-bottom: 10px;">Gallery</h1>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span style="color: rgba(255,255,255,0.8);">
                            <a href="/" style="color: white;">Home</a> / Gallery
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="site-main">
    <section class="ttm-row clearfix" style="padding: 80px 0;">
        <div class="container">
            @if($galleries->count() > 0)
            <div class="row">
                @foreach($galleries as $gallery)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="gallery-item" style="position: relative; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                        <a href="{{ asset($gallery->image) }}" data-lightbox="gallery" data-title="{{ $gallery->title }}">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 300px; object-fit: cover; display: block;">
                            <div class="gallery-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: flex-end; padding: 20px;">
                                <div style="color: white;">
                                    <h4 style="margin: 0 0 5px 0; font-size: 18px;">{{ $gallery->title }}</h4>
                                    @if($gallery->description)
                                    <p style="margin: 0; font-size: 14px; opacity: 0.9;">{{ Str::limit($gallery->description, 60) }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-12 text-center" style="padding: 60px 0;">
                    <i class="fa fa-image" style="font-size: 80px; color: #1db6c5; margin-bottom: 20px;"></i>
                    <h3 style="color: #001848; margin-bottom: 10px;">No Gallery Images Yet</h3>
                    <p style="color: #666;">Check back soon for our latest photos and updates!</p>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

<style>
.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-item a {
    display: block;
    position: relative;
}
</style>

<!-- Lightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endsection

@section('extra_js')
<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2'
    });
</script>
@endsection
