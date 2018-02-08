<?php

function define_ajaxurl() { ?>
	<script type="text/javascript">
		var ajaxurl = '<?= admin_url('admin-ajax.php'); ?>';
	</script>
<?php }

function handler_options($name, $options, $selected){ ?>
    <select required name="<?= $name ?>">
        <option value="">Selecione</option>

<?php        foreach ( $options as $code => $name ) { ?>
            <option value="<?= $code; ?>" <?php selected( $selected, $code ); ?> ><?= $name; ?></option>
        <?php }

    echo ' </select>';
}

function get_colors() {
    $colors = [
        'Amarelo'       => 'Amarelo',
        'Azul'          => 'Azul',
        'Azul Metálico' => 'Azul Metálico',
        'Bege'          => 'Bege',
        'Branco'        => 'Branco',
        'Cinza'         => 'Cinza',
        'Cinza Metálico'=> 'Cinza Metálico',
        'Cromado'       => 'Cromado',
        'Dourado'       => 'Dourado',
        'Indefinida'    => 'Indefinida',
        'Laranja'       => 'Laranja',
        'Marrom'        => 'Marrom',
        'Prata'         => 'Prata',
        'Preto'         => 'Preto',
        'Preto Metálico'=> 'Preto Metálico',
        'Rosa'          => 'Rosa',
        'Roxo'          => 'Roxo',
        'Verde'         => 'Verde',
        'Vermelho'      => ' Vermelho',
        'Vinho'         => 'Vinho',
        'Outros'        => 'Outros'

    ];

    return $colors;
}

function get_motors() {
    $motors = [
        '1.0'       => '1.0',
        '1.4'       => '1.4',
        '1.6'       => ' 1.6',
				'1.8'       => '1.8',
        '2.0'       =>  '2.0',
				'2.4'       =>  '2.4',
        'Turbo'     =>  'Turbo',
        'V6'        =>  'V6',
        'V8'        =>  'V8',
        'Outro'        =>  'Outro'

    ];

    return $motors;
}

function get_fuels() {
    $fuels = [
        'Álcool'        => 'Álcool',
        'Diesel'        => 'Diesel',
        'Flex'          => 'Flex',
        'GNV'           => 'GNV',
        'Gasolina'      => 'Gasolina',
        'Híbrido'       => 'Híbrido'

    ];
    return $fuels;
}

function get_exchanges() {
    $exchanges = [
        'Automatico'    => 'Automatico',
        'Automatico sequencial'    => 'Automatico sequencial',
        'CVT'           => 'CVT',
        'Manual'        => 'Manual',
				'DualLogic'     => 'DualLogic'

    ];
    return $exchanges;
}

function get_conservations() {
    $conservations = [
        'Novo'        => 'Novo',
        'Seminovo'    => 'Seminovo',
        'Usado'       => 'Usado'

    ];
    return $conservations;
}

function get_item_series(){

    $options = [
        'Airbags' => 'Airbags',
        'Airbag_motorista' => 'Airbag Motorista',
        'Alarme' => 'Alarme',
        'Ar_quente' => 'Ar Quente',
        'Ar_condicionado' => 'Ar Condicionado',
        'Banco_eletrico' => 'Banco Elétrico',
        'Banco_couro' => 'Banco Couro',
        'Banco_regulagem_altura' => 'Banco Regulagem Altura',
        'Banco_dianteiro_com_aquecimento' => 'Banco Dianteiro com Aquecimento',
        'Blindagem' => 'Blindagem',
        'Central_multimidia' => 'Central Multimídia',
        'Computador_bordo' => 'Computador Bordo',
        'Controle_tracao' => 'Controle de Tração',
        'Camera_de_re' => 'Câmera de ré',
        'Capota_maritima' => 'Capota Marítima',
        'Cd_mp3_player' => 'CD Mp3 Player',
        'Controle_de_velocidade' => 'Controle de Velocidade',
        'Direcao_hidraulica' => 'Direção Hidráulica',
        'Direcao_eletrica' => 'Direção Elétrica',
        'Desembacador_traseiro' => 'Desembaçador Traseiro',
        'Espelhos_eletricos' => 'Espelhos Elétricos',
        'Farol_de_milha' => 'Farol de Milha',
        'Farol_de_milha_neblina' => 'Farol de Milha e Neblina',
        'Farol_de_neblina' => 'Farol de Neblina',
        'Farol_de_xenonio' => 'Farol de Xenônio',
        'Farol de led' => 'Farol de Led',
        'Freios_abs' => 'Freios ABS',
        'Insulfilme' => 'Insulfilme',
        'Limpador_traseiro' => 'Limpador Traseiro',
        'Piloto_automatico' => 'Piloto Automático',
        'Pneu_reserva' => 'Pneu Reserva(Step)',
        'Rodas_liga_leve' => 'Rodas de Liga Leve',
        'Radio' => 'Rádio',
        'Radio_toca_fitas' => 'Rádio e Toca Fitas',
				'Retrovisor elétrico' => 'Retrovisor elétrico',
        'Sensor_estacionamento' => 'Sensor de Estacionamento',
        'Sensor_chuva' => 'Sensor de Chuva',
        'Teto_solar' => 'Teto Solar',
        'Tracao_4x4' => 'Tração 4x4',
        'Travas_eletricas' => 'Travas Elétricas',
        'Vidro_eletrico' => 'Vidro Elétrico',
        'Volante_regulagem_altura' => 'Volante com Regulagem de altura',
    ];


   return $options;


}

function admin_scripts(){ ?>

    <script src="<?php bloginfo('template_directory') ?>/js/jquery.mask.min.js"></script>
    <script>
        var cellphoneMask = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        cellphoneOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(cellphoneMask.apply({}, arguments), options);
            }
        };
        jQuery('.phone').mask(cellphoneMask, cellphoneOptions);
    </script>





   <?php global $typenow;
    //scripts serao carregados no admin onde o post type for veiculos
    if(is_admin() && $typenow == 'veiculo'){

        global $wpdb;

        $model = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'model'");

        ?>




       <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/select2.min.css">
       <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/opcionais.css">

        <style>


            .item-detalhes{
                display: inline-block;
                margin-right: 15px;
            }
            #edit-slug-box{
            /*display: none;*/
            }

            .info-cadastro{
                color: red;
                text-align: center;
                padding: 10px;
            }

        </style>

        <script src="<?php bloginfo('template_directory') ?>/js/select2.min.js"></script>


        <script>


            jQuery(document).ready(function() {
                jQuery('#submitpost').append('<p class="info-cadastro">Seu cadastro está sujeito a aprovação.</p>');
                jQuery('.select-localizacao').select2();
                jQuery('#price').mask('000.000.000.000.000,00',{reverse: true});
                jQuery('#year').mask('0000');

                //percorre o array de modelos que estao na variavel js model
                var model = <?= json_encode($model);?>;
                console.log(model);

                var i;
                for(i = 0; i < model.length; i++){
                    if(model[i] === null){
                        model.splice(i,1);
                        i--;
                    }
                }
                jQuery('#model').autocomplete({source:model});

            });
        </script>

    <?php }
}

function post_pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) {$paged = 1;}

	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if(!$pages){
			$pages = 1;
		}
	}

	if(1 != $pages){
		echo "<div class='row paginacao'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
		    echo "<a href='".get_pagenum_link($paged - 1)."' class='current'>&laquo;</a>";
		}

		if($paged > 6 && $showitems < $pages) {
		    echo "<a href='".get_pagenum_link(1)."'>1</a> <span class='current'>...</span>";
		}

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}

		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
		    echo "<span class='current'>...</span> <a href='".get_pagenum_link($pages)."'>$pages</a>";
		}
		if ($paged < $pages && $showitems < $pages) {
		    echo "<a href='".get_pagenum_link($paged + 1)."' class='current'>&raquo;</a>";
		}
		echo "</div>\n";
	}
}

function my_post_count_queries( $query ) {
  if (!is_admin() && is_post_type_archive( 'blog' ) ){

       $query->set('posts_per_page', 6);

  }
}

function post_pagination_blog(){

	global $wp_query;
	$pages = $wp_query->max_num_pages;

	if ( $pages > 1 ) {
		$current_page = max( 1, intval( $wp_query->query_vars['paged'] ) );

		if ( $current_page == 1 ) {
			echo '<style>
                    .prev-page{
                       opacity: 0.3;
                        cursor: default;
                        pointer-events: none;
                    }
                </style>';
		}

		if ( $current_page == $pages ) {
			echo '<style>
                    .next-page{
                       opacity: 0.3;
                        cursor: default;
                        pointer-events: none;
                    }

                </style>';
		}

		echo '<a href="' . get_pagenum_link( $current_page - 1 ) . '" class="transition-300 prev-page page-numbers"><span> < </span></a>';

		echo paginate_links( [
			'base'      => get_pagenum_link( 1 ) . '%_%',
			'format'    => '/page/%#%',
			'current'   => $current_page,
			'total'     => $pages,
			'prev_next' => false,
			'add_args'  => false,
			'mid_size'  => 2,
			'show_all'  => false
		] );

		echo '<a href="' . get_pagenum_link( $current_page + 1 ) . '" class="transition-300 next-page page-numbers"><span> > </span></a>';
	}
}

function get_valid_cities_by_state_id() {
	global $wpdb;
	$tablename = $wpdb->prefix . 'br_la_city';
	$state     = isset( $_POST[ 'state_id' ] ) ? intval($_POST[ 'state_id' ]) : '';

	$sql        = "SELECT nome from $tablename where estado = $state";
	$all_cities = $wpdb->get_col( $sql );


	$sql_cities   = "SELECT DISTINCT meta_value from $wpdb->postmeta WHERE meta_key = 'br_la_city' and meta_value <> ''";
	$valid_cities = $wpdb->get_col( $sql_cities );

	$result = array_intersect( $valid_cities, $all_cities );

	echo json_encode( $result );
	die;
}



function limit_character($string, $max) {
  if ( strlen( $string ) > $max ) {
		return substr( $string, 0, $max ) . " &hellip;";
	} else {
		return $string;
	}
}




//https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
function send_email_published_post($post_id){
// If this is just a revision, don't send the email.
	if ( wp_is_post_revision( $post_id ) )
		return;

	$post_title = get_the_title( $post_id );
	$post_url = get_permalink( $post_id );
	$subject = 'Seu anúncio foi publicado ou alterado/atualizado... ';

	$message = "Seu anúncio foi publicado ou alterado/atualizado:\n\n";
	$message .= "Qualquer dúvida entre em contato com o Classicarros:\n\n";
	$message .= get_permalink( get_page_by_path( 'contato' ) )."\n\n\n\n";
	$message .= $post_title . ": " . $post_url;


	$author_id  = get_post_field( 'post_author', $post_id );



	// Send email to admin.
	wp_mail(get_the_author_meta( 'user_email', $author_id ) , $subject, $message );
}




function remove_personal_options(){
    echo '<script type="text/javascript">jQuery(document).ready(function($) {

$(\'form#your-profile > h2:first\').remove(); // remove the "Personal Options" title

$(\'form#your-profile tr.user-rich-editing-wrap\').remove(); // remove the "Visual Editor" field

//$(\'form#your-profile tr.user-admin-color-wrap\').remove(); // remove the "Admin Color Scheme" field

$(\'form#your-profile tr.user-comment-shortcuts-wrap\').remove(); // remove the "Keyboard Shortcuts" field

$(\'form#your-profile tr.user-admin-bar-front-wrap\').remove(); // remove the "Toolbar" field

$(\'form#your-profile tr.user-language-wrap\').remove(); // remove the "Language" field

//$(\'form#your-profile tr.user-first-name-wrap\').remove(); // remove the "First Name" field

//$(\'form#your-profile tr.user-last-name-wrap\').remove(); // remove the "Last Name" field

$(\'form#your-profile tr.user-nickname-wrap\').hide(); // Hide the "nickname" field

$(\'table.form-table tr.user-display-name-wrap\').remove(); // remove the “Display name publicly as” field

$(\'table.form-table tr.user-url-wrap\').remove();// remove the "Website" field in the "Contact Info" section

$(\'h2:contains("Sobre você"), h2:contains("Sobre você")\').remove(); // remove the "About Yourself" and "About the user" titles

$(\'form#your-profile tr.user-description-wrap\').remove(); // remove the "Biographical Info" field

$(\'form#your-profile tr.user-profile-picture\').remove(); // remove the "Profile Picture" field

$(\'table.form-table tr.user-aim-wrap\').remove();// remove the "AIM" field in the "Contact Info" section

$(\'table.form-table tr.user-yim-wrap\').remove();// remove the "Yahoo IM" field in the "Contact Info" section

$(\'table.form-table tr.user-jabber-wrap\').remove();// remove the "Jabber / Google Talk" field in the "Contact Info" section

});</script>';

}


add_action('admin_footer', function() {
?>
<script type="text/javascript">
if(jQuery('#post_type').val()==='veiculo'){
		jQuery('#publish, #save-post').click(function(e){
			 if(jQuery('#taxonomy-categoria input:checked').length==0 || jQuery('#taxonomy-manufacturer input:checked').length==0){
					 alert('Categoria e Fabricante são obrigatórios');
					 e.stopImmediatePropagation();
					 return false;
			 }else{
					 return true;
			 }
	 });
}



</script>
<?php
});

function render_category_dropdown_filter( $post_type, $tax, $title ) {
	require 'partials/public/item-form-filter-category.php';
}


add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


function set_html_content_type() {

    return 'text/html';
}