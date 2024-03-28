<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SystemInformationController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Admin\SpecialNewsController;
use App\Http\Controllers\Admin\TenthrowController;
use App\Http\Controllers\Admin\NinthrowController;
use App\Http\Controllers\Admin\EightrowController;
use App\Http\Controllers\Admin\SevenrowController;
use App\Http\Controllers\Admin\SixrowController;
use App\Http\Controllers\Admin\FifthController;
use App\Http\Controllers\Admin\FouthController;
use App\Http\Controllers\Admin\ThirdrowController;
use App\Http\Controllers\Admin\SecondrowController;
use App\Http\Controllers\Admin\VideoBackgroundController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\Admin\JobdepartmentController;
use App\Http\Controllers\Admin\JobtitleController;
use App\Http\Controllers\Admin\JobcategoryController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\PartnerWithUsController;
use App\Http\Controllers\Admin\JobSeekerController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Admin\OrderController;
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
Route::get('/siteHeader', function() {
    return View::make('front.include.top_header');
});

Route::get('/siteFooter', function() {
    return View::make('front.include.footer');
});


Route::get('payment',[FrontController::class,'payment'])->name('payment');

//You need declear your success & fail route in "app\Middleware\VerifyCsrfToken.php"
Route::post('success',[FrontController::class,'success'])->name('success');
Route::post('fail',[FrontController::class,'fail'])->name('fail');
Route::get('cancel',[FrontController::class,'cancel'])->name('cancel');


Route::get('/showLoginForm',[LoginController::class,'showLoginForm'])->name('showLoginForm');

Route::get('/job_details', [FrontController::class, 'job_details'])->name('job_details');
Route::get('/', [FrontController::class, 'index'])->name('index');
//CV Login
//Route::get('/cv_login_form',[LoginController::class,'cv_login_form'])->name('cv_login_form');
Route::get('/cv_login_form',[LoginController::class,'cv_login_form'])->name('cv_login_form');
Route::get('/cv_login_main',[LoginController::class,'cv_login_main'])->name('cv_login_main');
Route::get('/job_search_page',[LoginController::class,'job_search_page'])->name('job_search_page');

Route::get('/get_dp_name_from_cat', [FrontController::class, 'get_dp_name_from_cat'])->name('get_dp_name_from_cat');
Route::get('/get_title_name_from_dp', [FrontController::class, 'get_title_name_from_dp'])->name('get_title_name_from_dp');


Route::get('/news', [FrontController::class, 'how_it_work'])->name('news');
Route::get('/top_city', [FrontController::class, 'mission'])->name('top_city');
Route::get('/contact', [FrontController::class, 'vision'])->name('contact');
Route::get('/about_us', [FrontController::class, 'values'])->name('about_us');

Route::post('/jobSeekerPartOnePostEdit', [FrontController::class, 'jobSeekerPartOnePostEdit'])->name('jobSeekerPartOnePostEdit');
Route::post('/jobSeekerPartOnePost', [FrontController::class, 'jobSeekerPartOnePost'])->name('jobSeekerPartOnePost');
Route::post('/jobSeekerPartTwoPost', [FrontController::class, 'jobSeekerPartTwoPost'])->name('jobSeekerPartTwoPost');


Route::get('/jobSeekerPartOne/{id}', [FrontController::class, 'jobSeekerPartOne'])->name('jobSeekerPartOne');
Route::get('/jobSeekerPartTwo/{id}', [FrontController::class, 'jobSeekerPartTwo'])->name('jobSeekerPartTwo');


Route::post('/sendMessageFromPartner', [FrontController::class, 'sendMessageFromPartner'])->name('sendMessageFromPartner');


Route::get('/offer', [FrontController::class, 'our_experties'])->name('offer');
Route::get('/confirm_offer_order/{slug}', [FrontController::class, 'our_services'])->name('confirm_offer_order');
Route::get('/service', [FrontController::class, 'our_accreditations'])->name('service');


Route::post('/final_confirm', [FrontController::class, 'final_confirm'])->name('final_confirm');

Route::get('/service_detail/{slug}', [FrontController::class, 'service_detail'])->name('service_detail');




Route::get('/confirm_service_order/{slug}', [FrontController::class, 'post_a_job'])->name('confirm_service_order');
Route::get('/crew_cv_searching', [FrontController::class, 'crew_cv_searching'])->name('crew_cv_searching');
Route::get('/top_notch', [FrontController::class, 'top_notch'])->name('top_notch');
Route::get('/hierarchy', [FrontController::class, 'hierarchy'])->name('hierarchy');
Route::get('/crew_login', [FrontController::class, 'crew_login'])->name('crew_login');
Route::get('/help24_7', [FrontController::class, 'help24_7'])->name('help24_7');
Route::get('/urgent_vacancy', [FrontController::class, 'urgent_vacancy'])->name('urgent_vacancy');
Route::get('/hiring_process', [FrontController::class, 'hiring_process'])->name('hiring_process');
Route::get('/career_navigation', [FrontController::class, 'career_navigation'])->name('career_navigation');
Route::get('/cruiseship', [FrontController::class, 'cruiseship'])->name('cruiseship');
Route::get('/megayacht', [FrontController::class, 'megayacht'])->name('megayacht');
Route::get('/river_cruise', [FrontController::class, 'river_cruise'])->name('river_cruise');

Route::get('/private_jets', [FrontController::class, 'private_jets'])->name('private_jets');
Route::get('/hotel_ressort', [FrontController::class, 'hotel_ressort'])->name('hotel_ressort');
Route::get('/merchant_navy', [FrontController::class, 'merchant_navy'])->name('merchant_navy');
Route::get('/offshore', [FrontController::class, 'offshore'])->name('offshore');
Route::get('/world_butler', [FrontController::class, 'world_butler'])->name('world_butler');
Route::get('/event', [FrontController::class, 'event'])->name('event');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');



Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {


    Route::resource('serviceList', ServiceController::class);

    Route::resource('jobList', JobController::class);

    Route::controller(OrderController::class)->group(function () {


        Route::delete('offer_order_delete/{id}','offer_order_delete')->name('offer_order_delete');
       // Route::delete('service_order_delete/{id}','service_order_delete')->name('service_order_delete');

        Route::post('update_order_status','update_order_status')->name('update_order_status');


        Route::get('offer_order_list','offer_order_list')->name('offer_order_list');
        Route::get('pending_offer_order_list','pending_offer_order_list')->name('pending_offer_order_list');


        Route::get('service_order_list','service_order_list')->name('service_order_list');
        Route::get('pending_service_order_list','pending_service_order_list')->name('pending_service_order_list');

    });

    Route::controller(JobController::class)->group(function () {

        Route::get('getJobTitleForDepartment','getJobTitleForDepartment')->name('getJobTitleForDepartment');


    });


    Route::resource('jobSeeker', JobSeekerController::class);

    Route::controller(JobSeekerController::class)->group(function () {

        Route::get('downloadcv/{id}','downloadcv')->name('downloadcv');
    });



    Route::resource('partnerWithUs', PartnerWithUsController::class);

    Route::controller(PartnerWithUsController::class)->group(function () {
    });

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('job_department', [JobdepartmentController::class, 'index'])->name('admin.job_department');
    Route::post('job_department/store', [JobdepartmentController::class, 'store'])->name('admin.job_department.store');
    Route::post('job_department/update', [JobdepartmentController::class, 'update'])->name('admin.job_department.update');
    Route::post('job_department/delete/{id}', [JobdepartmentController::class, 'delete'])->name('admin.job_department.delete');


    Route::get('from_job_title_to_cat', [JobtitleController::class, 'from_job_title_to_cat'])->name('from_job_title_to_cat');

    Route::get('social_link', [JobtitleController::class, 'index'])->name('admin.social_link');
    Route::post('social_link/store', [JobtitleController::class, 'store'])->name('admin.social_link.store');
    Route::post('social_link/update', [JobtitleController::class, 'update'])->name('admin.social_link.update');
    Route::post('social_link/delete/{id}', [JobtitleController::class, 'delete'])->name('admin.social_link.delete');


    Route::get('job_category', [JobcategoryController::class, 'index'])->name('admin.job_category');
    Route::post('job_category/store', [JobcategoryController::class, 'store'])->name('admin.job_category.store');
    Route::post('job_category/update', [JobcategoryController::class, 'update'])->name('admin.job_category.update');
    Route::post('job_category/delete/{id}', [JobcategoryController::class, 'delete'])->name('admin.job_category.delete');



    Route::get('about_us_experties', [AboutUsController::class, 'index'])->name('admin.about_us_experties');
    Route::post('about_us_experties/store', [AboutUsController::class, 'store'])->name('admin.about_us_experties.store');
    Route::post('about_us_experties/update', [AboutUsController::class, 'update'])->name('admin.about_us_experties.update');
    Route::post('about_us_experties/delete/{id}', [AboutUsController::class, 'delete'])->name('admin.about_us_experties.delete');


    Route::get('about_us_services', [AboutUsController::class, 'about_us_services_index'])->name('admin.about_us_services');
    Route::post('about_us_services/store', [AboutUsController::class, 'about_us_services_store'])->name('admin.about_us_services.store');
    Route::post('about_us_services/update', [AboutUsController::class, 'about_us_services_update'])->name('admin.about_us_services.update');
    Route::post('about_us_services/delete/{id}', [AboutUsController::class, '_about_us_services_delete'])->name('admin.about_us_services.delete');


    Route::get('about_us_accrediations', [AboutUsController::class, 'about_us_accrediations_index'])->name('admin.about_us_accrediations');
    Route::post('about_us_accrediations/store', [AboutUsController::class, 'about_us_accrediations_store'])->name('admin.about_us_accrediations.store');
    Route::post('about_us_accrediations/update', [AboutUsController::class, 'about_us_accrediations_update'])->name('admin.about_us_accrediations.update');
    Route::post('about_us_accrediations/delete/{id}', [AboutUsController::class, 'about_us_accrediations_delete'])->name('admin.about_us_accrediations.delete');



    Route::get('why_us_mission', [WhyUsController::class, 'index'])->name('admin.why_us_mission');
    Route::post('why_us_mission/store', [WhyUsController::class, 'store'])->name('admin.why_us_mission.store');
    Route::post('why_us_mission/update', [WhyUsController::class, 'update'])->name('admin.why_us_mission.update');
    Route::post('why_us_mission/delete/{id}', [WhyUsController::class, 'delete'])->name('admin.why_us_mission.delete');



    Route::get('why_us_vision', [WhyUsController::class, 'why_us_vision_index'])->name('admin.why_us_vision');
    Route::post('why_us_vision/store', [WhyUsController::class, 'why_us_vision_store'])->name('admin.why_us_vision.store');
    Route::post('why_us_vision/update', [WhyUsController::class, 'why_us_vision_update'])->name('admin.why_us_vision.update');
    Route::post('why_us_vision/delete/{id}', [WhyUsController::class, 'why_us_vision_delete'])->name('admin.why_us_vision.delete');


    Route::get('why_us_value', [WhyUsController::class, 'why_us_value_index'])->name('admin.why_us_value');
    Route::post('why_us_value/store', [WhyUsController::class, 'why_us_value_store'])->name('admin.why_us_value.store');
    Route::post('why_us_value/update', [WhyUsController::class, 'why_us_value_update'])->name('admin.why_us_value.update');
    Route::post('why_us_value/delete/{id}', [WhyUsController::class, 'why_us_value_delete'])->name('admin.why_us_value.delete');



    Route::get('how_it_work', [HowItWorkController::class, 'index'])->name('admin.how_it_work');
    Route::post('how_it_work/store', [HowItWorkController::class, 'store'])->name('admin.how_it_work.store');
    Route::post('how_it_work/update', [HowItWorkController::class, 'update'])->name('admin.how_it_work.update');
    Route::post('how_it_work/delete/{id}', [HowItWorkController::class, 'delete'])->name('admin.how_it_work.delete');



    Route::get('video_background', [VideoBackgroundController::class, 'index'])->name('admin.video_background');
    Route::post('video_background/store', [VideoBackgroundController::class, 'store'])->name('admin.video_background.store');
    Route::post('video_background/update', [VideoBackgroundController::class, 'update'])->name('admin.video_background.update');
    Route::post('video_background/delete/{id}', [VideoBackgroundController::class, 'delete'])->name('admin.video_background.delete');

    Route::get('special_news_info', [SpecialNewsController::class, 'index'])->name('admin.special_news_info');
    Route::post('special_news_info/store', [SpecialNewsController::class, 'store'])->name('admin.special_news_info.store');
    Route::post('special_news_info/update', [SpecialNewsController::class, 'update'])->name('admin.special_news_info.update');
    Route::post('special_news_info/delete/{id}', [SpecialNewsController::class, 'delete'])->name('admin.special_news_info.delete');


    Route::get('banner_List', [SecondrowController::class, 'index'])->name('admin.banner_List');
    Route::post('banner_List/store', [SecondrowController::class, 'store'])->name('admin.banner_List.store');
    Route::post('banner_List/update', [SecondrowController::class, 'update'])->name('admin.banner_List.update');
    Route::post('banner_List/delete/{id}', [SecondrowController::class, 'delete'])->name('admin.banner_List.delete');


    Route::post('second_row_info_logo/store', [SecondrowController::class, 'second_row_info_logo_store'])->name('admin.second_row_info_logo_store.store');
    Route::post('second_row_info_logo/update', [SecondrowController::class, 'second_row_info_logo_update'])->name('admin.second_row_info_logo.update');
    Route::post('second_row_info_logo/delete/{id}', [SecondrowController::class, 'second_row_info_logo_delete'])->name('admin.second_row_info_logo.delete');


    Route::get('our_running_offer/create', [ThirdrowController::class, 'create'])->name('admin.our_running_offer.create');
    Route::get('our_running_offer/edit/{id}', [ThirdrowController::class, 'edit'])->name('admin.our_running_offer.edit');


    Route::get('our_running_offer', [ThirdrowController::class, 'index'])->name('admin.our_running_offer');
    Route::post('our_running_offer/store', [ThirdrowController::class, 'store'])->name('admin.our_running_offer.store');
    Route::post('our_running_offer/update', [ThirdrowController::class, 'update'])->name('admin.our_running_offer.update');
    Route::post('our_running_offer/delete/{id}', [ThirdrowController::class, 'delete'])->name('admin.our_running_offer.delete');

    Route::get('fourth_row_info', [FouthController::class, 'index'])->name('admin.fourth_row_info');
    Route::post('fourth_row_info/store', [FouthController::class, 'store'])->name('admin.fourth_row_info.store');
    Route::post('fourth_row_info/update', [FouthController::class, 'update'])->name('admin.fourth_row_info.update');
    Route::post('fourth_row_info/delete/{id}', [FouthController::class, 'delete'])->name('admin.fourth_row_info.delete');

    Route::get('fifth_row_info', [FifthController::class, 'index'])->name('admin.fifth_row_info');
    Route::post('fifth_row_info/store', [FifthController::class, 'store'])->name('admin.fifth_row_info.store');
    Route::post('fifth_row_info/update', [FifthController::class, 'update'])->name('admin.fifth_row_info.update');
    Route::post('fifth_row_info/delete/{id}', [FifthController::class, 'delete'])->name('admin.fifth_row_info.delete');

    Route::post('fifth_row_info_big/store', [FifthController::class, 'fifth_row_info_big_store'])->name('admin.fifth_row_info_big.store');
    Route::post('fifth_row_info_big/update', [FifthController::class, 'fifth_row_info_big_update'])->name('admin.fifth_row_info_big.update');
    Route::post('fifth_row_info_big/delete/{id}', [FifthController::class, 'fifth_row_info_big_delete'])->name('admin.fifth_row_info_big.delete');


    Route::get('news_and_media', [SixrowController::class, 'index'])->name('admin.news_and_media');
    Route::post('news_and_media/store', [SixrowController::class, 'store'])->name('admin.news_and_media.store');
    Route::post('news_and_media/update', [SixrowController::class, 'update'])->name('admin.news_and_media.update');
    Route::post('news_and_media/delete/{id}', [SixrowController::class, 'delete'])->name('admin.news_and_media.delete');

    Route::get('seventh_row_info', [SevenrowController::class, 'index'])->name('admin.seventh_row_info');
    Route::post('seventh_row_info/store', [SevenrowController::class, 'store'])->name('admin.seventh_row_info.store');
    Route::post('seventh_row_info/update', [SevenrowController::class, 'update'])->name('admin.seventh_row_info.update');
    Route::post('seventh_row_info/delete/{id}', [SevenrowController::class, 'delete'])->name('admin.seventh_row_info.delete');


    Route::get('client_say_part/create', [EightrowController::class, 'create'])->name('admin.client_say_part.create');
    Route::get('client_say_part/edit/{id}', [EightrowController::class, 'edit'])->name('admin.client_say_part.edit');
    Route::get('client_say_part', [EightrowController::class, 'index'])->name('admin.client_say_part');
    Route::post('client_say_part/store', [EightrowController::class, 'store'])->name('admin.client_say_part.store');
    Route::post('client_say_part/update', [EightrowController::class, 'update'])->name('admin.client_say_part.update');
    Route::post('client_say_part/delete/{id}', [EightrowController::class, 'delete'])->name('admin.client_say_part.delete');



    Route::get('video_review_part/create', [NinthrowController::class, 'create'])->name('admin.video_review_part.create');
    Route::get('video_review_part/edit/{id}', [NinthrowController::class, 'edit'])->name('admin.video_review_part.edit');
    Route::get('video_review_part', [NinthrowController::class, 'index'])->name('admin.video_review_part');
    Route::post('video_review_part/store', [NinthrowController::class, 'store'])->name('admin.video_review_part.store');
    Route::post('video_review_part/update', [NinthrowController::class, 'update'])->name('admin.video_review_part.update');
    Route::post('video_review_part/delete/{id}', [NinthrowController::class, 'delete'])->name('admin.video_review_part.delete');


    Route::post('ninth_row_info_second/store', [NinthrowController::class, 'store_second'])->name('admin.ninth_row_info_second.store');
    Route::post('ninth_row_info_second/update', [NinthrowController::class, 'update_second'])->name('admin.ninth_row_info_second.update');
    Route::post('ninth_row_info_second/delete/{id}', [NinthrowController::class, 'delete_second'])->name('admin.ninth_row_info_second.delete');

    Route::get('gallery', [TenthrowController::class, 'index'])->name('admin.gallery');
    Route::post('gallery/store', [TenthrowController::class, 'store'])->name('admin.gallery.store');
    Route::post('gallery/update', [TenthrowController::class, 'update'])->name('admin.gallery.update');
    Route::post('gallery/delete/{id}', [TenthrowController::class, 'delete'])->name('admin.gallery.delete');


    Route::get('system_information', [SystemInformationController::class, 'index'])->name('admin.system_information');
    Route::post('system_information/store', [SystemInformationController::class, 'store'])->name('admin.system_information.store');
    Route::post('system_information/update', [SystemInformationController::class, 'update'])->name('admin.system_information.update');
    Route::post('system_information/delete/{id}', [SystemInformationController::class, 'delete'])->name('admin.system_information.delete');

    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('admin.admins.update');
    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');



    Route::get('settings',[ProfileController::class, 'setting'])->name('admin.settings');
    Route::get('view_profile',[ProfileController::class, 'profile_view'])->name('admin.profile_view');







    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');


    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');

});
