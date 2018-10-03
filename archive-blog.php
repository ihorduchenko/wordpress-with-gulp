<?php get_header(); ?>

<section class="intro-section">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 offset-xl-1">
        <h2 class="section-title"><?php the_field( 'blog_archive_title', 'option' ); ?></h2>
        <div class="text"><?php the_field( 'blog_archive_disclaimer', 'option' ); ?></div>
      </div>
    </div>
  </div>
</section>

<div class="page-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
	      <?php if ( have_posts() ):
		      while ( have_posts() ) : the_post(); ?>
			      <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <article class="blog-item mb-5">
              <figure class="thumb mb-3">
                <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">
              </figure>
              <div class="blog-content">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="blog-meta"><span class="date"><?php the_date('M j, Y'); ?></span> &#8226; <span class="read-time"><?php echo do_shortcode('[rt_reading_time]'); ?> min to read</span></div>
                <div class="text"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>" class="read-more">Read More...</a>
              </div>
            </article>
            <hr class="mb-5 mod-gray">
		      <?php endwhile;
	      else :
		      echo "No Content Found";
	      endif; ?>

        <div class="pagination">
		      <?php
		      $big = 999999999;
		      echo paginate_links( array(
			      'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			      'format'    => '?paged=%#%',
			      'current'   => max( 1, get_query_var( 'paged' ) ),
			      'mid_size'  => 5,
			      'prev_text' => __( '<' ),
			      'next_text' => __( '>' ),
			      'type'      => 'plain'
		      ) ); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
