<?php
/* Template Name: Home page */
get_header(); ?>

<section class="intro-section">
  <div class="container text-center">
    <div class="row">
      <div class="col-xl-10 offset-xl-1">
        <h1 class="section-title"><?php the_field( 'site_slogan', 'option' ); ?></h1>
      </div>
    </div>
  </div>
</section>

<section class="portfolio-section">
  <div class="container">
		<?php get_template_part( 'inc/portfolio-filter' ); ?>
  </div>
  <div class="container-fluid">
    <div class="row portfolios-area">
			<?php get_template_part( 'inc/portfolio-tiles' ); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
