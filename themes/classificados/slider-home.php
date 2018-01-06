<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12 ">
            <div class="item-slider slider-home ">
                <?php render_slide_home(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="<?= get_permalink( get_page_by_path( 'minha-conta' ) ) ?>">
            <div class="div col s12 m12 l12 message">
                <div id="log"></div>
            </div>
        </a>
    </div>
</div>
