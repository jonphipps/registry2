<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');

Route::group(['middleware' => ['auth']], function () {
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
    Route::resource('translations', 'TranslationsController');
    Route::post('translations_mass_destroy', ['uses' => 'TranslationsController@massDestroy', 'as' => 'translations.mass_destroy']);
    Route::resource('languages', 'LanguagesController');
    Route::post('languages_mass_destroy', ['uses' => 'LanguagesController@massDestroy', 'as' => 'languages.mass_destroy']);
    Route::resource('datatypes', 'DatatypesController');
    Route::post('datatypes_mass_destroy', ['uses' => 'DatatypesController@massDestroy', 'as' => 'datatypes.mass_destroy']);
    Route::resource('elements', 'ElementsController');
    Route::post('elements_mass_destroy', ['uses' => 'ElementsController@massDestroy', 'as' => 'elements.mass_destroy']);
    Route::resource('concepts', 'ConceptsController');
    Route::post('concepts_mass_destroy', ['uses' => 'ConceptsController@massDestroy', 'as' => 'concepts.mass_destroy']);
    Route::resource('releases', 'ReleasesController');
    Route::post('releases_mass_destroy', ['uses' => 'ReleasesController@massDestroy', 'as' => 'releases.mass_destroy']);
    Route::resource('prefixes', 'PrefixesController');
    Route::post('prefixes_mass_destroy', ['uses' => 'PrefixesController@massDestroy', 'as' => 'prefixes.mass_destroy']);
    Route::resource('statuses', 'StatusesController');
    Route::post('statuses_mass_destroy', ['uses' => 'StatusesController@massDestroy', 'as' => 'statuses.mass_destroy']);
    Route::resource('exports', 'ExportsController');
    Route::post('exports_mass_destroy', ['uses' => 'ExportsController@massDestroy', 'as' => 'exports.mass_destroy']);
    Route::resource('imports', 'ImportsController');
    Route::post('imports_mass_destroy', ['uses' => 'ImportsController@massDestroy', 'as' => 'imports.mass_destroy']);
    Route::resource('batches', 'BatchesController');
    Route::post('batches_mass_destroy', ['uses' => 'BatchesController@massDestroy', 'as' => 'batches.mass_destroy']);

    Route::model('messenger', 'App\MessengerTopic');
    Route::get('messenger/inbox', 'MessengerController@inbox')->name('messenger.inbox');
    Route::get('messenger/outbox', 'MessengerController@outbox')->name('messenger.outbox');
    Route::resource('messenger', 'MessengerController');
});
