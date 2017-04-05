<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('user_actions', 'UserActionsController');

        Route::resource('content_pages', 'ContentPagesController');

        Route::resource('vocabularies', 'VocabulariesController');

        Route::resource('elementsets', 'ElementsetsController');

        Route::resource('properties', 'PropertiesController');

        Route::resource('translations', 'TranslationsController');

});
