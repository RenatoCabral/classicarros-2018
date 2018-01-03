<?php
add_filter( 'parse_query', 'idx_get_query_only_current_user' );
add_action( 'pre_get_posts', 'idx_users_own_attachments' );

function idx_get_query_only_current_user( $wp_query ) {
	if ( strpos( $_SERVER['REQUEST_URI'], '/wp-admin/edit.php' ) !== false ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			add_action( 'views_edit-noticias', 'child_remove_some_post_views' );
			global $current_user;
			$wp_query->set( 'author', $current_user->ID );
		}
	}
}

function child_remove_some_post_views( $views ) {
	unset( $views['all'] );
	unset( $views['publish'] );
	unset( $views['pending'] );

	return $views;
}

function idx_users_own_attachments( $wp_query_obj ) {
	global $current_user, $pagenow;
	$is_attachment_request = ( $wp_query_obj->get( 'post_type' ) == 'attachment' );

	if ( ! $is_attachment_request ) {
		return;
	}

	if ( ! is_a( $current_user, 'WP_User' ) ) {
		return;
	}

	if ( ! in_array( $pagenow, array( 'upload.php', 'admin-ajax.php' ) ) ) {
		return;
	}

	if ( ! current_user_can( 'delete_pages' ) ) {
		$wp_query_obj->set( 'author', $current_user->ID );
	}

	return;
}


function can_view() {
	// or any other admin level capability
	return current_user_can( 'manage_options' );
}


add_action( 'load-index.php', 'load_index' );
function load_index() {
	if ( ! can_view() ) {
		$qs = empty( $_GET ) ? '' : '?' . http_build_query( $_GET );
		wp_safe_redirect( admin_url( 'edit.php?post_type=veiculo' ) . $qs );
		exit;
	}
}


// Cria cargo Colaborador Top, que só não pode excluir posts
add_role( 'vendedor', 'Vendedor', array(
	'edit_posts'           => true,
	'delete_posts'         => false,
	'edit_published_posts' => true,
	'publish_posts'        => false, // só pode salvar rascunhos
	'edit_files'           => true,
	'read'                 => true,
	'upload_files'         => true //pode enviar arquivos
) );


global $typenow;
if ( ! current_user_can( 'activate_plugins' ) && $typenow == 'veiculo') {
	add_action( 'save_post', 'change_publish_status_to_pending', 10, 2 );
}

function change_publish_status_to_pending( $post ) {
	remove_filter( current_filter(), __FUNCTION__ );

	if ( 'publish' == $post->post_status ) //adjust the condition
	{
		$post->post_status = 'pending'; // use any post status
		wp_update_post( $post );
	}
}