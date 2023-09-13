<?php

use App\Http\Controllers\EventCommentController;
use App\Http\Controllers\Admin\AdminEventCategoryController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminFestivalCategoryController;
use App\Http\Controllers\Admin\AdminFestivalController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\EventController;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\UserController;
use App\Models\EventCategory;
use App\Models\FestivalCategory;
use Illuminate\Support\Facades\Route;

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

Route::middleware('can:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('admin/dashboard');

    Route::resource('admin/festivals', AdminFestivalController::class)->except('show');
    Route::get('admin/festivals/{festival}/details', [AdminFestivalController::class, 'details']);
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard', [
            'festivals' => Festival::paginate(5),
        ]);
    });

    Route::resource('admin/events', AdminEventController::class)->except('show');
    Route::get('admin/events/{festival}/create1', [AdminEventController::class, 'create1']);
    Route::post('admin/events/{festival}/create1', [AdminEventController::class, 'store1']);

    Route::resource('admin/tickets', AdminTicketController::class)->except('show');
    Route::get('admin/tickets/{festival}/create1', [AdminTicketController::class, 'create1']);
    Route::post('admin/tickets/{festival}/create1', [AdminTicketController::class, 'store1']);

    Route::resource('admin/users', AdminUserController::class)->except('show');
    Route::resource('admin/event_categories', AdminEventCategoryController::class)->except('index', 'show');
    Route::resource('admin/festival_categories', AdminFestivalCategoryController::class)->except('index', 'show');

    Route::get('admin/categories', function () {
        return view('admin.categories.index');
    });

    Route::get('admin/reports', [AdminReportController::class, 'index']);
});

Route::post('/like/{event}', [EventController::class, 'like'])->name('like');
Route::post('/unlike/{event}', [EventController::class, 'unlike'])->name('unlike');
Route::post('/likef/{festival}', [FestivalController::class, 'likef'])->name('likef');
Route::post('/unlikef/{festival}', [FestivalController::class, 'unlikef'])->name('unlikef');

Route::get('/', [FestivalController::class, 'index']);
Route::get('/festivals/{festival:slug}', [FestivalController::class, 'show']);
Route::get('/festivals/{festival:slug}/buy-ticket', [FestivalController::class, 'buy']);
Route::post('/festivals/{festival:slug}/buy-ticket/confirmation', [FestivalController::class, 'confirmation'])->middleware('auth');

Route::get('/events/{event:slug}', [EventController::class, 'show']);
Route::post('/events/{event:slug}/comments', [EventCommentController::class, 'store']);

Route::get('/liked-events', [EventController::class, 'likedEvents'])->middleware('auth');

// <<<<<<< HEAD
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// =======
// >>>>>>> master

// /update-profile/{{ $user->id }}

Route::patch('/my-profile', [UserController::class, 'update'])->name('update-profile')->middleware(['auth']);

Route::get('/dashboard', [FestivalController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/my-profile', function () {
    return view('my-profile');
})->name('my-profile');

require __DIR__ . '/auth.php';
