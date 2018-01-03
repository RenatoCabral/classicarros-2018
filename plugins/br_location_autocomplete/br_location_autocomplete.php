<?php

/*
Plugin Name: Brazilian location autocomplete
Plugin URI: http://www.indexis.com.br
Description: Adds Custom fields for all states and cities of Brazil
Version: 0.1
Author: Bruno Rodrigues
Author URI: http://www.indexis.com.br
*/

define( 'BR_LA_POST_TYPE', 'veiculo' );
require( 'helpers/db_functions.php' );

function br_la_cities_activate() {
	br_la_create_table( 'country' );
	br_la_create_table( 'state' );
	br_la_create_table( 'city' );

	br_la_populate_country_table();
	br_la_populate_state_table();
	br_la_populate_city_table();

}

register_activation_hook( __FILE__, 'br_la_cities_activate' );

function br_la_cities_deactivate() {
	br_la_drop_plugin_tables();
}

register_deactivation_hook( __FILE__, 'br_la_cities_deactivate' );

function br_la_create_meta_box() {
	add_meta_box( 'br_la_location_box', 'Localização', 'add_location_meta_box', BR_LA_POST_TYPE );
}

add_action( 'add_meta_boxes_' . BR_LA_POST_TYPE, 'br_la_create_meta_box' );

function add_location_meta_box() {
	add_state_meta_box();
	add_city_meta_box();


}

function add_state_meta_box() {
	global $post;
	$state = get_post_meta( $post->ID, 'br_la_state', true );
	?>
    <p style="float:left; margin-right: 20px">
        <label for="br_la_state">
            Estado
            <select style="width: 200px" id="br_la_state" class="select-localizacao" name="br_la_state">
                <option value="">Selecione o estado</option>
				<?php populate_state_meta_box( $state ); ?>
            </select>
        </label>
    </p>
<?php }

function populate_state_meta_box( $state ) {
	global $wpdb;
	$tablename = $wpdb->prefix . 'br_la_state';
	$sql       = "SELECT id, nome from $tablename";
	$results   = $wpdb->get_results( $sql, ARRAY_A );

	foreach ( $results as $res ) {
		$id   = $res['id'];
		$name = $res['nome'];
		?>
        <option value='<?php echo $id; ?>' <?php echo $id == $state ? 'selected=selected' : ''; ?> ><?php echo $name; ?></option>
		<?php
	}
}

function add_city_meta_box() {
	global $post;
	$city = get_post_meta( $post->ID, 'br_la_city', true );
	?>
    <p>
        <label for="br_la_city">
            Cidade
            <select style="width: 200px" name="br_la_city" class="" id="br_la_city">
                <option value="<?= $city; ?>" <?php selected( $city ); ?> ><?= $city; ?></option>
            </select>

        </label>
    </p>
<?php }


function js_handler() {
	add_scripts();
	?>
    <script>

        jQuery('#br_la_state').on('change', function () {
            jQuery('#br_la_city').empty().append('<option>Carregando</option>');
            var state_id = jQuery('#br_la_state').val();
            var data = {
                'action': 'get_cities_by_state_id',
                'state_id': state_id
            };
            jQuery.post(ajaxurl, data, function (response) {
				<?php
				$city = get_post_meta( get_the_ID(), 'br_la_city', true );
				?>
                console.log(response);
                response = jQuery.parseJSON(response);
                console.log(response);
                jQuery('#br_la_city').empty().append('<option>Cidade</option>');
                jQuery.each(response, function (index, data) {
                    var cidade = "<?php echo $city; ?>";
                    if (data.value == cidade) {
                        jQuery('#br_la_city').append('<option selected=selected value="' + data.value + '">' + data.value + '</option>');
                    } else {
                        jQuery('#br_la_city').append('<option value="' + data.value + '">' + data.value + '</option>');
                    }
                });
            });
        });


    </script>
	<?php
}

add_action( 'admin_footer', 'js_handler' );
add_action( 'wp_footer', 'js_handler' );

add_action( 'wp_ajax_get_cities_by_state_id', 'get_cities_by_state_id' );
function get_cities_by_state_id() {
	global $wpdb;
	$state_id  = $_POST['state_id'];
	$tablename = $wpdb->prefix . 'br_la_city';
	$sql       = "SELECT nome as 'value', nome as 'label' from $tablename WHERE estado = $state_id";
	$result    = $wpdb->get_results( $sql, ARRAY_A );
	echo json_encode( $result );
	die;
}

function add_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script(
		'jquery-ui-autocomplete',
		plugin_dir_url( __FILE__ ) . '/assets/js/jquery-ui.min.js',
		[ 'jquery' ],
		false,
		true
	);
	wp_register_style(
		'jquery-ui-styles',
		plugin_dir_url( __FILE__ ) . '/assets/css/jquery-ui.min.css'
	);
	wp_enqueue_style( 'jquery-ui-styles' );
	wp_register_style(
		'location-inputs',
		plugin_dir_url( __FILE__ ) . '/assets/css/location.css'
	);
	wp_enqueue_style( 'location-inputs' );
}

function save_location_meta_boxes( $post_id ) {
	if ( get_post_type( $post_id ) != BR_LA_POST_TYPE ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	$state = isset( $_POST['br_la_state'] ) ? $_POST['br_la_state'] : '';
	$city  = isset( $_POST['br_la_city'] ) ? $_POST['br_la_city'] : '';

	update_post_meta( $post_id, 'br_la_state', $state );
	update_post_meta( $post_id, 'br_la_city', $city );

}

add_action( 'save_post_veiculo', 'save_location_meta_boxes' );
