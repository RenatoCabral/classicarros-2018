<?php get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

    <div class="container-fluid">
        <div class="row">
            <h1 class="title_news title-archive"><?= $term->name ?></h1>

            <div class="row">
                <div class="box-filter-category">
                    <div class="col s12 m6 l2">

                        <?php
                        render_category_dropdown_filter( 'veiculo', 'categoria', 'Categoria' );
                        render_category_dropdown_filter( 'veiculo', 'manufacturer','Fabricante' );
                        ?>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12 list-featured-vehicles">


                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                $query = new WP_Query( [
                    'post_type'      => 'veiculo',
                    'posts_per_page' => 12,
                    'paged'          => $paged,
                    'post_status'    => 'publish',
                    'tax_query' => [
                        [
                            'taxonomy' => $term->taxonomy,
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ],
                    ],

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