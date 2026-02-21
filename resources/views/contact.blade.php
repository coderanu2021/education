@extends('layouts.app')

@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Contact Us</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <i class="ti ti-home"></i>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span>Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<!-- page-title end -->

<div class="site-main">
    <section class="ttm-row contact-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ttm-bgcolor-grey p-5 rounded h-100">
                        <div class="section-title">
                            <div class="title-header">
                                <h3>Get In Touch</h3>
                                <h2 class="title">Contact Details</h2>
                            </div>
                        </div>
                        <ul class="contact-widget-wrapper list-unstyled">
                            <li class="mb-4 d-flex">
                                <i class="fa fa-map-marker text-primary fs-3 mr-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Location</h5>
                                    <p>207 South Chestnut Lane Staten Island, NY 10301</p>
                                </div>
                            </li>
                            <li class="mb-4 d-flex">
                                <i class="fa fa-envelope-o text-primary fs-3 mr-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Email Address</h5>
                                    <p><a href="mailto:info@uniaro.com">info@uniaro.com</a></p>
                                </div>
                            </li>
                            <li class="mb-4 d-flex">
                                <i class="fa fa-phone text-primary fs-3 mr-3 mt-1"></i>
                                <div>
                                    <h5 class="mb-1">Phone Number</h5>
                                    <p>+1 (800) 123-4567</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5 border rounded h-100">
                        @if(session('success'))
                            <div class="alert alert-success border-0 ttm-bgcolor-skincolor text-white mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form id="contact-form" class="contact-form" method="post" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required value="{{ old('name') }}">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required value="{{ old('email') }}">
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group mb-4">
                                <textarea name="message" rows="5" class="form-control" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
