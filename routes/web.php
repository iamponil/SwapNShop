<?php

use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\EventController;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\reclamation\ReclamtionController;
use App\Http\Controllers\tables\Basic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EchangeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OffreController;
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


Route::get('/', function () {
  return view('Template.master');
})->name('index');
Route::get('/qr', function () {
  return view('emails.participationTicket');
})->name('ticket');
//Route::resource('community',CommunityController::class);
Route::resource('blog',BlogController::class);
Route::resource('reclamation',ReclamtionController::class);
Route::post('/join-community/{community}', [CommunityController::class,'join'])
  ->name('community.join');
Route::post('/join-event/{event}', [EventController::class,'join'])
  ->name('event.join');
Route::post('/leave-event/{event}', [EventController::class,'leave'])
  ->name('event.leave');
Route::post('/leave-community/{community}', [CommunityController::class,'leave'])
  ->name('community.leave');

Route::get('/get/{community}', [CommunityController::class,'getById'])->name('community.getById');
Route::delete('/delete/{community}', [CommunityController::class,'delete'])->name('community.delete');
Route::get('community', [CommunityController::class,'index'])->name('community.index');
Route::get('community/create', [CommunityController::class,'create'])->name('community.create');
Route::post('community/addCommunity', [CommunityController::class,'storeApi'])->name('community.addCommunity');
Route::get('community/{id}/editForm', [CommunityController::class,'editForm'])->name('community.editForm');
Route::put('updateCommunity/{community}', [CommunityController::class,'updateApi'])->name('community.updateCommunity');

Route::get('product/{id}/editForm', [ProductController::class,'editForm'])->name('product.editForm');

Route::resource('event', EventController::class);
Route::get('event/create/{id}', [EventController::class,'form'])->name('event.form');
Route::get('communities', [CommunityController::class,'indexAdmin'])->name('community.indexAdmin');
Route::get('myCommunities', [CommunityController::class,'myCommunities'])->name('community.myCommunities');
Route::get('myEvents', [EventController::class,'myEvents'])->name('event.myEvents');
Route::get('events', [EventController::class,'indexAdmin'])->name('event.indexAdmin');
Route::get('communities/{community}/edit', [CommunityController::class,'editAdmin'])->name('community.editAdmin');
Route::get('events/{event}/edit', [EventController::class,'editAdmin'])->name('event.editAdmin');


Route::get('/about', function () {
  return view('Template.about');
})->name('about');
Route::get('/contact', function () {
  return view('Template.contact');
})->name('contact');
Route::get('/cart', function () {
  return view('Template.cart');
})->name('cart');

Route::get('/product',[ProductController::class,'affichefront'])->name('shop');
Route::get('/myproduct',[ProductController::class,'afficherMesproduits'])->name('myproduct');
Route::get('/products',[ProductController::class,'index'])->name('products.affiche');
// Route::get('/allproducts',[ProductController::class,'affichefront'])->name('products.affichefront');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('/createprod',[ProductController::class,'create'])->name('create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::get('/productsedit/{id}', [ProductController::class,'editfront'])->name('productseditf');
Route::put('/product/{id}', [ProductController::class,'update'])->name('products.update');
Route::post('/create-offre', [OffreController::class,'create'])->name('offre.create');
Route::get('/getProductOffers/{productId}', [OffreController::class,'getProductOffers'])->name('product.offers');

Route::get('/product-details/{productId}', [ProductController::class,'productDetails'])->name('product.details');

Route::post('/sendConfirmationEmail/{userId}/{productId}', [EmailController::class,'sendConfirmationEmail'])->name('sendConfirmationEmail');
Route::post('/createEchange', );
Route::post('/confirmEchange/{offreId}', [EchangeController::class,'confirmEchange'])->name('confirmEchange');

Route::post('/deleteOffers/{productId}',[OffreController::class,'deleteByProduct']);

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
    'verified',
  'role:admin'
])->group(function () {
  Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
