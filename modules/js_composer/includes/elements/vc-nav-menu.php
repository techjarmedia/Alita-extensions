<?php

if ( ! function_exists( 'Alita_nav_menu_element' ) ) :

    function Alita_nav_menu_element( $atts, $content = null ){

        extract(shortcode_atts(array(
            'title'        => '',
            'menu'         => '',
        ), $atts));

        $args = array(
            'title'        => $title,
            'menu'         => $menu,
        );

        $html = '';
        if( function_exists( 'Alita_secondary_nav_v6' ) ) {
            ob_start();
            Alita_secondary_nav_v6( $args );
            $html = ob_get_clean();
        }

        return $html;
    }

    add_shortcode( 'Alita_nav_menu' , 'Alita_nav_menu_element' );

endif;