<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SensorController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PublicMessageController;
use App\Http\Controllers\Admin\MessageSendingController;
use App\Http\Controllers\Customer\OrderCancelController;
use App\Http\Controllers\Customer\CustomerController as CustomerCustomerController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\SearchController;

// use GuzzleHttp\Middleware;



// Route::get('/', function () {
//     return view('welcome');
// });

// optimiZe
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return 'DONE'; //Return anything
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/photo-gallery',[HomeController::class,'gallery'])->name('gallery');
Route::get('/video-gallery',[HomeController::class,'video'])->name('video');
Route::get('/management',[HomeController::class,'management'])->name('management');
Route::get('/company-information',[HomeController::class,'companyInfo'])->name('companyInfo');
Route::get('/welcome-note',[HomeController::class,'welcomeNote'])->name('welcomeNote');
Route::get('/our-speciality',[HomeController::class,'ourSpeciality'])->name('ourSpeciality');
Route::get('/client-list',[HomeController::class,'clientList'])->name('clientList');
Route::get('/news-event',[HomeController::class,'newsEvent'])->name('newsEvent');
Route::get('/news-event-details/{id}',[HomeController::class,'newsEventDetails'])->name('newsEventDetails');
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');

//policy
Route::get('return-policy',[HomeController::class,'return'])->name('return.policy');

Route::get('/another-branch/{id}', [HomeController::class, 'anotherBranch'])->name('another.branch');
//brand wise
Route::get('brand-product/{id}',[HomeController::class,'brandProduct'])->name('brand.product');
Route::post('track-order',[HomeController::class,'orderTrack'])->name('track.order');

Route::get('/all-product', [HomeController::class, 'product'])->name('product.all');
Route::get('/product-list/{slug}', [HomeController::class, 'productList'])->name('product.list');
Route::get('/product-list-category/{id}', [HomeController::class, 'productCategory'])->name('product.category');
//category wise
Route::get('/category-wise/{slug}', [HomeController::class, 'categoryWise'])->name('category.wise');
Route::get('/product-details/{slug}', [HomeController::class, 'ProductDetails'])->name('product.detail');
//cart

Route::get('all-brand',[HomeController::class,'brand'])->name('all.brand');

Route::get('all-sub-subcategorylist/{id}',[HomeController::class,'getAllsubsubcategory'])->name('allSubsubcategory');

Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('contact.store');


// serarch route
Route::get('/search', [HomeController::class, 'productSearch'])->name('search');
Route::get('/product/search', [HomeController::class, 'search'])->name('search.product');
Route::post('/product/search', [HomeController::class, 'search'])->name('search.product');
Route::post('/product/get', [HomeController::class, 'productGet'])->name('get.product');
Route::get('/single-product/{slug}',[HomeController::class,'singleProduct'])->name('single.product');

Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/service-details/{slug}', [HomeController::class, 'serviceDetails'])->name('service.details');

// booking
Route::get('/booking-now/{id}', [BookingController::class, 'booking'])->name('booking.now');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');




// admin all route
require __DIR__ . '/admin.php';

// customer all route
require __DIR__ . '/customer.php';


