<?php
/**
 * Core Functionality Twig Social Links
 *
 * Adds social links from Yoast SEO plugin to timber context
 *
 * @package     Core_Functionality
 * @author      MONTAGMORGENS GmbH
 * @copyright   2019 MONTAGMORGENS GmbH
 */

namespace Mo\Core\Twig;

/**
 * Setup global Timber context.
 *
 * @var array $data The timber context variables.
 */
function social_links( $data ) {
	$seo_data = get_option( 'wpseo_social' );

	if ( ! is_array( $seo_data ) ) {
		return;
	}

	$social_links = [];

	foreach ( $seo_data as $profile => $value ) {

		if ( ! empty( $value ) ) {
			switch ( $profile ) {
				case 'facebook_site':
				case 'instagram_url':
				case 'linkedin_url':
				case 'myspace_url':
				case 'pinterest_url':
				case 'youtube_url':
				case 'wikipedia_url':
					$social_links[ explode( '_', $profile )[0] ] = $value;
					break;
				case 'twitter_site':
					$social_links[ explode( '_', $profile )[0] ] = 'https://twitter.com/' . $value . '/';
					break;
			}
		}
	}

	$data['social_links'] = $social_links;
	return $data;
}
add_filter( 'timber_context', 'Mo\Core\Twig\social_links' );
