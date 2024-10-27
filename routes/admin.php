<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AnswarController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PagelistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PublicMessageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MessageSendingController;
use App\Http\Controllers\Admin\OriginController;
use App\Http\Controllers\SubsubcategoryController;

Route::get('/login',[AuthController::class, 'loginShow'])->name('login');


Route::post('/login',[AuthController::class, 'authCheck'])->name('login.check');


Route::group(['middleware' => ['auth']] , function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/invoice/{id}',[InvoiceController::class, 'invoice'])->name('invoice.admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');
    // customer prefix
    Route::prefix('customer')->group(function(){
        //customer route
            Route::get('customer',[CustomerController::class,'index'])->name('customer');
            Route::get('customer/all',[CustomerController::class,'allData'])->name('customer.all');
            Route::post('customer/store',[CustomerController::class,'store'])->name('customer.store');
            Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
            Route::post('customer/update/',[CustomerController::class,'update'])->name('customer.update');
            Route::get('customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
            Route::get('/pending/customer',[CustomerController::class,'pending'])->name('customer.pending');
            Route::get('/customer-list',[CustomerController::class,'customerList'])->name('customer.list');
            Route::get('/active/customer/{id}',[CustomerController::class,'customerActive'])->name('customer.active');
            Route::get('/deactive/customer/{id}',[CustomerController::class,'customerDeactive'])->name('customer.deactive');

    });


    Route::prefix('product')->group(function(){

        // category route
        Route::get('/category',[CategoryController::class,'index'])->name('category.index');
        Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/category/edit/{slug}',[CategoryController::class,'edit'])->name('category.edit');
        Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::delete('/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
        Route::get('/category-on-quote/{id}',[CategoryController::class,'required'])->name('quote.required');
        Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');

         // category route
         Route::get('/add-origin',[OriginController::class,'index'])->name('origin.index');
         Route::post('/origin/store',[OriginController::class,'store'])->name('origin.store');
         Route::get('/origin/edit/{slug}',[OriginController::class,'edit'])->name('origin.edit');
         Route::put('/origin/update/{id}',[OriginController::class,'update'])->name('origin.update');
         Route::delete('/origin/{id}',[OriginController::class,'destroy'])->name('origin.destroy');

         // category route
         Route::get('/subcategory',[SubcategoryController::class,'index'])->name('subcategory.index');
         Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');
         Route::get('/subcategory/edit/{slug}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
         Route::put('/subcategory/update/{id}',[SubcategoryController::class,'update'])->name('subcategory.update');
         Route::delete('/subcategory/{id}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');

         // brand resource route
         Route::resource('/brand',BrandController::class)->except('create','show');

        Route::get('/subcategory-list', [SubcategoryController::class, 'list'])->name('subcategory.list');
        // product route dfsdfs
        Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');



        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/product/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        // update
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        // remove other image
        Route::delete('/remove-other-image/{id}', [ProductController::class, 'removeImage'])->name('remove.image');

        // product feature remove
        Route::delete('/feature-remove/{id}',[ProductController::class,'featureRemove'])->name('feature.remove');

    });
    // Website related all route here
    Route::prefix('website-content')->group(function(){

        Route::get('/welcome',[ContentController::class,'welcome'])->name('welcome.note');
        Route::post('/welcome/update/{company}',[ContentController::class,'welcomeUpdate'])->name('welcome.update');

        Route::get('/company/service',[ContentController::class,'service'])->name('company.service');

        // banner route
        Route::get('/banner',[BannerController::class,'index'])->name('company.banner');
        Route::get('/banner/allDtata',[BannerController::class,'allData'])->name('banner.all');
        Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
        Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
        Route::post('/banner/update',[BannerController::class,'update'])->name('banner.update');
        Route::get('/banner/delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');

        // about us route
        Route::get('/about-us',[ContentController::class,'aboutUs'])->name('about.us');
        Route::post('/about/update/{company}',[ContentController::class,'aboutUpdate'])->name('about.update');

        // company_info route
        Route::get('/add-company-info',[ContentController::class,'companyInfo'])->name('company_info');
        Route::post('/company-info/update/{company}',[ContentController::class,'companyInfoUpdate'])->name('companyInfo.update');

        // mission vission route
        Route::get('/mission/vision',[ContentController::class,'mission'])->name('mission');
        Route::post('/mission/vision/update',[ContentController::class,'missionUpdate'])->name('mission.update');

        // refund route
        Route::get('/refund',[ContentController::class,'refund'])->name('refund');
        Route::post('/refund/update',[ContentController::class,'refundUpdate'])->name('refund.update');

        // export processing route
        Route::get('/add-export-processing',[ContentController::class,'exportProcessing'])->name('export_processing');
        Route::post('/export/update',[ContentController::class,'exportUpdate'])->name('export.update');


        // refund route
        Route::get('/add-our-spaciality',[ContentController::class,'ourSpaciality'])->name('our.spaciality');

        // faq route
        Route::get('admin-faq',[FaqController::class,'index'])->name('faq.index');
        Route::post('admin-faq-store',[FaqController::class,'store'])->name('faq.store');
        Route::get('admin-faq-edit/{id}',[FaqController::class,'edit'])->name('faq.edit');
        Route::post('admin-faq-update/{id}',[FaqController::class,'update'])->name('faq.update');
        Route::post('admin-faq-delete/{id}',[FaqController::class,'delete'])->name('faq');

        // Event route
        Route::get('admin-event',[BlogController::class,'index'])->name('event.index');
        Route::post('admin-event-store',[BlogController::class,'store'])->name('event.store');
        Route::get('admin-event-edit/{id}',[BlogController::class,'edit'])->name('event.edit');
        Route::put('admin-event-update/{id}',[BlogController::class,'update'])->name('event.update');
        Route::delete('admin-event-delete/{id}',[BlogController::class,'delete'])->name('event.delete');



        // video route resource
        Route::resource('/video', VideoController::class)->except('create', 'show');

        Route::get('/video-gallery/add',[VideoController::class,'index'])->name('video-gallery.index');
        Route::post('/video-gallery/store',[VideoController::class,'store'])->name('video-gallery.store');
        Route::get('/video-gallery/edit/{id}',[VideoController::class,'edit'])->name('video-gallery.edit');
        Route::put('/video-gallery/update/{id}',[VideoController::class,'update'])->name('video-gallery.update');
        Route::delete('/video-gallery/delete/{id}',[VideoController::class,'destroy'])->name('video-gallery.delete');

        Route::get('/service-add',[ServiceController::class,'index'])->name('service.index');
        Route::post('/service-store',[ServiceController::class,'store'])->name('serviceStore');
        Route::get('/service-edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
        Route::put('/service-update/{id}',[ServiceController::class,'update'])->name('service.update');
        Route::delete('/service-delete-item/{id}',[ServiceController::class,'destroy'])->name('serviceDelete');

        Route::get('/subcategory/list/{id}', [ServiceController::class, 'getSubcategory'])->name('subcategory.list');



        // photo gallery route resource
        Route::resource('/photo-gallery', PhotoGalleryController::class)->except('create', 'show');

        Route::post('/photo-gallery/store',[PhotoGalleryController::class,'store'])->name('photo-gallery.store');
        Route::get('/photo-gallery/edit/{id}',[PhotoGalleryController::class,'edit'])->name('photo-gallery.edit');
        Route::put('/photo-gallery/update/{id}',[PhotoGalleryController::class,'update'])->name('photo-gallery.update');
        Route::delete('/photo-gallery/delete/{id}',[PhotoGalleryController::class,'destroy'])->name('photo-gallery.delete');



        // Management route resource
        Route::get('/management',[ManagementController::class,'index'])->name('management.index');
        Route::post('/management/store',[ManagementController::class,'store'])->name('management.store');
        Route::get('/management/edit/{management}',[ManagementController::class,'edit'])->name('management.edit');
        Route::put('/management/update/{management}',[ManagementController::class,'update'])->name('management.update');
        Route::delete('/management/{management}',[ManagementController::class,'destroy'])->name('management.destroy');



        //AdController Route
        Route::get('/ad',[AdController::class,'index'])->name('ad.index');
        Route::post('/ad/store',[AdController::class,'store'])->name('ad.store');
        Route::get('/ad/edit/{team}',[AdController::class,'edit'])->name('ad.edit');
        Route::put('/ad/update/{team}',[AdController::class,'update'])->name('ad.update');
        Route::delete('/ad/{team}',[AdController::class,'destroy'])->name('ad.destroy');
        Route::get('/ad/active/{id}',[AdController::class,'active'])->name('ad.active');

         //Partner Route
        Route::get('/partner',[PartnerController::class,'index'])->name('partner.index');
        Route::post('/partner/store',[PartnerController::class,'store'])->name('partner.store');
        Route::get('/partner/edit/{id}',[PartnerController::class,'edit'])->name('partner.edit');
        Route::put('/partner/update/{id}',[PartnerController::class,'update'])->name('partner.update');
        Route::delete('/partner/{id}',[PartnerController::class,'destroy'])->name('partner.destroy');

         //client list Route
        Route::get('/client-add',[TeamController::class,'index'])->name('client.index');
        Route::post('/client/store',[TeamController::class,'store'])->name('client.store');
        Route::get('/client/edit/{id}',[TeamController::class,'edit'])->name('client.edit');
        Route::put('/client/update/{team}',[TeamController::class,'update'])->name('client.update');
        Route::delete('/client/{team}',[TeamController::class,'destroy'])->name('client.destroy');

    });
        // setting all route here
    Route::prefix('setting')->group(function(){
            // company profile
            Route::get('company-profile', [ContentController::class, 'edit'])->name('profile.edit');
            Route::put('company-profile/{company}', [ContentController::class, 'update'])->name('profile.update');
            Route::get('/admin/phone/edit',[ContentController::class,'adminPhone'])->name('admin.phone.edit');
            Route::post('/admin/phone/update',[ContentController::class,'adminPhoneUpdate'])->name('admin.phone.update');
            //country route
            Route::resource('/country',CountryController::class);
            //area route
            Route::get('/area',[AreaController::class,'index'])->name('area.index');
            Route::post('/area/store',[AreaController::class,'store'])->name('area.store');
            Route::get('/area/edit/{id}',[AreaController::class,'edit'])->name('area.edit');
            Route::put('/area/update/{id}',[AreaController::class,'update'])->name('area.update');
            Route::delete('/area/{id}',[AreaController::class,'destroy'])->name('area.destroy');

            Route::get('/thana',[ThanaController::class,'index'])->name('thana.index');
            Route::post('/thana/store',[ThanaController::class,'store'])->name('thana.store');
            Route::get('/thana/edit/{id}',[ThanaController::class,'edit'])->name('thana.edit');
            Route::put('/thana/update/{id}',[ThanaController::class,'update'])->name('thana.update');
            Route::delete('/thana/{id}',[ThanaController::class,'destroy'])->name('thana.destroy');


            Route::get('/sms/sending',[MessageSendingController::class,'smsSending'])->name('sms.sending');
            Route::post('/sms/send/menualy',[MessageSendingController::class,'smsSentAll'])->name('sent.sms.multiple');
            Route::get('/sms/all',[MessageSendingController::class,'sms'])->name('sms');


             // Admin Register
            Route::get('user-create', [UserController::class, 'register'])->name('user.index');
            Route::post('user-store', [UserController::class, 'createUser'])->name('user.store');
            Route::get('admin-user-edit/{id}', [UserController::class, 'userEdit'])->name('admin_user_edit');
            Route::put('user-update/{id}', [UserController::class, 'updateUser'])->name('user.update');
            Route::delete('user-delete/{id}', [UserController::class, 'deleteUser'])->name('user.destroy');
            Route::get('/password/change', [UserController::class, 'passwordChange'])->name('user.password.change');
            Route::post('/password/update', [UserController::class, 'passwordUpdate'])->name('password.update');

    });

        // subscriber route
        Route::get('/service-repair',[SubscriberController::class,'index'])->name('subscriber.list');
        Route::post('/service-store',[SubscriberController::class,'store'])->name('service.store');
        Route::get('/service-delete/{service}',[SubscriberController::class,'delete'])->name('service.delete');
        // Public message route
        Route::get('/public-feedback',[PublicMessageController::class,'index'])->name('public.sms');
        Route::get('/public-feedback-delete/{message}',[PublicMessageController::class,'delete'])->name('public.sms.delete');
     
    //   booking list
        Route::get('/bookings-list',[BookingController::class,'bookingList'])->name('bookingList');
        Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
        Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
        Route::delete('/booking-delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');


        Route::get('/features/{service_id}', [BookingController::class, 'getFeaturesByService'])->name('features.byService');


        // answar question route all here
        Route::get('/answar',[AnswarController::class,'index'])->name('answar');
        Route::get('/answar-reply/{id}',[AnswarController::class,'reply'])->name('answar.reply');
        Route::post('/answar-store/{id}',[AnswarController::class,'answarStore'])->name('answar.store');
        Route::delete('/answar/{id}',[AnswarController::class,'destroy'])->name('answar.destroy');
});
