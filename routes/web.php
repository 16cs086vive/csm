<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\userside;
use App\Http\Controllers\PDFController;

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::view('', 'users/home');
Route::get('/blogs', [userside::class, 'showPostWindow']);
Route::post('/login_value', [admin_controller::class, 'admin_login']);
Route::group(['middleware' => 'disablebackpage'], function () {
    Route::get('admin/login', [admin_controller::class, 'showLoginPage']);
    Route::group(['middleware' => 'admin_auth'], function () {

        Route::group(['middleware' => 'authCheck:1'], function () {
            Route::get('admin/deleteprofiles/{id}', [admin_controller::class, 'deleteadminprofiles']);
            Route::get('admin/addnewprofilebtn', [admin_controller::class, 'addnewprofilesform']);
            Route::post('admin/addnewprofile', [admin_controller::class, 'addnewprofiles']);
        });

        Route::group(['middleware' => 'authCheck:2'], function () {
            Route::get('admin/profile', [admin_controller::class, 'getadmindetails']);
        });

        Route::group(['middleware' => 'authCheck:3'], function () {
            Route::view('admin', 'admin.dashboard');
            Route::get('admin', [admin_controller::class, 'dashBoard']);
            Route::get('admin/posts', [admin_controller::class, 'showPostWindow']);
            Route::post('admin/posts/submit', [admin_controller::class, 'postSave']);
            Route::get('admin/general/update', [admin_controller::class, 'generalSettings']);
            Route::post('admin/update', [admin_controller::class, 'update']);
            Route::get('logout', function () {
                session()->flash('error', 'Logged out successfully');
                session()->forget('admin');
                return redirect('/admin/login');
            });
            Route::get('admin/media', [admin_controller::class, 'showMediaView']);
            Route::post('admin/media/upload', [admin_controller::class, 'UploadMediaFile']);
            Route::get('admin/templates', [admin_controller::class, 'showTemplatesView']);
            Route::get('admin/templates', [admin_controller::class, 'showTemplates']);
            Route::get('admin/template/activates/id={id}', [admin_controller::class, 'activateTemplates']);
            Route::post('admin/media/options', [admin_controller::class, 'options']);
            // rendering the caegories page
            Route::get('admin/categories', [admin_controller::class, 'renderCategories']);
            // iinsert data in categories
            Route::post('admin/categories/insert', [admin_controller::class, 'insertCategoriesData']);
            // render the edit page
            Route::get('admin/deletecategories/{id}', [admin_controller::class, 'deleteTaxonomy']);
            // add new categories
            Route::get('admin/addNewTaxonomy', [admin_controller::class, 'addNewTaxonomy']);
        });
    });
});
