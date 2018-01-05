<?php get_header(); ?>

    <div class="container-fluid">
        <div class="row">
            <h1 class="title-archive title_news ">Blog</h1>
            <br><br>
            <div class="div-searchform-blog">
                <?php get_search_form(); ?>
            </div>
            <div class="col s12 m12 l12 list-featured-vehicles">
                <?php
                if ( ! have_posts() ) {
                    echo '<p> Sem notícias no momento </p>';
                } else {
                    $count =  0;
                    ?>
                    <div class="row">
                        <?php while ( have_posts() ) {
                        the_post();
                        if($count == 3){
                                $count = 0; ?>
                                </div>
                                <div class="row">
                            <?php }
                        $img_src = get_the_post_thumbnail_url( get_the_ID(), 'thumb-news' );
                        render_blog( $img_src ); ?>
                        <?php $count +=1;
                    } ?>
                    </div>

                <?php }

                post_pagination(); ?>
            </div>

        </div>
    </div>
<?php get_footer();