<nav class="z-depth-0 nav-menu">
    <div class="nav-wrapper menu-mobile-responsive" > <!--<a href="#!" class="brand-logo">Logo</a>-->
        <a href="#" data-activates="mobile-demo" class="button-collapse">
            <i class="material-icons icon-menu-mobile">menu</i>
        </a>

        <ul class="right hide-on-med-and-down menu-desktop ">
            <li data-menu="inicio">
                <a href="<?= home_url() ?>">Início</a>
            </li>
            <li data-menu="sobre/">
                <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'sobre' ) ) ?>">Sobre</a>
            </li>
            <li data-menu="duvidas/">
                <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'duvidas' ) ) ?>">Dúvidas</a>
            </li>
            <li data-menu="blog/">
                <a class="link-menu transition-300ms " href="<?= get_post_type_archive_link('blog'); ?>">Blog</a>
            </li>
            <li data-menu="veiculos/">
                <a class="link-menu transition-300ms " href="<?= get_post_type_archive_link('veiculo'); ?>">Veículos</a>
            </li>
            <li>
                <a class="link-menu transition-300ms " target="_blank" href="http://veiculos.fipe.org.br/">Fipe</a>
            </li>
            <li data-menu="contato/">
                <a class="link-menu transition-300ms " href="<?= get_permalink( get_page_by_path( 'contato' ) ) ?>">Contato</a>
            </li>
            <li data-menu="minha-conta/">
                <a class="menu-my-account transition-300ms " href="<?= get_permalink( get_page_by_path( 'minha-conta' ) ) ?>">Minha Conta</a>
            </li>
        </ul>
        <ul class="side-nav menu-mobile" id="mobile-demo">
            <!--            <li><a href="#"</a></li>-->
            <li class="active"><a href="<?= home_url() ?>">Início</a></li>
            <li><a href="<?= get_permalink( get_page_by_path( 'sobre' ) ) ?>">Sobre</a></li>
            <li><a href="<?= get_permalink( get_page_by_path( 'duvidas' ) ) ?>">Dúvidas</a></li>
            <li><a href="<?= get_post_type_archive_link('blog'); ?>">Blog</a></li>
            <li><a href="<?= get_post_type_archive_link('veiculo'); ?>">Veículos</a></li>
            <li><a target="_blank" href="http://veiculos.fipe.org.br/">Fipe</a></li>
            <li><a href="<?= get_permalink( get_page_by_path( 'contato' ) ) ?>">Contato</a></li>
            <li><a href="<?= get_permalink( get_page_by_path( 'minha-conta' ) ) ?>">Minha Conta</a></li>
        </ul>
    </div>
</nav>


