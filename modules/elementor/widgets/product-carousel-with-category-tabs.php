<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products Carousel with Category Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Products_Carousel_with_Category_Tabs extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Products Carousel with Category Tabs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_home_v5_product_carousel';
    }

    /**
     * Get widget title.
     *
     * Retrieve Products Carousel with Category Tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products Carousel with Category Tabs', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Products With Categories Image widget icon.
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
     * Retrieve the list of categories the Products Carousel with Category Tabs widget belongs to.
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
     * Register Products Carousel with Category Tabs widget controls.
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
                'placeholder'   => esc_html__( 'Enter title', 'Alita-extensions' ),
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
            'orderby',
            [
                'label'         => esc_html__( 'Orderby', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'       => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__( 'Order', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter order.', 'Alita-extensions'),
                'default'       => '6',
            ]
        );

        $this->add_control(
            'per_page',
            [
                'label'         => esc_html__( 'Limit', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'       => 'DESC',
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
                'placeholder'   => esc_html__( 'Enter the product id.', 'Alita-extensions' ),
            ]
        );

        $this->add_control( 
            'category',
            [
                'label'         => esc_html__('Category', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter category.', 'Alita-extensions'),
            ]
        );

        $this->add_control(
            'cat_operator',
            [
                'label'         => esc_html__('Category Operator', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
                'default'       => 'IN',
            ]
        );

        $this->add_control(
            'enable_categories',
            [
                'label'         => esc_html__('Enable Header Categories', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'categories_title',
            [
                'label'         => esc_html__( 'Enter categories title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'cat_limit',
            [
                'label'         => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'cat_has_no_products',
            [
                'label'         => esc_html__('Have no products', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        ); 

        $this->add_control(
            'cat_orderby',
            [
                'label'         => esc_html__('Order by', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'       => 'date',
            ]
        );

        $this->add_control(
            'cat_order',
            [
                'label'         => esc_html__('Order', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'       => 'DESC',
                
            ]
        );

        $this->add_control(
            'cat_include',
            [
                'label'         => esc_html__('Include ID\'s', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter category include separate by comma(,).', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'cat_slugs',
            [
                'label'         => esc_html__('Include slug\'s', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'items',
            [
                'label'         => esc_html__('Carousel: Items', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       =>'4',
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
            'margin',
            [
                'label'         => esc_html__('Carousel: Margin', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
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
     * Render Products Carousel with Category Tabs output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $shortcode_atts          = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
        $shortcode_atts          = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page, ) );

        $products_html = Alita_do_shortcode( $shortcode_tag, $shortcode_atts );
        
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

        $args = apply_filters( 'Alita_products_carousel_with_cat_tabs_args', array(
            'section_class'             => '',
            'section_title'             => $title,
            'enable_categories'         => $enable_categories,
            'categories_title'          => $categories_title,
            'category_args'             => $category_args,
            'shortcode_tag'             => $shortcode_tag,
            'shortcode_atts'            => $shortcode_atts,
            'section_args'              => array(
                'products_html'             => $products_html,
            ),
            'carousel_args' => array(
                'items'             => $items,
                'dots'              => $is_dots,
                'touchDrag'         => $is_touchdrag,
                'autoplay'          => $is_autoplay,
                'margin'            => intval( $margin ),
                'responsive'        => array(
                    '0'     => array( 'items'   => $items_0 ),
                    '480'   => array( 'items'   => $items_480 ),
                    '768'   => array( 'items'   => $items_768 ),
                    '992'   => array( 'items'   => $items_992 ),
                    '1200'  => array( 'items'   => $items ),
                )
            )
        ) );

        if( function_exists( 'Alita_home_v5_product_carousel' ) ) {
            Alita_home_v5_product_carousel( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Products_Carousel_with_Category_Tabs );