<?php

use App\Models\Blog;
use App\Models\Team;
use App\Models\User;
use App\Models\Course;
use App\Models\Partners;
use App\Models\Subscribers;
use App\Models\MailMessages;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\PartnersController;

use App\Http\Controllers\SubscribersController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\MailMessagesController;
use App\Http\Controllers\CoureseCategoryController;
use App\Http\Controllers\EnrollCourseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\StudentFormController;

// use App\Http\Controllers\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Backend
Route::get('/dashboard', function () {
    $users_count = User::all()->count();
    $team = Team::all()->count();
    $partners = Partners::latest()->take(10)->get();
    $partners_count = Partners::count();
    $subscribers = Subscribers::latest()->take(10)->get();
    $messages = MailMessages::latest()->take(5)->get();
    $courses = Course::count();
    $blogs = Blog::blog()->count();
    return view('backend.dashboard', compact('courses','blogs','messages', 'partners','team', 'subscribers', 'users_count'));
})->name('dashboard')->middleware(['auth:sanctum', 'verified']);

Route::group(['prefix' => 'admin'], function () {

    // Route::resource('product-category',ProductCategoryController::class)->middleware('auth');
    Route::resource('setting', SettingController::class)->middleware(['auth:sanctum', 'verified']);
    Route::get('socialMedia', [SettingController::class, 'socialMedia'])->name('socialMedia')->middleware(['auth:sanctum', 'verified']);
    Route::get('aboutUs', [SettingController::class, 'aboutUs'])->name('aboutUs')->middleware(['auth:sanctum', 'verified']);
    // Route::resource('services', ServicesController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('service-type', ServiceTypeController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('booking', BookingController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('booking-product', ProductBookingController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('booking-course', CourseBookingController::class)->middleware(['auth:sanctum', 'verified']);


    // Route::resource('brand', BrandController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('series', SeriesController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::resource('products', ProductController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('slider', SliderController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('menu', MenuController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('enroll-course', EnrollCourseController::class)->middleware(['auth:sanctum', 'verified']);

    Route::resource('food-menu', FoodMenuController ::class)->middleware(['auth:sanctum', 'verified']);
    // Route::post('food-menu-type', [FoodMenuController::class,'foodMenuType'])->middleware('auth')->name('foodMenuType.create');
    // Route::post('menu-food-type', [FoodMenuController::class,'menuFoodType'])->middleware('auth')->name('menuFoodType.create');

    // Route::get('foodmenu-type', [FoodMenuController::class,'FoodAndMenu'])->middleware('auth')->name('foodmenu-type');
    // Route::delete('foodmenu-type/{id}', [FoodMenuController::class,'fmenuDelete'])->middleware('auth')->name('fmenu.delete');
    // Route::delete('menufood-type/{id}', [FoodMenuController::class,'mfoodDelete'])->middleware('auth')->name('mfood.delete');



    Route::post('team-type', [TeamController::class,'teamType'])->middleware('auth')->name('teamType.create');
    Route::get('team-type', [TeamController::class,'teamTypeIndex'])->middleware('auth')->name('teamType.index');
    Route::delete('team-type/{id}', [TeamController::class,'teamTypeDestroy'])->middleware('auth')->name('teamType.destroy');


    Route::get('menu/link/course', [MenuController::class, 'menuLinkCourse'])->name('menuLinkCourse');

    Route::post('saveMenuCategory', [MenuController::class, 'create_menuCategory'])->name('saveMenuCategory')->middleware(['auth:sanctum', 'verified']);

    Route::resource('partner', PartnersController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('news', NewsController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('notices', NoticeController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('popup', PopupController::class)->middleware(['auth:sanctum', 'verified']);

    // Route::resource('coursecategory', CoureseCategoryController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('content', ContentController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('users', UserController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('team', TeamController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::post('team/search', [TeamController::class, 'teamsearch'])->name('team.search')->middleware(['auth:sanctum', 'verified']);
    Route::resource('testimonial', TestimonialController::class)->middleware(['auth:sanctum', 'verified']);
    Route::post('testimonial/search', [TestimonialController::class, 'testimonialSearch'])->name('testimonial.search')->middleware(['auth:sanctum', 'verified']);
    Route::resource('message', MailMessagesController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('album', AlbumController::class)->middleware(['auth:sanctum', 'verified']);
    Route::delete('albumImage/{id}', [AlbumController::class, 'deleteAlbumImage'])->name('deleteAlbumImage');
    // Route::get('getSeries/{id}', [BrandController::class, 'getSeries'])->name('getSeries');
    // Route::delete('productimage/{id}', [ProductController::class, 'deleteproductimage'])->name('deleteproductimage');
    // Route::resource('plantype', PlanTypeController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::post('plantype/search', [PlanTypeController::class, 'plantypesearch'])->name('plantype.search')->middleware(['auth:sanctum', 'verified']);
    // Route::resource('pricing', PricingController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::post('pricing/search', [PricingController::class, 'pricingsearch'])->name('pricing.search')->middleware(['auth:sanctum', 'verified']);

    Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index')->middleware(['auth:sanctum', 'verified']);
    Route::delete('subscribers/delete/{id}', [SubscribersController::class, 'destroy'])->name('subscribers.destroy');

    Route::resource('student-inquiry',StudentformController::class)->middleware(['auth:sanctum', 'verified']);
    Route::get('student-admission',[StudentformController::class,'admissionIndex'])->name('admission.index')->middleware(['auth:sanctum', 'verified']);
    Route::get('student-admission/{id}',[StudentformController::class,'admissionShow'])->name('admission.show')->middleware(['auth:sanctum', 'verified']);

    Route::get('student-registration',[StudentformController::class,'registrationIndex'])->name('registration.index')->middleware(['auth:sanctum', 'verified']);
    Route::get('student-registration/{id}',[StudentformController::class,'registrationShow'])->name('registration.show')->middleware(['auth:sanctum', 'verified']);

    // Route::post('subscribers', [SubscribersController::class, 'store'])->name('subscribers.store');
    // Route::resource('extra', ExtraController::class)->middleware(['auth:sanctum', 'verified'])->only('index', 'update', 'edit');
    // Route::resource('learns', LearnController::class)->middleware(['auth:sanctum', 'verified']);
    // Route::get('testbooking', [LearnController::class, 'getBookedtestPreparation'])->name('testbooking')->middleware(['auth:sanctum', 'verified']);

    //choose us home page
    // Route::resource('choose', ChooseUsController::class)->middleware(['auth:sanctum', 'verified']);

    //student story home page
    // Route::resource('student', StudentStoryController::class)->middleware(['auth:sanctum', 'verified']);

    //Destination
    // Route::get('destination', [DestinationController::class, 'index'])->name('destination.index')->middleware(['auth:sanctum', 'verified']);
    // Route::get('destination/create', [DestinationController::class, 'create'])->name('destination.create')->middleware(['auth:sanctum', 'verified']);
    // Route::post('destination/store', [DestinationController::class, 'store'])->name('destination.store')->middleware(['auth:sanctum', 'verified']);
    // Route::get('destination/edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit')->middleware(['auth:sanctum', 'verified']);
    // Route::post('destination/update/{id}', [DestinationController::class, 'update'])->name('destination.update')->middleware(['auth:sanctum', 'verified']);
    // Route::delete('destination/delete/{id}', [DestinationController::class, 'delete'])->name('destination.delete')->middleware(['auth:sanctum', 'verified']);

    //level
    // Route::get('level', [CourseLevelController::class, 'index'])->name('level.index')->middleware(['auth:sanctum', 'verified']);
    // Route::get('level/create', [CourseLevelController::class, 'create'])->name('level.create')->middleware(['auth:sanctum', 'verified']);
    // Route::post('level/store', [CourseLevelController::class, 'store'])->name('level.store')->middleware(['auth:sanctum', 'verified']);
    // Route::get('level/edit/{id}', [CourseLevelController::class, 'edit'])->name('level.edit')->middleware(['auth:sanctum', 'verified']);
    // Route::post('level/update/{id}', [CourseLevelController::class, 'update'])->name('level.update')->middleware(['auth:sanctum', 'verified']);
    // Route::delete('level/delete/{id}', [CourseLevelController::class, 'delete'])->name('level.delete')->middleware(['auth:sanctum', 'verified']);
    // Route::resource('awards', AwardController::class)->middleware(['auth']);
    // Route::resource('award-category', AwardCategoryController::class)->middleware(['auth']);
    // Route::resource('portfolio', PortfolioController::class)->middleware('auth');

    Route::resource('blog-category',BlogCategoryController::class)->middleware(['auth']);
    Route::resource('blogs',BlogController::class)->middleware(['auth']);
    // Route::resource('comment',CommentController::class)->middleware(['auth']);
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });
    Route::resource('course-category', CoureseCategoryController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('courses', CourseController::class)->middleware(['auth:sanctum', 'verified']);
    Route::resource('features', FeatureController::class)->middleware(['auth:sanctum', 'verified']);

});

Route::post('updateMenu', [MenuController::class, 'updateMenuOrder'])->name('updateMenuOrder');
Route::post('updateMember', [TeamController::class, 'updateMemberOrder'])->name('updateMemberOrder');


// Frontend



