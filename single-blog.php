<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) :
	the_post(); ?>
	<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

  <section class="intro-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <h1 class="section-title"><?php the_title(); ?></h1>
          <div class="text"><?php the_date('M j, Y'); ?> &#8226; <span class="read-time"><?php echo do_shortcode('[rt_reading_time]'); ?> min to read</span></div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-xl-7 offset-xl-2">
          <div class="blog-item">
            <figure class="thumb mb-5">
              <img src="<?php echo $img[0]; ?>" alt="<?php the_title(); ?>">
            </figure>
            <article class="blog-content text">
              <?php the_content(); ?>
            </article>
            <h3 class="mt-5">Share this post</h3>
            <div class="social-links mt-3">
                  <a data-color="#4267b2" href="https://www.facebook.com/sharer/sharer.php?u=&quote=" title="Share on Facebook" target="_blank"
                     onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;">
                    <span class="icon icon-facebook-square"></span>
                  </a>
                  <a data-color="#1dcaff" href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"
                     onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;">
                    <span class="icon icon-twitter"></span>
                  </a>
                  <a data-color="#0077b5" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn"
                     onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;">
                    <span class="icon icon-linkedin-square"></span>
                  </a>
                  <a data-color="#410093" href="mailto:?subject=&body=:%20" target="_blank" title="Send email"
                     onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;">
                    <span class="icon icon-paper-airplane"></span>
                  </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>