<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'project' => [		'title' => 'Projects',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'repo' => 'GitHub Repo',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',		],	],
		'content-management' => [		'title' => 'Content management',		'created_at' => 'Time',		'fields' => [		],	],
		'content-categories' => [		'title' => 'Categories',		'created_at' => 'Time',		'fields' => [			'title' => 'Category',			'slug' => 'Slug',		],	],
		'content-tags' => [		'title' => 'Tags',		'created_at' => 'Time',		'fields' => [			'title' => 'Tag',			'slug' => 'Slug',		],	],
		'content-pages' => [		'title' => 'Pages',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'category-id' => 'Categories',			'tag-id' => 'Tags',			'page-text' => 'Page text',			'excerpt' => 'Excerpt',			'featured-image' => 'Featured image',		],	],
		'product-management' => [		'title' => 'Product Management',		'created_at' => 'Time',		'fields' => [		],	],
		'product-categories' => [		'title' => 'Categories',		'created_at' => 'Time',		'fields' => [			'name' => 'Category name',			'description' => 'Description',			'photo' => 'Photo (max 8Mb)',		],	],
		'product-tags' => [		'title' => 'Tags',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'products' => [		'title' => 'Products',		'created_at' => 'Time',		'fields' => [			'name' => 'Product name',			'description' => 'Description',			'price' => 'Price',			'category' => 'Category',			'tag' => 'Tag',			'photo1' => 'Photo 1',			'photo2' => 'Photo 2',			'photo3' => 'Photo 3',		],	],
		'vocabulary' => [		'title' => 'Vocabularies',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',			'project' => 'Project',		],	],
		'elementset' => [		'title' => 'Element Sets',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',			'project' => 'Project',		],	],
		'statement' => [		'title' => 'Statements',		'created_at' => 'Time',		'fields' => [			'value' => 'Value',			'translation' => 'Translation',			'res' => 'Res',		],	],
		'metadata-management' => [		'title' => 'Metadata Management',		'created_at' => 'Time',		'fields' => [		],	],
		'profile' => [		'title' => 'Profiles',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',		],	],
		'admin' => [		'title' => 'Profile Admin',		'created_at' => 'Time',		'fields' => [		],	],
		'property' => [		'title' => 'Properties',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'uri' => 'URI',			'profile' => 'Profile',			'in-list' => 'In list',			'in-show' => 'In show',			'in-edit' => 'In edit',			'in-create' => 'In create',			'in-rdf' => 'In rdf',			'in-xml' => 'In xml',			'symmetric-uri' => 'Symmetric uri',		],	],
		'res' => [		'title' => 'Resources',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'label' => 'Label',			'description' => 'Description',			'uri' => 'Uri',			'members' => 'Members',			'project' => 'Project',			'profile' => 'Profile',			'json' => 'JSON',		],	],
		'translation' => [		'title' => 'Translations',		'created_at' => 'Time',		'fields' => [			'res' => 'Resource',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'quickadmin_title' => 'registry2',
];