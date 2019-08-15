<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Product List Categories .
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Product_List_Categories_Block extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Product List Categories  widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_home_list_categories';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product List Categories  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Product List Categories ', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product List Categories  widget icon.
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
     * Register Product List Categories  widget controls.
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
                'placeholder'   => esc_html__('Enter title.', 'Alita-extensions'),
            ]
        );

        $this->add_control(  
            'limit',
            [
                'label'     => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'default'   =>'6',
            ]
        );

        $this->add_control(
            'has_no_products',
            [
                'label' => esc_html__( 'Have no products', 'Alita-extensions' ),
                'type'  => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Enable', 'Alita-extensions' ),
                'label_off'     => esc_html__( 'Disable', 'Alita-extensions' ),
                'return_value'  => true,
                'default'       => false,
                'description'   => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'     => esc_html__( 'Order by', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
                'default'   => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     => esc_html__( 'Order', 'Alita-extensions' ),
                'type'      => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
                'default'   => 'DESC',
            ]
        );

        $this->add_control(
            'slugs',
            [
                'label' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the slugs seperate by comma(,).', 'Alita-extensions'),
            ]
        ); 

        $this->add_control(
            'include',
            [
                'label' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
                'type'  => Controls_Manager::TEXT,
                'description'   => esc_html__('Enter the id seperate by comma(,).', 'Alita-extensions'),
            ]
        );

     $this->end_controls_section();

 }

    /**
     * Render Product List Categories  widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $cat_args = array(
            'number'            => $limit,
            'hide_empty'        => $has_no_products,
            'orderby'           => $orderby,
            'order'             => $order,
        );

        if( ! empty( $slugs ) ) {
            $slugs = explode( ",", $slugs );
            $slugs = array_map( 'trim', $slugs );
            
            $slug_include = array();

            foreach ( $slugs as $slug ) {
                $slug_include[] = "'" . $slug ."'";
            }

            if ( ! empty($slug_include ) ) {
                $cat_args['slug']       = $slugs;
                $cat_args['include']    = $slug_include;
                $cat_args['orderby']    = 'include';
            }

        } elseif( ! empty( $include ) ) {
            $include = explode( ",", $include );
            $include = array_map( 'trim', $include );
            $cat_args['include'] = $include;
        }

        $args = array(
            'section_title'         => $title,
            'category_args'         => $cat_args,
        );

        if( function_exists( 'Alita_home_list_categories' ) ) {
            Alita_home_list_categories( $args );
        }
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Product_List_Categories_Block );