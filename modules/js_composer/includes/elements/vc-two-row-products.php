<?php
if ( ! function_exists( 'Alita_vc_two_row_products_block' ) ) :

function Alita_vc_two_row_products_block( $atts, $content = null ) {

    extract( shortcode_atts( array(
        'title'                 => '',
        'action_text'           => '',
        'action_link'           => '',
        'columns_wide'          => '',
        'shortcode_tag'         => 'recent_products',
        'orderby'               => 'date',
        'order'                 => 'desc',
        'per_page'              => 12,
        'columns'               => 6,
        'products_choice'       => 'ids',
        'product_id'            => '',
        'category'              => '',
        'cat_operator'          => 'IN',
        'attribute'             => '',
        'terms'                 => '',
        'terms_operator'        => 'IN',
        'el_class'              => '',
    ), $atts ) );

    $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id, 'attribute' => $attribute, 'terms' => $terms, 'terms_operator' => $terms_operator ) ) : array();
    $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page, 'columns' => $columns ) );

    $args = apply_filters( 'Alita_products_category_with_image_args', array(
        'shortcode_tag'     => $shortcode_tag,
        'shortcode_atts'    => $shortcode_atts,
        'section_title'     => $title,
        'button_text'       => $action_text,
        'button_link'       => $action_link,
        'columns_wide'      => $columns_wide,
        'el_class'          => $el_class,
    ) );

    $html = '';
    if( function_exists( 'Alita_two_row_products' ) ) {
        ob_start();
        Alita_two_row_products( $args );
        $html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'Alita_vc_two_row_products' , 'Alita_vc_two_row_products_block' );

endif;
