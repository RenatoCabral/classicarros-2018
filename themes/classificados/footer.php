<?php if ( !is_page("minha-conta" ) && !is_page("criar-nova-senha") && !is_page("recuperar-senha")) {?>

    <footer class="page-footer footer-classificados">
        <div class="container-fluid">
            <div class="row footer-row">
                <div class="col s12 m4 l4">
                    <div class="card cards_footer">
                        <div class="card-content div-footer">
                            <h5 class="title_footer">Empresa</h5>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'sobre' ) ) ?>">Sobre ClassiCarros</a></p>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'contato' ) ) ?>">Entre em Contato</a></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card cards_footer">
                        <div class="card-content div-footer">
                            <h5 class="title_footer">Atendimento</h5>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'duvidas' ) ) ?>">Dúvidas</a></p>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " target="_blank" href="http://veiculos.fipe.org.br/">Consulta Fipe</a></p>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " href="<?= get_post_type_archive_link('veiculo'); ?>">Veículos</a></p>
                            <p class="p-link-menu-footer"> <span>&rarr;</span> <a class="link-menu transition-300ms " href="<?= get_post_type_archive_link('blog'); ?>">Blog</a></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card cards_footer">
                        <div class="card-content div-footer">
                            <h5 class="title_footer">
                                <img class="responsive-img"src="<?= get_bloginfo('template_url') ?>/img/logo-footer.png" >
                            </h5>
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.
                                Unde eveniet excepturi reprehenderit class tincidunt ridiculus vitae penatibus, magna, vestibulum minim, curae, nostrud, vero, animi! Necessitatibus molestiae. Excepteur libero?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2017 Copyright Renato Carvalho Cabral
<!--                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
                </div>
            </div>
        </div>
    </footer>
<?php } ?>


<script src="<?php bloginfo('template_directory') ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/select2.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/materialize.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/slick.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.fancybox.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.mask.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/searchform.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/app.js"></script>


<?php if(is_singular('veiculo')){?>
    <script src="<?php bloginfo('template_directory') ?>/js/form-interesse.js"></script>
<?php } ?>


<?php wp_footer(); ?>

</body>
</html>
