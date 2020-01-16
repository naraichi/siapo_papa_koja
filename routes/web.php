<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Skpds
    Route::delete('skpds/destroy', 'SkpdController@massDestroy')->name('skpds.massDestroy');
    Route::resource('skpds', 'SkpdController');

    // Pengajuans
    Route::resource('pengajuans', 'PengajuanController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Tidak Memenuhis
    Route::resource('tidak-memenuhis', 'TidakMemenuhiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Memenuhis
    Route::resource('memenuhis', 'MemenuhiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Nominasis
    Route::resource('nominasis', 'NominasiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Rekapitulasis
    Route::resource('rekapitulasis', 'RekapitulasiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Events
    Route::resource('events', 'EventController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Indikator Formulirs
    Route::resource('indikator-formulirs', 'IndikatorFormulirController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Indikator Proposals
    Route::resource('indikator-proposals', 'IndikatorProposalController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Kategori Proposals
    Route::resource('kategori-proposals', 'KategoriProposalController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Kategoris
    Route::resource('kategoris', 'KategoriController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Indikator Formulir Proposals
    Route::resource('indikator-formulir-proposals', 'IndikatorFormulirProposalController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Indikator Proposal Inovasis
    Route::resource('indikator-proposal-inovasis', 'IndikatorProposalInovasiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Dasar Hukums
    Route::delete('dasar-hukums/destroy', 'DasarHukumController@massDestroy')->name('dasar-hukums.massDestroy');
    Route::post('dasar-hukums/media', 'DasarHukumController@storeMedia')->name('dasar-hukums.storeMedia');
    Route::post('dasar-hukums/ckmedia', 'DasarHukumController@storeCKEditorImages')->name('dasar-hukums.storeCKEditorImages');
    Route::resource('dasar-hukums', 'DasarHukumController');

    // Pengumumen
    Route::delete('pengumumen/destroy', 'PengumumanController@massDestroy')->name('pengumumen.massDestroy');
    Route::post('pengumumen/media', 'PengumumanController@storeMedia')->name('pengumumen.storeMedia');
    Route::post('pengumumen/ckmedia', 'PengumumanController@storeCKEditorImages')->name('pengumumen.storeCKEditorImages');
    Route::resource('pengumumen', 'PengumumanController');

    // Unduhans
    Route::delete('unduhans/destroy', 'UnduhanController@massDestroy')->name('unduhans.massDestroy');
    Route::post('unduhans/media', 'UnduhanController@storeMedia')->name('unduhans.storeMedia');
    Route::post('unduhans/ckmedia', 'UnduhanController@storeCKEditorImages')->name('unduhans.storeCKEditorImages');
    Route::resource('unduhans', 'UnduhanController');

    // Kontaks
    Route::delete('kontaks/destroy', 'KontakController@massDestroy')->name('kontaks.massDestroy');
    Route::resource('kontaks', 'KontakController');

    // Riwayat Users
    Route::resource('riwayat-users', 'RiwayatUserController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
