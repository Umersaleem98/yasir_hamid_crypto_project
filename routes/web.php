<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PromoterController;
use App\Http\Controllers\UsersideController;
use App\Http\Controllers\developerController;
use App\Http\Controllers\CustompageController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\PromoterTypeController;
use App\Http\Controllers\CoinMarketCapController;
use App\Http\Controllers\ProjectDomainController;
use App\Http\Controllers\TakenStandardController;
use App\Http\Controllers\WalletAddressController;
use App\Http\Controllers\InvestorCompanyController;
use App\Http\Controllers\PrivateInvestorController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\BlockchainPlatformController;
use App\Http\Controllers\submodules\ProjectTypeController;

// homepage
Route::get("/", [HomeController::class, 'index']);
// AUth controller
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'store']);

Route::middleware('auth.check')->group(function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->usertype === 'admin') {
            Route::get('/admin', [AdminController::class, 'index'])->name('admin');
            // Other admin routes...
        } elseif ($user->usertype === 'user') {
            Route::get('/user_dashboard', [UserController::class, 'user_dashboard'])->name('user_dashboard');
            // Other user routes...
        }
    }
});

// project and admin routes
Route::get('/add_project', [AdminController::class, 'add_project'])->name('add_project');
Route::Post('/project_store', [AdminController::class, 'project_store'])->name('project_store');
Route::get('/list_project', [AdminController::class, 'project_list'])->name('list_project');
Route::get('/delete_project/{id}', [AdminController::class, 'delete_project'])->name('delete_project');
Route::get('/approve_project/{id}', [AdminController::class, 'approve'])->name('approve_project');
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');

// user side routes

Route::get('/add_project_user', [UsersideController::class, 'add_project_user'])->name('add_project_user');
Route::Post('/project_store_user', [UsersideController::class, 'project_store'])->name('project_store_user');
Route::get('/list_project_user', [UsersideController::class, 'project_list'])->name('list_project_user');
Route::get('/delete_project_user/{id}', [UsersideController::class, 'delete_project'])->name('delete_project_user');
Route::get('/edit_product_user/{id}', [UsersideController::class, 'edit_product'])->name('edit_product_user');

// Sub moduls routes

Route::post('/project-type', [ProjectTypeController::class, 'store'])->name('project-type.store');
Route::post('/project-category', [ProjectCategoryController::class, 'store'])->name('project-category.store');
Route::post('/project-domains', [ProjectDomainController::class, 'store'])->name('project-domains.store');
Route::Post('/taken_standard', [TakenStandardController::class, 'store']);
Route::post('/blockchain-platform', [BlockchainPlatformController::class, 'store'])->name('blockchain.platform.store');
Route::post('/audits', [AuditController::class, 'store'])->name('audits.store');
Route::post('/social-media', [SocialMediaController::class, 'store'])->name('social-media.store');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::post('/developers', [DeveloperController::class, 'store'])->name('developers.store');
Route::post('/promoters', [PromoterController::class, 'store'])->name('promoters.store');
Route::post('/private-investors', [PrivateInvestorController::class, 'store'])->name('private_investors.store');
Route::post('/investor-companies', [InvestorCompanyController::class, 'store'])->name('investor_companies.store');
Route::post('/promoter-types', [PromoterTypeController::class, 'store'])->name('promoter_types.store');
Route::post('/wallet-addresses', [WalletAddressController::class, 'store'])->name('wallet_addresses.store');

// Sub modules end


Route::get('/manage_project_home', [HomeController::class, 'manage_project_home']);
Route::get('/preview_project_home/{id}', [HomeController::class, 'preview_project_home']);


Route::get('/live-prices', [CoinController::class, 'getLivePrices']);
Route::get('/trending-coins', [CoinController::class, 'getTrendingCoins']);
Route::get('/crypto_table', [CoinController::class, 'crypto_table']);

Route::get('/category_page', [CustompageController::class, 'acadmey_home']);
Route::get('/sqa_type', [CustompageController::class, 'SQA_type']);
Route::get('/guide_screen_home', [CustompageController::class, 'Guide_screen']);


Route::get('/categories', [CategoryController::class, 'create']);
Route::post('/categories_store', [CategoryController::class, 'store']);
Route::get('/categorylist', [CategoryController::class, 'category_list']);
Route::delete('/categories_delete/{id}', [CategoryController::class, 'destroy']);

// Route::get('/subcategory_page', [CategoryController::class, 'Subcategory']);
Route::get('/subcategory_page/{id}', [CategoryController::class, 'Subcategory']);
