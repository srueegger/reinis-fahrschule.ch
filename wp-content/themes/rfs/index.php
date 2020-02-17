<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="siteMain">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10">
				<?php the_title('<h1 class="text-center text-uppercase">', '</h1>'); ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</main>
<?php
endwhile; endif;
get_footer();