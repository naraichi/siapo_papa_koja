<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Unduhans
    Route::post('unduhans/media', 'UnduhanApiController@storeMedia')->name('unduhans.storeMedia');
    Route::apiResource('unduhans', 'UnduhanApiController');
});
