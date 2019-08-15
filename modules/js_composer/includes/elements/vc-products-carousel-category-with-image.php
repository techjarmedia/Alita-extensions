<?php
if ( ! function_exists( 'Alita_vc_products_carousel_category_with_image_block' ) ) :

function Alita_vc_products_carousel_category_with_image_block( $atts, $content = null ) {

    extract( shortcode_atts( array(
        'title'                 => '',
        'shortcode_tag'         => 'recent_products',
        'limit'                 => 10,
        'description'           => false,
        'orderby'               => 'date',
        'order'                 => 'desc',
        'products_choice'       => 'ids',
        'product_id'            => '',
        'category'              => '',
        'cat_operator'          => 'IN',
        'attribute'             => '',
        'categories_title'      => '',
        'enable_categories'     => '',
        'cat_limit'             => '',
        'cat_has_no_products'   => '',
        'cat_orderby'           => '',
        'cat_order'             => '',
        'cat_include'           => '',
        'cat_slugs'             => '',
        'terms'                 => '',
        'terms_operator'        => 'IN',
        'items'                 => 4,
        'items_0'               => 2,
        'items_480'             => 2,
        'items_768'             => 2,
        'items_992'             => 3,
        'is_nav'                => false,
        'is_dots'               => false,
        'is_touchdrag'          => false,
        'margin'                => 0,
        'is_autoplay'           => false,
        'image'                 => '',
        'img_action_link'       => '#',
        'el_class'              => '',
    ), $atts ) );

    $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id, 'attribute' => $attribute, 'terms' => $terms, 'terms_operator' => $terms_operator ) ) : array();
    $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'product_columns' => $items, 'product_limit' => $limit ) );

    $products_html = Alita_do_shortcode( $shortcode_tag, $shortcode_atts );

    $category_args = array(
        'number'        => $cat_limit,
        'hide_empty'    => $cat_has_no_products,
        'orderby'       => $cat_orderby,
        'order'         => $cat_order,
    );
    
    if( ! empty( $cat_include ) ) {
        $cat_include = explode( ",", $cat_include );
        $category_args['include'] = $cat_include;
        $category_args['orderby'] = 'include';
    }

    if( ! empty( $cat_slugs ) ) {
        $cat_slugs = explode( ",", $cat_slugs );
        $category_args['slug'] = $cat_slugs;

        $cat_include = array();

        foreach ( $cat_slugs as $cat_slug ) {
            $cat_include[] = "'" . $cat_slug ."'";
        }

        if ( ! empty($cat_include ) ) {
            $category_args['include'] = $cat_include;
            $category_args['orderby'] = 'include';
        }
    }

    $args = apply_filters( 'Alita_products_carousel_widget_args', array(
        'shortcode_tag'     => $shortcode_tag,
        'shortcode_atts'    => $shortcode_atts,
        'section_title'     => $title,
        'description'       => $description,
        'enable_categories' => $enable_categories,
        'categories_title'  => $categories_title,
        'category_args'     => $category_args,
        'image'             => isset( $image ) && intval( $image ) ? wp_get_attachment_image_src( $image, 'full' ) : '',
        'img_action_link'   => $img_action_link,
        'el_class'          => $el_class,
        'carousel_args' => array(
            'items'             => $items,
            'nav'               => $is_nav,
            'dots'              => $is_dots,
            'touchDrag'         => $is_touchdrag,
            'autoplay'          => $is_autoplay,
            'margin'            => intval( $margin ),
            'responsive'        => array(
                '0'     => array( 'items'   => $items_0 ),
                '480'   => array( 'items'   => $items_480 ),
                '768'   => array( 'items'   => $items_768 ),
                '992'   => array( 'items'   => $items_992 ),
                '1200'  => array( 'items'   => $items ),
            )
        )
    ) );

    $args['section_args']['products_html'] = $products_html;

    $html = '';
    if( function_exists( 'Alita_products_carousel_category_with_image' ) ) {
        ob_start();
        Alita_products_carousel_category_with_image( $args );
        $html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'Alita_vc_products_carousel_category_with_image' , 'Alita_vc_products_carousel_category_with_image_block' );

endif;