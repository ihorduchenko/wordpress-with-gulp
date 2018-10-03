<?php
/* Template Name: About page */
get_header();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

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
      <div class="col-lg-5 order-lg-2 offset-lg-1 mb-5 text-lg-right">
        <figure class="pic-frame">
          <img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
        </figure>
      </div>
      <div class="col-lg-6 mb-5">
        <div class="text">
					<?php the_content(); ?>
        </div>
        <div class="row mt-3 mb-3">
					<?php if ( have_rows( 'milestones' ) ):
						while ( have_rows( 'milestones' ) ) : the_row(); ?>
              <div class="col-sm-4">
                <div class="milestone mb-3">
                  <h2><?php the_sub_field( 'digit' ); ?><span><?php the_sub_field( 'caption' ); ?></span></h2>
                </div>
              </div>
						<?php endwhile;
					endif; ?>
        </div>
				<?php $btn = get_field( 'button' ); ?>
        <a class="site-btn sb-dark" href="<?php echo $btn['button_url']; ?>"
           target="_blank"><?php echo $btn['button_text']; ?></a>
      </div>
    </div>
  </div>
</section>

<section class="page-section">
  <div class="container">
    <div class="text-center mt-4 mb-5">
      <h2 class="section-title"><?php the_field('skills_title'); ?></h2>
    </div>
    <div class="row">

	    <?php $skills = get_field('skills');  ?>
	    <?php foreach( $skills as $sk ): ?>
        <div class="col-md-6 col-lg-4">
          <div class="icon-box mb-5">
            <div class="icon">
              <img src="<?php the_field( 'icon', $sk ); ?>" alt="<?php echo $sk->name; ?>">
            </div>
            <div class="icon-box-content">
              <h3><?php echo $sk->name; ?></h3>
              <span class="text"><?php the_field( 'subtitle', $sk ); ?></span>
<!--              <p>--><?php //echo $sk->description; ?><!--</p>-->
            </div>
          </div>
        </div>
	    <?php endforeach; ?>

    </div>
  </div>
</section>

<section class="page-section pt-5">
  <div class="container-fluid px-0">
    <h2 class="section-title text-center mt-5 mb-5"><?php the_field('instagram_title'); ?></h2>
    <div id="instafeed" class="row no-gutters"></div>
    <div class="text-center">
      <button id="instafeed-more" class="site-btn sb-dark mt-3 mx-auto">load more</button>
    </div>
  </div>
</section>

<?php get_footer(); ?>
