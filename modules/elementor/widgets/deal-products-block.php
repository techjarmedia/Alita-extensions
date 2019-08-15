<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Deals Products Block.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Deals_Products_Block extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Deals Products Block widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_deal_products_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Deals Products Block widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Deals Products Block', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Deals Products Block widget icon.
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
     * Retrieve the list of categories the Ad Block widget belongs to.
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
     * Register Deals Products Block widget controls.
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
                'label' => esc_html__( 'Enter Title', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(  
            'shortcode_tag',
            [
                'label' => esc_html__( 'Shortcode', 'Alita-extensions' ),
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
                'default' =>'recent_products'
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Order by', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'per_page',
            [
                'label' => esc_html__( 'Limit', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the number of products to display.', 'Alita-extensions'),
                'default'         => '6',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
                'default'         => '3',
            ]
        );

        $this->add_control(
            'products_choice',
            [
                'label' => esc_html__( 'Products Choice', 'Alita-extensions' ),
                'type'  => Controls_Manager::SELECT,
                'options' =>[    
                    'ids'     =>        esc_html__( 'IDs', 'Alita-extensions' ) ,
                    'skus'    =>        esc_html__( 'SKUs', 'Alita-extensions' ) ,
                ],
                'default' =>'ids'
            ]
        ); 

        $this->add_control(
            'product_id',
            [
                'label' => esc_html__( 'Product IDs or SKUs', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter IDs/SKUs separate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( 'Category', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the category.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_operator',
            [
                'label' => esc_html__( 'Category Opeartor', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
                'default'         => 'IN',
            ]
        );

        $this->add_control(
            'action_text',
            [
                'label' => esc_html__( 'Action Text', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'action_link',
            [
                'label' => esc_html__( 'Action Link', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );



    $this->end_controls_section();

 }

    /**
     * Render Deals Products Block widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id  ) ) : array();
        $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page, 'columns' => $columns ) );

        $args = array(
            'section_title'         => $title,
            'shortcode_tag'         => $shortcode_tag,
            'shortcode_atts'        => $shortcode_atts,
            'action_text'           => $action_text,
            'action_link'           => $action_link,
        );

        if( function_exists( 'Alita_deal_products_block' ) ) {
            Alita_deal_products_block( $args );
        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Deals_Products_Block );