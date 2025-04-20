<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ReplyController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::controller(LoginRegisterController::class)->group(function() {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     // Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });


// // Route::resource('photos' PhotoController::class)->names([
// //     'create' => 'photos.build'
// // ]);

// // Route::get('/hello', function (){
// //     // return "hello world";
// //     return response()
// //         ->view('hello',$data,200)
// //         ->header('Content-Type',$type);
// // });

// Route::resource('products', ProductController::class);

// // Route::resource('users', ChangeController::class);
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('users', ChangeController::class);
// });

// Route::get('/hello', function(){
//     return view('hello', ['name'=> 'firstkiller']);
// });
// Route::get('/user/{id}', [UserController::class, 'show']);
// // Route::get('/dashboard', [DiscussionController::class, 'show'])->name('dashboard');
// // Route::get('/index', [DiscussionController::class, 'index']);

// Route::get('/', function () {
//     return redirect()->route('discussions.index');
// });


// Route::get('/dashboard', function () {
//     return redirect()->route('discussions.index');
// })->name('dashboard');

// Route::resource('discussions', DiscussionController::class)->only(['index', 'create', 'store']);




Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', ChangeController::class);
    
    
    
});


Route::get('/dashboard', function () {
    return redirect()->route('topics.index');
})->name('dashboard');

// Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
// Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
    
// Route::post('/topics/{topic}/replies', [ReplyController::class, 'store'])->name('replies.store');


Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');

Route::middleware('auth')->group(function () {
    Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
    Route::post('/topics/{topic}/replies', [ReplyController::class, 'store'])->name('replies.store');



    Route::get('/topics/{topic}', [ReplyController::class, 'showreply']
        // return inertia('MyTargetPage'); // Assuming Vue component is `MyTargetPage.vue`
    )->name('replies.show');
});


