<?php get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <h1 class="title_news title-archive">Veículos</h1>
            <div class="col s12 m12 l12 list-featured-vehicles">
				<?php while ( have_posts() ) {
					the_post();
					require 'app/partials/public/item-featured-vehicles.php';
				}
				 ?>
                <div class="div-pagination"><?php post_pagination(); ?> </div>
            </div>

        </div>
    </div>
<?php get_footer();