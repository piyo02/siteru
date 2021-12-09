<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\Authenticate;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\SubmissionController;

use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SectorContactController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\ViolationLetterController;

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

Route::get('/', [GuestController::class, 'index']);
Route::get('/publikasi/kebijakan/download/{policy}', [GuestController::class, 'download']);
Route::get('/profil', [GuestController::class, 'profile']);
Route::get('/jendela-infrastruktur', [GuestController::class, 'infrasctructure']);
Route::get('/organisasi/{slug}', [GuestController::class, 'sector']);
Route::get('/publikasi/berita', [GuestController::class, 'news']);
Route::get('/publikasi/berita/{slug}', [GuestController::class, 'show_news']);
Route::get('/publikasi/galeri', [GuestController::class, 'galleries']);
Route::get('/publikasi/galeri/{slug}', [GuestController::class, 'show_gallery']);
Route::get('/publikasi/kebijakan', [GuestController::class, 'policies']);
Route::get('/peta', [GuestController::class, 'maps']);

Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');


Route::middleware([Authenticate::class])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/admin/user-profile', [UserProfileController::class, 'index']);
    Route::put('/admin/user-profile/{user}', [UserProfileController::class, 'update']);
    Route::put('/admin/user-profile/change-password/{user}', [UserProfileController::class, 'change_password']);
    Route::put('/admin/user-profile/change-profile-image/{user}', [UserProfileController::class, 'change_profile_image']);

    // usector
    Route::resource('/admin/sectors', SectorController::class)->middleware('role.usector');

    Route::get('/admin/sector-contract/{sector}', [SectorContactController::class, 'index'])->middleware('role.usector');
    Route::post('/admin/sector-contract', [SectorContactController::class, 'store'])->middleware('role.usector');
    Route::put('/admin/sector-contract/{sectorContact}', [SectorContactController::class, 'update'])->middleware('role.usector');
    Route::delete('/admin/sector-contract/{sectorContact}', [SectorContactController::class, 'destroy'])->middleware('role.usector');

    Route::resource('/admin/violations', ViolationController::class)->middleware('role.task.force');
    Route::post('/admin/violations/add-signature/{violation}', [ViolationController::class, 'add_signature'])->middleware('role.task.force');
    Route::post('/admin/violations/add-attachment/{violation}', [ViolationController::class, 'add_attachment'])->middleware('role.task.force');
    Route::delete('/admin/violations/{violation}/delete-attachment/{attachment}', [ViolationController::class, 'delete_attachment'])->middleware('role.task.force');
    Route::get('/admin/violations/export/{violation}', [ViolationController::class, 'export'])->middleware('role.task.force');

    // publication
    Route::resource('/admin/publication/news', NewsController::class)->middleware('role.usector');
    Route::resource('/admin/publication/galleries', GalleryController::class)->middleware('role.usector');
    Route::resource('/admin/publication/policies', PolicyController::class)->middleware('role.usector');

    // master
    Route::post('/admin/master/regions', [TeamController::class, 'store_region'])->middleware('role.uadmin');
    Route::put('/admin/master/regions/{region}', [TeamController::class, 'update_region'])->middleware('role.uadmin');
    Route::get('/admin/master/regions/{region}', [TeamController::class, 'show_region'])->middleware('role.uadmin');
    Route::delete('/admin/master/regions/{region}', [TeamController::class, 'destroy_region'])->middleware('role.uadmin');
    
    Route::post('/admin/master/coordinates', [TeamController::class, 'store_coordinate'])->middleware('role.uadmin');
    Route::put('/admin/master/coordinates/{regionCoordinate}', [TeamController::class, 'update_coordinate'])->middleware('role.uadmin');
    Route::delete('/admin/master/coordinates/{regionCoordinate}', [TeamController::class, 'destroy_coordinate'])->middleware('role.uadmin');

    Route::resource('/admin/master/infrastructure', InfrastructureController::class)->middleware('role.uadmin');
    Route::resource('/admin/master/roles', RoleController::class)->middleware('role.admin');
    Route::resource('/admin/master/users', UserController::class)->middleware('role.uadmin');
    Route::resource('/admin/master/teams', TeamController::class)->middleware('role.uadmin');
    Route::get('/admin/master/configs', [ConfigController::class, 'index'])->middleware('role.uadmin');
    Route::put('/admin/master/configs/{config}', [ConfigController::class, 'update'])->middleware('role.uadmin');
    Route::resource('/admin/maps', MapController::class)->middleware('role.uadmin');

    Route::get('/admin/master/contacts', [ContactTypeController::class, 'index'])->middleware('role.admin');
    Route::post('/admin/master/contacts', [ContactTypeController::class, 'store'])->middleware('role.admin');
    Route::put('/admin/master/contacts/{contactType}', [ContactTypeController::class, 'update'])->middleware('role.admin');
    Route::delete('/admin/master/contacts/{contactType}', [ContactTypeController::class, 'destroy'])->middleware('role.admin');
});