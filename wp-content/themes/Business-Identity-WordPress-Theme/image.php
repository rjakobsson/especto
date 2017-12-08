<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * Description: The template for displaying image attachments
 *
 * $content_width is defined in inc/content-width.php
 * the_content() is defined in a template part.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

get_header();

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<section id="breadcrumbs">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<span class="image-date breadcrumb">
						<?php _e( 'Upload Date: ', 'business-identity' ); ?>
						<time class="image-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
							<strong><?php echo esc_html( get_the_date() ); ?></strong>
						</time>
					</span><!-- .image-date -->
					<span class="full-size-image-link breadcrumb">
						<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>">
							<?php _e( 'Full Size Image Dimensions: ', 'business-identity' ); ?>
							<span class="dimensions">
								<strong><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></strong>
							</span><!-- .dimensions -->
						</a>
					</span><!-- .full-size-image-link -->
					<span class="image-parent-post-link breadcrumb">
						<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery">
							<?php _e( 'Image Parent Post: ', 'business-identity' ); ?>
							<strong><?php echo get_the_title( $post->post_parent ); ?></strong>
						</a>
					</span><!-- .image-parent-post-link -->
				</div><!-- .twelve -->
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #breadcrumbs -->

	<section id="page-header">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<h1>
						<?php
							/**
							 * There will always be an image title present,
							 * so there's no need for conditional markup here.
							 */
							the_title();
						?>
					</h1>
				</div><!-- .twelve -->
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #page-header -->

	<div id="content" class="site-content">
		<div class="grid">
			<div class="row">
				<div class="eight column content-area">
					<div id="primary">
						<main id="main" class="site-main" role="main">
							<?php get_template_part( 'template-parts/content', 'image-attachment' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- .eight -->

				<?php get_template_part( 'sidebars/sidebar', 'primary' ); ?>
			</div><!-- .row -->
		</div><!-- .grid -->
	</div><!-- #content -->

<?php endwhile; ?>

<?php get_footer(); ?>