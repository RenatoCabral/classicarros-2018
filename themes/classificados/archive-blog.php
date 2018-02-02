<?php get_header(); ?>

  <div class="container-fluid">
    <div class="row">
      <h1 class="title_news title-archive">Blog</h1>
      <div class="col s12 m12 l12 list-featured-vehicles">
        <?php  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

          $query = new WP_Query( [
              'post_type'      => 'blog',
              // 'posts_per_page' => 3, qtd de posts está na funcao my_post_count_queries()
              'post_status'    => 'publish',
                'paged'          => $paged

          ]);

        if($query->have_posts()){
          while ( $query->have_posts() ) {
            $query->the_post();

            $thumb_id  = get_post_thumbnail_id( get_the_ID() );
            $thumb_url = wp_get_attachment_image_src( $thumb_id, 'thumb-news' );
            $img_src   = has_post_thumbnail() ? $thumb_url[0] : get_bloginfo( 'template_directory' ) . "/img/no-image-veiculo-thumb.jpg";

            render_blog( $img_src );

          }  ?>
          <div class="div-pagination">
            <?php
             post_pagination();



              ?>
           </div>
        <?php } else {
            echo '<p>Em Breve.</p>';
        } ?>
      </div>
    </div>
  </div>
<?php get_footer();
