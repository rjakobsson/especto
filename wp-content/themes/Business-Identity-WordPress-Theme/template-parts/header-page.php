<?php
/**
 * Note: If you're viewing this file from the WordPress theme editor
 * and would like to make changes, do not make direct edits to
 * this file; create a child theme instead. This will ensure that updates
 * to Business Identity will not erase your edits upon upgrade.
 *
 * The header portion of pages, including hero images and page titles.
 *
 * For more information on creating child themes, consult the
 * following page: https://codex.wordpress.org/Child_Themes
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

global $post;
$page_id = $post->ID; ?>

<?php
if ( isset( $page_id ) && has_post_thumbnail( $page_id, 'business-identity-page-hero' ) ) :
	$page_hero = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'business-identity-page-hero' );
?>
	<section id="page-hero"><img src="<?php echo esc_url( $page_hero[0] ); ?>" /></section>
<?php endif; ?><!-- #page-hero -->

<?php business_identity_breadcrumbs(); ?>

<?php if ( isset( $page_id ) && '' != get_the_title( $page_id ) ) : ?>
	<section id="page-header">
		<div class="grid">
			<div class="row">
				<div class="twelve column">
					<h1>
						<?php echo get_the_title( $page_id ); ?>
					</h1>
				</div><!-- .twelve -->
			</div><!-- .row -->
		</div><!-- .grid -->
	</section><!-- #page-header -->
<?php endif; ?><!-- #page-header -->