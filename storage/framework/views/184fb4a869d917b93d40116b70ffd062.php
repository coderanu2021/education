<?php $__env->startSection('content'); ?>
<!-- Banner Slider -->
<!-- Debug: Total Banners = <?php echo e($banners->count()); ?> -->
<div id="bannerCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="margin-top: 0;">
    <ol class="carousel-indicators">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <li data-target="#bannerCarousel" data-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>"></li>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </ol>
    <div class="carousel-inner">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <!-- Debug Banner <?php echo e($index + 1); ?>: <?php echo e($banner->image_url); ?> -->
        <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($banner->link): ?>
            <a href="<?php echo e($banner->link); ?>">
                <img src="<?php echo e($banner->image_url); ?>" class="d-block w-100" alt="Banner <?php echo e($index + 1); ?>" style="height: 600px; object-fit: cover;">
            </a>
            <?php else: ?>
            <img src="<?php echo e($banner->image_url); ?>" class="d-block w-100" alt="Banner <?php echo e($index + 1); ?>" style="height: 600px; object-fit: cover;">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <!-- Debug: No banners found, showing default -->
        <div class="carousel-item active">
            <img src="<?php echo e(asset('images/slides/slider-mainbg-001.jpg')); ?>" class="d-block w-100" alt="Default Banner" style="height: 600px; object-fit: cover;">
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
    <section class="ttm-row padding_zero-section clearfix" style="padding: 60px 0;">
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
                                    <p>CSA  [COMPUTER SOFTWARE ACADEMY] institute of computer education was established in 2005 with a vision to provide training to budding IT professional & helping them choose the right career. Our motive is to make all class of people Computer literate and take all possible advantages to make their future much brighter.  Our training opens doors to exciting careers in computer streams like as data entry operators, accountants, computer hardware's, computer typist ,computer operator and computer networking. CSA main motive is provide 100% practical training in computer applications. A student will get 6 hrs a week classes out of which 70% will be practical and 30% theory. A student can get as much extra time on computers, as convenient and require .Thousands of students have already trained professionally and made their successful career in the past years.And settled in Government and private jobs.</p>
                                </div>
                            </div>
                            <h3 class="fs-18 mt-35 mb-20">Professional training for successful careers in technology.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="timeline-wrapper">
                        <div class="timeline-header text-center mb-4">
                            <h3 class="timeline-title">Our Journey</h3>
                            <p class="timeline-subtitle">Milestones of Excellence</p>
                        </div>
                        <div class="timeline-container">
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <div class="timeline-year">2005</div>
                                    <h4>Foundation</h4>
                                    <p>CSA Education established with a vision to empower students with computer education and professional IT training</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <div class="timeline-year">2015</div>
                                    <h4>1000+ Students</h4>
                                    <p>Successfully trained over 1000 students in various IT courses with excellent placement records</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-dot"></div>
                                <div class="timeline-content">
                                    <div class="timeline-year">2026</div>
                                    <h4>Innovation & Excellence</h4>
                                    <p>Leading the way with cutting-edge technology courses, industry partnerships, and digital certification programs</p>
                                </div>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="featured-imagebox featured-imagebox-course card shadow-sm" style="background-color: #ffffff; border: 1px solid #e0e0e0;">
                        <div class="featured-thumbnail">
                            <img class="img-fluid w-100" src="<?php echo e($course->image_url ?? 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&q=80&w=800'); ?>" alt="<?php echo e($course->title); ?>" style="height: 250px; object-fit: cover;">
                        </div>
                        <div class="featured-content p-4" style="background-color: #ffffff;">
                            <div class="ttm-lp-price font-weight-bold mb-2" style="background-color: #F96D17; color: #ffffff; padding: 8px 16px; border-radius: 5px; display: inline-block;">$<?php echo e(number_format($course->price, 2)); ?></div>
                            <div class="featured-title mb-3">
                                <h3 class="h5"><a href="/courses/<?php echo e($course->slug); ?>" style="color: #0F1B31;"><?php echo e($course->title); ?></a></h3>
                            </div>
                            <div class="ttm-course-box-meta text-muted small">
                                <span class="mr-3"><i class="fa fa-clock-o mr-1"></i> <?php echo e($course->duration); ?></span>
                                <span><i class="fa fa-signal mr-1"></i> <?php echo e($course->level); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <a href="/courses" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-darkgrey" style="color:#fff;">View All Courses</a>
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
                    <a href="<?php echo e(route('students.register')); ?>" class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-white" style="background:#0F1B31;">Register Now</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\wamp64\www\education\resources\views/home.blade.php ENDPATH**/ ?>