<div class="organizations program-block">

	<h3 class="organizations__title program-block__title">
		<?php the_sub_field('heading'); ?>
	</h3><!-- .organizations__title -->

	<div class="organizations__buttons">

		<?php
		if ( have_rows( 'orgs' ) ) :
			while ( have_rows( 'orgs' ) ) : the_row();
				$org = get_sub_field('org');
		?>

			<a class="organizations__button" href="<?php echo esc_url( get_permalink( $org ) ); ?>"><?php echo esc_attr( get_the_title( $org ) ); ?></a>

		<?php
			endwhile;
		endif;
		?>

	</div><!-- .organizations__buttons -->

</div><!-- .organizations -->
