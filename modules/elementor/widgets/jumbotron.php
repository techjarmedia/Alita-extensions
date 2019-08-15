<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Jumbotron Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Jumbotron_Element extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Jumbotron widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_jumbotron_element';
    }

    /**
     * Get widget title.
     *
     * Retrieve Jumbotron widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Jumbotron', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Jumbotron widget icon.
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
     * Retrieve the list of categories the Features Section widget belongs to.
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
     * Register Jumbotron widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

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
                'label' => esc_html__( 'Title', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'Alita-extensions' ),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

         

    $this->end_controls_section();

    }

    /**
     * Render Jumbotron widget output on the frontend.
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
            'title'         => $title,
            'sub_title'     => $sub_title,
            'image'         => isset( $image['id'] ) ? $image['id'] : '',
        );

        if( function_exists( 'Alita_jumbotron' ) ) {
            Alita_jumbotron( $args );
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Jumbotron_Element);