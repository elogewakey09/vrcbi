<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('cron', 'CronController@cron')->name('cron');

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{id}', 'replyTicket')->name('reply');
    Route::post('close/{id}', 'closeTicket')->name('close');
    Route::get('download/{attachment_id}', 'ticketDownload')->name('download');
});

Route::controller('SiteController')->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');
    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');
    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::get('blog', 'blogs')->name('blog');
    Route::get('blog/{slug}', 'blogDetails')->name('blog.details');
    Route::get('properties', 'property')->name('property');
    Route::get('property/{slug}/{id}', 'propertyDetails')->name('property.details');
    Route::get('policy/{slug}', 'policyPages')->name('policy.pages');
    Route::post('/subscribe', 'addSubscriber')->name('subscribe');
    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::get('maintenance-mode','maintenance')->withoutMiddleware('maintenance')->name('maintenance');
    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});