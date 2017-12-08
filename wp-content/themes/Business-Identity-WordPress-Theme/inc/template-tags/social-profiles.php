<?php
/**
 * Social profile links.
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
if ( ! function_exists( 'business_identity_social_profile' ) ) :
	function business_identity_social_profile( $team_member_id = null ) {
		// bail if team member id isn't provided
		if ( empty( $team_member_id ) ) {
			return;
		}

		// grab and sanitize user email
		$user_email = sanitize_email( get_the_author_meta( 'user_email', $team_member_id ) );
		// if the user email isn't valid, then let's bail
		if ( ! is_email( $user_email ) ) {
			return;
		}

		// make MD5 hash for email address, see https://en.gravatar.com/site/implement/hash/
		$hashed_email = md5( strtolower( trim( $user_email ) ) );
		// transient handling, cache key must be 45 characters or fewer in length
		$cache_key = 'bisp-' . $hashed_email;
		// set cache timer to 15 minutes
		$cache_timer = 900;
		// grab profile from transient
		$profile = get_transient( $cache_key );

		// do some heavy lifting if no transient has been set for the user profile
		if ( false === $profile ) {
			// get protocol-relative profile URL
			$profile_url = esc_url_raw( sprintf( '%s.gravatar.com/%s.json', ( is_ssl() ? 'https://secure' : 'http://www' ), $hashed_email ), array( 'http', 'https' ) );
			// get json response for user gravatar profile
			$response = wp_remote_get( $profile_url, array( 'timeout' => 3, ) );
			$response_code = wp_remote_retrieve_response_code( $response );
			// if no content can be fetched, then bail
			if ( 200 !== $response_code ) {
				$profile = array();
			} else {
				// grab user profile
				$profile = wp_remote_retrieve_body( $response );
				$profile = json_decode( $profile, true );
				if ( is_array( $profile ) && ! empty( $profile['entry'] ) && is_array( $profile['entry'] ) ) {
					$profile = $profile['entry'][0];
				} else {
					$cache_timer = 300; // cache for 5 minutes
					$profile     = array();
				}
			}
			set_transient( $cache_key, $profile, $cache_timer );
		}

		// grab user social accounts if they exist or else bail out
		if ( ! empty( $profile['accounts'] ) ) {
			$accounts = $profile['accounts'];
		} else {
			return;
		} ?>

		<ul class="social"><?php
			// only allow a service if it has a genericon associated with it
			$approved_services = array(
				'facebook',  // Facebook
				'twitter',   // Twitter
				'linkedin',  // LinkedIn
				'google',    // Google+
				'wordpress', // WordPress
				'flickr',    // Flickr
				'vimeo',     // Vimeo
				'youtube',
			);

			// loop through all verified social accounts and output their icons
			foreach ( $accounts as $account ) :
				if ( true != $account['verified'] || ! in_array( $account['shortname'], $approved_services ) ) {
					continue;
				}
				$sanitized_service_name = business_identity_social_profile_service_name( $account['shortname'] ); ?>

				<li>
					<a class="<?php echo esc_attr( $account['shortname'] ); ?>" href="<?php echo esc_url( $account['url'] ); ?>" title="<?php echo esc_attr( sprintf( _x( '%1$s on %2$s', '1: User Name, 2: Service Name (Facebook, Twitter, ...)', 'business-identity' ), esc_html( $account['display'] ), esc_html( $sanitized_service_name ) ) ); ?>">
						<span><?php echo esc_html( $sanitized_service_name ); ?></span>
					</a>
				</li><?php

			endforeach; ?>
		</ul><!-- .social --><?php
	} // end function business_identity_social_profile
endif;

/**
 * Some services like WordPress have stylized names. Handle them in the same way that they are handled by Jetpack.
 */
if ( ! function_exists( 'business_identity_social_profile_service_name' ) ) :
	function business_identity_social_profile_service_name( $shortname = null ) {
		// bail if shortname is null
		if ( empty( $shortname ) ) {
			return;
		}
		/**
		 * Current services approved by Gravatar:
		 *
		 * - Blogger (Genericons doesn't support this, ignore)
		 * - Facebook
		 * - Google+
		 * - LinkedIn
		 * - Twitter
		 * - Vimeo
		 * - WordPress
		 * - Yahoo! (Genericons doesn't support this, ignore)
		 * - YouTube
		 * - Flickr
		 * - Foursquare (Genericons doesn't support this, ignore)
		 * - Goodreads (Genericons doesn't support this, ignore)
		 * - TripIt (Genericons doesn't support this, ignore)
		 * - Tumblr
		 *
		 * @link http://gravatar.com/
		 * @link http://genericons.com/
		 */
		switch ( $shortname ) {
			case 'linkedin':
				return 'LinkedIn';
			case 'youtube':
				return 'YouTube';
			case 'wordpress':
				return 'WordPress';
			case 'google':
				return 'Google+';
			default:
				$shortname = ucwords( $shortname );
		}
		return $shortname;
	} // end function business_identity_social_profile_service_name
endif;