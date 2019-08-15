<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Features Block Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alita_Elementor_Features_Block extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Features Block widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Alita_elementor_feature_block';
    }

    /**
     * Get widget title.
     *
     * Retrieve Features Block widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Features Block', 'Alita-extensions' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Features Block widget icon.
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
     * Retrieve the list of categories the Features Section widget belongs to.
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
     * Register Features Block widget controls.
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
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features',
            [
                'label'  => esc_html__( 'Feature Block', 'Alita-extensions' ),
                'type'   => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'  => 'icon',
                        'label' => esc_html__( 'Icon', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                    [
                        'name'  => 'text',
                        'label' => esc_html__( 'Text', 'Alita-extensions' ),
                        'type'  => Controls_Manager::TEXT,
                    ],
                ],
                'default' => [],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Features Block widget output on the frontend.
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

        
        if ( $features) {
            foreach (  $settings['features'] as $feature ) {

                $args[] = array(
                    'icon'      => isset( $feature['icon'] ) ? $feature['icon'] : '',
                    'text'      => isset( $feature['text'] ) ? $feature['text'] : '',
                );
            }
        }

        if( function_exists( 'Alita_features_list' ) ) {
            Alita_features_list( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Alita_Elementor_Features_Block); 