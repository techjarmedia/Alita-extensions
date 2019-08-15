<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Product Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Product_Tabs_Elements extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product Tabs name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_product_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Tabs title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Product Tabs', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Tabs icon.
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
     * Retrieve the list of categories the Product Tabs belongs to.
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
     * Register Product Tabs controls.
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
            'tabs',
            [
                'label'  => esc_html__( 'Products Tabs Element', 'Alita-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => esc_html__( 'title', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter title.', 'Alita-extensions'),
                    ],
                    [
                        'name'  => 'shortcode_tag',
                        'label' => esc_html__( 'Shortcode', 'Alita-extensions' ),
                        'type'  => Controls_Manager::SELECT,
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
                    ],
                    [
                        'name'  => 'per_page',
                        'label' => esc_html__( 'Limit', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter the number of products to display.', 'Alita-extensions'),
                        'default'=>'6',
                    ],
                    [
                        'name'  => 'columns',
                        'label' => esc_html__( 'Columns', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
                        'default'=>'3',
                    ],
                    [
                        'name'  => 'category',
                        'label' => esc_html__( 'Category', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
                    ],
                    [
                        'name'  => 'orderby',
                        'label' => esc_html__( 'Order By', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter orderby.', 'Alita-extensions'),
                        'default'   => 'date'
                    ],
                    [
                        'name'  => 'order',
                        'label' => esc_html__( 'Order', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter order.', 'Alita-extensions'),
                        'default'   => 'desc'
                    ],
                                 
                ],
                'default' => [],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Alita Onsale Product output on the frontend.
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

        if( is_object( $tabs ) || is_array( $tabs ) ) {
            $tabs = json_decode( json_encode( $tabs ), true );
        } else {
            $tabs = json_decode( urldecode( $tabs ), true );
        }

        $tabs_args = array();
        
        if( is_array( $tabs ) ) {
            foreach ( $tabs as $key => $tab ) {

                extract(shortcode_atts(array(
                    'title'                 => '',
                    'shortcode_tag'         => 'recent_products',
                    'per_page'              => 3,
                    'columns'               => 3,
                    'orderby'               => 'date',
                    'order'                 => 'desc',
                    'products_choice'       => 'ids',
                    'product_id'            => '',
                    'category'              => '',
                    'cat_operator'          => 'IN',
                ), $tab));
                
                $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
                $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $columns, 'per_page' => $per_page ) );

                $tabs_args[] = array(
                    'title'             => $title,
                    'shortcode_tag'     => $shortcode_tag,
                    'atts'              => $shortcode_atts,
                );
            }
        }

        $args = array(
            'tabs'              => $tabs_args,
        );

        if( function_exists( 'Alita_products_tabs' ) ) {
            Alita_products_tabs( $args );
        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Product_Tabs_Elements );