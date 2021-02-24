<?php

	if ( $video_id = get_sub_field( 'video_id' ) ) :

?>

<section class="layered-video">

	<div class="layered-video__wrap">

		<div class="layered-video__inner">

			<iframe width="960" height="540" src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" frameborder="0" allowfullscreen></iframe>

		</div><!-- .layered-video__inner -->

		<?php if ( get_sub_field( 'video_text' ) ) : ?>

		<!-- text -->
		<div class="layered-video__text">

			<?php echo get_sub_field( 'video_text' ); ?>

		</div>
		<!-- END text -->

		<?php endif; ?>

	</div><!-- .layered-video__wrap -->

</section><!-- .layered-video -->

<?php endif; ?>
