<!DOCTYPE html>
<html lang="pr-br">
<head> <meta charset="UTF-8">
    <title>
		<?php
		if ( is_home() ) {
			bloginfo('name');
		} else {
			wp_title( '|', true, 'right' );
			bloginfo( 'name' );
		}
		?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/img/icon-logo.ico">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/materialize.css" media="screen,projection">

    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/material-icons.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/slick.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/slick-theme.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/select2.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/classicarros.css">


	<?php if ( is_singular( 'blog' ) ) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php the_title() ?>"/>
        <meta property="og:description" content="<?php the_content() ?>"/>
        <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>"/>
	<?php } else { ?>
        <meta property="og:url" content="<?= home_url(); ?>"/>
        <meta property="og:title" content="<?php bloginfo( 'name' ); ?>"/>
        <meta property="og:description" content="<?php bloginfo( 'description' ); ?>"/>
        <meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/img/fb-share.jpg"/>
	<?php } ?>
    <meta property="og:type" content="website"/>
    <meta property="og:image:width" content="200"/>
    <meta property="og:image:height" content="200"/>

    <meta content="<?php bloginfo( 'description' ); ?>" name="description">
    <meta name="keywords" content="carros, vendas, anuncios, veículos, carros usados, carros novos, classificados, jataí, goias">
    <meta name="author" content="<?php bloginfo( 'name' ); ?>">

    <?php wp_head(); ?>

</head>
<body>

                         <!--estrutura do menu-->
<div class="header">
    <div class="container-fluid">
        <div class="row">

            <div class="col s12 m4 l4 logo-classicarros" id="logo-classicarros">
                <a href="<?= home_url(); ?>">
                    <img class="logo-header responsive-img" src="<?php bloginfo('template_directory') ?>/img/logo.png">
                </a>
            </div>

            <div class="col s12 m8 l8 " >
		        <?php get_template_part ('menu'); ?>
            </div>
            <div class="cloned-logo-classicarros"></div>
        </div>
    </div>
</div>

                  <!--exibi as mensagens quando usuário cria conta, redefini a senha-->
<?php
if ( class_exists( 'WP_Flash_Messages' ) )
	WP_Flash_Messages::show();
?>
