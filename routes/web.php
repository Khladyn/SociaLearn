<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Models
use App\Models\User;
use App\Models\Course;
use App\Models\EnrolledCourse;
use App\Models\Resource;
use App\Models\EnrolledResource;
use App\Models\Session;
use App\Models\Discussion;
use App\Models\Chat;

// Controllers
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ChatController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Main pages
Route::get('/courses', [CourseController::class, 'displayAll'])->name('courses');

Route::get('/courseview', function () {
    return view('courseview');
});

Route::get('/enrolledcourses', function () {
    return view('enrolledcourses');
});

Route::get('/users', function () {

    $users = User::all();
    return view('users', ['users' => $users]);
});

// Course
Route::get('/create/course', [CourseController::class, 'createCourseView'])->name('create.view.course');
Route::post('/create/course', [CourseController::class, 'createCourse'])->name('create.course');
Route::put('/edit/course', [CourseController::class, 'editCourse'])->name('edit.course');
Route::delete('/delete/course', [CourseController::class, 'deleteCourse'])->name('delete.course');

// Route::get('/enrolled-course', [CourseController::class, 'createEnrolledCourseView'])->name('view.course');
// Route::get('/edit/enrolled-course', [CourseController::class, 'createEnrolledCourseView'])->name('create.course.view');


// Resource
Route::get('/create/resource', [ResourceController::class, 'createResourceView'])->name('reate.view.resource');
Route::post('/create/resource', [ResourceController::class, 'createResource'])->name('create.resource');
Route::put('/edit/resource', [ResourceController::class, 'editResource'])->name('edit.resource');
Route::delete('/delete/resource', [ResourceController::class, 'deleteResource'])->name('delete.resource');

// Session
Route::get('/create/session', [SessionController::class, 'createSessionView'])->name('reate.view.session');
Route::post('/create/session', [SessionController::class, 'createSession'])->name('create.session');
Route::put('/edit/session', [SessionController::class, 'editSession'])->name('edit.session');
Route::delete('/delete/session', [SessionController::class, 'deleteSession'])->name('delete.session');

// Discussion
Route::get('/create/discussion', [DiscussionController::class, 'createDiscussionView'])->name('create.view.discussion');
Route::post('/create/discussion', [DiscussionController::class, 'createDiscussion'])->name('create.discussion');
Route::put('/edit/discussion', [DiscussionController::class, 'editDiscussion'])->name('edit.discussion');
Route::delete('/delete/discussion', [DiscussionController::class, 'deleteDiscussion'])->name('delete.discussion');

// Chat
// Route::get('/chats', [ChatController::class, 'displayAll'])->name('view.chat');
// Route::post('/create/chat', [ChatController::class, 'createChat'])->name('create.chat');
// Route::delete('/delete/chat', [ChatController::class, 'deleteChat'])->name('delete.chat');

// routes/web.php

Auth::routes();

Route::get('/chatsTest', 'App\Http\Controllers\ChatController@index');
Route::get('messages', 'App\Http\Controllers\ChatController@fetchMessages');
Route::post('messages', 'App\Http\Controllers\ChatController@sendMessage');


// Route::get('/users', 'YourController@showUserList')->name('user-list');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
