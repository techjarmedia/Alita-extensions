<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Features Section Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Nav_Menu_Element extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Nav-menu widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_nav_menu_element';
    }

    /**
     * Get widget title.
     *
     * Retrieve Nav-menu widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Nav menu', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Nav-menu widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-plug';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Nav-menu widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'Alita-elements' ];
    }

    /**
     * Register Nav-menu widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $nav_menus = wp_get_nav_menus();

        $nav_menus_option = array(
            esc_html__( 'Select a menu', 'Alita-extensions' )       => '',
        );

        foreach ( $nav_menus as $key => $nav_menu ) {
            $nav_menus_option[$nav_menu->name] = $nav_menu->name;
        }

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'Alita-extensions' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'Alita-extensions' ),
                'description'   => esc_html__( 'Enter the title of menu.', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Alita Best Selling:',
            ]
        );

        $this->add_control(
            'menu',
            [

                'label'     => esc_html__( 'Menu', 'Alita-extensions' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'vertical-menu',
                'options'   => $nav_menus_option,
            ]
        );
         

        $this->end_controls_section();

    }

    /**
     * Render Nav-menu widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $args = array(
            'title'        => $title,
            'menu'         => $menu,
        );

        if( function_exists( 'Alita_secondary_nav_v6' ) ) {
            Alita_secondary_nav_v6( $args);
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Nav_Menu_Element);