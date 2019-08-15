<?php

if ( ! function_exists( 'Alita_jumbotron_element' ) ) :

	function Alita_jumbotron_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'sub_title'			=> '',
			'image'				=> '',
		), $atts));

		$args = array(
			'title'			=> $title,
			'sub_title'		=> $sub_title,
			'image'			=> $image,
		);

		$html = '';
		if( function_exists( 'Alita_jumbotron' ) ) {
			ob_start();
			Alita_jumbotron( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

	add_shortcode( 'Alita_jumbotron' , 'Alita_jumbotron_element' );

endif;