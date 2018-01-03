<!--Função resposável por incluir o arquivo header.php-->
<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row title_div_cars ">
                <h5>Resultado da Busca</h5>
            </div>
            <div class="div-searchform-blog">
		        <?php get_search_form(); ?>
            </div>
        </div>

        <div class="col s12 m12 l12 info_return_search">

			<?php
			$code = isset($_GET['code']) ? $_GET['code'] :  '' ;
			$s   = $_GET[ 's' ];

			if ($code != '' || $s == '-1' ) {
				render_search_veiculo( $code );
			} else {
				render_search_blog();
			}
			?>

        </div>
    </div>
</div>

<?php get_footer();