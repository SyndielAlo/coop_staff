<?php

use App\Http\Controllers\logs\{
    welcome_controller,
    BOD_login_controller,
    DH_login_controller
};

use App\Http\Controllers\BOD_ADMIN\{
    dashboard_controller,
    crud_controller
};
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [
    welcome_controller::class,
    'landing']) -> name('welcome');

// admin-login-page
Route::get('/BOD_login', [
    BOD_login_controller::class,
    'bodLogin']) -> name('auth.BOD_login');

Route::get('/DH_login', [
    DH_login_controller::class,
    'dhLogin']) -> name('auth.DH_login');


Route::post('/login', [BOD_login_controller::class, 'authenticate'])->name('login.submit');
// 1st-admin [BOD] page

Route::middleware(['auth'])->group(function () {

Route::get('/bodres-dashboard', [
    dashboard_controller::class,
    'dashboard']) -> name('1st_admin.dashboard');

Route::get('/BOD-dashboard', [
    dashboard_controller::class,
    'bod_dashboard']) -> name('1st_admin.bod_dashboard');

Route::get('/BOD-Com-dashboard', [
    dashboard_controller::class,
    'bod_com_dashboard']) -> name('1st_admin.bod_com_dashboard');

Route::get('/dh-dashboard', [
    dashboard_controller::class,
    'dh_dashboard']) -> name('1st_admin.dh_dashboard');

Route::get('/dh-logs', [
    dashboard_controller::class,
    'dh_logs']) -> name('1st_admin.dh_logs');

Route::get('/BOD', [
    dashboard_controller::class,
    'bod_dashboard_main']) -> name('1st_admin.BOD (view only).BOD_dashboard');

Route::get('/BOD-committee', [
    dashboard_controller::class,
    'bod_committee_dashboard']) -> name('1st_admin.BOD (view only).BOD_committee');

Route::get('/BOD-resolution', [
    dashboard_controller::class,
    'bod_resolution_dashboard']) -> name('1st_admin.BOD (view only).BOD_resolution');

Route::get('/Dept_head', [
    dashboard_controller::class,
    'department_head_dashboard']) -> name('1st_admin.BOD (view only).BOD_DH');


// CRUD [BOD] page

// Define routes for adding a resolution
Route::get('/bodres/add', [crud_controller::class, 'bodres_add'])->name('add_resolution');
Route::post('/bodres/store', [crud_controller::class, 'bodres_store'])->name('store_resolution');

// Define routes for editing a resolution
Route::get('/bodres/edit/{id}', [crud_controller::class, 'bodres_edit'])->name('edit_resolution');
Route::put('/bodres/update/{id}', [crud_controller::class, 'bodres_update'])->name('update_resolution');

// Define route for deleting a resolution
Route::delete('/bodres/destroy/{id}', [crud_controller::class, 'bodres_destroy'])->name('destroy_resolution');

// Define routes for adding a BOD
Route::get('/bod/add', [
    crud_controller::class,
    'bod_add']) -> name('1st_admin.actions.bod_add');
Route::post('/bod/store', [crud_controller::class, 'bod_store'])->name('bod_store');  

Route::get('/storage/BOD_image/{filename}', function ($filename) {
    return response()->file(storage_path('app/public/BOD_image/' . $filename));
})->where('filename', '.*');

// Define routes for editing a BOD
Route::get('/bod/edit', [
    crud_controller::class,
    'bod_edit']) -> name('1st_admin.actions.bod_edit');
// Define routes for delete a BOD
Route::delete('/bod/delete/{id}', [crud_controller::class, 'bod_delete'])->name('bod_delete');



Route::get('/bodcom/add', [
    crud_controller::class,
    'bodcom_add']) -> name('1st_admin.actions.bodcom_add');
// Route for storing a new committee
Route::post('/bodcom/store', [crud_controller::class, 'bodcom_store'])->name('committees.store');   

// Edit form route
Route::get('/bodcom/edit/{id}', [
    crud_controller::class,
    'bodcom_edit'
])->name('1st_admin.actions.bodcom_edit');

// Route for updating a committee
Route::put('/bodcom/update/{id}', [
    crud_controller::class,
    'bodcom_update'
])->name('committees.update');


// Route for deleting a committee
Route::delete('/bodcom/destroy{id}', [crud_controller::class, 'bodcom_destroy'])->name('committees.destroy');


Route::get('/dh/add', [
    crud_controller::class,
    'dh_add']) -> name('1st_admin.actions.dh_add');

// Add this to your routes file
Route::post('/dh/store', [crud_controller::class, 'dh_store'])->name('dh.store');


Route::get('/dh/edit/{id}', [
    crud_controller::class,
    'dh_edit']) -> name('1st_admin.actions.dh_edit');

Route::put('/dh/update/{id}', [crud_controller::class, 'dh_update'])->name('dh.update');


Route::delete('/dh/{id}', [crud_controller::class, 'dh_delete'])->name('dh.delete');


// Display the form for updating the profile
Route::get('/profile/{id}/edit', [crud_controller::class, 'update_profile'])
->name('1st_admin.actions.update-profile');

// Handle the form submission for updating the profile
Route::put('/profile/{id}/edit', [crud_controller::class, 'edit_Profile'])
->name('profile.update');


Route::get('/logout', [BOD_login_controller::class, 'logout'])->name('logout');


Route::get('/api/logs/chart', [LogController::class, 'getChartData'])->name('api.logs.chart');;
});

// Show add user form
Route::get('/add-user', [UserController::class, 'showAddUserForm'])->name('user.showAddForm');

// Store user data
Route::post('/store-user', [UserController::class, 'store_User'])->name('user.store');
