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


function create_fabricante_taxonomy() {
    register_taxonomy(
        'manufacturer',
        'veiculo',
        array(
            'label'        => 'Fabricante',
            'hierarchical' => true,
        )
    );
}