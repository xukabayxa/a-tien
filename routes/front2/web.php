<?php

Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@index')->name('homePage');
    Route::get('/san-pham','FrontController@getProductCategory')->name('front.category-product-get');
    Route::get('/get-data-product/{id}','FrontController@getDataProduct')->name('front.get-data-product');
    Route::get('/san-pham/{slug}','FrontController@getDetailProduct')->name('front.get-detail-product');
    Route::get('/tin-tuc','FrontController@getPosts')->name('front.get-posts');
    Route::get('/tin-tuc/{slug}','FrontController@getPostDetail')->name('front.get-post-detail');
    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/send-contact','FrontController@sendContact')->name('front.send-contact');
    Route::get('/reset-pass','FrontController@resetPass')->name('front.resetPass');

});



