<?php

Auth::routes();
Route::get('login-qrcode','qrcodeController@getlogin');
Route::post('login-qrcode','qrcodeController@postlogin');


Route::group(['middleware' => ['web', 'auth', 'permission'] ], function () {
  //usermanagement mulai
    Route::resource('user', 'userController');
    Route::get('activ/{id}','userController@active')->name('user.activate');
    Route::get('deactiv/{id}','userController@deactivate')->name('user.deactivate');
    Route::get('user/{id}/permission','userController@permissions')->name('user.permissions');
    Route::post('user/{id}/permission', 'userController@simpan')->name('user.simpan');
    Route::get('my-qrcode', 'qrcodeController@my');

  //usermanagement berakhir

  //role management mulai
    Route::resource('role', 'roleController');
    Route::get('role/{id}/permission','roleController@permissions')->name('role.permissions');
    Route::post('role/{id}/permission', 'roleController@simpan')->name('role.simpan');
  //akhir role management

  //profil mulai
    Route::get('profil', 'ProfilController@index');
    Route::get('ganti-password','ProfilController@gantpass');
    Route::PATCH('ganti-password','ProfilController@savepass');
  //akhir profil

  Route::get('/', function () {
      return view('layouts.blank');
  });

  Route::get('dashboard','HomeController@dashboard')->name('home.dashboard');

  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('surat-keluar','KeluarController');
  Route::resource('surat-masuk','MasukController');
  Route::resource('arsip','ArsipController');
  Route::resource('arsip-surat','ArsipSuratController')->except(['index','show']);
  Route::resource('disposisi','DisposisiController')->except(['index','show','create','edit','update']);
  Route::resource('lampiran','LampiranController')->except(['index','show']);
});

Route::get('img/{type}/{file_id}','imgController@image');
Route::get('surat/{type}/{id}','imgController@dokumen');
