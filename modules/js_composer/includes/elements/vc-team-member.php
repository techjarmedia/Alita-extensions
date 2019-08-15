<?php

if ( !function_exists( 'Alita_vc_team_member' ) ):

function Alita_vc_team_member( $atts, $content = null ){

	extract(shortcode_atts(array(
		'profile_pic'   => '',
		'name'          => '',
		'designation'   => '',
		'link'			=> '',
		'display_style'	=> ''
    ), $atts));

    $html = '';
		if( function_exists( 'Alita_get_template' ) ) {
			ob_start();
			Alita_get_template( 'sections/team-member.php', array( 'profile_pic' => $profile_pic, 'title' => $name, 'designation' => $designation, 'display_style' => $display_style, 'link' => $link ) );
			$html = ob_get_clean();
		}


	    return $html;

	}


add_shortcode( 'Alita_team_member' , 'Alita_vc_team_member' );
endif;