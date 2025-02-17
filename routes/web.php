<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PaymentController;

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

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class,'index'])->middleware(
    [

        'XSS',
    ]
);
Route::get('home', [HomeController::class,'index'])->name('home')->middleware(
    [

        'XSS',
    ]
);
Route::get('dashboard', [HomeController::class,'index'])->name('dashboard')->middleware(
    [

        'XSS',
    ]
);

//-------------------------------User-------------------------------------------

Route::resource('users', UserController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);


//-------------------------------Subscription-------------------------------------------



Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::resource('subscriptions', SubscriptionController::class);
    Route::get('coupons/history', [CouponController::class,'history'])->name('coupons.history');
    Route::delete('coupons/history/{id}/destroy', [CouponController::class,'historyDestroy'])->name('coupons.history.destroy');
    Route::get('coupons/apply', [CouponController::class, 'apply'])->name('coupons.apply');
    Route::resource('coupons', CouponController::class);
    Route::get('subscription/transaction', [SubscriptionController::class,'transaction'])->name('subscription.transaction');
}
);

//-------------------------------Subscription Payment-------------------------------------------

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::post('subscription/{id}/stripe/payment', [SubscriptionController::class,'stripePayment'])->name('subscription.stripe.payment');
}
);
//-------------------------------Settings-------------------------------------------
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){
    Route::get('settings/account', [SettingController::class,'account'])->name('setting.account');
    Route::post('settings/account', [SettingController::class,'accountData'])->name('setting.account');
    Route::delete('settings/account/delete', [SettingController::class,'accountDelete'])->name('setting.account.delete');

    Route::get('settings/password', [SettingController::class,'password'])->name('setting.password');
    Route::post('settings/password', [SettingController::class,'passwordData'])->name('setting.password');

    Route::get('settings/general', [SettingController::class,'general'])->name('setting.general');
    Route::post('settings/general', [SettingController::class,'generalData'])->name('setting.general');

    Route::get('settings/smtp', [SettingController::class,'smtp'])->name('setting.smtp');
    Route::post('settings/smtp', [SettingController::class,'smtpData'])->name('setting.smtp');

    Route::get('settings/payment', [SettingController::class,'payment'])->name('setting.payment');


    Route::get('settings/company', [SettingController::class,'company'])->name('setting.company');
    Route::post('settings/company', [SettingController::class,'companyData'])->name('setting.company');

    Route::get('language/{lang}', [SettingController::class,'lanquageChange'])->name('language.change');
    Route::post('theme/settings', [SettingController::class,'themeSettings'])->name('theme.settings');

    Route::get('settings/site-seo', [SettingController::class,'siteSEO'])->name('setting.site.seo');
    Route::post('settings/site-seo', [SettingController::class,'siteSEOData'])->name('setting.site.seo');

    Route::get('settings/google-recaptcha', [SettingController::class,'googleRecaptcha'])->name('setting.google.recaptcha');
    Route::post('settings/google-recaptcha', [SettingController::class,'googleRecaptchaData'])->name('setting.google.recaptcha');
}
);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){
    Route::post('settings/payment', [SettingController::class,'paymentData'])->name('setting.payment');
}
);


//-------------------------------Role & Permissions-------------------------------------------
Route::resource('permission', PermissionController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('role', RoleController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);




//-------------------------------Note-------------------------------------------
Route::resource('note', NoticeBoardController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);

//-------------------------------Contact-------------------------------------------
Route::resource('contact', ContactController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);



//-------------------------------logged History-------------------------------------------

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function () {

    Route::get('logged/history', [UserController::class,'loggedHistory'])->name('logged.history');
    Route::get('logged/{id}/history/show', [UserController::class,'loggedHistoryShow'])->name('logged.history.show');
    Route::delete('logged/{id}/history', [UserController::class,'loggedHistoryDestroy'])->name('logged.history.destroy');
});



//-------------------------------Document-------------------------------------------

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function () {
    Route::get('document/history', [DocumentController::class,'history'])->name('document.history');
    Route::resource('document', DocumentController::class);
    Route::get('my-document', [DocumentController::class,'myDocument'])->name('document.my-document');
    Route::get('document/{id}/comment', [DocumentController::class,'comment'])->name('document.comment');
    Route::post('document/{id}/comment', [DocumentController::class,'commentData'])->name('document.comment');
    Route::get('document/{id}/reminder', [DocumentController::class,'reminder'])->name('document.reminder');
    Route::get('document/{id}/version-history', [DocumentController::class,'versionHistory'])->name('document.version.history');
    Route::post('document/{id}/version-history', [DocumentController::class,'newVersion'])->name('document.new.version');
    Route::get('document/{id}/share', [DocumentController::class,'shareDocument'])->name('document.share');
    Route::post('document/{id}/share', [DocumentController::class,'shareDocumentData'])->name('document.share');
    Route::delete('document/{id}/share/destroy', [DocumentController::class,'shareDocumentDelete'])->name('document.share.destroy');
    Route::get('document/{id}/send-email', [DocumentController::class,'sendEmail'])->name('document.send.email');
    Route::post('document/{id}/send-email', [DocumentController::class,'sendEmailData'])->name('document.send.email');
    Route::get('logged/history', [DocumentController::class,'loggedHistory'])->name('logged.history');
    Route::get('logged/{id}/history/show', [DocumentController::class,'loggedHistoryShow'])->name('logged.history.show');
    Route::delete('logged/{id}/history', [DocumentController::class,'loggedHistoryDestroy'])->name('logged.history.destroy');



});

//-------------------------------Reminder-------------------------------------------

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function () {
    Route::resource('reminder', ReminderController::class);
    Route::get('my-reminder', [ReminderController::class,'myReminder'])->name('my-reminder');

});
//-------------------------------Category, Sub Category & Tag-------------------------------------------

Route::get('category/{id}/sub-category', [CategoryController::class,'getSubcategory'])->name('category.sub-category');
Route::resource('category', CategoryController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('sub-category', SubCategoryController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('tag', TagController::class)->middleware(
    [
        'auth',
        'XSS',
    ]
);


//-------------------------------Plan Payment-------------------------------------------

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::post('subscription/{id}/bank-transfer', [PaymentController::class, 'subscriptionBankTransfer'])->name('subscription.bank.transfer');
    Route::get('subscription/{id}/bank-transfer/action/{status}', [PaymentController::class, 'subscriptionBankTransferAction'])->name('subscription.bank.transfer.action');
    Route::post('subscription/{id}/paypal', [PaymentController::class, 'subscriptionPaypal'])->name('subscription.paypal');
    Route::get('subscription/{id}/paypal/{status}', [PaymentController::class, 'subscriptionPaypalStatus'])->name('subscription.paypal.status');
    Route::get('subscription/flutterwave/{sid}/{tx_ref}', [PaymentController::class, 'subscriptionFlutterwave'])->name('subscription.flutterwave');
}
);
