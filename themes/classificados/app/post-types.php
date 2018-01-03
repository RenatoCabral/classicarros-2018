<?php

function post_type_veiculo() {
	register_post_type( 'veiculo',
		[
			'labels'      => [
				'name'          => 'Veículo',
				'singular_name' => 'Veículo'
			],
			'public'      => true,
			'has_archive' => true,
			'supports'    => [ 'title', 'author', 'thumbnail' ]
		]
	);
}

function post_type_blog() {
	register_post_type( 'blog',
		[
			'labels'      => [
				'name'          => 'Blog',
				'singular_name' => 'Blog'
			],
			'public'      => true,
			'has_archive' => true,
			'supports'    => [ 'title', 'editor', 'thumbnail' ]
		]
	);
}

function post_type_slides() {
	register_post_type( 'sliders',
		[
			'labels'      => [
				'name'          => 'Slide',
				'singular_name' => 'Slide'
			],
			'public'      => true,
			'supports'    => [ 'title', 'thumbnail' ]
		]
	);
}