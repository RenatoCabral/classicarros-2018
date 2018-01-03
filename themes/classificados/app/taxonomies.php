<?php

function create_categoria_taxonomy() {
	register_taxonomy(
		'categoria',
		'veiculo',
		array(
			'label'        => 'Categoria',
			'hierarchical' => true,
		)
	);
}
