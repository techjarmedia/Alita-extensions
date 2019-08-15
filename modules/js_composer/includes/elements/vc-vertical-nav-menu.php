<?php

if ( ! function_exists( 'Alita_vertical_nav_menu_element' ) ) :

    function Alita_vertical_nav_menu_element( $atts, $content = null ){

        extract(shortcode_atts(array(
            'title'         => '',
            'action_text'   => '',
            'action_link'   => '',
            'menu'          => '',
        ), $atts));

        $args = array(
            'menu_title'        => $title,
            'menu_action_text'  => $action_text,
            'menu_action_link'  => $action_link,
            'menu'              => $menu,
        );

        $html = '';
        if( function_exists( 'Alita_home_vertical_nav' ) ) {
            ob_start();
            Alita_home_vertical_nav( $args );
            $html = ob_get_clean();
        }

        return $html;
    }

    add_shortcode( 'Alita_vertical_nav_menu' , 'Alita_vertical_nav_menu_element' );

endif;