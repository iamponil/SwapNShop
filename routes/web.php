<?php

use App\Http\Controllers\ReponceReclamationController;
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
use App\Http\Controllers\AdresseLivraisonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EchangeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LivraisonnnController;
use App\Http\Controllers\WishlistController;


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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
  Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
  Route::resource('community',CommunityController::class);
  Route::post('/join-community/{community}', [CommunityController::class,'join'])
    ->name('community.join');
  Route::post('/join-event/{event}', [EventController::class,'join'])
    ->name('event.join');
  Route::post('/leave-event/{event}', [EventController::class,'leave'])
    ->name('event.leave');
  Route::post('/leave-community/{community}', [CommunityController::class,'leave'])
    ->name('community.leave');
  Route::resource('event', EventController::class);
  Route::get('event/create/{id}', [EventController::class,'form'])->name('event.form');
  Route::get('communities', [CommunityController::class,'indexAdmin'])->name('community.indexAdmin');
  Route::get('myCommunities', [CommunityController::class,'myCommunities'])->name('community.myCommunities');
  Route::get('myEvents', [EventController::class,'myEvents'])->name('event.myEvents');
  Route::get('events', [EventController::class,'indexAdmin'])->name('event.indexAdmin');
  Route::get('communities/{community}/edit', [CommunityController::class,'editAdmin'])->name('community.editAdmin');
  Route::get('events/{event}/edit', [EventController::class,'editAdmin'])->name('event.editAdmin');
  // Main Page Route
  Route::get('/backoffice', [Analytics::class , 'index'])->name('dashboard-analytics');

// layout
  Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
  Route::get('/layouts/without-navbar',[WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
  Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
  Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
  Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
  Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
  Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
  Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
  Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
  //Route::get('/auth/login-basic', [LoginBasic::class , 'index'])->name('auth-login-basic');
  //Route::post('/login', [LoginBasic::class, 'login'])->name('login');
  //Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
  //Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
  Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
  Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
  Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
  Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
  Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
  Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
  Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
  Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
  Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
  Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
  Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
  Route::get('/ui/navbar', [Navbar::class,'index'])->name('ui-navbar');
  Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
  Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
  Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
  Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
  Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
  Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
  Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
  Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
  Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
  Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
  Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
  Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
  Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
  Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
  Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
  Route::get('/tables/basic', [Basic::class, 'index'])->name('tables-basic');


// Reclamtion

Route::get('/Reclamtion/show/{reclamtion}', [ReclamtionController::class,'show'])->name('showR');
Route::get('/Reclamtion/archive/{id}',  [ReclamtionController::class,'archive'])->name('archivee');
Route::get('/Reclamtion/desarchivee/{id}', [ReclamtionController::class,'desarchive'])->name('desarchivee');
Route::get('/Reclamtion_desarchive',  [ReclamtionController::class,'indexdesarchive'])->name('reclamationdes');
Route::get('/Reclamtion/filtrer-reclamations',[ReclamtionController::class,'filtrerReclamations'])->name('filtrageStatue');
Route::get('/Reclamtionn', [ReclamtionController::class,'filtree'])->name('filtreeR');

//reponse
//Route::post('reclamations/{reclamationId}', '\reclamation\ReclamtionController@repondre')->name('reclamationsrepondre');
//Route::get('/repondre/add/{reclamationId}', $controller_path . '\reclamation\ReclamtionController@create')->name('repondre');
Route::get('/reclamation/{reclamationId}/comment', [ReponceReclamationController::class, 'showCommentForm'])->name('comment.form');
Route::post('/reclamation/{reclamationId}/comment', [ReponceReclamationController::class, 'storeComment'])->name('comment.store');
Route::get('/reclamation/{reclamationId}/comments', [ReponceReclamationController::class, 'showComments'])->name('comment.show');
  Route::get('/Reclamtion', [ReclamtionController::class , 'index'])->name('reclamation');
  Route::get('/Reclamtion/add', [ReclamtionController::class , 'create'])->name('createR');
  Route::post('/Reclamtion/addR', [ReclamtionController::class , 'store'])->name('store');
  Route::get('/Reclamtion/update/{reclamtion}', [ReclamtionController::class,'edit'])->name('updateR');
  Route::put('/Reclamtion/updateR/{reclamtion}', [ReclamtionController::class,'update'])->name('update');
  Route::delete('/Reclamtion/delet/{reclamtion}', [ReclamtionController::class,'destroy'])->name('destroyR');




  Route::get('/bloggggs', [BlogController::class , 'indexF'])->name('blog');


  Route::get('/about', function () {
    return view('Template.about');
  })->name('about');

Route::get('/blog-detail', function () {
  return view('Template.blog-detail');
})->name('blog-detail');

  Route::get('/contact', function () {
    return view('Template.contact');
  })->name('contact');

//reclamationFont
  Route::get('/Reclations', function () {
    return view('Template.reclamation');
  })->name('reclamtion');



  Route::get('/history', [ReclamtionController::class , 'indexh'])->name('historyFR');

Route::put('/Reclamtion/updateR/{reclamtion}', [ReclamtionController::class,'updateF']  )->name('updateFR');

  Route::get('/cart', function () {
    return view('Template.cart');
  })->name('cart');

  Route::get('/product',[ProductController::class,'affichefront'])->name('shop');;
  Route::get('/myproduct',[ProductController::class,'afficherMesproduits'])->name('myproduct');;
  Route::get('/products',[ProductController::class,'index'])->name('products.affiche');;
Route::get('/cart', function () {
  return view('Template.cart');
})->name('cart');
//******************Livraison********************************
Route::get('/Livraison', [LivraisonnnController::class ,'index'])->name('showLivraison');
Route::post('/Livraison', [LivraisonnnController::class ,'store'])->name('showLivraisonadded');
Route::get('/addLivraison', [LivraisonnnController::class ,'create'])->name('view');
Route::get('/updateLivraison/{id}', [LivraisonnnController::class,'updateStatus'])->name('updateStatusLivraison');
Route::get('/pdf', [LivraisonnnController::class ,'pdf'])->name('pdf');


//**********************************************************


//AdresseLivraison
Route::get('/AdrresseLivraison', [AdresseLivraisonController::class, 'showDeliveryAddresses'], function () {
  return view('Template.adresselivraison');
})->name('AdrresseLivraison');


//Route::post('/adresselivraison/add', $controller_path . '\AdresseLivraisonController@store')->name('addAddreslivraison');
//Route::get('/livraisons', [AdresseLivraisonController::class, 'showDeliveryAddresses'])->name('livraisons');
Route::group(['middleware' => 'auth'], function () {
  // Vos routes protégées ici
  Route::post('/adresselivraison/add', [AdresseLivraisonController::class, 'store'])->name('addAddreslivraison');
});
Route::delete('/delet/{adresseLivraison}', [LivraisonnnController::class ,'destroy'])->name('destroyL');
Route::get('/update/{adresseLivraison}',  [LivraisonnnController::class ,'edit'])->name('updateLIV');
Route::put('/updateLIV/{adresseLivraison}',  [LivraisonnnController::class ,'update'])->name('updateL');


Route::get('/product', [ProductController::class, 'affichefront'])->name('shop');;
Route::get('/myproduct', [ProductController::class, 'afficherMesproduits'])->name('myproduct');;
Route::get('/products', [ProductController::class, 'index'])->name('products.affiche');;
// Route::get('/allproducts',[ProductController::class,'affichefront'])->name('products.affichefront');;
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');;
Route::get('/createprod',[ProductController::class,'create'])->name('create');;
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');;
Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::get('/productsedit/{id}', [ProductController::class,'editfront'])->name('productseditf');
Route::put('/product/{id}', [ProductController::class,'update'])->name('products.update');
Route::post('/create-offre', [OffreController::class,'create'])->name('offre.create');
Route::get('/getProductOffers/{productId}', [OffreController::class,'getProductOffers'])->name('product.offers');
Route::post('/wishlist/toggle',[WishlistController::class,'toggleProduct'])->name('wishlist.toggle');
Route::get('/wishlist/show',[WishlistController::class,'showWishlist'])->name('wishlist.show');
Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist.index');
Route::get('/product-details/{productId}', [ProductController::class,'productDetails'])->name('product.details');


Route::post('/sendConfirmationEmail/{userId}/{productId}', [EmailController::class,'sendConfirmationEmail'])->name('sendConfirmationEmail');
Route::post('/createEchange', );
Route::post('/confirmEchange/{offreId}', [EchangeController::class,'confirmEchange'])->name('confirmEchange');
Route::post('/deleteOffers/{productId}',[OffreController::class,'deleteByProduct']);
  Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.destroy');;
 

//Blog
  Route::get('/Blog', [BlogController::class, 'index'])->name('blogg');
  Route::get('/Blog/add', [BlogController::class , 'create'])->name('createBlog');
  Route::post('/Blog/addB', [BlogController::class, 'store'])->name('store');
  Route::get('/Blog/updateB/{blog}', [BlogController::class,'edit'])->name('updateB');
  Route::put('/Blog/update/{blog}', [BlogController::class,'update'])->name('update');
  Route::delete('/Blog/delet/{blog}', [BlogController::class, 'destroy'])->name('destroyB');


  Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations');
  Route::get('/conversations/{user}', [ConversationController::class, 'show'])->name('conversations.show');
  Route::post('/conversations/{user}', [ConversationController::class, 'store'])->name('conversations.store');
  Route::get('/search-conversations', [ConversationController::class, 'searchConversation']);
  Route::get('/conversations/{from}/{to}', [ConversationController::class, 'getMessagesBetweenUsers']);
  Route::post('/conversations/send-message/{from}/{to}', [ConversationController::class, 'sendMessage'])->name('conversations.sendMessage');
  Route::delete('/conversations/delete-message/{messageId}', [ConversationController::class,'deleteMessage'])->name('conversations.deleteMessage');
  Route::post('/update-message', [ConversationController::class, 'update'])->name('conversations.update');
  Route::get('/message/item/{message}/{timestamp}/{message_id}',[ConversationController::class,'messageItem'] )
      ->name('message_item');
      Route::post('/conversations/create-or-find/{userId}/{productId}/{offreId}', [ConversationController::class, 'createOrFindConversation']);
      Route::post('/create/conversation/{conversationName}', [ConversationController::class, 'createConversation']);
      Route::post('/translate',[ConversationController::class,'translate']);
    
 
});

