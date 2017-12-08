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
 * Description: Website Footer
 *
 * @see     function dynamic_sidebar
 * @see     function is_active_sidebar
 * @package Business_Identity
 * @since   Business Identity 1.0
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="tertiary" class="widget-area" role="complementary">
	<div class="grid">
		<div class="row">
			<div class="twelve column">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
			</div><!-- .twelve -->
		</div><!-- .row -->
	</div><!-- .grid -->
</div><!-- #tertiary -->