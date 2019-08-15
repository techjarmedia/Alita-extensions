<?php

if ( ! function_exists( 'Alita_vc_recent_viewed_products' ) ) :

    function Alita_vc_recent_viewed_products( $atts, $content = null ){

        extract(shortcode_atts(array(
            'section_title'     => '',
            'per_page'          => 10,
            'columns'           => '5'
        ), $atts));

        $shortcode_atts = array( 'per_page'  => $per_page, 'columns'    => $columns );

        $args = array(
            'section_title'     => $section_title,
            'shortcode_atts'    => $shortcode_atts
        );
        
        $html = '';
        if( function_exists( 'Alita_recent_viewed_products' ) ) {
            ob_start();
            Alita_recent_viewed_products( $args );
            $html = ob_get_clean();
        }

        return $html;
    }

    add_shortcode( 'Alita_recent_viewed_products' , 'Alita_vc_recent_viewed_products' );

endif;
