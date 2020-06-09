<?php
Route::get('/encryption', 'thuongmh\helperEncryption\EncryptionController@index')->name('encryption.index');
Route::get('/encryption/create', 'thuongmh\helperEncryption\EncryptionController@create')->name('encryption.create');
Route::post('/encryption', 'thuongmh\helperEncryption\EncryptionController@store')->name('encryption.store');
Route::get('/encryption/edit/{id}', 'thuongmh\helperEncryption\EncryptionController@edit')->name('encryption.edit');
Route::put('/encryption/update/{id}', 'thuongmh\helperEncryption\EncryptionController@update')->name('encryption.update');
Route::get('/encryption/destroy/{id}', 'thuongmh\helperEncryption\EncryptionController@destroy')->name('encryption.destroy');
