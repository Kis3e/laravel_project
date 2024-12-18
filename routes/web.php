<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Auth;

// Main Page
// Login Page
Route::get('/', [AuthManager::class, 'login'])->name('login'); 
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

// Registration form
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

// Logout Route
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

// Dashboard Route Based on User Role (This will use the `auth` middleware to ensure the user is logged in)
Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect(route('login'));
})->name('dashboard')->middleware('auth');

// Admin Routes (Protected by `auth` middleware)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');

    // Equipment Routes for Admin
    Route::get('/admin/dashboard/equipments/equipmentlist', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/admin/dashboard/equipments/addequipment', [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/admin/dashboard/equipments/addequipment', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/admin/dashboard/equipments/equipmentlist/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/admin/dashboard/equipments/equipmentlist/{equipment}/update', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/admin/dashboard/equipments/equipmentlist/{equipment}/delete', [EquipmentController::class, 'delete'])->name('equipment.delete');
    Route::get('/admin/dashboard/equipments/equipmentlist/{equipment}/detail', [EquipmentController::class, 'showDetail'])->name('equipment.showDetail');
});



// User Routes (Protected by `auth` middleware)
Route::middleware(['auth', 'role:outsider'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.equipmentlist'); // User dashboard view
    })->name('user.dashboard');

    Route::get('/user/equipmentlist', [UserController::class, 'index'])->name('user.equipmentlist.index');
    Route::get('/user/equipment/{equipment}/detail', [UserController::class, 'showDetail'])->name('user.equipment.showDetail');
});
