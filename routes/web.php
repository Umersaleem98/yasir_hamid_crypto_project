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
            Route::get('/manager_dashboard', [UserController::class, 'manager_dashboard'])->name('manager_dashboard');
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

Route::get('/admin_list', [AdminController::class, 'admin_list']);
Route::get('/add_users', [AdminController::class, 'user_add']);
Route::post('/add_users', [AdminController::class, 'user_store']);

Route::get('/user_list', [AdminController::class, 'user_list']);



Route::get('/edit_users/{id}', [AdminController::class, 'user_edit']);
Route::post('/update_users/{id}', [AdminController::class, 'update_user']);
Route::get('/delete_users/{id}', [AdminController::class, 'delete_user']);

// user side routes

Route::get('/add_project_user', [UsersideController::class, 'add_project_user'])->name('add_project_user');
Route::Post('/project_store_user', [UsersideController::class, 'project_store'])->name('project_store_user');
Route::get('/list_project_user', [UsersideController::class, 'project_list'])->name('list_project_user');
Route::get('/delete_project_user/{id}', [UsersideController::class, 'delete_project'])->name('delete_project_user');
Route::get('/edit_product_user/{id}', [UsersideController::class, 'edit_product'])->name('edit_product_user');

// Sub moduls routes
// project type routes
Route::post('/project-type', [ProjectTypeController::class, 'store'])->name('project-type.store');
Route::get('/project_type_list', [ProjectTypeController::class, 'project_type_list']);
Route::get('/projecttype_edit/{id}', [ProjectTypeController::class, 'edit']);
Route::post('/projecttype_update/{id}', [ProjectTypeController::class, 'update']);
Route::get('/projecttype_delete/{id}', [ProjectTypeController::class, 'destroy']);
// project type routes
Route::post('/project-category', [ProjectCategoryController::class, 'store']);
Route::get('/project_category_list', [ProjectCategoryController::class, 'project_category_list']);
Route::get('/project_category_edit/{id}', [ProjectCategoryController::class, 'edit']);
Route::post('/update_category/{id}', [ProjectCategoryController::class, 'update']);
Route::get('/deleteCategory/{id}', [ProjectCategoryController::class, 'delete']);

// Projecr domain routes
Route::post('/project-domains', [ProjectDomainController::class, 'store'])->name('project-domains.store');
Route::get('/project-domains_list', [ProjectDomainController::class, 'list']);
Route::get('/project_domains_edit/{id}', [ProjectDomainController::class, 'edit']);
Route::post('/update_domains/{id}', [ProjectDomainController::class, 'update']);
Route::get('/deletedimains/{id}', [ProjectDomainController::class, 'delete']);


Route::Post('/taken_standard', [TakenStandardController::class, 'store']);
Route::get('/takenstandard_list', [TakenStandardController::class, 'list']);
Route::get('/takenStandard_edit/{id}', [TakenStandardController::class, 'edit']);
Route::post('/update_taken_standard/{id}', [TakenStandardController::class, 'update']);
Route::get('/takenStandard_delete/{id}', [TakenStandardController::class, 'delete']);

Route::post('/blockchain-platform', [BlockchainPlatformController::class, 'store']);
Route::get('/blockchain_platform_list', [BlockchainPlatformController::class, 'list']);
Route::get('/blockchain_platform_edit/{id}', [BlockchainPlatformController::class, 'edit']);
Route::post('/blockchain_platform_update/{id}', [BlockchainPlatformController::class, 'update']);
Route::get('/blockchain_platform_delete/{id}', [BlockchainPlatformController::class, 'delete']);


Route::post('/audits', [AuditController::class, 'store'])->name('audits.store');
Route::get('/audit_list', [AuditController::class, 'list']);
Route::get('/audits_edit/{id}', [AuditController::class, 'edit']);
Route::post('/audits_update/{id}', [AuditController::class, 'update']);
Route::get('/audits_delete/{id}', [AuditController::class, 'delete']);

Route::post('/social-media', [SocialMediaController::class, 'store'])->name('social-media.store');
Route::get('/socialmedia_list', [SocialMediaController::class, 'list']);
Route::get('/socialmedia_edit/{id}', [SocialMediaController::class, 'edit']);
Route::post('/socialmedia_update/{id}', [SocialMediaController::class, 'update']);
Route::get('/socialmedia_delete/{id}', [SocialMediaController::class, 'delete']);

Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies_list', [CompanyController::class, 'list']);
Route::get('/companies_edit/{id}', [CompanyController::class, 'edit']);
Route::post('/companies_update/{id}', [CompanyController::class, 'update']);
Route::get('/companies_delete/{id}', [CompanyController::class, 'delete']);

Route::post('/developers', [DeveloperController::class, 'store']);
Route::get('/developers_list', [DeveloperController::class, 'list']);
Route::get('/developers_edit/{id}', [DeveloperController::class, 'edit']);
Route::post('/developers_update/{id}', [DeveloperController::class, 'update']);
Route::get('/developers_delete/{id}', [DeveloperController::class, 'delete']);


Route::post('/promoters', [PromoterController::class, 'store'])->name('promoters.store');
Route::get('/promoters_list', [PromoterController::class, 'list']);
Route::get('/promoters_edit/{id}', [PromoterController::class, 'edit']);
Route::post('/promoters_update/{id}', [PromoterController::class, 'update']);
Route::get('/promoters_delete/{id}', [PromoterController::class, 'delete']);


Route::post('/private-investors', [PrivateInvestorController::class, 'store'])->name('private_investors.store');
Route::get('/privateinvester_list', [PrivateInvestorController::class, 'list']);
Route::get('/PrivateInvestors_edit/{id}', [PrivateInvestorController::class, 'edit']);
Route::post('/PrivateInvestors_update/{id}', [PrivateInvestorController::class, 'update']);
Route::get('/privateinvester_delete/{id}', [PrivateInvestorController::class, 'delete']);


Route::post('/investor-companies', [InvestorCompanyController::class, 'store'])->name('investor_companies.store');
Route::get('/investor_companies_list', [InvestorCompanyController::class, 'list']);
Route::get('/investor_companies_edit/{id}', [InvestorCompanyController::class, 'edit']);
Route::post('/investor_companies_update/{id}', [InvestorCompanyController::class, 'update']);
Route::get('/investor_companies_delete/{id}', [InvestorCompanyController::class, 'delete']);


Route::post('/promoter-types', [PromoterTypeController::class, 'store'])->name('promoter_types.store');
Route::get('/promoter_types_list', [PromoterTypeController::class, 'list']);
Route::get('/promoter_types_edit/{id}', [PromoterTypeController::class, 'edit']);
Route::post('/promoter_types_update/{id}', [PromoterTypeController::class, 'update']);
Route::get('/promoter_types_delete/{id}', [PromoterTypeController::class, 'delete']);


Route::post('/wallet-addresses', [WalletAddressController::class, 'store'])->name('wallet_addresses.store');
Route::get('/wallet_addresses_list', [WalletAddressController::class, 'list']);
Route::get('/wallet_addresses_edit/{id}', [WalletAddressController::class, 'edit']);
Route::post('/wallet_addresses_update/{id}', [WalletAddressController::class, 'update']);
Route::get('/wallet_addresses_delete/{id}', [WalletAddressController::class, 'delete']);

// Sub modules end

Route::get('/manage_project_home', [HomeController::class, 'manage_project_home']);
Route::get('/preview_project_home/{id}', [HomeController::class, 'preview_project_home']);


Route::get('/live-prices', [CoinController::class, 'getLivePrices']);
Route::get('/trending-coins', [CoinController::class, 'getTrendingCoins']);
Route::get('/crypto_table', [CoinController::class, 'crypto_table']);
Route::get('/currency_filter', [CoinController::class, 'currencyFilter']);
Route::get('/coins_list', [CoinController::class, 'coinsList']);
Route::get('/coin_details', [CoinController::class, 'getCoinsDetails']);


Route::get('/category_page', [CustompageController::class, 'acadmey_home']);
Route::get('/sqa_type', [CustompageController::class, 'SQA_type']);
Route::get('/guide_screen_home', [CustompageController::class, 'Guide_screen']);

// Category routes

Route::get('/categories', [CategoryController::class, 'create']);
Route::post('/categories_store', [CategoryController::class, 'store']);
Route::get('/categorylist', [CategoryController::class, 'category_list']);
Route::delete('/categories_delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/subcategory_page/{id}', [CategoryController::class, 'Subcategory']);
