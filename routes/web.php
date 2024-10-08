<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AccountController,
    ApplicationController,
    BorrowingController,
    BookController,
    DashboardController,
    HomeController,
    MemberController,
    UserController,
    CategoryController,
    PublisherController
};

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

// Define route for home page
Route::get('/', [HomeController::class, 'index']);

// Auth routes
Auth::routes(['register' => false, 'reset' => false]);

// Protect the routes with auth middleware
Route::middleware('auth')->group(function () {
    // Dashboard routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/', [DashboardController::class, "index"])->name('dashboard.filter');
        Route::post('/data/books-by-month', [DashboardController::class, 'getBooksByMonthData'])->name('dashboard.data.books_by_month');
        Route::post('/data/getBooksByCategory', [DashboardController::class, 'getBooksByCategory'])->name('dashboard.data.getBooksByCategory');
        Route::post('/data/getBooksStatus', [DashboardController::class, 'getBooksStatus'])->name('dashboard.data.getBooksStatus');
        Route::post('/data/getBestSellerBooks', [DashboardController::class, 'getBestSellerBooks'])->name('dashboard.data.getBestSellerBooks');
        Route::post('/data/getTotalBorrower', [DashboardController::class, 'getTotalBorrower'])->name('dashboard.data.getTotalBorrower');
        Route::post('/data/getTotalIncome', [DashboardController::class, 'getTotalIncome'])->name('dashboard.data.getTotalIncome');
    });

    // Member routes
    Route::get('members/export', [MemberController::class, 'export'])->name('members.export');
    Route::resource('members', MemberController::class);

    // Book routes including soft deletes
    Route::prefix('books')->group(function () {
        Route::get('trashed', [BookController::class, 'trashed'])->name('books.trashed');
        Route::post('{id}/restore', [BookController::class, 'restore'])->name('books.restore');
        Route::delete('{id}/force-delete', [BookController::class, 'forceDelete'])->name('books.force-delete');
    });
    Route::resource('books', BookController::class);

    // Borrowing routes
    Route::get('borrowings/export', [BorrowingController::class, 'export'])->name('borrowings.export');
    Route::resource('borrowings', BorrowingController::class);

    // Category routes
    Route::resource('categories', CategoryController::class);

    // Publisher routes
    Route::resource('publishers', PublisherController::class);

    //Accout routes
    Route::post('accounts/password', [AccountController::class, 'passwordChange'])->name('accounts.passwordChange');
    Route::resource('accounts', AccountController::class);

    //Application routes
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::put('applications/{id}', [ApplicationController::class, 'update'])->name('applications.update');

    // User routes protected with role middleware
    Route::resource('users', UserController::class)->middleware('role:admin');

    Route::get('samples/datepicker', function () {
        return view('pages.samples.datepicker');
    })->name('samples.datepicker');
});
