<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Deals Product Carousel Tab Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Deals_Products_Carousel extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Deals Product Carousel Tab widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_deal_products_carousel_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Deals Product Carousel Tab
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Deal Products Carousel', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Deals Product Carousel Tab widget icon.
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
     * Retrieve the list of categories the Deals Product Carousel Tab widget belongs to.
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
     * Register Deals Product Carousel Tab widget controls.
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
                'label'         => esc_html__( 'Enter deal header title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'placeholder'   => esc_html__( 'Enter your title here', 'Alita-extensions' ),
                'default'       => 'Week Deals limited, Just now',
            ]
        );

        $this->add_control(
            'header_timer',
            [
                'label'         => esc_html__('Show Header Timer', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'timer_value',
            [
                'label'         => esc_html__( 'Timer Value', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '+8 hours',
            ]
        );

        $this->add_control(
            'timer_title',
            [
                'label'         => esc_html__( 'Timer Title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter title', 'Alita-extensions' ),
                'default'       => 'Hurry up! Offer ends in:',
            ]
        );


        $this->add_control(
            'deal_percentage',
            [
                'label'         => esc_html__('Deal Percentage value', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,

                'default'       => '%',
            ]
        );

        $this->add_control(
            'shortcode_tag',
            [
                'label'     => esc_html__( 'Shortcode Tags', 'Alita-extensions' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'featured_products'     => esc_html__( 'Featured Products','Alita-extensions'),
                    'sale_products'         => esc_html__( 'On Sale Products','Alita-extensions'),
                    'top_rated_products'    => esc_html__( 'Top Rated Products','Alita-extensions'),
                    'recent_products'       => esc_html__( 'Recent Products','Alita-extensions'),
                    'best_selling_products' => esc_html__( 'Best Selling Products','Alita-extensions'),
                    'product_category'      => esc_html__( 'Product Category','Alita-extensions'),
                    'products'              => esc_html__( 'Products','Alita-extensions')
                ],
                'default' => 'recent_products',
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'         => esc_html__( 'Number of products to display', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '15',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'         => esc_html__( 'Orderby', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'   => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__( 'Order', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'products_choice',
            [
                'label'         => esc_html__('Product Choice', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the product choice.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label'         => esc_html__( 'Product id or SKUs', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter IDs/SKUs separate by comma(,).', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'category',
            [
                'label'         => esc_html__('Category', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter category separate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_operator',
            [
                'label'         => esc_html__('Category Operator', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
                'default'         => 'IN',
            ]
        );

        $this->add_control(
            'items',
            [
                'label'         => esc_html__('Carousel: Items', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '4',
            ]
        );

        $this->add_control(
            'items_0',
            [
                'label'         => esc_html__('Carousel: Items(0 - 479)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the number of items to display.', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'items_480',
            [
                'label'         => esc_html__('Carousel: Items(480 - 767)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the number of items to display.', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'items_768',
            [
                'label'         => esc_html__('Carousel: Items(768 - 991)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the number of items to display.', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'items_992',
            [
                'label'         => esc_html__('Carousel: Items(992 - 1199)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the number of items to display.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'is_dots',
            [
                'label'         => esc_html__('Carousel: Show Dots', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => true,
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
     * Render Deals Product Carousel Tab output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
        $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $items, 'per_page' => $limit ) );

        $products_html = Alita_do_shortcode( $shortcode_tag, $shortcode_atts );


        $args = apply_filters( 'Alita_deal_products_carousel_widget_args', array(
            'section_title'     => $title,
            'timer_title'       => $timer_title,
            'header_timer'      => $header_timer,
            'deal_percentage'   => $deal_percentage,
            'timer_value'       => $timer_value,
            'section_args'  => array(
                'products_html'     => $products_html,
            ),
            'carousel_args' => array(
                'items'             => $items,
                'dots'              => isset( $is_dots) ? filter_var( $is_dots, FILTER_VALIDATE_BOOLEAN): '',
                'touchDrag'         => isset( $is_touchdrag) ? filter_var( $is_touchdrag, FILTER_VALIDATE_BOOLEAN): '',
                'autoplay'          => isset( $is_autoplay) ? filter_var( $is_autoplay, FILTER_VALIDATE_BOOLEAN): '',
                'margin'            => intval( $margin ),
                'responsive'    => array(
                    '0'     => array( 'items'   => $items_0 ),
                    '480'   => array( 'items'   => $items_480 ),
                    '768'   => array( 'items'   => $items_768 ),
                    '992'   => array( 'items'   => $items_992 ),
                    '1200'  => array( 'items'   => $items ),
                )
            )
        ) );

        if( function_exists( 'Alita_products_carousel_with_deal' ) ) {
            Alita_products_carousel_with_deal( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Deals_Products_Carousel );