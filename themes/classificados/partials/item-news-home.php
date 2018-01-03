<?php

/*No trecho de código abaixo, a variavel $query está recebendo o objeto WP_Query,
que é responsável por trazer, capturar informações dos post, páginas que solicitadas.
Foram declaradas duas variaveis 'post_type' que está recebendo o tipo da solicitação, que nesse caso são blog
e a segunda variavel é a 'posts_per_page', que está recebendo a quantidade de post a serem
exibidos.*/
$query = new WP_Query([
    'post_type' => 'blog',
    'posts_per_page' => 6
]);


if($query->have_posts()){ ?>
    <div class="col s12 m6 l9">
            <h5 class="title_news">Blog</h5>
            <?php while ($query->have_posts()) {
                $query->the_post();
                /*comando abaixo irá retornar a URL da imagem para a publicação,
                foi passado como parametro a função get_the_ID() que irá recuperar o ID da imagem no loop,
                informado também a descrição da função das medidas padrão..*/
                $img_src = get_the_post_thumbnail_url(get_the_ID(), 'thumb-news');


                /*Função responsável por estar exibindo todos post de noticias. A função recebe como
                parametro a variavel $img_src.*/
                    render_blog($img_src);

            } ?>
            <div class="box-view-more-button-news-home">
                <!--redireciona para a página de noticias.-->
                <a href="<?= get_post_type_archive_link('blog'); ?>" class="waves-effect waves-light btn-large">Ver Mais</a>
            </div>
    </div>
<?php }else{
    echo '<h3 style="text-align: center">Sem Notícias no momento</h3>';
}
