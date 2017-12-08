<?php
if ( ! function_exists( 'business_identity_setup' ) ) :
/**
 * Business Identity setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating featured thumbnail support.
 *
 * @see     function add_action
 * @see     function add_editor_style
 * @see     function add_image_size
 * @see     function add_theme_support
 * @see     function apply_filters
 * @see     function business_identity_lato_font_url
 * @see     function get_template_directory
 * @see     function load_theme_textdomain
 * @see     function register_nav_menus
 * @see     function set_post_thumbnail_size
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function business_identity_setup() {

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Make Business Identity available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Business Identity, use a find and
	 * replace to change 'business-identity' to the name of your theme in all
	 * template files.
	 *
	 * @link  http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'business-identity', get_template_directory() . '/languages' );

	/**
	 * Add typography styles into the back-end visual editor
	 *
	 * @link  http://make.wordpress.org/support/user-manual/content/editors/visual-editor/
	 */
	add_editor_style( array( 'editor-style.css', business_identity_lato_font_url() ) );

	/**
	 * Add RSS feed links to <head> for posts and comments.
	 *
	 * @link  http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on all available posts, pages, and custom post types.
	 *
	 * Note: For hard crop mode, top/left/right/bottom/center anchors can be used for the $crop value.
	 *
	 * Image Sizes Legend:
	 *
	 * -                             post-thumbnails: 740 (w) x 216 (h) - 3.43:1 aspect ratio
	 * -           business-identity-index-thumbnail: 770 (w) x 225 (h) - 3.42:1 aspect ratio
	 * -      business-identity-index-thumbnail-full: 1170 (w) x 342 (h) - 3.42:1 aspect ratio
	 * -          business-identity-image-attachment: 1170 (w) x 1170 (h) - 1:1 aspect ratio
	 * -        business-identity-testimonial-avatar: 45 (w) x 45 (h) - 1:1 aspect ratio
	 * - business-identity-testimonial-avatar-single: 90 (w) x 90 (h) - 1:1 aspect ratio
	 * -                 business-identity-page-hero: unlimited width (w) x 480 (h) - variable aspect ratio
	 * -               business-identity-mosaic-tile: unlimited width (w) x 480 (h) - variable aspect ratio
	 *
	 * @link https://core.trac.wordpress.org/changeset/27472
	 * @link  http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// this is double the max display value in desktop mode to ensure crisp looking thumbs
	set_post_thumbnail_size( 740, 216, true ); // This uses the reserved handle 'post-thumbnail', with hard crop mode
	// featured images on index
	add_image_size( 'business-identity-index-thumbnail', 770, 225, true );
	// featured images on index when no sidebar is present
	add_image_size( 'business-identity-index-thumbnail-full', 1170, 342, true );
	// image attachments
	add_image_size( 'business-identity-image-attachment', 1170, 1170 );
	// testimonial avatars
	add_image_size( 'business-identity-testimonial-avatar', 45, 45, true );
	add_image_size( 'business-identity-testimonial-avatar-single', 90, 90, true );
	// Page Hero
	add_image_size( 'business-identity-page-hero', 9999, 1024 );
	// Featured Content Mosaic Tiles
	add_image_size( 'business-identity-mosaic-tile', 9999, 480 );

	/**
	 * Register custom navigation menus for Business Identity.
	 *
	 * @link  http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus(
		array(
			'primary'	=> __( 'Primary Menu', 'business-identity' ), // Contained in Header
			'secondary'	=> __( 'Secondary Menu', 'business-identity' ), // Contained in Footer
		)
	);

	/**
	 * Enable support for HTML5 markup.
	 *
	 * @link  http://codex.wordpress.org/Semantic_Markup
	 */
	add_theme_support(
		'html5',
		array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
		)
	);
} // end function business_identity_setup
endif;
add_action( 'after_setup_theme', 'business_identity_setup' );