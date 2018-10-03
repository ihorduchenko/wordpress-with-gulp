<?php
/* Template Name: Cases page */
get_header();  ?>

<section class="portfolio-section pt-100 mod-archive">
	<div class="container-fluid">
		<div class="row portfolios-area">
			<div class="col-lg-6 col-xl-8">
				<div class="portfolio-intro">
					<h1 class="section-title mb-5"><?php the_field( 'site_slogan', 'option' ); ?></h1>
					<?php get_template_part( 'inc/portfolio-filter' ); ?>
				</div>
			</div>
			<?php get_template_part( 'inc/portfolio-tiles' ); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
