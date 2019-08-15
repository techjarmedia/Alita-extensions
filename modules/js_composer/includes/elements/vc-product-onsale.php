<?php
if ( ! function_exists( 'Alita_vc_product_onsale_block' ) ) :

function Alita_vc_product_onsale_block( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title'				=> '',
		'show_savings'		=> false,
		'savings_in'		=> 'amount',
		'savings_text'		=> '',
		'product_choice'	=> 'recent',
		'product_id'		=> '',
	), $atts ) );

	$args = array(
		'section_title'		=> $title,
		'show_savings'		=> $show_savings,
		'savings_in'		=> $savings_in,
		'savings_text'		=> $savings_text,
		'product_choice'	=> $product_choice,
		'product_id'		=> $product_id,
	);

	$html = '';
	if( function_exists( 'Alita_onsale_product' ) ) {
		ob_start();
		Alita_onsale_product( $args );
		$html = ob_get_clean();
	}

	return $html;
}

add_shortcode( 'Alita_vc_product_onsale' , 'Alita_vc_product_onsale_block' );

endif;