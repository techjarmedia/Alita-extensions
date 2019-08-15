<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products List Block Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Product_List_Block extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product List Block name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_products_list_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product List Block title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products List Block', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product List Block icon.
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
     * Retrieve the list of categories the Product List Block belongs to.
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
     * Register Product List Block controls.
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
                'label'     => esc_html__( 'Enter Title', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'type',
            [
                'label'     => esc_html__( 'Type', 'Alita-extensions' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [

                    'v1'    =>  esc_html__( 'v1',   'Alita-extensions'),
                    'v2'    =>  esc_html__( 'v2',   'Alita-extensions'),
                ]
            ]
        );

        $this->add_control(
            'action_text',
            [
                'label'     => esc_html__( 'Action Text', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'action_link',
            [
                'label'     => esc_html__( 'Action Link', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,                
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
                'label'     => esc_html__( 'Orderby', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'   => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     => esc_html__( 'Order', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'   => 'DESC',
            ]
        );

        $this->add_control(
            'per_page',
            [
                'label'     => esc_html__('Limit', 'Alita-extensions'),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the number of products to display.', 'Alita-extensions'),
                'default'   => '6',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label'     => esc_html__( 'Columns', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
                'default'   => '2',
            ]
        );

        $this->add_control(
            'product_choice',
            [
                'label'     => esc_html__( 'Product Choice', 'Alita-extensions' ),
                'type'      => Controls_Manager::SELECT,
                'options' => [

                    'ids'   =>  esc_html__( 'IDs', 'Alita-extensions' ) ,
                    'skus'  =>  esc_html__( 'SKUs', 'Alita-extensions' ),
                ],
                'default'   => 'ids',
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label'     => esc_html__('Product ID', 'Alita-extensions'),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter IDs/SKsp separate by comma(,).', 'Alita-extensions'),
            ]
        );

        $this->add_control( 
            'category',
            [
                'label'         => esc_html__('Category', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
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
                'label'         => esc_html__( 'Category: Items', 'Alita-extensions' ),
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
                'default' => 'date',
            ]
        );

        $this->add_control(
            'cat_order',
            [
                'label'         => esc_html__( 'Order', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'cat_include',
            [
                'label'         => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Enter IDs of Categories to display', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'cat_slugs',
            [
                'label'         => esc_html__( 'Include Slug\'s', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Enter slug of Categories to display', 'Alita-extensions' ),
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Product List Block output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $shortcode_atts          = function_exists( 'Alita_get_atts_for_shortcode' ) ? Alita_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'cat_operator' => $cat_operator,'products_ids_skus' => $product_id ) ) : array();
        $shortcode_atts          = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page, 'columns' => $columns ) );

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

        $args = apply_filters( 'Alita_products_list_block_args', array(
            'section_title'             => $title,
            'type'                      => $type,
            'action_text'               => $action_text,
            'action_link'               => $action_link,
            'enable_categories'         => $enable_categories,
            'categories_title'          => $categories_title,
            'category_args'             => $category_args,
            'shortcode_tag'             => $shortcode_tag,
            'shortcode_atts'            => $shortcode_atts,
        ) );

        if( function_exists( 'Alita_products_list_block' ) ) {
            Alita_products_list_block( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Product_List_Block );