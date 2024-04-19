<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResourceController;

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


// Registration and Login
Route::get('/socialearn', function () {
    return redirect('/login');
})->name('index');

// Redirect the root URL to /login
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('index');
Route::post('/login', [UserController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/register_2', function () {
    return view('pages.register_2');
})->name('get_register_2');
Route::post('/register_2', [UserController::class, 'registerStep2'])->name('register_2');


// Add the 'auth' middleware to protect these routes
Route::middleware(['auth.user'])->group(function () {
    // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [CourseController::class, 'showDashboard'])->name('dashboard');
    
    Route::get('/my_courses', [CourseController::class, 'index'])->name('my_courses');
    Route::get('/enrolled_courses', [CourseController::class, 'showOtherCourses'])->name('enrolled_courses');

    Route::get('/create_course', function () {
        return view('pages.courses_my_create');
    })->name('create_course');

        // Store - Save a new course
        Route::post('/create_course', [CourseController::class, 'store'])->name('create_course');

        // Show - Display details of a specific course
        Route::get('/courses/{course}', [CourseController::class, 'show'])->name('show_course');

        // Update - Update a specific course
        Route::put('/courses/{course}', [CourseController::class, 'update'])->name('update_course');

        // Destroy - Delete a specific course
        Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('delete_course');

        Route::get('/search/courses', [CourseController::class, 'searchCourses'])->name('search_courses');

    
    Route::get('/all_courses', function () {
        return view('pages.courses_all');
    })->name('all_courses');

    Route::get('/network', [UserController::class, 'showUsers'])->name('network');
    
    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('view_profile');

    Route::post('/send_message', [ChatController::class, 'sendMessage'])->name('send_message');
    Route::post('/read_messages', [ChatController::class, 'markAsRead'])->name('read_messages');



// Update Routes
Route::post('/update-email', [UserController::class, 'updateEmail'])->name('update_email');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update_password');
Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update_profile');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('delete_user');


// Route::get('/resources', [ResourceController::class, 'index'])->name('show_course');
Route::post('/resources', [ResourceController::class, 'store'])->name('create_resource');
// Route::put('/resources/{resource}', [ResourceController::class, 'update'])->name('update_resource');
Route::delete('/resources/{resource}', [ResourceController::class, 'destroy'])->name('delete_resource');

});

