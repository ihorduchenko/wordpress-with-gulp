    </main>
    <footer class="footer-section text-center">
      <div class="container">
        <h2 class="section-title mb-5"><?php the_field( 'footer_title', 'option' ); ?></h2>
        <?php if ( ! is_page( 'contact' ) ) { ?>
          <a href="<?php the_field( 'button_url', 'option' ); ?>"
           class="site-btn"><?php the_field( 'button_caption', 'option' ); ?></a>
         <?php } ?>
         <div class="social-links">
          <?php if ( have_rows( 'social_links', 'option' ) ):
            while ( have_rows( 'social_links', 'option' ) ) : the_row(); ?>
              <a href="<?php the_sub_field( 'url' ); ?>" target="_blank"
               title="<?php the_sub_field( 'name' ); ?>" data-color="<?php the_sub_field( 'color' ); ?>"><span class="<?php the_sub_field( 'icon' ); ?>"></span></a>
             <?php endwhile;
           endif; ?>
         </div>
         <div class="copyright">
          &copy; <?php the_field( 'year_est', 'option' ); ?> - <?php echo date( 'Y' ); ?>
          | <?php the_field( 'copyright', 'option' ); ?>
          <br>
          <a href="<?php the_field('privacy_policy_page', 'option'); ?>">Privacy Policy</a>
        </div>
      </div>
    </footer>

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700|Montserrat&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/index.min.css">
    <?php if ( is_page( 'about' ) ) { ?>
      <script>const instaCount = <?php the_field('instagram_posts_to_show'); ?>;</script>
    <?php }  ?>
    <?php wp_footer(); ?>
  </body>
  </html>
