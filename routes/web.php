<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\SpecializationController;
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

Route::get('/', function () {
    return view('Admin_Dashboard.auth-login');
});

Route::middleware(['auth', 'active', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');


     Route::patch('users/{user}/activate', [AdminUserController::class, 'activate'])
            ->name('users.activate');

        Route::patch('users/{user}/deactivate', [AdminUserController::class, 'deactivate'])
            ->name('users.deactivate');
    
            Route::get('users/{user}/edit', [AdminUserController::class, 'edit'])
            ->name('admin.users.edit');

        Route::put('users/{user}', [AdminUserController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('users/{user}', [AdminUserController::class, 'destroy'])
            ->name('admin.users.destroy');

              //Doctor Routes
  Route::get('/Doctor/index', [DoctorController::class,'index'])->name('doctor.index');
        Route::get('Doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('Doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
      Route::put('doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
    Route::patch('doctors/{id}/status', [DoctorController::class, 'status'])->name('doctors.status');
    Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index'); // optional
          
});

// Doctor Availability Routes
Route::prefix('admin/doctors')
    ->name('admin.doctors.')
    ->middleware(['auth'])
    ->group(function () {

        Route::post(
            '/{doctor}/availability',
            [DoctorAvailabilityController::class, 'store']
        )->name('availability.store');

        Route::delete(
            '/availability/{availability}',
            [DoctorAvailabilityController::class, 'destroy']
        )->name('availability.destroy');

    
    });


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    //Patient Routes
   Route::middleware(['auth', 'active'])->group(function () {
    Route::resource('patients', App\Http\Controllers\Patient\PatientController::class);
    
});


require __DIR__.'/auth.php';
