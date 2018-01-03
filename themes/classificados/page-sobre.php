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
					<?php  while(have_posts()){
						the_post();
						the_content();
					} ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer();
