<?php

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'software-sub' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<h1><?php the_title(); ?></h1>
		</div>

		<hr class="hr--no-pointer">

		<div class="row">
			<div class="media">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="imgExt">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>

				<div class="bd">
					<?php if ( ! empty( post_meta( 'usps' ) ) ) : ?>
						<?php get_template_part( 'html_includes/partials/list-usp', array(
							'usps'  => wp_list_pluck( (array) post_meta( 'usps' ), 'usp' ),
							'class' => 'color-academy',
						) ); ?>
					<?php endif; ?>

					<?php if ( post_meta( 'download_id' ) ) : ?>
						<?php
						echo edd_get_purchase_link( array(
							'download_id' => post_meta( 'download_id' ),
							'text'        => __( 'Order this Course now', 'yoastcom' ) . ' &raquo;',
						) );
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<hr class="hr--no-pointer">

		<div class="row iceberg">

			<section class="content">
				<?php if ( post_meta( 'promo_video_embed' ) ) : ?>
					<div class="iceberg">
						<div class="videowrapper">
							<?php echo wp_oembed_get( post_meta( 'promo_video_embed' ) ); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php the_content(); ?>
			</section>

			<?php get_template_part( 'html_includes/partials/social-share' ); ?>
		</div>

		<hr>

		<div class="row">
			<h2><?php _e( 'You might also like', 'yoastcom' ); ?></h2>

			<?php get_template_part( 'html_includes/partials/recent-articles' ); ?>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
