<?php
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/home',[HomeController::class,'oo'])->middleware('auth')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
        Route::get('/list', [AppointmentController::class, 'index'])->name('home');
        // routes/web.php
        
        Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
        // Appointment routes:
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
        Route::get('/create-appointment', [AppointmentController::class, 'create'])->name('create-appointment');
        Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
        Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
        Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

        // Other protected routes..

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/show_post', [AdminController::class, 'show_post'])->middleware('auth','admin')->name('admin.show_post');

Route::post('/admin/accept_post', [AdminController::class, 'accept_post'])->name('admin.accept_post');

Route::post('/admin/reject_post', [AdminController::class, 'reject_post'])->name('admin.reject_post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
