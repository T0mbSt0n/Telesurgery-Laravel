<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\mqttController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProfileController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::post('/mqtt-data-motor-1', [mqttController::class,'data1']);
Route::post('/mqtt-data-motor-2', [mqttController::class,'data2']);
Route::post('/mqtt-data-motor-3', [mqttController::class,'data3']);
Route::post('/mqtt-data-motor-4', [mqttController::class,'data4']);
Route::post('/mqtt-data-motor-5', [mqttController::class,'data5']);
Route::get('/download1', [DownloadController::class, 'data1']);
Route::get('/download2', [DownloadController::class, 'data2']);
Route::get('/download3', [DownloadController::class, 'data3']);
Route::get('/download4', [DownloadController::class, 'data4']);
Route::get('/download5', [DownloadController::class, 'data5']);
Route::get('/download6', [DownloadController::class, 'data6']);
Route::post('/peer-id', function () {
    return response()->json(['peerId' => uniqid()]);
});

/*Route::controller(AuthController::class)->middleware('registered')->group(function() {
    Route::get('register','register')->name('register');
    Route::post('register','register_action')->name('register.action');
});*/
Route::get('/stream', function () {
    return view('stream');
});

Route::get('register',[AuthController::class, 'registerView'])->name('register.index');
Route::post('register',[AuthController::class, 'register_action'])->name('register.action');
Route::post('change-pass',[AuthController::class, 'updatePassword'])->name('updtpass.action');
Route::get('/', function () {
    return redirect('/' . Str::uuid());
});


Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/picture', [ProfileController::class, 'picture'])->name('picture.update');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('login-page', 'login')->name('login');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('add-user', 'addusers')->name('add-user');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
});
