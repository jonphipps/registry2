<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('user_action_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });

        // Auth gates for: Project
        Gate::define('project_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('project_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('project_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('project_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('project_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content management
        Gate::define('content_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content categories
        Gate::define('content_category_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('content_category_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('content_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('content_category_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('content_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content tags
        Gate::define('content_tag_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('content_tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Content pages
        Gate::define('content_page_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('content_page_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('content_page_view', function ($user) {
            return in_array($user->role_id, [1, 2, 4]);
        });
        Gate::define('content_page_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product management
        Gate::define('product_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product categories
        Gate::define('product_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product tags
        Gate::define('product_tag_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_tag_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_tag_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_tag_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Products
        Gate::define('product_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Vocabulary
        Gate::define('vocabulary_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('vocabulary_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('vocabulary_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('vocabulary_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('vocabulary_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Elementset
        Gate::define('elementset_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('elementset_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('elementset_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('elementset_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('elementset_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Statement
        Gate::define('statement_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('statement_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('statement_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('statement_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('statement_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Metadata management
        Gate::define('metadata_management_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Profile
        Gate::define('profile_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('profile_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('profile_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('profile_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('profile_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Admin
        Gate::define('admin_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Property
        Gate::define('property_access', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('property_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('property_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('property_view', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('property_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Res
        Gate::define('re_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('re_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('re_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('re_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('re_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Translation
        Gate::define('translation_access', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('translation_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('translation_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('translation_view', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('translation_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

    }
}
