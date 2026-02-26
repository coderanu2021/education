@extends('layouts.app')

@section('content')
<!-- page-title -->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title">Verify Certificate</h2>
                    </div>
                    <div class="breadcrumb-wrapper">
                        <span>
                            <i class="ti ti-home"></i>
                            <a title="Homepage" href="/">Home</a>
                        </span>
                        <span>Verify Certificate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>
<!-- page-title end -->

<div class="site-main">
    <section class="ttm-row verify-section clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-5 border rounded shadow-sm">
                        <div class="section-title text-center">
                            <div class="title-header">
                                <h3>Portal</h3>
                                <h2 class="title">Verify Student Certificate</h2>
                            </div>
                            <div class="title-desc">
                                <p>Enter the unique certificate code provided on the certificate to verify its authenticity and download a digital copy.</p>
                            </div>
                        </div>

                        <form action="{{ route('certificates.verify') }}" method="GET" class="mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" name="code" class="form-control form-control-lg pl-4 pr-5 rounded-pill border-2" placeholder="Enter Certificate Code (e.g. CERT-XXXXXX)" value="{{ request('code') }}" required style="height: 60px; border-color: #F96D17;">
                                        <button type="submit" class="btn position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #F96D17;">
                                            <i class="fa fa-search fs-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if(request()->has('code'))
                            <div class="mt-5">
                                @if($certificate)
                                    <div class="alert alert-success border-0 ttm-bgcolor-skincolor text-white p-4 rounded d-flex align-items-center animate__animated animate__fadeIn">
                                        <div class="fs-1 mr-4"><i class="fa fa-check-circle"></i></div>
                                        <div>
                                            <h4 class="text-white mb-1">Certificate Verified!</h4>
                                            <p class="mb-0">This certificate is valid and was issued to <strong>{{ $certificate->student_name }}</strong> for the course <strong>{{ $certificate->course->title }}</strong>.</p>
                                        </div>
                                    </div>

                                    <div class="card mt-4 border-0 shadow-sm rounded overflow-hidden">
                                        <div class="ttm-bgcolor-darkgrey text-white p-3">
                                            <h5 class="mb-0 px-3">Certificate Details</h5>
                                        </div>
                                        <div class="card-body p-4 ttm-bgcolor-grey">
                                            <div class="row">
                                                <div class="col-sm-6 mb-3">
                                                    <p class="text-muted mb-0">Student Name</p>
                                                    <p class="h5">{{ $certificate->student_name }}</p>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <p class="text-muted mb-0">Course Title</p>
                                                    <p class="h5">{{ $certificate->course->title }}</p>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <p class="text-muted mb-0">Certificate Code</p>
                                                    <p class="h5 text-primary">{{ $certificate->certificate_code }}</p>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <p class="text-muted mb-0">Issue Date</p>
                                                    <p class="h5">{{ \Carbon\Carbon::parse($certificate->issue_date)->format('F d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <a href="{{ route('certificates.download', $certificate) }}" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor">
                                                    <i class="fa fa-download mr-2"></i> Download Digital PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger border-0 bg-danger text-white p-4 rounded d-flex align-items-center animate__animated animate__shakeX">
                                        <div class="fs-1 mr-4"><i class="fa fa-times-circle"></i></div>
                                        <div>
                                            <h4 class="text-white mb-1">Invalid Certificate</h4>
                                            <p class="mb-0">The code you entered does not match any certificate in our system. Please check the code and try again.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
