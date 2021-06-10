<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\EventsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ManagePackageController;
use App\Http\Controllers\admin\MasterDataController;
use App\Http\Controllers\admin\ManageEventsController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\home\MediaManagerController;

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('about/sultan-al-khatib', [HomeController::class, 'sultan_khatib']);
Route::get('media/list/{type}', [HomeController::class, 'media_list']);
Route::get('media/play/{media_entry_id}', [HomeController::class, 'media_play'])->name('media_play');
Route::get('media/search_list', [HomeController::class, 'media_search']);
Route::get('my_account/downloads', [HomeController::class, 'media_downloads'])->middleware('auth');
Route::get('my_account/my_playlist', [HomeController::class, 'my_playlist'])->middleware('auth');
Route::get('my_account/upload_track', [HomeController::class, 'upload_track'])->middleware('auth');
Route::get('my_account/profile', [HomeController::class, 'profile'])->middleware('auth');
Route::post('my_account/media_uploads', [MediaManagerController::class, 'media_uploads'])->middleware('auth');
Route::post('my_account/profile/upload', [HomeController::class, 'save_profile_pic'])->middleware('auth');
Route::post('my_account/profile/save_details', [HomeController::class, 'save_profile_details'])->middleware('auth');
Route::post('media/get_audio_play_list', [MediaManagerController::class, 'get_audio_play_list']);
Route::post('my_account/play_list/post_action', [MediaManagerController::class, 'post_action'])->middleware('auth');
Route::post('my_account/play_list/create', [MediaManagerController::class, 'create_play_list'])->middleware('auth');
Route::get('my_account/play_list/delete_playlist/{play_list_id}', [MediaManagerController::class, 'delete_playlist'])->middleware('auth');
Route::get('my_account/play_list/delete_my_media/{media_entry_id}', [MediaManagerController::class, 'delete_my_media'])->middleware('auth');
Route::post('media/report_media', [MediaManagerController::class, 'report_media'])->middleware('auth');

Route::post('user/process_signup', [HomeController::class, 'process_signup']);
Route::post('user/process_login', [HomeController::class, 'process_login']);
Route::get('user/logout', [HomeController::class, 'logout']);
Route::post('user/save_subscription', [HomeController::class, 'save_subscription']);

Route::get('competition/list_competition', [EventsController::class, 'list_events']);
Route::get('competition/details/{id}', [EventsController::class, 'event_details']);
Route::post('competition/accept_registration', [EventsController::class, 'accept_registration'])->middleware('auth');

// Route::post('save_enquiry', [HomeController::class, 'save_enquiry']);
// Route::post('save_message', [HomeController::class, 'save_message']);
// Route::post('save_subscribers', [HomeController::class, 'save_subscribers']);

Route::get('admin/login', [AdminController::class, 'admin_login'])->name('admin/admin_login');
Route::get('admin/home', [AdminController::class, 'home'])->name('admin/home')->middleware('admin');
Route::post('admin/login_action', [AdminController::class, 'login_action']);
Route::get('admin/masterdata/manage_institutions', [MasterDataController::class, 'list_all_institutions'])->middleware('admin');
Route::get('admin/masterdata/add_institution', [MasterDataController::class, 'add_edit_institution_form'])->middleware('admin');
Route::get('admin/masterdata/edit_institution/{id}', [MasterDataController::class, 'add_edit_institution_form'])->middleware('admin');
Route::post('admin/masterdata/save_institution', [MasterDataController::class, 'save_institution'])->middleware('admin');

Route::get('admin/events/create_events', [ManageEventsController::class, 'create_events'])->middleware('admin');
Route::get('admin/events/edit_event/{id}', [ManageEventsController::class, 'create_events'])->middleware('admin');
Route::get('admin/events/send_invitation/{id}', [ManageEventsController::class, 'send_invitation'])->middleware('admin');
Route::post('admin/events/save_events', [ManageEventsController::class, 'save_events'])->middleware('admin');
Route::get('admin/events/manage_events', [ManageEventsController::class, 'list_all_events'])->middleware('admin');
Route::get('admin/events/participants', [ManageEventsController::class, 'event_participants'])->middleware('admin');
Route::get('admin/events/judgement/{id}', [ManageEventsController::class, 'event_judgement'])->middleware('admin');
Route::post('admin/events/updatescore', [ManageEventsController::class, 'save_judgement_result_and_publish'])->middleware('admin');
Route::post('admin/send/invitation', [ManageEventsController::class, 'triggerEmail'])->middleware('admin');

Route::get('admin/uploads/create_new_uploads', [UploadController::class, 'create_new_uploads'])->middleware('admin');
Route::get('admin/uploads/list_uploads', [UploadController::class, 'list_all_uploads'])->middleware('admin');
Route::post('admin/uploads/save_media_uploads', [UploadController::class, 'save_media_uploads'])->middleware('admin');
Route::post('admin/uploads/media_publish_unpublish', [UploadController::class, 'media_publish_unpublish'])->middleware('admin');

Route::get('admin/settings/web', [SettingsController::class, 'web_settings'])->middleware('admin');
Route::post('admin/settings/save_banner', [SettingsController::class, 'save_banner'])->middleware('admin');
Route::post('admin/settings/save_web_icons', [SettingsController::class, 'save_web_icons'])->middleware('admin');
Route::post('admin/settings/save_footer_info', [SettingsController::class, 'save_footer_info'])->middleware('admin');
Route::post('admin/settings/save_ads_banner', [SettingsController::class, 'save_ads_banner'])->middleware('admin');


// Route::get('admin/users/manage_permissions', [UserController::class, 'manage_permisions'])->middleware('auth');
// Route::post('admin/user/create_permission', [UserController::class, 'create_permission'])->middleware('auth');
// Route::get('admin/users/manage_roles', [UserController::class, 'manage_roles'])->middleware('auth');
// Route::post('admin/user/create_role', [UserController::class, 'create_role'])->middleware('auth');
// Route::get('admin/user/manage_user', [UserController::class, 'manage_user'])->middleware('auth');
// Route::post('admin/user/create_user', [UserController::class, 'create_user'])->middleware('auth');



Route::get('admin/masterdata/testing', [MasterDataController::class, 'test'])->middleware('auth');



Route::get('/mailable', function () {
    $data = array(
        'name' => 'Shajeer',
        'email' => 'email',
        'phone' => 'phone',
        'booking_date' => 'booking_date',
        'message' => 'We have received your appointment successfully. Our customer care
            executive will contact you soon. Thank you!'
    );
    return new App\Mail\Enquiry($data);
});
