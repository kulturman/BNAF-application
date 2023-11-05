<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::get('users/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-password');
Route::post('users/change-password', [App\Http\Controllers\UserController::class, 'handleChangePassword']);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::post('users/{user}/reset-password', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('users.reset-password');

Route::resource('slides', App\Http\Controllers\SlideController::class);

Route::get('frontend/articles/{article}', [FrontendController::class, 'showArticle'])->name('frontend.article');
Route::get('frontend/denonciation', [FrontendController::class, 'form'])->name('frontend.form');
Route::resource('articles', App\Http\Controllers\ArticleController::class);

Route::resource('siteConfigs', App\Http\Controllers\SiteConfigController::class);

Route::resource('stats', App\Http\Controllers\StatController::class);

Route::post('reports/{report}/validate', [ReportController::class, 'validateReport'])->name('reports.validate');
Route::get('reports/me', [ReportController::class, 'myReports'])->name('reports.me');
Route::resource('reports', App\Http\Controllers\ReportController::class);
Route::match(['GET', 'POST'],'reports/assign/{report}', [App\Http\Controllers\ReportController::class, 'assign'])->name('reports.assign');

Route::resource('flashInfos', App\Http\Controllers\FlashInfoController::class);