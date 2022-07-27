<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\FrontDetailsController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// Route::get('courses', [FrontDetailsController::class, 'AllCourse'])->name('allcourses');
// Route::get('course/{slug}', [FrontDetailsController::class, 'courseDetails'])->name('courseDetails');
// Route::get('foodmenu/{slug}', [FrontDetailsController::class, 'foodmenuDetail'])->name('foodmenudetail');
// Route::get('foodmenutype/{slug}', [FrontDetailsController::class, 'FoodByType'])->name('foodmenutype');
// Route::post('messagestore', [FrontDetailsController::class, 'messagestore'])->name('messagestore');
// Route::get('destination', [FrontDetailsController::class, 'getDestination'])->name('destination');
// Route::get('destination/{slug}', [FrontDetailsController::class, 'courseByDestination'])->name('courseDestination');
// Route::get('category/{slug}', [FrontDetailsController::class, 'courseBycategory'])->name('coursecategory');
// Route::get('level/{slug}', [FrontDetailsController::class, 'courseByProgram'])->name('courselevel');
// Route::get('news', [FrontDetailsController::class, 'getNews'])->name('news');
// Route::get('news/{slug}', [FrontDetailsController::class, 'newsDetails'])->name('newsdetail');
// Route::get('servicedetail/{slug}', [FrontDetailsController::class, 'serviceDetails'])->name('servicedetail');
// Route::get('service/search', [FrontDetailsController::class, 'serviceSearch'])->name('service.search');

// Route::get('course-search', [FrontDetailsController::class, 'courseSearch'])->name('course.search');
// Route::get('food-search', [FrontDetailsController::class, 'foodSearch'])->name('food.search');


// Route::get('team', [FrontDetailsController::class, 'allteam'])->name('allteam');
// Route::get('content/search', [FrontDetailsController::class, 'contentSearch'])->name('content.search');

// Route::get('contentType/{type}', [FrontDetailsController::class, 'ContentBytype'])->name('contenttype');
// Route::get('content/{slug}', [FrontDetailsController::class, 'contentDetails'])->name('contentdetail');
// Route::get('service/{type}', [FrontDetailsController::class, 'ServiceBytype'])->name('servicetype');
// Route::get('testprepration', [FrontDetailsController::class, 'testPrepration'])->name('testprepration');
// Route::get('testprepration/{slug}', [FrontDetailsController::class, 'testPreprationsDetails'])->name('testpreprationsdetails');
// Route::post('testpreprationBooking', [FrontDetailsController::class, 'testprePrationBooking'])->name('testpreprationbooking');


Route::get('/', [FrontController::class, 'index'])->name('index');
// Route::get('{slug}/booking-form',[FrontController::class,'bookingForm'])->name('booking.form');
// Route::post('booking/save',[FrontController::class,'bookingSave'])->name('booking.store');

// Route::post('booking-product/save',[FrontController::class,'bookingProductSave'])->name('bookingproduct.store');
// Route::get('{slug}/booking-product',[FrontController::class,'bookingProductForm'])->name('bookingproduct.form');

// Route::post('booking-course/save',[FrontController::class,'bookingCourseSave'])->name('bookingcourse.store');
// Route::get('shop/{slug}/detail',[FrontController::class,'productDetail'])->name('product.detail');
// Route::get('teacher/{slug}/detail',[FrontController::class,'teacherDetail'])->name('teacher.detail');

// Route::get('{album}/images',[FrontController::class,'imageDetail'])->name('image');


Route::post('subscribe/email', [FrontController::class, 'subscribe'])->name('subscribe');
// Route::get('award/{slug}/list-award',[FrontController::class,'awardList'])->name('award-list');
// Route::get('/{slug}/award-detail',[FrontController::class,'awardDetail'])->name('award-detail');
// Route::get('/{slug}/blog-detail',[FrontController::class,'blogDetail'])->name('blog-detail');
// Route::get('award/search', [FrontController::class, 'awardSearch'])->name('award.search');
// Route::get('blog/search', [FrontController::class, 'blogSearch'])->name('blog.search');

// Route::post('comment/save',[FrontController::class,'commentSave'])->name('comment.save');
// Route::get('comment/{id}',[CommentController::class,'commentStatus'])->name('comment.status');

Route::get('apply/admission-form',[FrontController::class,'admissionform'])->name('admission.form');
Route::get('apply/inquiry-form',[FrontController::class,'inquiryform'])->name('inquiry.form');
Route::get('apply/registration-form',[FrontController::class,'registrationform'])->name('registration.form');

Route::post('apply/form/submit',[FrontController::class,'applyformSubmit'])->name('apply.submit');

Route::get('team-members/{slug}', [FrontController::class, 'teamDetail'])->name('team.detail');
Route::post('home/search', [FrontController::class, 'homeSearch'])->name('home.search');
Route::post('message', [FrontController::class, 'messageSave'])->name('message.store');
Route::post('enroll/course', [FrontController::class, 'enrollCourseSave'])->name('enroll.save');
Route::get('album-images/{album}',[FrontController::class,'imageDetail'])->name('image');
Route::get('course-detail/{album}',[FrontController::class,'courseDetail'])->name('course.detail');
Route::get('blog-detail/{slug}',[FrontController::class,'blogDetail'])->name('blog-detail');
Route::get('blog-category/{slug}',[FrontController::class,'catBlogs'])->name('catBlog');
Route::get('message-from/{slug}',[FrontController::class,'messageDetail'])->name('message');
Route::get('content-view/{content}', [CategoryController::class, 'page'])->name('page');
Route::get('{category}', [CategoryController::class, 'category'])->name('category');
Route::get('feature/{slug}',[FrontController::class,'featureDetail'])->name('feature.detail');

Route::get('list/{slug}', [FrontController::class, 'lists'])->name('list');
Route::get('view-{type}/{slug}', [CategoryController::class, 'courseAndMessage'])->name('courseAndMessage');
