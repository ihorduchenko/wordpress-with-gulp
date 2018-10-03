<?php
$custom_query_args = array(
	'post_type' => 'portfolio-item',
	'order'     => 'DESC',
	'orderby'   => 'date'
);
$custom_query      = new WP_Query( $custom_query_args );
if ( $custom_query->have_posts() ) :
	while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$slug        = get_post_field( 'post_name', get_post() );
		$terms       = get_the_terms( $post->ID, 'skills' ); ?>

    <div class="mix col-lg-6 col-xl-4 portfolio-col <?php foreach ( $terms as $term ) {
			echo $term->slug . ' ';
		} ?>">
      <!--   Hidden content   -->
      <div class="d-none">
        <div class="portfolio-col--caption">
          <div class="portfolio-item--caption">
            <h3 class="mb-2"><?php the_title(); ?></h3>
            <div class="portfolio-item--date">Released: <?php echo get_the_date( 'F Y' ); ?></div>
            <div class="text mb-2"><?php the_content(); ?></div>
            <a class="d-inline-flex align-items-center" href="<?php echo get_field( 'link' ); ?>" target="_blank">
              view site
              <span class="ml-1">&#8663;</span>
            </a>
          </div>
        </div>

	      <?php $images = get_field( 'gallery' ); ?>
	      <?php if ( $images ): ?>
          <div class="portfolio-item--gallery d-none">
			      <?php foreach ( $images as $image ): ?>
				      <?php $src = wp_get_attachment_url( $image['ID'], 'full' ); ?>
              <a data-fancybox-group data-fancybox="project-<?php echo $slug; ?>" href="<?php echo $src; ?>"></a>
			      <?php endforeach; ?>
          </div>
	      <?php endif; ?>
      </div>
      <!--  END  Hidden content   -->

      <a class="portfolio-item set-bg" data-setbg="<?php echo $thumb[0]; ?>" data-fancybox-group
         data-fancybox="project-<?php echo $slug; ?>" href="<?php echo $thumb[0]; ?>">
        <div class="pi-inner">
          <h3><?php the_title(); ?></h3>
          <span>+ See Project</span>
        </div>
      </a>

			<?php if ( is_page( 'cases' ) ) { ?>
        <div class="portfolio-meta">
          <h2><?php the_title(); ?></h2>
          <p><?php foreach ( $terms as $term ) { ?>
							<span>#<?php echo $term->name; ?></span>
						<?php } ?></p>
        </div>
			<?php } ?>
    </div>

	<?php endwhile;
	wp_reset_postdata();
endif; ?>