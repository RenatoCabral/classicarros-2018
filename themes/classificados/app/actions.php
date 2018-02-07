<?php
add_action( 'login_enqueue_scripts', 'change_login_image' );
add_filter( 'admin_footer_text', 'change_admin_footer_text' );
add_filter( 'login_headertitle', 'add_custom_login_logo_url_title' );
add_filter( 'login_headerurl', 'add_custom_login_logo_url' );
add_action( 'wp_before_admin_bar_render', 'remove_unused_admin_bar' );
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

add_action( 'pre_get_posts', 'my_post_count_queries' );


// Imagens dos posts
add_theme_support( 'post-thumbnails' );

//Definindo dimensões padrão das imagens dos posts
add_image_size('slide-home', '1500','409', true);
add_image_size('thumb-news', '575','225', true);
add_image_size('full-single-slide-veiculo', '728','380', true);
add_image_size('thumb-single-slide-veiculo', '150','150', true);
//add_image_size('thumb-post-vehicle', '400','400', true);
add_image_size('thumb-post-veiculo', '400','400', true);



add_action( 'init', 'post_type_veiculo' );
add_action( 'init', 'post_type_blog' );
add_action( 'init', 'post_type_slides' );

//metabox - campos pernalizados
add_action( 'add_meta_boxes', 'meta_box_veiculo');
add_action( 'save_post_veiculo', 'save_meta_veiculo' );
add_action( 'save_post_veiculo', 'send_email_published_post' );

add_action( 'add_meta_boxes', 'add_slide_details_to_admin' );
add_action( 'save_post_sliders', 'update_slide_details' );

add_action( 'init', 'create_categoria_taxonomy' );
add_action( 'init', 'create_fabricante_taxonomy' );

add_action('admin_head','admin_scripts');

add_action( 'wp_head', 'define_ajaxurl' );

add_action( 'wp_ajax_nopriv_get_valid_cities_by_state_id', 'get_valid_cities_by_state_id' );
add_action( 'wp_ajax_get_valid_cities_by_state_id', 'get_valid_cities_by_state_id' );

add_action( 'wp_ajax_get_models_by_manufacturer', 'get_models_by_manufacturer' );
add_action( 'wp_ajax_nopriv_get_models_by_manufacturer', 'get_models_by_manufacturer' );

add_action( 'wp_ajax_get_years_list', 'get_years_list' );
add_action( 'wp_ajax_nopriv_get_years_list', 'get_years_list' );


add_action( 'wp_ajax_nopriv_send_form_veiculo', 'send_form_veiculo' );
add_action( 'wp_ajax_send_form_veiculo', 'send_form_veiculo' );


add_action('admin_head','remove_personal_options');
