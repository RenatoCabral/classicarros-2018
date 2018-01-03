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
        '2.0'       =>  '2.0',
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
        'airbags' => 'Airbags',
        'airbag_motorista' => 'Airbag Motorista',
        'alarme' => 'Alarme',
        'ar_quente' => 'Ar Quente',
        'ar_condicionado' => 'Ar Condicionado',
        'banco_eletrico' => 'Banco Elétrico',
        'banco_couro' => 'Banco Couro',
        'banco_regulagem_altura' => 'Banco Regulagem Altura',
        'banco_dianteiro_com_aquecimento' => 'Banco Dianteiro com Aquecimento',
        'blindagem' => 'Blindagem',
        'central_multimidia' => 'Central Multimídia',
        'computador_bordo' => 'Computador Bordo',
        'controle_tracao' => 'Controle de Tração',
        'camera_de_re' => 'Câmera de ré',
        'capota_maritima' => 'Capota Marítima',
        'cd_mp3_player' => 'CD Mp3 Player',
        'controle_de_velocidade' => 'Controle de Velocidade',
        'direcao_hidraulica' => 'Direção Hidráulica',
        'direcao_eletrica' => 'Direção Elétrica',
        'desembacador_traseiro' => 'Desembaçador Traseiro',
        'espelhos_eletricos' => 'Espelhos Elétricos',
        'farol_de_milha' => 'Farol de Milha',
        'farol_de_milha_neblina' => 'Farol de Milha e Neblina',
        'farol_de_neblina' => 'Farol de Neblina',
        'farol_de_xenonio' => 'Farol de Xenônio',
        'freios_abs' => 'Freios ABS',
        'insulfilme' => 'Insulfilme',
        'limpador_traseiro' => 'Limpador Traseiro',
        'piloto_automatico' => 'Piloto Automático',
        'pneu_reserva' => 'Pneu Reserva(Step)',
        'rodas_liga_leve' => 'Rodas de Liga Leve',
        'radio' => 'Rádio',
        'radio_toca_fitas' => 'Rádio e Toca Fitas',
        'sensor_estacionamento' => 'Sensor de Estacionamento',
        'sensor_chuva' => 'Sensor de Chuva',
        'teto_solar' => 'Teto Solar',
        'tracao_4x4' => 'Tração 4x4',
        'travas_eletricas' => 'Travas Elétricas',
        'vidro_eletrico' => 'Vidro Elétrico',
        'volante_regulagem_altura' => 'Volante com Regulagem de altura',
    ];


   return $options;


}

function admin_scripts(){
    //https://pt.stackoverflow.com/questions/186880/formul%C3%A1rio-ajax-javascript-e-php/186923
    global $typenow;
    //scripts serao carregados no admin onde o post type for veiculos
    if(is_admin() && $typenow == 'veiculo'){ ?>
       <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/select2.min.css">

        <style>

            .item-serie{
                margin: 8px;
                display: inline-block;
            }
            .item-marca .select2{
                width: 130px !important;
           }
           .item-modelo .select2{
                width: 150px !important;
           }
           .item-ano .select2{
                width: 120px !important;
           }
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
        <script src="<?php bloginfo('template_directory') ?>/js/jquery.mask.min.js"></script>
        <script>



        jQuery(document).ready(function() {
            jQuery('#submitpost').append('<p class="info-cadastro">Seu cadastro está sujeito a aprovação.</p>');
            fipeMarcas();
            fipeModelos();
            fipeAno();
            mask();
            jQuery('.select-localizacao').select2();
            jQuery('.marca').select2();
            jQuery('.modelo').select2();
            jQuery('.ano').select2();

        });

        function fipeMarcas(){
            var marcaSelected = jQuery('.marca').data('marca-selected');

            var URL = "http://whateverorigin.org/get?url=" + encodeURIComponent("http://fipeapi.appspot.com/api/1/carros/marcas.json");
            jQuery.ajax({
                url: URL,
                dataType: "jsonp",
                cache: false,
                success: function (response) {
                    var data = response.contents;
                    var option = '';
                    data = jQuery.parseJSON(data);
                    jQuery.each(data, function(i, item) {
                        var elems_obj = {};
                       elems_obj['id'] = item.id;
                       elems_obj['name'] = item.name;
                       var valueMarca = JSON.stringify(elems_obj);
                       var selected = marcaSelected === item.id ? 'selected' : '';
                       option += "<option "+selected+"  value='" + valueMarca + " '>"+ item.name + "</option>";

                    });
                    jQuery('.marca').append(option);

                },
                error: function (response) {
                    console.log('ERROR marca');
                    console.log(response)
                }
            });
        }



        jQuery(document).on('change','.marca', function () {
            jQuery('.modelo').html('').select2({data: {id:null, text: null}});
            fipeModelos()
        });
         jQuery(document).on('change','.modelo', function () {
               jQuery('.ano').html('').select2({data: {id:null, text: null}});
                fipeAno()
        });

        function fipeModelos(){
            var modeloSelected = jQuery('.modelo').data('modelo-selected'); // pega o modelo selecionado
            console.log('modelo selecionado salvo no db: '+modeloSelected);
            var marca = jQuery('.marca').val();
            console.log('marca selecionado: '+marca);

               if(marca === ''){ // se a marca já estiver salva no banco ele pega de la. E o valor está atribuido no atributo data-marca-selected.
//               Entao, ele será indefinido pois o javascript demora carregar. Mas se está salvo, eu já tenho o valor.

                     marca = jQuery('.marca').data('marca-selected');
                     console.log('entrou no if ');
                     console.log(marca);

               }


            var URL = "http://whateverorigin.org/get?url=" + encodeURIComponent("http://fipeapi.appspot.com/api/1/carros/veiculos/"+marca+".json");
            jQuery.ajax({
                url: URL,
                type: 'post',
                dataType: "jsonp",
                cache: false,
                success: function (response) {
                    console.log('SUCCESS');
                    var data = response.contents;
                    var option = '';
                    data = jQuery.parseJSON(data);
                    jQuery.each(data, function(i, item) {

                       var elems_obj = {};
                       elems_obj['id'] = item.id;
                       elems_obj['name'] = item.name;
                       var valueModel = JSON.stringify(elems_obj);
                       var selected = modeloSelected == item.id ? 'selected' : '';
                       option += "<option "+selected+"  value='" + valueModel + " '>"+ item.name + "</option>";
                    });
                    jQuery('.modelo').append(option);

                },
                error: function (response) {
                    console.log('ERROR modelo');
                    console.log(response)
                }
            });
        }

        function fipeAno(){
           var marca = jQuery('.marca').val();
           var anoSelected = jQuery('.ano').data('ano-selected'); // pega o modelo selecionado
           var modelo= jQuery('.modelo').val();


           if(marca === ''){
                marca = jQuery('.marca').data('marca-selected');
           }

           if(modelo === ''){
                 modelo = jQuery('.modelo').data('modelo-selected');
           }

              var URL = "http://whateverorigin.org/get?url=" + encodeURIComponent("http://fipeapi.appspot.com/api/1/carros/veiculo/"+marca+"/"+modelo+".json");
              console.log(URL);
               jQuery.ajax({
               url: URL,
               type: 'post',
               dataType: "jsonp",
               cache: false,
               success: function (response) {
                   console.log('SUCCESS');
                   var data = response.contents;
                   var option = '';
                   data = jQuery.parseJSON(data);
                   jQuery.each(data, function(i, item) {
                       var elems_obj = {};
                       elems_obj['id'] = item.id;
                       elems_obj['name'] = item.name;
                       var valueAno = JSON.stringify(elems_obj);
                       var selected = anoSelected == item.id ? 'selected' : '';
                       option += "<option "+selected+"  value='" + valueAno + " '>"+ item.name + "</option>";
                   });
                   jQuery('.ano').append(option);
               },
               error: function (response) {
                   console.log('ERROR ano');
                   console.log(response)
               }
            });
        }


        function mask(){
             jQuery('#ano').mask('0000');
        }


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



function get_models_by_manufacturer() {
	if ( isset( $_POST['fabricante'] ) ) {
		$posts = new WP_Query(
		        [
			        'post_type'   => 'veiculo',
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'meta_query'     => [
			                [
					    'key'   => 'manufacturer',
					    'value' =>  $_POST['fabricante']
					    ]
		            ]
		        ]
		);

		$models = [];
		$output = '<option value="">Modelo</option>';
		while ( $posts->have_posts() ) : $posts->the_post();
			$model = get_post_meta( get_the_ID(), 'model', true );
			if ( ! empty( $model ) ) {
				if ( ! in_array( $model, $models ) ) {

            	    $pattern = '/[^\-]+/';
	                preg_match( $pattern, $model, $partes, PREG_OFFSET_CAPTURE );

					$output .= '<option value="' . $model . '">' . ucfirst($partes[0][0]) . '</option>';
					$models[] = $model;
				}
			}
		endwhile;
		echo $output;
	}
	die();
}

function get_years_by_model() {
	if ( isset( $_POST['modelo'] ) ) {
		$posts = new WP_Query(
		        [
			        'post_type'   => 'veiculo',
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'meta_query'     => [
			                [
					    'key'   => 'model',
					    'value' =>  $_POST['modelo']
					    ]
		            ]
		        ]
		);

		$years = [];
		$output = '<option value="">Ano</option>';
		while ( $posts->have_posts() ) : $posts->the_post();
			$year = get_post_meta( get_the_ID(), 'year', true );
			if ( ! empty( $year ) ) {
				if ( ! in_array( $year, $years ) ) {

            	    $pattern = '/[^\-]+/';
	                preg_match( $pattern, $year, $partes, PREG_OFFSET_CAPTURE );

					$output .= '<option value="' . $year . '">' . ucfirst($partes[0][0]) . '</option>';
					$years[] = $year;
				}
			}
		endwhile;
		echo $output;
	}
	die();
}


function limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) { array_pop($words); array_push($words, "..."); }
  return implode(' ', $words);
}

//limitar caracteres título post noticias

function wp_customTitle($limit){
    $title = get_the_title(isset($post->ID));
    if (strlen($title) > $limit){
        $title = substr($title, 0, $limit) . '...';
    }
    echo $title;
}


//limitar caracteres título post veiculos

function wp_customTitleVehicles($limit){
    $title = get_the_title(isset($post->ID));
    if (strlen($title) > $limit){
        $title = substr($title, 0, $limit) . '...';
    }
    echo $title;
}





