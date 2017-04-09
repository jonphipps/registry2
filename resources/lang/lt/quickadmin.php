<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'project' => [		'title' => 'Projects',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'is-private' => 'Is private',			'repo' => 'GitHub Repo',			'url' => 'URL',			'description' => 'Description',			'members' => 'Members',			'license' => 'License',		],	],
		'content-management' => [		'title' => 'Content management',		'created_at' => 'Time',		'fields' => [		],	],
		'content-categories' => [		'title' => 'Categories',		'created_at' => 'Time',		'fields' => [			'title' => 'Category',			'slug' => 'Slug',		],	],
		'content-tags' => [		'title' => 'Tags',		'created_at' => 'Time',		'fields' => [			'title' => 'Tag',			'slug' => 'Slug',		],	],
		'content-pages' => [		'title' => 'Pages',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'category-id' => 'Categories',			'tag-id' => 'Tags',			'page-text' => 'Page text',			'excerpt' => 'Excerpt',			'featured-image' => 'Featured image',		],	],
		'vocabulary' => [		'title' => 'Vocabularies',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',			'project' => 'Project',			'json' => 'JSON',		],	],
		'elementset' => [		'title' => 'Element Sets',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',			'project' => 'Project',			'json' => 'JSON',		],	],
		'statement' => [		'title' => 'Statements',		'created_at' => 'Time',		'fields' => [			'value' => 'Value',			'translation' => 'Translation',			'elementset' => 'Element Sets',			'vocabulary' => 'Vocabulary',			'project' => 'Project',			'property' => 'Property',			'concept' => 'Concept',			'element' => 'Element',		],	],
		'metadata-management' => [		'title' => 'Metadata Management',		'created_at' => 'Time',		'fields' => [		],	],
		'profile' => [		'title' => 'Profiles',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'type' => 'Type',		],	],
		'admin' => [		'title' => 'Metadata Admin',		'created_at' => 'Time',		'fields' => [		],	],
		'property' => [		'title' => 'Properties',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'uri' => 'URI',			'profile' => 'Profile',			'in-list' => 'In list',			'in-show' => 'In show',			'in-edit' => 'In edit',			'in-create' => 'In create',			'in-rdf' => 'In rdf',			'in-xml' => 'In xml',			'symmetric-uri' => 'Symmetric uri',		],	],
		'translation' => [		'title' => 'Translations',		'created_at' => 'Time',		'fields' => [			'version' => 'Version',			'elementset' => 'Element Set',			'vocabulary' => 'Vocabulary',			'concept' => 'Concept',			'element' => 'Element',		],	],
		'language' => [		'title' => 'Languages',		'created_at' => 'Time',		'fields' => [			'code' => 'Code',			'label' => 'Label',		],	],
		'datatype' => [		'title' => 'Data Types',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',		],	],
		'element' => [		'title' => 'Elements',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'uri' => 'URI',			'description' => 'Description',			'json' => 'JSON',		],	],
		'concept' => [		'title' => 'Concepts',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'uri' => 'URI',			'description' => 'Description',		],	],
		'releases' => [		'title' => 'Releases',		'created_at' => 'Time',		'fields' => [			'sha' => 'SHA',			'tag' => 'Tag',			'notes' => 'Notes',			'project' => 'Project',		],	],
		'prefix' => [		'title' => 'Prefixes',		'created_at' => 'Time',		'fields' => [			'prefix' => 'Prefix',			'uri' => 'URI',			'rank' => 'Rank',		],	],
		'status' => [		'title' => 'Statuses',		'created_at' => 'Time',		'fields' => [			'dispay-order' => 'Dispay order',			'display-name' => 'Display name',			'uri' => 'URI',		],	],
		'export' => [		'title' => 'Exports',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'vocabulary' => 'Vocabulary',			'elementset' => 'Element Set',			'excude-deprecated' => 'Excude deprecated',			'include-generated' => 'Include generated',			'include-deleted' => 'Include deleted',			'selected-columns' => 'Selected columns',			'selected-language' => 'Selected language',			'published-english-version' => 'Published english version',			'published-language-version' => 'Published language version',			'last-vocab-update' => 'Last vocab update',			'profile' => 'Profile',			'file' => 'File',			'map' => 'Map',		],	],
		'import' => [		'title' => 'Imports',		'created_at' => 'Time',		'fields' => [			'map' => 'Map',			'user' => 'User',			'vocabulary' => 'Vocabulary',			'elementset' => 'Element Set',			'source-file-name' => 'File name',			'file-name' => 'File name',			'file-type' => 'File type',			'results' => 'Results',			'total-processed-count' => 'Total processed count',			'error-count' => 'Error count',			'success-count' => 'Success count',			'batch' => 'Batch',		],	],
		'batch' => [		'title' => 'Batch',		'created_at' => 'Time',		'fields' => [			'run-time' => 'Run time',			'run-description' => 'Run description',		],	],
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'quickadmin_title' => 'registry2',
];