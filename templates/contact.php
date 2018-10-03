<?php
/* Template Name: Contact page */
get_header();  ?>

<section class="intro-section">
	<div class="container text-center">
		<div class="row">
			<div class="col-xl-10 offset-xl-1">
				<h1 class="section-title"><?php the_field( 'site_slogan', 'option' ); ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 contact-text">
				<h2><?php the_field('contact_title'); ?></h2>
				<div class="text"><?php the_field('page_content'); ?></div>
        <div class="contact-socials">
	        <?php if ( have_rows( 'social_links', 'option' ) ):
		        while ( have_rows( 'social_links', 'option' ) ) : the_row(); ?>
              <a href="<?php the_sub_field( 'url' ); ?>" target="_blank"
                 title="<?php the_sub_field( 'name' ); ?>" data-color="<?php the_sub_field( 'color' ); ?>"><span class="<?php the_sub_field( 'icon' ); ?>"></span></a>
		        <?php endwhile;
	        endif; ?>
        </div>
			</div>
		</div>
		<div class="contact-form">
			<?php $cf = get_field('contact_form_7_shortcode', 'option');
      echo do_shortcode($cf); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>