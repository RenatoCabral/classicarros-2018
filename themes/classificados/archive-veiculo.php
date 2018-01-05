<?php get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <h1 class="title_news title-archive">Veículos</h1>
            <div class="col s12 m12 l12 list-featured-vehicles">
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                $query = new WP_Query( [
                    'post_type'      => 'veiculo',
                    'posts_per_page' => 12,
                    'paged'          => $paged,
                    'post_status'    => 'publish',

                ]);

                if($query->have_posts()){
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        require 'app/partials/public/item-featured-vehicles.php';
                    }
                    ?>
                    <div class="div-pagination"><?php post_pagination(); ?> </div>

                <?php } else{
                    echo '<p>Em Breve.</p>';
                }?>


            </div>

        </div>
    </div>
<?php get_footer();