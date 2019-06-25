<?php
namespace Mo\Core;

/**
 * Include files by globbing pattern
 *
 * @param array $paths Array of subfolders of /lib/ to require.
 */
function glob_require( $paths ) {
	if ( defined( 'Mo\Core\PLUGIN_PATH' ) && is_array( $paths ) ) {
		foreach ( $paths as $path ) {
			$files = glob( \Mo\Core\PLUGIN_PATH . '/lib/' . $path . '/*.php' );
			if ( ! empty( $files ) ) {
				foreach ( $files as $file ) {
					$file = \Mo\Core\PLUGIN_PATH . '/lib/' . $path . '/' . basename( $file );
					require_once( $file );
				}
			}
		}
	}
}

