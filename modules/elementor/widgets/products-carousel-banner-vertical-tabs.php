<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products Carousel Banner Vertical Tabs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Products_Carousel_Banner_Vertical_Tabs extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Products Carousel Banner Vertical Tabs name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_products_carousel_banner_vertical_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Products Carousel Banner Vertical Tabs title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products Carousel Banner Vertical Tabs', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Products Carousel Banner Vertical Tabs icon.
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
     * Retrieve the list of categories the Products Carousel Banner Vertical Tabs belongs to.
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
     * Register Products Carousel Banner Vertical Tabs Product controls.
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
                'placeholder'   => esc_html__( 'Enter Orderby', 'Alita-extensions' ),
                'default'       => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__( 'Order', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter Order', 'Alita-extensions' ),
                'default'       => 'DESC',
            ]
        );


        $this->add_control(
            'products_choice',
            [
                'label'         => esc_html__('Product Choice', 'Alita-extensions'),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'ids'     => esc_html__( 'IDs','Alita-extensions'),
                    'skus'         => esc_html__( 'SKUs','Alita-extensions'),
                ],
                'condition'     => [
                    'shortcode_tag' => 'products',
                ],
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label'         => esc_html__( 'Product id or SKUs', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Enter IDs/SKUs separate by comma(,).', 'Alita-extensions' ),
                'condition'     => [
                    'shortcode_tag' => 'products',
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label'         => esc_html__('Category', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
                'condition'     => [
                    'shortcode_tag' => 'product_category',
                ],
            ]
        );

        $this->add_control(
            'bg_img',
            [
                'label'         => esc_html__( 'Background Image', 'Alita-extensions' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'         => esc_html__( 'Limit', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '20',
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label'  => esc_html__( 'Banner Tabs', 'Alita-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => esc_html__( 'Tab Title', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your tab title here', 'Alita-extensions' ),
                    ],
                    [
                        'name'  => 'tab_title',
                        'label' => esc_html__( 'Banner Title', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Enter your banner title here', 'Alita-extensions' ),
                    ],
                    [
                        'name'  => 'tab_sub_title',
                        'label' => esc_html__( 'Banner Subtitle', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'placeholder' => esc_html__( 'Enter your banner subtitle here', 'Alita-extensions' ),
                    ],
                    [
                        'name'  => 'banner_image',
                        'label' => esc_html__( 'Image', 'Alita-extensions' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'action_text',
                        'label' => esc_html__( 'Banner Action Text', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner text here', 'Alita-extensions' ),
                    ],
                    [
                        'name'  => 'action_link',
                        'label' => esc_html__( 'Banner Action Link', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Enter your banner link here', 'Alita-extensions' ),
                    ],
                ],
                'default' => [],
            ]
        );

        $this->add_control(
            'items',
            [
                'label'         => esc_html__('Carousel: Items', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter the number of items to display.', 'Alita-extensions'),
                'default'       => '7',
            ]
        );

        $this->add_control(
            'items_0',
            [
                'label'         => esc_html__('Carousel: Items(0 - 479)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '2',
            ]
        );


        $this->add_control(
            'items_480',
            [
                'label'         => esc_html__('Carousel: Items(480 - 767)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '3',
            ]
        );


        $this->add_control(
            'items_768',
            [
                'label'         => esc_html__('Carousel: Items(768 - 991)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '3',
            ]
        );


        $this->add_control(
            'items_992',
            [
                'label'         => esc_html__('Carousel: Items(992 - 1199)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '4',
            ]
        );

        $this->add_control(
            'items_1200',
            [
                'label'         => esc_html__('Carousel: Items(1200 - 1429)', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '5',
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
                'default'       => true,
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
                'default'       => true,
            ]
        );

         $this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra Class', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'placeholder'   => esc_html__('Enter the Additional Class.', 'Alita-extensions'),
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Products Carousel Banner Vertical Tabs output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        if ( is_woocommerce_activated() ) {

            $items_0               = isset( $items_0) ? $items_0 : 2;
            $items_480             = isset( $items_480) ? $items_480 : 3;
            $items_768             = isset( $items_768) ? $items_768 : 3;
            $items_992             = isset( $items_992) ? $items_992 : 4;
            $items_1200            = isset( $items_1200) ? $items_1200 : 5;
            $items                 = isset( $items ) ? $items : 7;

            $shortcode_atts = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ): array();
            $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $items, 'per_page' => $limit ) );

            $products_html = Alita_do_shortcode( $shortcode_tag, $shortcode_atts );
                    
            $bg_img_att = isset( $bg_img['id'] ) ? wp_get_attachment_image_src ( $bg_img['id'], 'full' ) : array();

            $section_args = array(
                'section_class'     => 'section-products-carousel',
                'carousel_id'       => 'products-carousel-' . uniqid(),
                'products_html'     => $products_html,
                'bg_img'            => isset( $bg_img_att[0] ) ? $bg_img_att[0] : '',
                'el_class'          => isset( $el_class ) ? $el_class : '',
            );

            if( is_object( $tabs ) || is_array( $tabs ) ) {
                $tabs = json_decode( json_encode( $tabs ), true );
            } else {
                $tabs = json_decode( urldecode( $tabs ), true );
            }

            $tabs_args = array();

            if( is_array( $tabs ) ) {
                foreach ( $tabs as $key => $tab ) {
                    extract( $tab );

                    $image_att = isset( $banner_image['id'] ) ? wp_get_attachment_image_src ( $banner_image['id'], 'full' ) :  array();

                    $tabs_args[] = array(
                        'title'              => isset( $title ) ? $title : '',
                        'tab_title'          => isset( $tab_title ) ? $tab_title : '',
                        'tab_sub_title'      => isset( $tab_sub_title ) ? $tab_sub_title : '',
                        'image'              => isset( $image_att[0] ) ? $image_att[0] : '',
                        'action_text'        => isset( $action_text ) ? $action_text : '',
                        'action_link'        => isset( $action_link ) ? $action_link : '',
                    );
                }
            }

            $args = array(
                'section_args'      => $section_args,
                'tabs_args'         => $tabs_args,
                'carousel_args'     => array(
                    'items'             => $items,
                    'nav'               => isset( $is_nav) ? filter_var( $is_nav, FILTER_VALIDATE_BOOLEAN): '',
                    'dots'              => isset( $is_dots) ? filter_var( $is_dots, FILTER_VALIDATE_BOOLEAN): '',
                    'touchDrag'         => isset( $is_touchdrag) ? filter_var( $is_touchdrag, FILTER_VALIDATE_BOOLEAN): '',
                    'autoplay'          => isset( $is_autoplay) ? filter_var( $is_autoplay, FILTER_VALIDATE_BOOLEAN): '',
                    'responsive'        => array(
                        '0'     => array( 'items'   => $items_0 ),
                        '480'   => array( 'items'   => $items_480 ),
                        '768'   => array( 'items'   => $items_768 ),
                        '992'   => array( 'items'   => $items_992 ),
                        '1200'  => array( 'items'   => $items_1200 ),
                        '1430'  => array( 'items'   => $items ),
                    )
                )
            );

            if( function_exists( 'products_carousel_banner_vertical_tabs' ) ) {
                products_carousel_banner_vertical_tabs( $args );
            }
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Products_Carousel_Banner_Vertical_Tabs );