<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 57h 7[0l
0]
*/

// Route::get('/', function () {
//     return view('frontend.pages.index');
// });


Route::get('/', [FrontendController::class, 'index'])->name('front.index');


Route::group(['middleware'=>'auth', 'prefix'=>'dashboard'], function (){
    Route::get('/', [BackendController::class, 'index'])->name('back.index');

    //category controller code start
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Route::resource('/dashboard/category', BackendController::class);
    //category controller code start



    //sub_category controller code start
    Route::get('sub-categories/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
    Route::post('sub-categories', [SubCategoryController::class, 'store'])->name('sub-categories.store');
    Route::get('sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
    Route::get('sub-categories/{subCategory}', [SubCategoryController::class, 'show'])->name('sub-categories.show');
    Route::get('sub-categories/{subCategory}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
    Route::put('sub-categories/{subCategory}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
    Route::delete('sub-categories/{subCategory}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');


    //sub_category controller code end

    Route::resource('posts', PostController::class);
    Route::get('get-sub-categories/{id}', [SubCategoryController::class, 'get_sub_categories']);


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
