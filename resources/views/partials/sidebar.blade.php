@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(1) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('admin_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.admin.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('profile_access')
                <li class="{{ $request->segment(1) == 'profiles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('profiles.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.profile.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('property_access')
                <li class="{{ $request->segment(1) == 'properties' ? 'active active-sub' : '' }}">
                        <a href="{{ route('properties.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.property.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('language_access')
                <li class="{{ $request->segment(1) == 'languages' ? 'active active-sub' : '' }}">
                        <a href="{{ route('languages.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.language.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('datatype_access')
                <li class="{{ $request->segment(1) == 'datatypes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('datatypes.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.datatype.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('prefix_access')
                <li class="{{ $request->segment(1) == 'prefixes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('prefixes.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.prefix.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('status_access')
                <li class="{{ $request->segment(1) == 'statuses' ? 'active active-sub' : '' }}">
                        <a href="{{ route('statuses.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.status.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('batch_access')
                <li class="{{ $request->segment(1) == 'batches' ? 'active active-sub' : '' }}">
                        <a href="{{ route('batches.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.batch.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('metadata_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.metadata-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('vocabulary_access')
                <li class="{{ $request->segment(1) == 'vocabularies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('vocabularies.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.vocabulary.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('elementset_access')
                <li class="{{ $request->segment(1) == 'elementsets' ? 'active active-sub' : '' }}">
                        <a href="{{ route('elementsets.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.elementset.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('statement_access')
                <li class="{{ $request->segment(1) == 'statements' ? 'active active-sub' : '' }}">
                        <a href="{{ route('statements.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.statement.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('translation_access')
                <li class="{{ $request->segment(1) == 'translations' ? 'active active-sub' : '' }}">
                        <a href="{{ route('translations.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.translation.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('project_access')
                <li class="{{ $request->segment(1) == 'projects' ? 'active active-sub' : '' }}">
                        <a href="{{ route('projects.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.project.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('element_access')
                <li class="{{ $request->segment(1) == 'elements' ? 'active active-sub' : '' }}">
                        <a href="{{ route('elements.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.element.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('concept_access')
                <li class="{{ $request->segment(1) == 'concepts' ? 'active active-sub' : '' }}">
                        <a href="{{ route('concepts.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.concept.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('release_access')
                <li class="{{ $request->segment(1) == 'releases' ? 'active active-sub' : '' }}">
                        <a href="{{ route('releases.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.releases.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('export_access')
                <li class="{{ $request->segment(1) == 'exports' ? 'active active-sub' : '' }}">
                        <a href="{{ route('exports.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.export.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('import_access')
                <li class="{{ $request->segment(1) == 'imports' ? 'active active-sub' : '' }}">
                        <a href="{{ route('imports.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.import.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('content_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span class="title">@lang('quickadmin.content-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('content_category_access')
                <li class="{{ $request->segment(1) == 'content_categories' ? 'active active-sub' : '' }}">
                        <a href="{{ route('content_categories.index') }}">
                            <i class="fa fa-folder"></i>
                            <span class="title">
                                @lang('quickadmin.content-categories.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('content_tag_access')
                <li class="{{ $request->segment(1) == 'content_tags' ? 'active active-sub' : '' }}">
                        <a href="{{ route('content_tags.index') }}">
                            <i class="fa fa-tags"></i>
                            <span class="title">
                                @lang('quickadmin.content-tags.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('content_page_access')
                <li class="{{ $request->segment(1) == 'content_pages' ? 'active active-sub' : '' }}">
                        <a href="{{ route('content_pages.index') }}">
                            <i class="fa fa-file-o"></i>
                            <span class="title">
                                @lang('quickadmin.content-pages.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan

            

            
            @php ($unread = App\MessengerTopic::countUnread())
            <li class="{{ $request->segment(1) == 'messenger' ? 'active' : '' }} {{ ($unread > 0 ? 'unread' : '') }}">
                <a href="{{ route('messenger.index') }}">
                    <i class="fa fa-envelope"></i>

                    <span>Messages</span>
                    @if($unread > 0)
                        {{ ($unread > 0 ? '('.$unread.')' : '') }}
                    @endif
                </a>
            </li>
            <style>
                .page-sidebar-menu .unread * {
                    font-weight:bold !important;
                }
            </style>

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
