<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConversationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Models\Conversation;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::post('/login', $controller_path . '\authentications\LoginBasic@login')->name('login');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');


// Reclamtion
Route::get('/Reclamtion', $controller_path . '\reclamation\ReclamtionController@index')->name('reclamation');
Route::get('/Reclamtion/add', $controller_path . '\reclamation\ReclamtionController@create')->name('createR');
Route::post('/Reclamtion/addR', $controller_path . '\reclamation\ReclamtionController@store')->name('store');
Route::get('/Reclamtion/update/{reclamtion}', $controller_path . '\reclamation\ReclamtionController@edit')->name('updateR');
Route::put('/Reclamtion/updateR/{reclamtion}', $controller_path . '\reclamation\ReclamtionController@update')->name('update');
Route::delete('/Reclamtion/delet/{reclamtion}', $controller_path . '\reclamation\ReclamtionController@destroy')->name('destroyR');




Route::get('/bloggggs', $controller_path . '\blog\BlogController@indexF')->name('blog');


Route::get('/about', function () {
  return view('Template.about');
})->name('about');



Route::get('/contact', function () {
  return view('Template.contact');
})->name('contact');

//reclamationFont
Route::get('/Reclations', function () {
  return view('Template.reclamation');
})->name('reclamtion');


Route::get('/history', $controller_path . '\reclamation\ReclamtionController@indexh')->name('history');


Route::get('/cart', function () {
  return view('Template.cart');
})->name('cart');

Route::get('/product',[ProductController::class,'affichefront'])->name('shop');;
Route::get('/products',[ProductController::class,'index'])->name('products.affiche');;
// Route::get('/allproducts',[ProductController::class,'affichefront'])->name('products.affichefront');;
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');;
Route::get('/createprod',[ProductController::class,'create'])->name('create');;
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');;
Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('/product/{id}', [ProductController::class,'update'])->name('products.update');

Route::get('/product-details/{productId}', [ProductController::class,'productDetails'])->name('product.details');

//Blog
Route::get('/Blog', $controller_path . '\blog\BlogController@index')->name('blogg');
Route::get('/Blog/add', $controller_path . '\blog\BlogController@create')->name('createBlog');
Route::post('/Blog/addB', $controller_path . '\blog\BlogController@store')->name('store');
Route::get('/Blog/updateB/{blog}', $controller_path . '\blog\BlogController@edit')->name('updateB');
Route::put('/Blog/update/{blog}', $controller_path . '\blog\BlogController@update')->name('update');
Route::delete('/Blog/delet/{blog}', $controller_path . '\blog\BlogController@destroy')->name('destroyB');



Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations');
Route::get('/conversations/{user}', [ConversationController::class, 'show'])->name('conversations.show');
Route::post('/conversations/{user}', [ConversationController::class, 'store'])->name('conversations.store');
Route::get('/search-users', [ConversationController::class, 'searchUsers']);
Route::get('/conversations/{from}/{to}', [ConversationController::class, 'getMessagesBetweenUsers']);
Route::post('/conversations/send-message/{from}/{to}', [ConversationController::class, 'sendMessage'])->name('conversations.sendMessage');
Route::delete('/conversations/delete-message/{messageId}', [ConversationController::class,'deleteMessage'])->name('conversations.deleteMessage');
Route::post('/update-message', [ConversationController::class, 'update'])->name('conversations.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
  Route::get('/frontoffice', function () {
    return view('Template.master');
  })->name('index');
  Route::resource('community',CommunityController::class);
  Route::post('/join-community/{community}', [CommunityController::class,'join'])
    ->name('community.join');
  Route::resource('event', EventController::class);
  Route::get('event/create/{id}', [EventController::class,'form'])->name('event.form');
  Route::get('communities', [CommunityController::class,'indexAdmin'])->name('community.indexAdmin');
  Route::get('events', [EventController::class,'indexAdmin'])->name('event.indexAdmin');
  Route::get('communities/{community}/edit', [CommunityController::class,'editAdmin'])->name('community.editAdmin');
});
