<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Alita Onsale Product Carousel Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Onsale_Product_Carousel extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Onsale Product Carousel name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_products_onsale_carousel_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Onsale Product Carousel title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Onsale Product Carousel', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Onsale Product Carousel icon.
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
     * Retrieve the list of categories the Onsale Product Carousel belongs to.
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
     * Register Onsale Product Carousel controls.
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
                'label'     => esc_html__( 'Content', 'Alita-extensions' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'placeholder'   => esc_html__( 'Enter title', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'show_savings',
            [
                'label'         => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'savings_in',
            [
                'label'         => esc_html__( 'Savings in', 'Alita-extensions' ),
                'type'          => Controls_Manager::SELECT,
                'options' => [

                    'amount'        => esc_html__( 'Amount', 'Alita-extensions' ),
                    'percentage'    => esc_html__( 'Percentage', 'Alita-extensions' ),
                ],
                'default'=> 'amount',
            ]
        );

        $this->add_control(
            'savings_text',
            [
                'label'         => esc_html__('Savings Text', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'         => esc_html__( 'Number of Products to display', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the number of products to display.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'product_choice',
            [
                'label'         => esc_html__( 'Product Choice', 'Alita-extensions' ),
                'type'          => Controls_Manager::SELECT,
                'options' => [

                    'recent'    =>esc_html__( 'Recent', 'Alita-extensions' ),
                    'random'    =>esc_html__( 'Random', 'Alita-extensions' ),
                    'specific'  =>esc_html__( 'Specific', 'Alita-extensions' ),
                ],
                'default'=> 'recent',
            ]
        );


        $this->add_control(
            'product_id',
            [
                'label'         => esc_html__('Product ID', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the product id seperate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'show_custom_nav',
            [
                'label'         => esc_html__( 'Show Custom Navigation', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control( 
            'show_progress',
            [
                'label'         => esc_html__('Show Progress', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'show_timer',
            [
                'label'         => esc_html__('Show Timer', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'show_cart_btn',
            [
                'label'         => esc_html__('Show Cart Button', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'is_dots',
            [
                'label'         => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'is_touchdrag',
            [
                'label'         => esc_html__('Carousel: Enable Touch Drag', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'nav_next',
            [
                'label'         => esc_html__('Carousel: Nav Next Text', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'nav_prev',
            [
                'label'         => esc_html__('Carousel: Nav Prev Text', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                
            ]
        );

        $this->add_control(
            'margin',
            [
                'label'         => esc_html__('Carousel: Margin', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'is_autoplay',
            [
                'label'         => esc_html__('Carousel: Autoplay', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );
         
        $this->end_controls_section();

    }

    /**
     * Render Onsale Product Carousel output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $args = array();


        $section_args = array(
            'section_title'     => $title,
            'show_savings'      => $show_savings,
            'savings_in'        => $savings_in,
            'savings_text'      => $savings_text,
            'limit'             => $limit,
            'product_choice'    => $product_choice,
            'product_ids'       => $product_id,
            'show_custom_nav'   => $show_custom_nav,
            'show_progress'     => $show_progress,
            'show_timer'        => $show_timer,
            'show_cart_btn'     => $show_cart_btn
        );

        $carousel_args = array(
            'dots'              => $is_dots,
            'touchDrag'         => $is_touchdrag,
            'navText'           => array( $nav_next, $nav_prev ),
            'margin'            => intval( $margin ),
            'autoplay'          => $is_autoplay,
        );

        if ( Alita_is_wide_enabled() ) {
            $carousel_args['items'] = 1;
            $carousel_args['responsive'] = array(
                '992'       => array( 'items' => 2 ),
            );
        }

        if( function_exists( 'Alita_onsale_product_carousel' ) ) {
            Alita_onsale_product_carousel( $section_args, $carousel_args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Onsale_Product_Carousel );