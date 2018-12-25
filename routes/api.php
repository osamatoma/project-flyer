<?php




Route::get('flyer/photos/{flyer}', 'Api\FlyersController@getPhotos');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('flyer/photos/{photo}/delete', 'Api\FlyersController@deletePhoto');
});
