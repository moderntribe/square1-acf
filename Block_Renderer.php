<?php

namespace Tribe\Libs\ACF;

class Block_Renderer {
	public const THEME_PATH_TEMPLATE = 'blocks/%1$s/%1$s.php'; //blocks/hero/hero.php

	public static function render_template( $block, $content, $is_preview, $post_id ) {
		$name      = str_replace( 'acf/', '', $block[ 'name' ] );
		$file_path = sprintf( self::THEME_PATH_TEMPLATE, $name );

		$path = locate_template( $file_path );

		if ( ! file_exists( $path ) ) {
			if ( ! WP_DEBUG ) {
				return;
			}
			echo '<pre>';
			print_r( $block );
			print_r( $content );
			print_r( $is_preview );
			print_r( $post_id );
			echo '</pre>';

			return;
		}

		include( $path );
	}

}
