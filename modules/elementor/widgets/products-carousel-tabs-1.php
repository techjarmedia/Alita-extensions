<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Product Tabs Carousel 1 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Products_Tabs_1_Elements extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product Tabs Carousel 1 name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_products_carousel_tabs_v5';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Tabs Carousel 1 title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Product Tabs Carousel 1', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Tabs Carousel 1 icon.
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
     * Retrieve the list of categories the Product Tabs Carousel 1 belongs to.
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
     * Register Product Tabs Carousel Product 1 controls.
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
            'section_title',
            [
                'label'         => esc_html__( 'Enter title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'         => esc_html__( 'Action Text', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'         => esc_html__( 'Action Link', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label'  => esc_html__( 'Tabs' ,'Alita-extensions' ),
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
                        'deafult'=> '3',
                    ],
                    [
                        'name'  => 'orderby',
                        'label' => esc_html__( 'Order By', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter orderby.', 'Alita-extensions'),
                        'default'         => 'date',
                    ],
                    [
                        'name'  => 'order',
                        'label' => esc_html__( 'Order', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter order.', 'Alita-extensions'),
                        'default'       => 'desc',
                    ],
                    [
                        'name'  => 'products_choice',
                        'label' => esc_html__( 'Product Choice', 'Alita-extensions' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'   => [
                            'ids'   =>  esc_html__( 'IDs', 'Alita-extensions' )       ,
                            'skus'  =>  esc_html__( 'SKUs', 'Alita-extensions' )       ,
                        ],
                        'default' => 'ids',
                    ],
                    [
                        'name'  => 'products_id',
                        'label' => esc_html__( 'Product IDs or SKUs', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'description'   => esc_html__('Enter IDs/SKUs separate by comma(,).', 'Alita-extensions'),
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
                        'default'       => 'IN',
                    ],                
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'items',
            [
                'label'         => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '6',
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
            'is_nav',
            [
                'label'         => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => true,
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
            'is_dots',
            [
                'label'         => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => true,
            ]
        );

        $this->add_control(
            'is_autoplay',
            [
                'label'         => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
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
     * Render Product Tabs Carousel 1 output on the frontend.
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

                extract(shortcode_atts(array(
                    'title'                 => '',
                    'shortcode_tag'         => 'recent_products',
                    'per_page'              => 6,
                    'orderby'               => 'date',
                    'order'                 => 'desc',
                    'products_choice'       => 'ids',
                    'product_id'            => '',
                    'category'              => '',
                    'cat_operator'          => 'IN',
                ), $tab));

                $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator, 'products_choice' => $products_choice, 'products_ids_skus' => $product_id ) ) : array();
                $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $items, 'per_page' => $per_page ) );

                $tabs_args[] = array(
                    'title'             => $title,
                    'shortcode_tag'     => $shortcode_tag,
                    'atts'              => $shortcode_atts,
                );
            }
        }

        $args = array(
            'section_title'     => $section_title,
            'button_text'       => $button_text,
            'button_link'       => $button_link,
            'tabs'              => $tabs_args,
            'carousel_args'     => array(
                'nav'           => isset( $is_nav) ? filter_var( $is_nav, FILTER_VALIDATE_BOOLEAN): '',
                'navText'       => array( $nav_next, $nav_prev ),
                'dots'          => isset( $is_dots) ? filter_var( $is_dots, FILTER_VALIDATE_BOOLEAN): '',
                'items'         => isset( $items ) ? $items : '',
                'autoplay'      => isset( $is_autoplay) ? filter_var( $is_autoplay, FILTER_VALIDATE_BOOLEAN): '',
                'responsive'        => array(
                    '0'     => array( 'items'   => $items_0 ),
                    '480'   => array( 'items'   => $items_480 ),
                    '768'   => array( 'items'   => $items_768 ),
                    '992'   => array( 'items'   => $items_992 ),
                    '1200'  => array( 'items'   => $items ),
                )
            )
        );

        if( function_exists( 'Alita_products_carousel_tabs_v5' ) ) {
            Alita_products_carousel_tabs_v5( $args );
        }


    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Products_Tabs_1_Elements );