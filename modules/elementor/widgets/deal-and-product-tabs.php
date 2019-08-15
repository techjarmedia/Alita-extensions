<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Deals and Products Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Deals_And_Products_Tabs_Element extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Deals and Products Tabs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_deal_and_product_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Deals and Products Tabs Element Widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Deals and Products Tabs', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Deals and Products Tabs Element Widget icon.
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
     * Retrieve the list of categories the Deals and Products Tabs widget belongs to.
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
     * Register Deals and Products Tabs widget controls.
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
            'deal_title',
            [
                'label'         => esc_html__( 'Title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'placeholder'   => esc_html__( 'Enter title', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'deal_show_savings',
            [
                'label'         => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
                'description'   => esc_html__( 'Deals savings text', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'deal_savings_in',
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
            'deal_savings_text',
            [
                'label'         => esc_html__('Savings Text', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'deal_product_choice',
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
            'deal_product_id',
            [
                'label'         => esc_html__('Product ID', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
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
                        'label' => esc_html__( 'Title', 'Alita-extensions' ),
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
                        'name'  => 'product_limit',
                        'label' => esc_html__( 'Limit', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' => esc_html__( 'Enter the number of products to display.', 'Alita-extensions' ),
                        'default'=> '6',
                    ],
                    [
                        'name'  => 'columns',
                        'label' => esc_html__( 'Columns', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
                        'default'=> '3',
                    ],
                    [
                        'name'  => 'product_limit_wide',
                        'label' => esc_html__( 'Wide Layout Limit', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' => esc_html__( 'Enter the number of wide products to display.', 'Alita-extensions' ),
                        'default'=> '8',
                    ],
                    [
                        'name'  => 'product_columns_wide',
                        'label' => esc_html__( 'Tab Products Wide Layout Columns', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' => esc_html__( 'Enter the number of tap products wide layout columns to display.', 'Alita-extensions' ),
                        'default'=> '4',
                    ],
                    [
                        'name'  => 'orderby',
                        'label' => esc_html__( 'Order by', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter orderby.', 'Alita-extensions'),
                        'default' => 'date',
                    ],

                    [
                        'name'  => 'order',
                        'label' => esc_html__( 'Order', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' =>esc_html__('Enter order', 'Alita-extensions' ),
                        'default' => 'DESC',
                    ],
                    [
                        'name'  => 'products_choice',
                        'label' => esc_html__( 'Product Choice', 'Alita-extensions' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'       => [
                            'ids'       =>esc_html__( 'IDs', 'Alita-extensions' ),
                            'skus'      =>esc_html__( 'SKUs', 'Alita-extensions' ),       
                        ],
                        'default'       =>'ids',
                    ],
                    [
                        'name'  => 'product_id',
                        'label' => esc_html__( 'Product IDs or SKUs', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description' =>esc_html__('Enter IDs/SKUs separate by comma(,).', 'Alita-extensions' ),
                    ],
                    [
                        'name'  => 'category',
                        'label' => esc_html__( 'Category', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
                    ],
                    [
                        'name'  => 'cat_operator',
                        'label' => esc_html__( 'Category Operator', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
                        'default'         => 'IN',
                    ],
                ],
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Deals and Products Tabs Block output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if( is_object( $tabs ) || is_array( $tabs ) ) {
            $tabs = json_decode( json_encode( $tabs ), true );
        } else {
            $tabs = json_decode( urldecode( $tabs ), true );
        }

        $tabs_args = array();

        if( is_array( $tabs ) ) {
            foreach ( $tabs as $key => $tab ) {

                extract( $tab );

                if ( Alita_is_wide_enabled() ) {
                    $per_page   = $product_limit_wide;
                } else {
                    $per_page   = $product_limit;
                }
                
                $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
                $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby,'per_page' => $per_page, 'columns' => $columns ) );

                $tabs_args[] = array(
                    'title'             => $title,
                    'shortcode_tag'     => $shortcode_tag,
                    'atts'              => $shortcode_atts,
                );
            }
        }

        $deal_args = array(
            'is_enabled'        => 'yes',
            'section_title'     => $deal_title,
            'show_savings'      => $deal_show_savings,
            'savings_in'        => $deal_savings_in,
            'savings_text'      => $deal_savings_text,
            'product_choice'    => $deal_product_choice,
            'product_id'        => $deal_product_id,
        );

        $args = array(
            'deal_products_args'    => $deal_args,
            'product_tabs_args'     => array(
                'tabs'                  => $tabs_args,
                'columns_wide'          => $product_columns_wide,
            ),
        );

        if( function_exists( 'Alita_deal_and_tabs_block' ) ) {
            Alita_deal_and_tabs_block( $args );
        }

    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Deals_And_Products_Tabs_Element );