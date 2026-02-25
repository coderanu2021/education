<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{slug}', [CourseController::class, 'show']);
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/verify-certificate', [CertificateController::class, 'verify'])->name('certificates.verify');
Route::post('/api/check-certificate', [CertificateController::class, 'checkCertificate'])->name('certificates.check');
Route::get('/certificates/{certificate}/download', [CertificateController::class, 'download'])->name('certificates.download');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/register', [StudentController::class, 'create'])->name('students.register');
Route::post('/register', [StudentController::class, 'store'])->name('students.store');
Route::get('/about', function () {
    return view('about');
})->name('about');
