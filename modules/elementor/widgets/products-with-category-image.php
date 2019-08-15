<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Products With Categories Image Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Products_With_Categories_Image extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Products With Categories Image widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_products_with_category_image_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Products With Categories Image widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Products With Categories and Image', 'Alita-extensions' );
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
     * Retrieve the list of categories the Products With Categories Image widget belongs to.
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
     * Register Products With Categories Image widget controls.
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
            'limit',
            [
                'label'         => esc_html__('Limit', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter limit of the products.', 'Alita-extensions'),
                'default'       => 6,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label'         => esc_html__('Columns', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter columns of the products.', 'Alita-extensions'),
                'default'       => 3,
            ]
        );

        $this->add_control(
            'columns_wide',
            [
                'label'         => esc_html__('Products Wide Layout Columns', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter columns of the products.', 'Alita-extensions'),
                'default'       => 4,
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
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'       => 'DESC',
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
                'placeholder'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
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
            'categories_title',
            [
                'label'         => esc_html__( 'Enter categories title', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Bestsellers',
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
                'default'       => true,
            ]
        );

        $this->add_control(
            'cat_limit',
            [
                'label'         => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '5'
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
                'placeholder'   => esc_html__('Enter id separate by comma(,).', 'Alita-extensions'),
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
            'vcat_limit',
            [
                'label'         => esc_html__('Number of Vertical Categories to display', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'default'       =>'7',
            ]
        );


        $this->add_control(
            'vcat_has_no_products',
            [
                'label'         => esc_html__('Have no products', 'Alita-extensions'),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
            ]
        );

        $this->add_control(
            'vcat_orderby',
            [
                'label'         => esc_html__('Order by', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
                'default'       => 'date',
            ]
        );

        $this->add_control(
            'vcat_order',
            [
                'label'         => esc_html__('Order', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
                'default'       => 'DESC',
                
            ]
        );

        $this->add_control(
            'vcat_include',
            [
                'label'         => esc_html__('Include ID\'s', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter id separate by comma(,).', 'Alita-extensions'),
            ]
        );


        $this->add_control(
            'vcat_slugs',
            [
                'label'         => esc_html__('Include slug\'s', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__('Enter slug separate by comma(,).', 'Alita-extensions'),
            ]
        ); 

        $this->add_control(
            'image',
            [
                'label'         => esc_html__('Image', 'Alita-extensions'),
                'type'          => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'img_action_link',
            [
                'label'         => esc_html__('Image Action Link', 'Alita-extensions'),
                'type'          => Controls_Manager::TEXT,
            ]
        );


        $this->end_controls_section();

    }

    /**
     * Render Products With Categories Image output on the frontend.
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
        $shortcode_atts = wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby,'per_page' => $limit, 'columns' => $columns ) );

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

        $vcategory_args = array(
            'number'        => $vcat_limit,
            'hide_empty'    => $vcat_has_no_products,
            'orderby'       => $vcat_orderby,
            'order'         => $vcat_order,
        );
        
        if( ! empty( $vcat_include ) ) {
            $vcat_include = explode( ",", $vcat_include );
            $vcategory_args['include'] = $vcat_include;
            $vcategory_args['orderby'] = 'include';
        }

        if( ! empty( $vcat_slugs ) ) {
            $vcat_slugs = explode( ",", $vcat_slugs );
            $vcategory_args['slug'] = $vcat_slugs;

            $vcat_include = array();

            foreach ( $vcat_slugs as $vcat_slug ) {
                $vcat_include[] = "'" . $vcat_slug ."'";
            }

            if ( ! empty($vcat_include ) ) {
                $vcategory_args['include'] = $vcat_include;
                $vcategory_args['orderby'] = 'include';
            }
        }

        $image = isset( $image['id'] ) ? wp_get_attachment_image_src ($image['id'], 'full' ) : '';

        $args = array(
            'section_title'     => $title,
            'enable_categories' => $enable_categories,
            'categories_title'  => $categories_title,
            'category_args'     => $category_args,
            'vcategory_args'    => $vcategory_args,
            'shortcode_tag'     => $shortcode_tag,
            'shortcode_atts'    => $shortcode_atts,
            'image'             => isset( $image ) ? $image : '',
            'img_action_link'   => $img_action_link,
            'columns_wide'      => $columns_wide,
        );

        if( function_exists( 'Alita_products_with_category_image' ) ) {
            Alita_products_with_category_image( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Products_With_Categories_Image );