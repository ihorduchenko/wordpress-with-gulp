<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage webshowcase
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="page-404">
	<div class="container text-center">
		<h1 class="mb-4"><?php the_field('title_404', 'option'); ?></h1>
		<p class="mb-4"><?php the_field('subtitle_404', 'option'); ?></p>
		<a class="site-btn sb-dark" href="<?php echo get_home_url(); ?>">
      <?php the_field('btn_text_404', 'option'); ?></a>
	</div>
</section>

<?php get_footer(); ?>
