<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Alita Elementor Products 2-1-2 Block Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Products_2_1_2_Block extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Alita Elementor Products 2-1-2 Block widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_products_2_1_2_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Alita Elementor Products 2-1-2 Block widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Alita Products 2-1-2 Block', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Alita Elementor Products 2-1-2 Block widget icon.
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
     * Retrieve the list of categories the Alita Elementor Products 2-1-2 Block widget belongs to.
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
     * Register Alita Elementor Products 2-1-2 Block widget controls.
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
                'label'         => esc_html__( 'Enter title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter the Tilte', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'shortcode_tag',
            [
                'label' => esc_html__( 'Shortcode Tag', 'Alita-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'options'   => [
                    'featured_products'     => esc_html__( 'Featured Products','Alita-extensions'),
                    'sale_products'         => esc_html__( 'On Sale Products','Alita-extensions'),
                    'top_rated_products'    => esc_html__( 'Top Rated Products','Alita-extensions'),
                    'recent_products'       => esc_html__( 'Recent Products','Alita-extensions'),
                    'best_selling_products' => esc_html__( 'Best Selling Products','Alita-extensions'),
                    'product_category'      => esc_html__( 'Product Category','Alita-extensions'),
                    'products'              => esc_html__( 'Products','Alita-extensions'),
                ],
                'default' => 'recent_products',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'     => esc_html__( 'Order by', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'placeholder' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'   => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     => esc_html__( 'Order', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'   => 'DESC',
            ]
        );

        $this->add_control(
            'products_choice',
            [
                'label'     => esc_html__( 'Product Choice', 'Alita-extensions' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'ids'       =>esc_html__( 'IDs', 'Alita-extensions' ),
                    'skus'      =>esc_html__( 'SKUs', 'Alita-extensions' ),
                   
                ],
                'default'   => 'ids',

            ]
        );

        $this->add_control(  
            'product_id',
            [
                'label' => esc_html__( 'Product IDs or SKUs', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter IDs/SKUs separate by comma(,).', 'Alita-extensions'),
            ]
        );

        
        $this->add_control(
            'category',
            [
                'label' => esc_html__( 'Category', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter category separate by comma(,).', 'Alita-extensions'),
            ]
        ); 

        $this->add_control(
            'cat_operator',
            [
                'label' => esc_html__( 'Category Operator', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the categgory operator seperate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_limit',
            [
                'label' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the category limit.', 'Alita-extensions'),
            ]
        ); 

        $this->add_control(
            'cat_has_no_products',
            [
                'label' => esc_html__( 'Have no products', 'Alita-extensions' ),
                'type'  => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
                'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
            ]
        ); 

        $this->add_control(
            'cat_orderby',
            [
                'label' => esc_html__( 'Order by', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'value' => 'DESC',
            ]
        );

        $this->add_control(
            'cat_order',
            [
                'label' => esc_html__( 'Order', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter category order.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_include',
            [
                'label' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter the id separate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_slugs',
            [
                'label' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the slug separate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Alita Elementor Products 2-1-2 Block output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( Alita_is_wide_enabled() ) {
            $per_page   = 9;
        } else {
            $per_page   = 5;
        }

        $shortcode_atts          = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
        $shortcode_atts          = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page ) );

        
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

        $args = array(
            'section_class'             => '',
            'section_title'             => $title,
            'category_args'             => $category_args,
        );

        if( class_exists( '\Alita_Products' ) ) {
            $args['products'] = \Alita_Products::$shortcode_tag( $shortcode_atts );
        }

        if( function_exists( 'Alita_products_2_1_2_block' ) ) {
            Alita_products_2_1_2_block( $args );
        }
        
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Products_2_1_2_Block );