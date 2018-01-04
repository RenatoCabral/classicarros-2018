<?php


function meta_box_veiculo() {

	add_meta_box( 'meu-id', 'Detalhes do Carro', 'render_data_meta_box', 'veiculo', 'normal', 'high' );
	add_meta_box( 'meu-id3', 'Itens de Série', 'render_itens_de_serie', 'veiculo', 'normal', 'high' );
	add_meta_box( 'meu-id4', 'Obs. Vendedor', 'render_obs_vendedor', 'veiculo', 'normal', 'high' );
}


/*função que irá renderizar as informações do veiculo*/

/*****detalhes veiculo****/
function render_data_meta_box() {
	//estudar sobre a global $post
	global $post;
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	$post_id = $post->ID;


	$price        = get_post_meta( $post_id, 'price', true );
	$year         = get_post_meta( $post_id, 'year', true );
	$km           = get_post_meta( $post_id, 'km', true );
	$color        = get_post_meta( $post_id, 'color', true );
	$doors        = get_post_meta( $post_id, 'doors', true );
	$fuel         = get_post_meta( $post_id, 'fuel', true );
	$exchange     = get_post_meta( $post_id, 'exchange', true );
	$conservation = get_post_meta( $post_id, 'conservation', true );
	$final_place  = get_post_meta( $post_id, 'final_place', true );
	$motor        = get_post_meta( $post_id, 'motor', true );
	$manufacturer = get_post_meta( $post_id, 'manufacturer', true );
	$model        = get_post_meta( $post_id, 'model', true );
    $model        = get_post_meta( $post_id, 'uf', true );
    $model        = get_post_meta( $post_id, 'city', true );



	include "partials/admin/detalhes-veiculo.php";

}

/*funçao que irá renderizar os intes de série*/

/*******itens de série*****/

function render_itens_de_serie() {
	//estudar sobre a global $post
	global $post;
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );


	/************************/
	$items = get_item_series();

	foreach ( $items as $item => $value ) {

		${"{$item}"} = get_post_meta( $post->ID, $item, true );

		require 'partials/admin/detalhes-itens-de-serie.php';

	}

}

/*função que irá renderizar o que estiver na informação do vendedor*/

/*********obs.vendedor*******/

function render_obs_vendedor() {// a função render, renderizada os dados para serem exibidos
	//global $post, variavel global muito utilizada no Wordpress
	global $post;
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	$post_id = $post->ID;

	$obs = get_post_meta( $post_id, 'obs', true );
	include 'partials/admin/obs-vendedor.php';
}

/*função que irá salvar as informações do veículo, itens de série, observação, cidade, estado ou seja, todos
os dados do veiculo*/

function save_meta_veiculo( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}


	update_post_meta( $post_id, 'price', $_POST['price'] );
	update_post_meta( $post_id, 'doors', $_POST['doors'] );
	update_post_meta( $post_id, 'exchange', $_POST['exchange'] );
	update_post_meta( $post_id, 'year', $_POST['year'] );
	update_post_meta( $post_id, 'km', $_POST['km'] );
	update_post_meta( $post_id, 'color', $_POST['color'] );
	update_post_meta( $post_id, 'fuel', $_POST['fuel'] );
	update_post_meta( $post_id, 'conservation', $_POST['conservation'] );
	update_post_meta( $post_id, 'final_place', $_POST['final_place'] );
	update_post_meta( $post_id, 'motor', $_POST['motor'] );
	update_post_meta( $post_id, 'manufacturer', $_POST['manufacturer'] );
	update_post_meta( $post_id, 'model', $_POST['model'] );
	update_post_meta( $post_id, 'obs', $_POST['obs'] );


	$items = get_item_series();

	foreach ( $items as $item => $value ) {

		${"{$item}"} = isset( $_POST["{$item}"] ) ? '1' : '0';
		update_post_meta( $post_id, "{$item}", ${"{$item}"} );

	}


}


//Slides
function add_slide_details_to_admin() {
	add_meta_box( 'sliders_details', 'Link', 'render_slider_details', 'sliders', 'normal',
		'high' );
}

function render_slider_details( $post ) {
	$link                    = get_post_meta( $post->ID, 'link', true );
	$open_target_blank_slide = get_post_meta( $post->ID, 'open-target-blank-slide', true );

	wp_nonce_field( 'my_meta_box_nonce1', 'meta_box_nonce1' );
	require 'partials/admin/slide-home.php';
}

function update_slide_details( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['meta_box_nonce1'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce1'], 'my_meta_box_nonce1' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	update_post_meta( $post_id, 'link', $_POST['link'] );
	$open_target_blank_slide = ( isset( $_POST['open-target-blank-slide'] ) && $_POST['open-target-blank-slide'] == '_blank' ) ? '_blank' : '_self';
	update_post_meta( $post_id, 'open-target-blank-slide', $open_target_blank_slide );

	return;
}
