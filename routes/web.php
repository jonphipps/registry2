<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Social login
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('projects', 'ProjectsController');
    Route::post('projects_mass_destroy', ['uses' => 'ProjectsController@massDestroy', 'as' => 'projects.mass_destroy']);
    Route::resource('content_categories', 'ContentCategoriesController');
    Route::post('content_categories_mass_destroy', ['uses' => 'ContentCategoriesController@massDestroy', 'as' => 'content_categories.mass_destroy']);
    Route::resource('content_tags', 'ContentTagsController');
    Route::post('content_tags_mass_destroy', ['uses' => 'ContentTagsController@massDestroy', 'as' => 'content_tags.mass_destroy']);
    Route::resource('content_pages', 'ContentPagesController');
    Route::post('content_pages_mass_destroy', ['uses' => 'ContentPagesController@massDestroy', 'as' => 'content_pages.mass_destroy']);
    Route::resource('product_categories', 'ProductCategoriesController');
    Route::post('product_categories_mass_destroy', ['uses' => 'ProductCategoriesController@massDestroy', 'as' => 'product_categories.mass_destroy']);
    Route::resource('product_tags', 'ProductTagsController');
    Route::post('product_tags_mass_destroy', ['uses' => 'ProductTagsController@massDestroy', 'as' => 'product_tags.mass_destroy']);
    Route::resource('products', 'ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::resource('vocabularies', 'VocabulariesController');
    Route::post('vocabularies_mass_destroy', ['uses' => 'VocabulariesController@massDestroy', 'as' => 'vocabularies.mass_destroy']);
    Route::resource('elementsets', 'ElementsetsController');
    Route::post('elementsets_mass_destroy', ['uses' => 'ElementsetsController@massDestroy', 'as' => 'elementsets.mass_destroy']);
    Route::resource('statements', 'StatementsController');
    Route::post('statements_mass_destroy', ['uses' => 'StatementsController@massDestroy', 'as' => 'statements.mass_destroy']);
    Route::resource('profiles', 'ProfilesController');
    Route::post('profiles_mass_destroy', ['uses' => 'ProfilesController@massDestroy', 'as' => 'profiles.mass_destroy']);
    Route::resource('properties', 'PropertiesController');
    Route::post('properties_mass_destroy', ['uses' => 'PropertiesController@massDestroy', 'as' => 'properties.mass_destroy']);
    Route::resource('res', 'ResController');
    Route::post('res_mass_destroy', ['uses' => 'ResController@massDestroy', 'as' => 'res.mass_destroy']);
    Route::resource('translations', 'TranslationsController');
    Route::post('translations_mass_destroy', ['uses' => 'TranslationsController@massDestroy', 'as' => 'translations.mass_destroy']);

    Route::model('messenger', 'App\MessengerTopic');
    Route::get('messenger/inbox', 'MessengerController@inbox')->name('messenger.inbox');
    Route::get('messenger/outbox', 'MessengerController@outbox')->name('messenger.outbox');
    Route::resource('messenger', 'MessengerController');
});
