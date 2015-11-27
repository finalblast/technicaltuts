<div class="site-banner-content banner-custom-header">

	<?php

	/**
	 * Media
	 */

	?>

	<div class="site-banner-media">
		<?php $header_image = get_header_image(); ?>
		<div class="site-banner-thumbnail" <?php if ( $header_image ) { echo 'style="background-image: url(' . esc_url( $header_image ) . ');"'; } ?>></div>
	</div>

	<?php

	/**
	 * Custom Header text
	 */

	?>
	<?php if( ! empty( get_bloginfo( 'description' ) ) ) { ?>
		<div class="site-banner-header">

			<h1 class="entry-title">
				<?php bloginfo( 'description' ); ?>
			</h1>

		</div><!-- .site-banner-header -->
	<?php } ?>
</div><!-- .site-banner-content -->