<!--Função resposável por incluir o arquivo header.php-->
<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="row title_div_cars ">
                <h5>Resultado da Busca</h5>
            </div>
            <div class="div-searchform-blog">
		        <?php
                if(isset($_GET['search-type']) && $_GET['search-type']=='detailed'){
                    get_template_part('searchform-detailed');
                }else{
                    get_search_form();
                }
                ?>
            </div>
        </div>

        <div class="col s12 m12 l12 info_return_search">

			<?php

            if(isset($_GET['search-type']) && $_GET['search-type']=='detailed'){
                get_template_part('search-results-detailed');

			} else {
                $query_string = isset($_GET['s']) ? $_GET['s'] : '';
				render_search_blog($query_string);
			}
			?>

        </div>
    </div>
</div>

<?php get_footer();