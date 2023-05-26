<?php
/*================================================================
ROUTE PAGE
*/
Route::group(['namespace' => 'page'], function () {
    Route::get('/', 'homeController@index')->name('home.index');
    Route::get('/detail/{id_barang}', 'DetailController@show')->name('detail.show');
    Route::get('/checkout/{id_barang}', 'CheckoutController@checkout')->name('checkout');

    Route::middleware('auth')->group(function () {
        Route::get('/favorite/add/{id}', 'homeController@addToFavorite')->name('add.favorite');
        Route::get('/favorite', 'FavoriteController@index')->name('favorite');
        Route::get('/favorite/remove/{id}', 'FavoriteController@remove')->name('remove.favorite');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::get('/ubah', 'ProfileController@ubah')->name('ubah');
    });
});

/*================================================================
ROUTE ADMIN
*/
Route::group(['namespace' => 'admin'], function (){
    Route::get('/input', 'InputController@index')->name('input');
    Route::post('/input', 'InputController@store')->name('input.store');
    Route::get('/input/success', function () {
        return view('pengelola.input');
    })->name('input.success');
    Route::get('/user', 'UserController@index')->name('user');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/barang', 'BarangController@index')->name('barang');
    Route::delete('/barang/{id_barang}', 'BarangController@destroy')->name('barang.delete');
    Route::get('/barang/{id_barang}/edit', 'BarangController@edit')->name('barang.edit');
    Route::put('/barang/{id_barang}', 'BarangController@update')->name('barang.update');
});
/*================================================================
ROUTE ACCOUNT
*/
Route::group(['namespace' => 'account'], function (){
    Route::get('/register', 'RegisterController@index')->name('register.index')->middleware('guest');
    Route::post('register', 'RegisterController@store')->name('register.store');
    Route::get('/login', 'AuthController@showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout')->name('logout')->middleware('auth');    
});
