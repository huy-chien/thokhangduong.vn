<?php
/*
* @Created by: DUYNX
* @Author    : duynx@peacesoft.net / nguyenduypt86@gmail.com
* @Date      : 08/2019
* @Version   : 1.0
*/
$namespace = '\App\Modules\Admin\Controllers';

Route::group(['middleware' => ['web'], 'prefix' => '/', 'namespace' => $namespace], function(){
    Route::get('login/{url?}', array('as' => 'login','uses' => 'LoginController@getLogin'));
    Route::post('login/{url?}', array('as' => 'login','uses' => 'LoginController@postLogin'));
    Route::get('logout', array('as' => 'logout','uses' => 'LoginController@logout'));
    Route::post('ajax/upload', array('as' => 'ajax.upload','uses' => 'AjaxUploadController@upload'));
});

Route::group(['middleware' => ['web', 'checkPermission'], 'prefix' => 'admin', 'namespace' => $namespace , 'group'=>'4','group_name'=>'Nội dung', 'display_icon'=>'fa fa-desktop'], function () {

    Route::get('type', array('as' => 'admin.type', 'uses' => 'TypeController@listView', 'permission_name' => 'Danh sách kiểu dữ liệu', 'display_menu' => 1, 'display_icon_sub' => 'fa fa-globe'));
    Route::get('type/edit/{id?}', array('as' => 'admin.type_edit', 'uses' => 'TypeController@getItem', 'permission_name' => 'Chi tiết kiểu dữ liệu'))->where('id', '[0-9]+');
    Route::post('type/edit/{id?}', array('as' => 'admin.type_edit', 'uses' => 'TypeController@postItem', 'permission_name' => 'Sửa kiểu dữ liệu'))->where('id', '[0-9]+');
    route::post('type/delete', array('as' => 'admin.type_delete', 'uses' => 'TypeController@delete', 'permission_name' => 'Xóa kiểu dữ liệu'));

    Route::get('category', array('as' => 'admin.category', 'uses' => 'CategoryController@listView', 'permission_name' => 'Danh sách nội dung', 'display_menu' => 1, 'display_icon_sub' => 'fa fa-globe'));
    Route::get('category/edit/{id?}', array('as' => 'admin.category_edit', 'uses' => 'CategoryController@getItem', 'permission_name' => 'Chi tiết nội dung'))->where('id', '[0-9]+');
    Route::post('category/edit/{id?}', array('as' => 'admin.category_edit', 'uses' => 'CategoryController@postItem', 'permission_name' => 'Sửa nội dung'))->where('id', '[0-9]+');
    Route::post('category/delete', array('as' => 'admin.category_delete', 'uses' => 'CategoryController@delete', 'permission_name' => 'Xóa nội dung'));

    Route::get('banner', array('as' => 'admin.banner','uses' => 'BannerController@listView', 'permission_name'=>'Danh sách banner', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-globe'));
    Route::get('banner/edit/{id?}', array('as' => 'admin.banner_edit','uses' => 'BannerController@getItem', 'permission_name'=>'Chi tiết banner'))->where('id', '[0-9]+');
    Route::post('banner/edit/{id?}', array('as' => 'admin.banner_edit','uses' => 'BannerController@postItem', 'permission_name'=>'Sửa banner'))->where('id', '[0-9]+');
    Route::post('banner/delete', array('as' => 'admin.banner_delete','uses' => 'BannerController@delete', 'permission_name'=>'Xóa banner'));

    Route::get('statics', array('as' => 'admin.statics', 'uses' => 'StaticsController@listView', 'permission_name' => 'Danh sách tin tức', 'display_menu' => 1, 'display_icon_sub' => 'fa fa-globe'));
    Route::get('statics/edit/{id?}', array('as' => 'admin.statics_edit', 'uses' => 'StaticsController@getItem', 'permission_name' => 'Chi tiết tin tức'))->where('id', '[0-9]+');
    Route::post('statics/edit/{id?}', array('as' => 'admin.statics_edit', 'uses' => 'StaticsController@postItem', 'permission_name' => 'Sửa tin tức'))->where('id', '[0-9]+');
    Route::post('statics/delete', array('as' => 'admin.statics_delete', 'uses' => 'StaticsController@delete', 'permission_name' => 'Xóa tin tức'));


});

Route::group(['middleware' => ['web', 'checkPermission'], 'prefix' => 'admin', 'namespace' => $namespace , 'group'=>'5','group_name'=>'Hệ thống', 'display_icon'=>'fa fa-tag'], function () {

    Route::get('dashboard', array('as' => 'admin.dashboard','uses' => 'DashBoardController@listView', 'permission_name'=>'Bảng điều khiển'));
    Route::get('clear', array('as' => 'admin.clear','uses' => 'DashBoardController@clearCache', 'permission_name'=>'Clear cache', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-flash'));

    Route::get('info', array('as' => 'admin.info','uses' => 'InfoController@listView', 'permission_name'=>'Danh sách thông tin khác', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-globe'));
    Route::get('info/edit/{id?}', array('as' => 'admin.info_edit','uses' => 'InfoController@getItem', 'permission_name'=>'Chi tiết tin khác'))->where('id', '[0-9]+');
    Route::post('info/edit/{id?}', array('as' => 'admin.info_edit','uses' => 'InfoController@postItem', 'permission_name'=>'Sửa tin khác'))->where('id', '[0-9]+');
    Route::post('info/delete', array('as' => 'admin.info_delete','uses' => 'InfoController@delete', 'permission_name'=>'Xóa tin khác'));

    Route::get('role', array('as' => 'admin.role','uses' => 'UserRoleController@listView', 'permission_name'=>'Danh sách quyền', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-gears'));
    Route::get('role/edit/{id?}', array('as' => 'admin.role_edit','uses' => 'UserRoleController@getItem', 'permission_name'=>'Chi tiết quyền'))->where('id', '[0-9]+');
    Route::post('role/edit/{id?}', array('as' => 'admin.role_edit','uses' => 'UserRoleController@postItem', 'permission_name'=>'Sửa quyền'))->where('id', '[0-9]+');
    Route::get('role/permission/{id?}', array('as' => 'admin.role_permission','uses' => 'UserRoleController@permission', 'permission_name'=>'Chi tiết quyền'))->where('id', '[0-9]+');
    Route::post('role/permission/{id?}', array('as' => 'admin.role_permission_save','uses' => 'UserRoleController@permissionSave', 'permission_name'=>'Sửa quyền'))->where('id', '[0-9]+');
    Route::post('role/delete', array('as' => 'admin.role_delete','uses' => 'UserRoleController@delete', 'permission_name'=>'Xóa quyền'));

    Route::get('roleGroup', array('as' => 'admin.roleGroup','uses' => 'UserRoleGroupController@listView', 'permission_name'=>'Danh sách nhóm quyền', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-group'));
    Route::get('roleGroup/edit/{id?}', array('as' => 'admin.roleGroup_edit','uses' => 'UserRoleGroupController@getItem', 'permission_name'=>'Chi tiết nhóm quyền'))->where('id', '[0-9]+');
    Route::post('roleGroup/edit/{id?}', array('as' => 'admin.roleGroup_edit','uses' => 'UserRoleGroupController@postItem', 'permission_name'=>'Sửa nhóm quyền'))->where('id', '[0-9]+');
    Route::post('roleGroup/delete', array('as' => 'admin.roleGroup_delete','uses' => 'UserRoleGroupController@delete', 'permission_name'=>'Xóa nhóm quyền'));

    Route::get('users', array('as' => 'admin.user','uses' => 'UserController@listView', 'permission_name'=>'Danh sách người dùng', 'display_menu'=>1, 'display_icon_sub'=>'fa fa-user'));
    Route::get('users/edit/{id?}', array('as' => 'admin.user_edit','uses' => 'UserController@getItem', 'permission_name'=>'Chi tiết người dùng'))->where('id', '[0-9]+');
    Route::post('users/edit/{id?}', array('as' => 'admin.user_edit','uses' => 'UserController@postItem', 'permission_name'=>'Sửa người dùng'))->where('id', '[0-9]+');
    Route::post('users/delete', array('as' => 'admin.user_delete','uses' => 'UserController@delete', 'permission_name'=>'Xóa người dùng'));

});