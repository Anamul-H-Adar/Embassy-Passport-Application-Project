<?php

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

Route::prefix('admin')->middleware(['auth'])->group(function() {

    Route::group(['prefix' => 'acl','as'=>'acl.'], function() {

        Route::resource('roles','Spatie\RoleController');
        // ->middleware('permission:role-list|role-create|role-edit|role-delete');

        Route::get('/roles-data','Spatie\RoleController@rolesData');

        Route::resource('permission','Spatie\AclPermissionController');
        //->middleware('permission:permission-list|permission-create|permission-edit|permission-delete');

        Route::get('/approval', 'Spatie\AclPermissionController@approvalSettings')
            ->name('approval-settings');

        Route::resource('menu','Menu\MenuController');
        /*->middleware('permission:menu-list|menu-create|menu-edit|menu-delete');*/

        Route::resource('sub-menu','Menu\SubMenuController');
        /*->middleware('permission:sub-menu-list|sub-menu-create|sub-menu-edit|sub-menu-delete');*/

        Route::resource('users','UserController');
        // ->middleware('permission:user-list|user-create|user-edit|user-delete');

        Route::get('deleted-users','UserController@deleted')
            ->name('users.deleted');
        // ->middleware('permission:user-list|user-create|user-edit|user-delete');

        Route::get('restore-user/{id}','UserController@restore');
        // ->middleware('permission:user-list|user-create|user-edit|user-delete');

        Route::get('/users-data','UserController@usersDataLoad');
    });

    Route::get('/my-account', 'AdminController@myAccount')
        ->name('my.account');

    Route::put('/my-account/update/{id}', 'AdminController@update')
        ->name('my.account.update');

    Route::post('update-user-column-visibilities', 'AdminController@updateUserColumnVisibilities');

    Route::group(['prefix' => 'area','as'=>'area.'], function() {
        Route::resource('branch','AreaController');
    });

    Route::resource('applications','ApplicationsController');
    Route::get('applications-import', 'ApplicationsController@importApplication')->name('applications.import');
    Route::get('applications/print/{id}', 'ApplicationsController@printApplication');
    Route::post('applications-import-data', 'ApplicationsController@importApplicationData')->name('applications.file.import.store');
    Route::get('applications-export', 'ApplicationsController@ExportApplicationFile')->name('applications.file.export');
    Route::get('/applications/{id}/edit/mrp', 'ApplicationsController@editByEmployee')
        ->name('applications.employee.edit');


});
