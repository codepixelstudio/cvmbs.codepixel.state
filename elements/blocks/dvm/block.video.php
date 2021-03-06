
<?php
if ( $video_id = get_sub_field( 'youtube_video_id' ) ) :
?>

<div class="template-block video">
	<div class="template-block__wrap">
		<div class="layered-video__wrap">
			<div class="layered-video__inner">
				<iframe width="960" height="540" src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" frameborder="0" allowfullscreen></iframe>
			</div><!-- .layered-video__inner -->
		</div><!-- .layered-video__wrap -->
	</div><!-- .template-block__wrap -->
</div><!-- .template-block -->

<?php
endif;
