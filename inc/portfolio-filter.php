<ul class="portfolio-filter controls">
  <li class="control" data-mixitup-control data-filter="all">All</li>
	<?php $skills  = get_terms( 'skills' );
	if ( ! empty( $skills ) && ! is_wp_error( $skills ) ) {
		foreach ( $skills as $skill ) { ?>
      <li class="control" data-mixitup-control data-filter=".<?php echo $skill->slug; ?>">
				<?php echo $skill->name; ?>
      </li>
		<?php }
	}; ?>
</ul>