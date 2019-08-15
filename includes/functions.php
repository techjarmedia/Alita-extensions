<?php

// Register widgets.
function Alita_extensions_widgets_register() {
    if ( class_exists( 'Alita' ) ) {        
        include_once get_template_directory() . '/inc/widgets/class-Alita-wc-catalog-orderby.php';
        register_widget( 'Alita_WC_Catalog_Orderby' );
    }
}

add_action( 'widgets_init', 'Alita_extensions_widgets_register' );