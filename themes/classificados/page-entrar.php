<?php get_header(); ?>


<div class="container-fluid">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="col s12 m12 l6 doubts-title">
				<div class="row ">
					<!--Pegar o título da página-->
					<h1><?php the_title(); ?></h1>

					<!--Esse trecho de código verifica se existe post, caso tenha
					irá exibir o post e o conteudo-->
					<?php if(have_posts()){
						while (have_posts()){
							the_post();
							the_content();
						}
						wp_reset_postdata();

					}
					echo do_shortcode( '[idx_login_form]' );?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>
