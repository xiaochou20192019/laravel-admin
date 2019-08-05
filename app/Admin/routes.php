<?php

use Illuminate\Routing\Router;

Admin::routes();


Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {


    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->resources([
        'articles'              => ArticleController::class,
        'categories'            => CategorieController::class,
        'companys'              => CompanyController::class,
        'news'                  => NewController::class,
        'asks'                  => AskController::class,
        'questions'             => QuestionController::class,
        'malls'                 => MallController::class,
        'countrys'              => AreaController::class,
        'sells'                 => SellController::class,
        'photos'                => PhotoController::class,
        'shenhe/articles'       => Review\AutoArticleController::class,
        'shenhe/asks'           => Review\AutoAskController::class,
    ]);

    $router->post('articles/release', 'ArticleController@release');
    $router->post('companys/release', 'CompanyController@release');
    $router->post('news/release', 'NewController@release');
    $router->post('asks/release', 'AskController@release');
    $router->post('questions/release', 'QuestionController@release');
    $router->post('malls/release', 'MallController@release');
    $router->post('sells/release', 'SellController@release');
    $router->post('shenhe/articles/release', 'Review\AutoArticleController@release');
    $router->post('shenhe/asks/release', 'Review\AutoAskController@release');
    $router->post('photos/release', 'PhotoController@release');

    $router->get('forms/settings', 'SettingController@settings');
     $router->get('_handle_form_', 'SettingController@settings');

    

    // $router->get('shenhe/articles', 'ArticleController@aude_articles');

});
