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
 * Description: Shim for `the_archive_title` and `the_archive_description`.
 *
 * @todo    Remove these functions when WordPress 4.3 has been released.
 * @link    https://core.trac.wordpress.org/changeset/30223
 * @link    https://github.com/Automattic/_s/commit/bb867c0fcb2cfbae298d44a87c0638c75b8739f8
 * @package Business_Identity
 * @since   Business Identity 2.0
 */

if ( ! function_exists( 'the_archive_title' ) ) :
	/**
	 * Display the archive title based on the queried object.
	 *
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after  Optional. Content to append to the title. Default empty.
	 */
	function the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'business-identity' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'business-identity' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'business-identity' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'business-identity' ), get_the_date( _x( 'Y', 'yearly archives date format', 'business-identity' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'business-identity' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'business-identity' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'business-identity' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'business-identity' ) ) );
		} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'business-identity' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'business-identity' );
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'business-identity' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'business-identity' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'business-identity' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );

		if ( ! empty( $title ) ) {
			echo $before . $title . $after;
		}
	} // end function the_archive_title
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
	/**
	 * Display category, tag, or term description.
	 *
	 * @param string $before Optional. Content to prepend to the description. Default empty.
	 * @param string $after  Optional. Content to append to the description. Default empty.
	 */
	function the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );

		if ( ! empty( $description ) ) {
			echo $before . $description . $after;
		}
	} // end function the_archive_description
endif;