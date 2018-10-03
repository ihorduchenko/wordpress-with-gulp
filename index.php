<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package webshowcase
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<h1 class="section-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="text">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?>