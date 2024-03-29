<?php

if( ! function_exists( 'Alita_compare_page_shortcode' ) ) {
	
	function Alita_compare_page_shortcode() {
		ob_start();
		if( class_exists( 'YITH_Woocompare_Frontend' ) ) {
			global $yith_woocompare;
			
			if( function_exists( 'Alita_get_template' ) ) {
				Alita_get_template( 'shop/compare.php', array( 
					'products' 			  => $yith_woocompare->obj->get_products_list(), 
					'fields' 			  => $yith_woocompare->obj->fields(),
					'repeat_price' 		  => get_option( 'yith_woocompare_price_end' ),
					'repeat_add_to_cart'  => get_option( 'yith_woocompare_add_to_cart_end' )
				) );
			}
		} else {
			echo '<p class="alert alert-danger">' . esc_html__( 'You need to enable YITH Compare plugin for product comparison to work', 'Alita-extensions' ) . '</p>';
		}
		
		return ob_get_clean();
	}
}

add_shortcode( 'Alita_compare_page', 'Alita_compare_page_shortcode' );

if ( ! function_exists( 'Alita_store_directory' ) ) {
	function Alita_store_directory() {
		ob_start();
		?>
		<div class="Alita-store-directory clearfix">
			<hr class="no-margin">
			<?php the_widget( 'WC_Widget_Product_Categories', array( 'hide_empty' => false ) ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

add_shortcode( 'Alita_store_directory', 'Alita_store_directory' );

if ( ! function_exists( 'Alita_vc_terms' ) ) :

	function Alita_vc_terms( $atts, $content = null ){

		$atts = shortcode_atts( array(
			'taxonomy'       => 'category',
			'orderby'        => 'name',
			'order'          => 'ASC',
			'hide_empty'     => 0,
			'include'        => '',
			'exclude'        => '',
			'number'         => 0,
			'offset'         => 0,
			'name'           => '',
			'slug'           => '',
			'hierarchical'   => true,
			'child_of'       => 0,
			'parent'         => '',
			'include_parent' => 1,
		), $atts, 'Alita_terms' );

		// Unset empty optional args
		$optional_args = array( 'include', 'exclude', 'name', 'slug', 'parent' );

		foreach( $optional_args as $optional_arg ) {
			if ( empty ( $atts[ $optional_arg ] ) ) {
				unset( $atts[ $optional_arg ] );
			}
		}

		// Check for comma separated and convert into arrays
		$comma_separated_args = array( 'taxonomy', 'include', 'exclude', 'name', 'slug' );

		foreach ( $comma_separated_args as $comma_separated_arg ) {
			if ( !empty( $atts[ $comma_separated_arg ] ) ) {
				$atts[$comma_separated_arg] = explode( ',', $atts[$comma_separated_arg] );
			}
		}

		//Cast int or number
		$int_args = array( 'hide_empty', 'number', 'offset', 'hierarchical', 'child_of', 'include_parent', 'parent' );

		foreach ( $int_args as $int_arg ) {
			if ( !empty( $atts[ $int_arg ] ) ) {
				$atts[ $int_arg ] = (int) $atts[ $int_arg ];
			}
		}

		$terms = get_terms( $atts );

		$html = '';

		foreach ( $terms as $term ) {
			$html .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
		}

		if ( $atts['include_parent'] && $atts['child_of'] ) {
			
			$parent_term = get_term( $atts['child_of'] );

			if ( $parent_term && ! is_wp_error( $parent_term ) ) {
				$parent_term_item = '<li class="nav-title"><a href="' . esc_url( get_term_link( $parent_term ) ) . '">' . $parent_term->name . '</a></li>';
				$html = $parent_term_item . $html;
			}
		}

		if ( ! empty( $html ) ) {
			$html = '<ul>' . $html . '</ul>';
		}

	    return $html;
	}

	add_shortcode( 'Alita_terms' , 'Alita_vc_terms' );

endif;

if ( ! function_exists( 'Alita_slider_onsale_product' ) ) {
	function Alita_slider_onsale_product( $atts, $content = null ) {

		$atts = shortcode_atts( array( 'id' => '' ), $atts, 'Alita_slider_onsale_product' );

		$args = array(
			'product_id' => $atts['id']
		);

		$html = '';
		if( function_exists( 'Alita_onsale_product_v2' ) ) {
			ob_start();
			Alita_onsale_product_v2( $args );
			$html = ob_get_clean();
		}

		return $html;
	}
}

add_shortcode( 'Alita_slider_onsale_product' , 'Alita_slider_onsale_product' );

add_action( 'wp_loaded', 'Alita_override_product_categories_shortcode' );

function Alita_override_product_categories_shortcode() {
	remove_shortcode( 'product_categories' );
	add_shortcode( 'product_categories', 'Alita_wc_product_categories' );
}

function Alita_wc_product_categories( $atts ) {
	$product_categories_html = WC_Shortcodes::product_categories( $atts );
	$product_categories_html = str_replace( '<ul class="products', '<ul class="product-loop-categories', $product_categories_html );
	return $product_categories_html;
}