<?php get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="title-news-date">
                    <!--Função que irá exibir o título do post-->
                    <h1 class="title-archive title_news"><?php the_title(); ?></h1>
                </div>

                <br>

                <div class="content-single-news content-sobre">
                    <!--Irá exibir o conteúdo do post-->
					<?php while ( have_posts() ) {
						the_post();
						the_content();
					}

					$query_pages = new WP_Query( [ /*variavel $query_pages recebe um novo objeto WP_Query, responsável por mapear uma página ou post*/
						'post_type'       => 'page',
						/*declarado o tipo do post, que é uma página*/
						'post_parent__in' => [ get_the_ID() ],
						/*procurar a página pai no ID que foi passado na função get_the_ID*/
						'post_status'     => 'publish',
						/*exibir post que estejam publicados*/
						'orderby'         => 'menu_order',
						/*realizar ordenação ASC*/
						'order'           => 'ASC'
					] );/*Se exisitirem post, entra no if abaixo, para montar o HTML*/

					if ( $query_pages->have_posts() ) { ?><!--variavel $query_pages recebe os posts-->
                    <ul class="collapsible" data-collapsible="accordion">
						<?php while ( $query_pages->have_posts() ) { /*laço que irá exibir todos os posts(páginas filhas e seus conteúdos abaixo*/
							$query_pages->the_post(); ?>
                            <li>
                                <div class="collapsible-header"><?php the_title() ?></div>
                                <div class="collapsible-body"><span><?php the_content() ?></span></div>
                            </li>
						<?php }
						wp_reset_postdata(); ?>
                    </ul>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
