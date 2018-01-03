<?php get_header(); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="title-news-date">
                <!--Função que irá exibir o título do post-->
                <h1 class="title-single-blog"><?php the_title(); ?></h1>

                    <div class="div-single-date">
                        <i class="material-icons small">today</i>
                        <!--Função que recupera a data em que o post foi escrito-->
                        <p><?= get_the_date(); ?></p>
                    </div>
            </div>

            <br><br><br>

            <!--Função que verifica se o post possui uma imagem anexada, imagem principal-->
            <?php if(has_post_thumbnail()){ ?>
                    <div class="thumb-single-news">
                        <!--Função responsável por exibir a miniatura da imagem, outra imagem
                        vinculada ao post-->
                        <?php the_post_thumbnail();?>
                    </div>
           <?php } ?>

            <div class="content-single-news">

                <!--Irá exibir o conteúdo do post, caso exista-->
                <?php  while(have_posts()){
                    the_post();
                    the_content();
                } ?>

            </div>
        </div>
    </div>
</div>

<?php get_footer();
