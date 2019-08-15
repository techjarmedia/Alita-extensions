<?php
/**
 * WPBakery Visual Composer Shortcodes settings
 *
 * @package Alita
 *
 */

if ( function_exists( 'vc_map' ) ) :

	$nav_menus = wp_get_nav_menus();

	$nav_menus_option = array(
		esc_html__( 'Select a menu', 'Alita-extensions' )		=> '',
	);
	
	foreach ( $nav_menus as $key => $nav_menu ) {
		$nav_menus_option[$nav_menu->name] = $nav_menu->term_id;
	}

	$revsliders = array(
		esc_html__( 'No sliders found', 'Alita-extensions' )		=> '',
	);
	
	if ( class_exists( 'RevSlider' ) ) {
		$slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();

		if ( $arrSliders ) {
			foreach ( $arrSliders as $slider ) {
				$revsliders[ $slider->getTitle() ] = $slider->getAlias();
			}
		}
	}

	#-----------------------------------------------------------------
	# Alita Ad Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Ad Block', 'Alita-extensions' ),
			'base'  		=> 'Alita_ad_block',
			'description'	=> esc_html__( 'Add Ad Block to your page.', 'Alita-extensions' ),
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon' 			=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
					'param_name' 	=> 'image',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Caption Text', 'Alita-extensions' ),
					'param_name'	=> 'caption_text',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Slider with Ads Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Slider with Ads Block', 'Alita-extensions' ),
			'base'				=> 'Alita_slider_with_ads_block',
			'description'		=> esc_html__( 'Add Slider with Ads Block to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'params' 			=> array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Slider', 'Alita-extensions' ),
					'param_name'	=> 'rev_slider_alias',
					'value'			=> $revsliders,
				),
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Ads', 'Alita-extensions' ),
					'param_name' => 'ads_banners',
					'params' 	 => array(
						array(
							'type' 			=> 'attach_image',
							'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
							'param_name' 	=> 'ad_image',
						),
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Caption Text', 'Alita-extensions' ),
							'param_name'	=> 'ad_text',
						),
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
							'param_name'	=> 'action_text',
						),
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
							'param_name'	=> 'action_link',
						),
					)
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				)
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Products carousel Banner Vertical Tabs
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Products carousel Banner Vertical Tabs', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_carousel_banner_vertical_tabs',
			'description' => esc_html__( 'Add Products carousel with Banner Vertical Tabs to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(

				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Tab Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter tab title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Tab Title', 'Alita-extensions' ),
							'param_name'	=> 'tab_title',
							'description'	=> esc_html__('Enter your banner title here.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Tab Sub Title', 'Alita-extensions' ),
							'param_name'	=> 'tab_sub_title',
							'description'	=> esc_html__('Enter your banner subtitle here.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Banner Action Text', 'Alita-extensions' ),
							'param_name'	=> 'action_text',
							'description'	=> esc_html__('Enter your banner action text here.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Banner Action Link', 'Alita-extensions' ),
							'param_name'	=> 'action_link',
							'description'	=> esc_html__('Enter your banner action link here.', 'Alita-extensions'),
						),

						array(
							'type' 			=> 'attach_image',
							'heading' 		=> esc_html__( 'Banner Image', 'Alita-extensions' ),
							'param_name' 	=> 'banner_image',
						),
					)
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Background Image', 'Alita-extensions' ),
					'param_name' 	=> 'bg_img',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'value' => '20',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(0 - 479)', 'Alita-extensions' ),
					'param_name' => 'items_0',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(480 - 767)', 'Alita-extensions' ),
					'param_name' => 'items_480',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(768 - 991)', 'Alita-extensions' ),
					'param_name' => 'items_768',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_992',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_1200',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Ads with Banner Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Ads with Banners Block', 'Alita-extensions' ),
			'base'				=> 'Alita_ads_with_banners_block',
			'description'		=> esc_html__( 'Add Ads with Banner Block to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Ads with Banner', 'Alita-extensions' ),
					'param_name' => 'ads_banners',
					'params' 	 => array(
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
						),
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Description', 'Alita-extensions' ),
							'param_name'	=> 'description',
						),
						array(
							'type'			=> 'textarea',
							'heading'		=> esc_html__('Price', 'Alita-extensions' ),
							'param_name'	=> 'price',
						),
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
							'param_name'	=> 'action_link',
						),
						array(
							'type' 			=> 'attach_image',
							'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
							'param_name' 	=> 'image',
						),
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Banner Action Link', 'Alita-extensions' ),
							'param_name'	=> 'banner_action_link',
						),
						array(
							'type' 			=> 'attach_image',
							'heading' 		=> esc_html__( 'Banner Image', 'Alita-extensions' ),
							'param_name' 	=> 'banner_image',
						),
						array(
							'type' 			=> 'checkbox',
							'param_name' 	=> 'is_align_end',
							'heading' 		=> esc_html__( 'Banner Alignment', 'Alita-extensions' ),
							'value' 		=> array( esc_html__( 'Is End', 'Alita-extensions' ) => 'true'
							)
						),
					)
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				)
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Feature Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Feature Block', 'Alita-extensions' ),
			'base'  		=> 'Alita_feature_block',
			'description'	=> esc_html__( 'Add Feature Block to your page.', 'Alita-extensions' ),
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon' 			=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon 1', 'Alita-extensions' ),
					'param_name'	=> 'icon_1',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text 1', 'Alita-extensions' ),
					'param_name'	=> 'text_1',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon 2', 'Alita-extensions' ),
					'param_name'	=> 'icon_2',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text 2', 'Alita-extensions' ),
					'param_name'	=> 'text_2',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon 3', 'Alita-extensions' ),
					'param_name'	=> 'icon_3',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text 3', 'Alita-extensions' ),
					'param_name'	=> 'text_3',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon 4', 'Alita-extensions' ),
					'param_name'	=> 'icon_4',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text 4', 'Alita-extensions' ),
					'param_name'	=> 'text_4',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Icon 5', 'Alita-extensions' ),
					'param_name'	=> 'icon_5',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Text 5', 'Alita-extensions' ),
					'param_name'	=> 'text_5',
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Jumbotron Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Jumbotron', 'Alita-extensions' ),
			'base'  		=> 'Alita_jumbotron',
			'description'	=> esc_html__( 'Add Jumbotron to your page.', 'Alita-extensions' ),
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon' 			=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Title', 'Alita-extensions' ),
					'param_name'	=> 'title',
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Sub Title', 'Alita-extensions' ),
					'param_name'	=> 'sub_title',
				),
				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
					'param_name' 	=> 'image',
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Tabs Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Tabs', 'Alita-extensions' ),
			'base'  		=> 'Alita_product_tabs',
			'description'	=> esc_html__( 'Add Product Tabs to your page.', 'Alita-extensions' ),
			'category'		=> esc_html__( 'Alita Deprecated Elements', 'Alita-extensions' ),
			'icon' 			=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #1 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_1',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #1 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_1',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_1',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_1',
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #2 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_2',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #2 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_2',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_2',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_2',
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #3 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_3',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #3 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_3',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_3',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_3',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
			        'heading' => esc_html__( 'Enter Product Items', 'Alita-extensions' ),
			        'param_name' => 'product_items',
			        'holder' => 'div'
		      	),

		      	array(
					'type' => 'textfield',
			        'heading' => esc_html__( 'Enter Product Columns', 'Alita-extensions' ),
			        'param_name' => 'product_columns',
			        'holder' => 'div'
		      	),
			),
		)
	);

	vc_map(
		array(
			'name'				=> esc_html__( 'Product Tabs', 'Alita-extensions' ),
			'base'  			=> 'Alita_products_tabs',
			'description'		=> esc_html__( 'Add Product Tabs to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon' 				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'params' 			=> array(
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
							'param_name'	=> 'shortcode_tag',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )				=> '',
								esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
								esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
								esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
								esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
								esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
								esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
								esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
								esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
							'param_name'	=> 'per_page',
							'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
							'param_name'	=> 'columns',
							'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order By', 'Alita-extensions' ),
							'param_name'	=> 'orderby',
							'description'	=> esc_html__('Enter orderby.', 'Alita-extensions'),
							'value'			=> 'date'
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
							'param_name'	=> 'order',
							'description'	=> esc_html__('Enter order.', 'Alita-extensions'),
							'value'			=> 'desc'
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
							'param_name'	=> 'products_choice',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )		=> '',
								esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
								esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
							'param_name'	=> 'product_id',
							'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
							'param_name'	=> 'category',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
							'param_name'	=> 'cat_operator',
							'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
							'param_name'	=> 'attribute',
							'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
							'param_name'	=> 'terms',
							'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
							'param_name'	=> 'terms_operator',
							'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
					)
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Carousel Tabs Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Carousel Tabs', 'Alita-extensions' ),
			'base'  		=> 'Alita_products_carousel_tabs',
			'description'	=> esc_html__( 'Add Product Carousel Tabs to your page.', 'Alita-extensions' ),
			'category'		=> esc_html__( 'Alita Deprecated Elements', 'Alita-extensions' ),
			'icon'			=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #1 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_1',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #1 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_1',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_1',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_1',
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #2 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_2',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #2 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_2',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_2',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_2',
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Tab #3 title', 'Alita-extensions' ),
					'param_name'	=> 'tab_title_3',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Tab #3 Content, Show :', 'Alita-extensions' ),
					'param_name'	=> 'tab_content_3',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Product IDs', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Products Shortcode', 'Alita-extensions' ),
					'param_name' => 'product_id_3',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Category Slug', 'Alita-extensions' ),
					'description' => esc_html__( 'This will only for Product Category Shortcode', 'Alita-extensions' ),
					'param_name' => 'category_3',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
			        'heading' => esc_html__( 'Enter Product Items', 'Alita-extensions' ),
			        'param_name' => 'product_items',
			        'holder' => 'div'
		      	),

		      	array(
					'type' => 'textfield',
			        'heading' => esc_html__( 'Enter Product Columns', 'Alita-extensions' ),
			        'param_name' => 'product_columns',
			        'holder' => 'div'
		      	),

		      	array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Header Align', 'Alita-extensions' ),
					'param_name'	=> 'nav_align',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 	=> '',
						esc_html__( 'Center', 'Alita-extensions' )	=> 'center',
						esc_html__( 'Left', 'Alita-extensions' )		=> 'left',
						esc_html__( 'Right', 'Alita-extensions' )		=> 'right',
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(0 - 479)', 'Alita-extensions' ),
					'param_name' => 'items_0',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(480 - 767)', 'Alita-extensions' ),
					'param_name' => 'items_480',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(768 - 991)', 'Alita-extensions' ),
					'param_name' => 'items_768',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_992',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(1200 - 1440)', 'Alita-extensions' ),
					'param_name' => 'items_1200',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			),
		)
	);

	vc_map(
		array(
			'name'				=> esc_html__( 'Product Carousel Tabs', 'Alita-extensions' ),
			'base'  			=> 'Alita_products_tabs_carousel',
			'description'		=> esc_html__( 'Add Product Carousel Tabs to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'params' 			=> array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Header Align', 'Alita-extensions' ),
					'param_name'	=> 'nav_align',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' ) 	=> '',
						esc_html__( 'Center', 'Alita-extensions' )	=> 'center',
						esc_html__( 'Left', 'Alita-extensions' )		=> 'left',
						esc_html__( 'Right', 'Alita-extensions' )		=> 'right',
					),
				),
				
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
							'param_name'	=> 'shortcode_tag',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )				=> '',
								esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
								esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
								esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
								esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
								esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
								esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
								esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
								esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
							'param_name'	=> 'per_page',
							'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order By', 'Alita-extensions' ),
							'param_name'	=> 'orderby',
							'description'	=> esc_html__('Enter orderby.', 'Alita-extensions'),
							'value'			=> 'date'
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
							'param_name'	=> 'order',
							'description'	=> esc_html__('Enter order.', 'Alita-extensions'),
							'value'			=> 'desc'
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
							'param_name'	=> 'products_choice',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )		=> '',
								esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
								esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
							'param_name'	=> 'product_id',
							'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
							'param_name'	=> 'category',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
							'param_name'	=> 'cat_operator',
							'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
							'param_name'	=> 'attribute',
							'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
							'param_name'	=> 'terms',
							'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
							'param_name'	=> 'terms_operator',
							'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Cards Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Products Cards Carousel', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_cards_carousel',
			'description' => esc_html__( 'Add products cards carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'	  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Rows', 'Alita-extensions' ),
					'param_name' => 'rows',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name' => 'columns',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Products Wide Layout Columns', 'Alita-extensions' ),
					'param_name' => 'product_columns_wide',
					'holder' => 'div',
					'description' => esc_html__( 'Option only works if Wide Alita Layout enabled.', 'Alita-extensions' ),
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_carousel_nav',
					'heading' => esc_html__( 'Show Carousel Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_top_text',
					'heading' => esc_html__( 'Show Top Text', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_categories',
					'heading' => esc_html__( 'Show Categories', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),

			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Products Carousel', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_carousel',
			'description' => esc_html__( 'Add products carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_custom_nav',
					'heading' => esc_html__( 'Show Custom Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Products Wide Layout Columns', 'Alita-extensions' ),
					'param_name'	=> 'product_columns_wide',
					'description'	=> esc_html__('Option only works if Wide Alita Layout enabled.', 'Alita-extensions'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(0 - 479)', 'Alita-extensions' ),
					'param_name' => 'items_0',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(480 - 767)', 'Alita-extensions' ),
					'param_name' => 'items_480',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(768 - 991)', 'Alita-extensions' ),
					'param_name' => 'items_768',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_992',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(1200 - 1429)', 'Alita-extensions' ),
					'param_name' => 'items_1200',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Next Text', 'Alita-extensions' ),
					'param_name' => 'nav_next',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Prev Text', 'Alita-extensions' ),
					'param_name' => 'nav_prev',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Carousel 1
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Products Carousel 1', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_carousel_1',
			'description' => esc_html__( 'Add products carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Text', 'Alita-extensions' ),
					'param_name' => 'button_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Link', 'Alita-extensions' ),
					'param_name' => 'button_link',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div',
					'value'			=>  'trending-products-carousel'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Carousel With Timer
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Products Carousel With Timer', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_carousel_with_timer',
			'description' => esc_html__( 'Add products carousel with timer to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'header_timer',
					'heading' => esc_html__( 'Show Header Timer', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_title',
					'heading'		=> esc_html__('Timer Title', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_value',
					'heading'		=> esc_html__('Timer Value', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Text', 'Alita-extensions' ),
					'param_name' => 'button_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Link', 'Alita-extensions' ),
					'param_name' => 'button_link',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div',
					'value'			=>  'products-carousel-with-timer'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Brands Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Brands Carousel', 'Alita-extensions' ),
			'base' => 'Alita_brands_carousel',
			'description' => esc_html__( 'Add brands carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Brands to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Brands does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'include',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product List Categories
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Product List Categories', 'Alita-extensions' ),
			'base' => 'Alita_product_list_categories',
			'description' => esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'slugs',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'include',
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Categories Block
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Categories Block', 'Alita-extensions' ),
			'base'			=> 'Alita_product_categories_block',
			'description'	=> esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name'	=> 'title',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name'	=> 'limit',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'checkbox',
					'param_name'	=> 'has_no_products',
					'heading'		=> esc_html__( 'Have no products', 'Alita-extensions' ),
					'description'	=> esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value'			=> array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
					'value'			=> 'date',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
					'value'			=> 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name'	=> 'slugs',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name'	=> 'include',
					'holder'		=> 'div'
				),
				array(
					'type' 			=> 'checkbox',
					'param_name' 	=> 'enable_full_width',
					'heading' 		=> esc_html__( 'Enable Fullwidth', 'Alita-extensions' ),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Category Icons Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Category Icons Carousel Block', 'Alita-extensions' ),
			'base'			=> 'Alita_home_category_icon_carousel',
			'description'	=> esc_html__( 'Add product category icons carousel to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name'	=> 'limit',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'checkbox',
					'param_name'	=> 'has_no_products',
					'heading'		=> esc_html__( 'Have no products', 'Alita-extensions' ),
					'description'	=> esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value'			=> array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
					'value'			=> 'date',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
					'value'			=> 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name'	=> 'slugs',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name'	=> 'include',
					'holder'		=> 'div'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(0 - 479)', 'Alita-extensions' ),
					'param_name' => 'items_0',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(480 - 767)', 'Alita-extensions' ),
					'param_name' => 'items_480',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(768 - 991)', 'Alita-extensions' ),
					'param_name' => 'items_768',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_992',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Carousel Tabs with Deal
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Product Carousel Tabs with Deal', 'Alita-extensions' ),
			'base'  			=> 'Alita_products_tabs_carousel_with_deal',
			'description'		=> esc_html__( 'Add Product Carousel Tabs with deal to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'params' 			=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Title', 'Alita-extensions' ),
					'param_name' => 'section_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Text', 'Alita-extensions' ),
					'param_name' => 'button_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Link', 'Alita-extensions' ),
					'param_name' => 'button_link',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Deal title', 'Alita-extensions' ),
					'param_name' => 'deal_title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'deal_show_savings',
					'heading' => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Show Savings', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Savings in', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Amount', 'Alita-extensions' ) => 'amount',
						esc_html__( 'Percentage', 'Alita-extensions' ) => 'percentage'
					),
					'param_name'	=> 'deal_savings_in',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Savings Text', 'Alita-extensions' ),
					'param_name' => 'deal_savings_text',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Recent', 'Alita-extensions' ) => 'recent',
						esc_html__( 'Random', 'Alita-extensions' ) => 'random',
						esc_html__( 'Specific', 'Alita-extensions' ) => 'specific'
					),
					'param_name'	=> 'deal_product_choice',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Product ID', 'Alita-extensions' ),
					'param_name' => 'deal_product_id',
					'holder' => 'div'
				),
				
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
							'param_name'	=> 'shortcode_tag',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )				=> '',
								esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
								esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
								esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
								esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
								esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
								esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
								esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
								esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order By', 'Alita-extensions' ),
							'param_name'	=> 'orderby',
							'description'	=> esc_html__('Enter orderby.', 'Alita-extensions'),
							'value'			=> 'date'
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
							'param_name'	=> 'order',
							'description'	=> esc_html__('Enter order.', 'Alita-extensions'),
							'value'			=> 'desc'
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
							'param_name'	=> 'products_choice',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )		=> '',
								esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
								esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
							'param_name'	=> 'product_id',
							'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
							'param_name'	=> 'category',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
							'param_name'	=> 'cat_operator',
							'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
							'param_name'	=> 'attribute',
							'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
							'param_name'	=> 'terms',
							'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
							'param_name'	=> 'terms_operator',
							'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
					'value' => 20,
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Rows', 'Alita-extensions' ),
					'param_name' => 'rows',
					'holder' => 'div',
					'value' => 2,
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name' => 'columns',
					'holder' => 'div',
					'value' => 5,
				),
				
				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Categories List
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Categories List', 'Alita-extensions' ),
			'base'			=> 'Alita_product_categories_list',
			'description'	=> esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name'	=> 'limit',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'checkbox',
					'param_name'	=> 'has_no_products',
					'heading'		=> esc_html__( 'Have no products', 'Alita-extensions' ),
					'description'	=> esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value'			=> array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
					'value'			=> 'date',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
					'value'			=> 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name'	=> 'slugs',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name'	=> 'include',
					'holder'		=> 'div'
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Deals Products Block
	#-----------------------------------------------------------------
	
	vc_map(
		array(
			'name'			=> esc_html__( 'Deals Products Block', 'Alita-extensions' ),
			'base'			=> 'Alita_deal_products_block',
			'description'	=> esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
					'value'			=> '6',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
					'value'			=> '3',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products One Two Block
	#-----------------------------------------------------------------
	
	vc_map(
		array(
			'name'			=> esc_html__( 'Products 1-2 Block', 'Alita-extensions' ),
			'base'			=> 'Alita_products_1_2_block',
			'description'	=> esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Catgories List With Header Image 
	#-----------------------------------------------------------------
	
	vc_map(
		array(
			'name'			=> esc_html__( 'Product Catgories List With Header Image ', 'Alita-extensions' ),
			'base'			=> 'Alita_product_categories_list_with_header',
			'description'	=> esc_html__( 'Add product categories to your page.', 'Alita-extensions' ),
			'class'			=> '',
			'controls'		=> 'full',
			'icon'			=> 'vc-el-element-icon',
			'category'		=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'		=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter Subtitle', 'Alita-extensions' ),
					'param_name' => 'sub_title',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Background Image', 'Alita-extensions' ),
					'param_name' 	=> 'bg_image',
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_header',
					'heading' => esc_html__( 'Enable Header', 'Alita-extensions' ),
					'description' => esc_html__( 'Show header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name'	=> 'limit',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'checkbox',
					'param_name'	=> 'has_no_products',
					'heading'		=> esc_html__( 'Have no products', 'Alita-extensions' ),
					'description'	=> esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value'			=> array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name'	=> 'orderby',
					'description'	=> esc_html__( ' Sort retrieved posts by parameter. Defaults to \'name\'. One or more options can be passed', 'Alita-extensions' ),
					'value'			=> 'date',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
					'param_name'	=> 'order',
					'description'	=> esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'ASC\'.', 'Alita-extensions' ),
					'value'			=> 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name'	=> 'slugs',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name'	=> 'include',
					'holder'		=> 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Header Version', 'Alita-extensions' ),
					'param_name'	=> 'type',
					'value'			=> array(
						esc_html__( 'Type 1', 'Alita-extensions' )		=> 'v1' ,
						esc_html__( 'Type 2', 'Alita-extensions' )		=> 'v2' 	,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product 2-1-2 Grid
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Product 2-1-2 Grid', 'Alita-extensions' ),
			'base' => 'Alita_products_2_1_2',
			'description' => esc_html__( 'Add products to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product 6-1 Grid
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Product 6-1 Grid', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_6_1',
			'description' => esc_html__( 'Add products to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products 6-1 with categories
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Products 6-1 with Categories', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_6_1_with_categories',
			'description' => esc_html__( 'Add products 6-1 with vertical categories to your page.', 'Alita-extensions' ),
			'class'	=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Featured Product Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'featured_shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
					),
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Featured Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'featured_products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
					'description'	=> esc_html__('Only for Products Shortcode.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Featured Product ID', 'Alita-extensions'),
					'param_name'	=> 'featured_product_id',
					'description'	=> esc_html__('Enter ID/SKU. Only for Products Shortcode.', 'Alita-extensions'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Vertical Categories to display', 'Alita-extensions' ),
					'param_name' => 'vcat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'vcat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'vcat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'vcat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'vcat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'vcat_slugs',
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products with categories and image
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Products with Categories and Image', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_with_category_image',
			'description' => esc_html__( 'Add products with vertical categories and image to your page.', 'Alita-extensions' ),
			'class'	=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Products Wide Layout Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns_wide',
					'description'	=> esc_html__('Option only works if Wide Alita Layout enabled.', 'Alita-extensions'),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Vertical Categories to display', 'Alita-extensions' ),
					'param_name' => 'vcat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'vcat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'vcat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'vcat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'vcat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'vcat_slugs',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
					'param_name' 	=> 'image',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Action Link', 'Alita-extensions' ),
					'param_name' => 'img_action_link',
					'holder' => 'div'
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Onsale Product
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Onsale Product', 'Alita-extensions' ),
			'base' => 'Alita_vc_product_onsale',
			'description' => esc_html__( 'Add onsale product to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'show_savings',
					'heading' => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Show Savings', 'Alita-extensions' ) => 'true'
					)
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Savings in', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Amount', 'Alita-extensions' ) => 'amount',
						esc_html__( 'Percentage', 'Alita-extensions' ) => 'percentage'
					),
					'param_name'	=> 'savings_in',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Savings Text', 'Alita-extensions' ),
					'param_name' => 'savings_text',
					'holder' => 'div'
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Recent', 'Alita-extensions' ) => 'recent',
						esc_html__( 'Random', 'Alita-extensions' ) => 'random',
						esc_html__( 'Specific', 'Alita-extensions' ) => 'specific'
					),
					'param_name'	=> 'product_choice',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Product ID', 'Alita-extensions' ),
					'param_name' => 'product_id',
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Onsale Product Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Onsale Products Carousel', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_onsale_carousel',
			'description' => esc_html__( 'Add onsale products carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_savings',
					'heading' => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Show Savings', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Savings in', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Amount', 'Alita-extensions' ) => 'amount',
						esc_html__( 'Percentage', 'Alita-extensions' ) => 'percentage'
					),
					'param_name'	=> 'savings_in',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Savings Text', 'Alita-extensions' ),
					'param_name' => 'savings_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Recent', 'Alita-extensions' ) => 'recent',
						esc_html__( 'Random', 'Alita-extensions' ) => 'random',
						esc_html__( 'Specific', 'Alita-extensions' ) => 'specific'
					),
					'param_name'	=> 'product_choice',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Product ID', 'Alita-extensions' ),
					'param_name' => 'product_id',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_custom_nav',
					'heading' => esc_html__( 'Show Custom Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_progress',
					'heading' => esc_html__( 'Show Progress', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_timer',
					'heading' => esc_html__( 'Show Timer', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'show_cart_btn',
					'heading' => esc_html__( 'Show Cart Button', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Next Text', 'Alita-extensions' ),
					'param_name' => 'nav_next',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Prev Text', 'Alita-extensions' ),
					'param_name' => 'nav_prev',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Carousel with Category Tabs
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Alita Products Carousel with Category Tabs', 'Alita-extensions' ),
			'base'				=> 'Alita_vc_products_carousel_with_category_tabs',
			'description'		=> esc_html__( 'Add products 6-1 with vertical categories to your page.', 'Alita-extensions' ),
			'class'				=> '',
			'controls'			=> 'full',
			'icon'				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'			=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
					'value'			=> '6',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'description' => esc_html__( 'Enter IDs of Categories to display', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'description' => esc_html__( 'Enter slug of Categories to display', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products List Block
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Alita Products List Block', 'Alita-extensions' ),
			'base'				=> 'Alita_vc_products_list',
			'description'		=> esc_html__( 'Add Products list to your page.', 'Alita-extensions' ),
			'class'				=> '',
			'controls'			=> 'full',
			'icon'				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'			=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Type', 'Alita-extensions' ),
					'param_name'	=> 'type',
					'value'			=> array(
						esc_html__( 'v1',   'Alita-extensions')	=> 'v1',
						esc_html__( 'v2', 	'Alita-extensions')	=> 'v2'
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Text', 'Alita-extensions' ),
					'param_name' => 'action_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Link', 'Alita-extensions' ),
					'param_name' => 'action_link',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
					'value'			=> '6',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'description' => esc_html__( 'Enter IDs of Categories to display', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'description' => esc_html__( 'Enter slug of Categories to display', 'Alita-extensions' ),
					'holder' => 'div'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Product Carousel Tabs 1 Element
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Product Carousel Tabs 1', 'Alita-extensions' ),
			'base'  			=> 'Alita_products_tabs_carousel_1',
			'description'		=> esc_html__( 'Add Product Carousel Tabs to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'params' 			=> array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'section_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Text', 'Alita-extensions' ),
					'param_name' => 'button_text',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Action Link', 'Alita-extensions' ),
					'param_name' => 'button_link',
					'holder' => 'div'
				),
				
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
							'param_name'	=> 'shortcode_tag',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )				=> '',
								esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
								esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
								esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
								esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
								esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
								esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
								esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
								esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
							'param_name'	=> 'per_page',
							'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order By', 'Alita-extensions' ),
							'param_name'	=> 'orderby',
							'description'	=> esc_html__('Enter orderby.', 'Alita-extensions'),
							'value'			=> 'date'
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
							'param_name'	=> 'order',
							'description'	=> esc_html__('Enter order.', 'Alita-extensions'),
							'value'			=> 'desc'
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
							'param_name'	=> 'products_choice',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )		=> '',
								esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
								esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
							'param_name'	=> 'product_id',
							'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
							'param_name'	=> 'category',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
							'param_name'	=> 'cat_operator',
							'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
							'param_name'	=> 'attribute',
							'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
							'param_name'	=> 'terms',
							'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
							'param_name'	=> 'terms_operator',
							'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
				
				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Deal Products Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Deal Products Carousel', 'Alita-extensions' ),
			'base' => 'Alita_vc_deal_products_carousel',
			'description' => esc_html__( 'Add deal products carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter deal header title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'header_timer',
					'heading' => esc_html__( 'Show Header Timer', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_value',
					'heading'		=> esc_html__('Timer Value', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_title',
					'heading'		=> esc_html__('Timer Title', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'deal_percentage',
					'heading'		=> esc_html__('Deal Percentage value', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_nav',
					'heading' => esc_html__( 'Carousel: Show Navigation', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Next Text', 'Alita-extensions' ),
					'param_name' => 'nav_next',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Nav Prev Text', 'Alita-extensions' ),
					'param_name' => 'nav_prev',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Margin', 'Alita-extensions' ),
					'param_name' => 'margin',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Deals and Products Tabs
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Deal and Products Tabs', 'Alita-extensions' ),
			'base' => 'Alita_vc_deal_and_product_tab',
			'description' => esc_html__( 'Add deal and products tabs to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'deal_title',
					'holder' => 'div'
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'deal_show_savings',
					'heading' => esc_html__( 'Show Savings Details', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Show Savings', 'Alita-extensions' ) => 'true'
					)
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Savings in', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Amount', 'Alita-extensions' ) => 'amount',
						esc_html__( 'Percentage', 'Alita-extensions' ) => 'percentage'
					),
					'param_name'	=> 'deal_savings_in',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Savings Text', 'Alita-extensions' ),
					'param_name' => 'deal_savings_text',
					'holder' => 'div'
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'value' 		=> array(
						esc_html__( 'Recent', 'Alita-extensions' ) => 'recent',
						esc_html__( 'Random', 'Alita-extensions' ) => 'random',
						esc_html__( 'Specific', 'Alita-extensions' ) => 'specific'
					),
					'param_name'	=> 'deal_product_choice',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Product ID', 'Alita-extensions' ),
					'param_name' => 'deal_product_id',
					'holder' => 'div'
				),
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('Tabs', 'Alita-extensions' ),
					'param_name' => 'tabs',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
							'description'	=> esc_html__('Enter title.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
							'param_name'	=> 'shortcode_tag',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )				=> '',
								esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
								esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
								esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
								esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
								esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
								esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
								esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
								esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
							'param_name'	=> 'product_limit',
							'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
							'param_name'	=> 'columns',
							'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Wide Layout Limit', 'Alita-extensions' ),
							'param_name'	=> 'product_limit_wide',
							'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
						),
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order By', 'Alita-extensions' ),
							'param_name'	=> 'orderby',
							'description'	=> esc_html__('Enter orderby.', 'Alita-extensions'),
							'value'			=> 'date'
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Order', 'Alita-extensions' ),
							'param_name'	=> 'order',
							'description'	=> esc_html__('Enter order.', 'Alita-extensions'),
							'value'			=> 'desc'
						),
						
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
							'param_name'	=> 'products_choice',
							'value'			=> array(
								esc_html__( 'Select', 'Alita-extensions' )		=> '',
								esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
								esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
							),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
							'param_name'	=> 'product_id',
							'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
							'param_name'	=> 'category',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
							'param_name'	=> 'cat_operator',
							'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
							'param_name'	=> 'attribute',
							'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
							'param_name'	=> 'terms',
							'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
						),
						
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
							'param_name'	=> 'terms_operator',
							'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
							'value'			=> 'IN',
						),
					)
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Tab Products Wide Layout Columns', 'Alita-extensions' ),
					'param_name'	=> 'product_columns_wide',
					'description'	=> esc_html__('Enter the number of tap products wide layout columns to display.', 'Alita-extensions'),
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita List Categories Menus
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'List Categories Menus', 'Alita-extensions' ),
			'base'				=> 'Alita_product_categories_menu_list',
			'description'		=> esc_html__( 'Add List Categories Menus to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Section Title', 'Alita-extensions' ),
					'param_name'	=> 'section_title',
				),
				array(
					'type' 		 => 'param_group',
					'value' 	 => '',
					'heading'	 => esc_html__('List Categories Menus', 'Alita-extensions' ),
					'param_name' => 'list_categories',
					'params' 	 => array(
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__('Title', 'Alita-extensions' ),
							'param_name'	=> 'title',
						),

						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Category Slug', 'Alita-extensions' ),
							'param_name'	=> 'slugs',
							'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
						),

						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
							'param_name' => 'orderby',
							'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
							'value' => 'date',
						),

						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Order', 'Alita-extensions' ),
							'param_name' => 'order',
							'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
							'value' => 'DESC',
						),

						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Number of categories to display', 'Alita-extensions' ),
							'param_name' => 'limit',
							'holder' => 'div'
						),

						array(
							'type' => 'checkbox',
							'param_name' => 'cat_has_no_products',
							'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
							'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
							'value' => array(
								esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
							)
						),
					)
				),

				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div'
				)
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Nav Menu
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Nav Menu', 'Alita-extensions' ),
			'base' => 'Alita_nav_menu',
			'description' => esc_html__( 'Add a navigation menu to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Title', 'Alita-extensions' ),
					'param_name' 	=> 'title',
					'description' 	=> esc_html__( 'Enter the title of menu.', 'Alita-extensions' ),
					'holder' 		=> 'div'
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Menu', 'Alita-extensions' ),
					'value' 		=> $nav_menus_option,
					'param_name'	=> 'menu',
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Recently Viewed Products
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'				=> esc_html__( 'Recently Viewed Products Block', 'Alita-extensions' ),
			'base'				=> 'Alita_recent_viewed_products',
			'description'		=> esc_html__( 'Add Recently Viewed Products Block to your page.', 'Alita-extensions' ),
			'category'			=> esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'icon'				=> 'vc-el-element-icon',
			'params' 		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Section Title', 'Alita-extensions' ),
					'param_name'	=> 'section_title',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
				),
			),
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Carousel Category with Image
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Products Carousel Category with Image', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_carousel_category_with_image',
			'description' => esc_html__( 'Add products carousel category with image to your page.', 'Alita-extensions' ),
			'class'	=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
					'param_name' 	=> 'image',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Action Link', 'Alita-extensions' ),
					'param_name' => 'img_action_link',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'description',
					'heading' => esc_html__( 'Enable Description', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Description on the products.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(0 - 479)', 'Alita-extensions' ),
					'param_name' => 'items_0',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(480 - 767)', 'Alita-extensions' ),
					'param_name' => 'items_480',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(768 - 991)', 'Alita-extensions' ),
					'param_name' => 'items_768',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items(992 - 1199)', 'Alita-extensions' ),
					'param_name' => 'items_992',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Products Category with Image
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Products Category with Image', 'Alita-extensions' ),
			'base' => 'Alita_vc_products_category_with_image',
			'description' => esc_html__( 'Add products category with image to your page.', 'Alita-extensions' ),
			'class'	=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'enable_categories',
					'heading' => esc_html__( 'Enable Header Categories', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories list on header block.', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter categories title', 'Alita-extensions' ),
					'param_name' => 'categories_title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Categories to display', 'Alita-extensions' ),
					'param_name' => 'cat_limit',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'cat_has_no_products',
					'heading' => esc_html__( 'Have no products', 'Alita-extensions' ),
					'description' => esc_html__( 'Show Categories does not have products', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'cat_orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'cat_order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include ID\'s', 'Alita-extensions' ),
					'param_name' => 'cat_include',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Include slug\'s', 'Alita-extensions' ),
					'param_name' => 'cat_slugs',
					'holder' => 'div'
				),

				array(
					'type' 			=> 'attach_image',
					'heading' 		=> esc_html__( 'Image', 'Alita-extensions' ),
					'param_name' 	=> 'image',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Action Link', 'Alita-extensions' ),
					'param_name' => 'img_action_link',
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns Wide', 'Alita-extensions' ),
					'param_name'	=> 'columns_wide',
					'description'	=> esc_html__('Option only works if Wide Alita Layout enabled.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div',
					'value'			=>  ''
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Recent Viewed Products Carousel
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Recent Viewed Products Carousel', 'Alita-extensions' ),
			'base' => 'Alita_vc_recent_viewed_products_carousel',
			'description' => esc_html__( 'Add recent viewed products carousel to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Carousel: Items', 'Alita-extensions' ),
					'param_name' => 'items',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_dots',
					'heading' => esc_html__( 'Carousel: Show Dots', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_touchdrag',
					'heading' => esc_html__( 'Carousel: Enable Touch Drag', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'is_autoplay',
					'heading' => esc_html__( 'Carousel: Autoplay', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Enter class name', 'Alita-extensions' ),
					'param_name'	=> 'el_class',
					'holder'		=> 'div',
					'value'			=>  'recently-viewed-products-carousel'
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Two Row Products
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Two Row Products', 'Alita-extensions' ),
			'base' => 'Alita_vc_two_row_products',
			'description' => esc_html__( 'Add two row products to your page.', 'Alita-extensions' ),
			'class'	=> '',
			'controls' => 'full',
			'icon' => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Limit', 'Alita-extensions' ),
					'param_name'	=> 'per_page',
					'description'	=> esc_html__('Enter the number of products to display.', 'Alita-extensions'),
					'value'			=> 12,
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns', 'Alita-extensions' ),
					'param_name'	=> 'columns',
					'description'	=> esc_html__('Enter the number of columns to display.', 'Alita-extensions'),
					'value'			=> 6,
				),

				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Columns Wide', 'Alita-extensions' ),
					'param_name'	=> 'columns_wide',
					'description'	=> esc_html__('Option only works if Wide Alita Layout enabled.', 'Alita-extensions'),
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Vertical Nav Menu
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Vertical Nav Menu', 'Alita-extensions' ),
			'base' => 'Alita_vertical_nav_menu',
			'description' => esc_html__( 'Add a verical navigation menu to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Title', 'Alita-extensions' ),
					'param_name' 	=> 'title',
					'description' 	=> esc_html__( 'Enter the title of menu.', 'Alita-extensions' ),
					'holder' 		=> 'div'
				),
				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__('Action Text', 'Alita-extensions' ),
					'param_name'	=> 'action_text',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Action Link', 'Alita-extensions' ),
					'param_name'	=> 'action_link',
				),
				array(
					'type' 			=> 'dropdown',
					'heading'		=> esc_html__( 'Menu', 'Alita-extensions' ),
					'value' 		=> $nav_menus_option,
					'param_name'	=> 'menu',
				),
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Team Member
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Team Member', 'Alita-extensions' ),
			'base' => 'Alita_team_member',
			'description' => esc_html__( 'Add a team member profile to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					 'type' 		=> 'textfield',
			         'heading' 		=> esc_html__( 'Full Name', 'Alita-extensions' ),
			         'param_name' 	=> 'name',
			         'description' 	=> esc_html__( 'Enter team member full name', 'Alita-extensions' ),
			         'holder' 		=> 'div'
		      	),
		      	array(
					 'type' 		=> 'textfield',
			         'heading' 		=> esc_html__( 'Designation', 'Alita-extensions' ),
			         'param_name' 	=> 'designation',
			         'description' 	=> esc_html__( 'Enter designation of team member', 'Alita-extensions'),
		      	),
		      	array(
					'type' 			=> 'attach_image',
		         	'heading' 		=> esc_html__( 'Profile Pic', 'Alita-extensions' ),
		         	'param_name' 	=> 'profile_pic',
		      	),
		      	array(
		      		'type' 			=> 'dropdown',
		      		'heading'		=> esc_html__( 'Display Style', 'Alita-extensions' ),
		      		'value' 		=> array(
		      			esc_html__( 'Square', 'Alita-extensions' ) => 'square',
		      			esc_html__( 'Circle', 'Alita-extensions' ) => 'circle'
	      			),
	      			'param_name'	=> 'display_style',
	      		),
	      		array(
	      			'type' 			=> 'textfield',
		         	'class' 		=> '',
		         	'heading' 		=> esc_html__( 'Link', 'Alita-extensions' ),
		         	'param_name' 	=> 'link',
		         	'description' 	=> esc_html__( 'Add link to the team member. Leave blank if there aren\'t any', 'Alita-extensions' )
	  			),
		      	array(
					'type' 			=> 'textfield',
		         	'class' 		=> '',
		         	'heading' 		=> esc_html__( 'Extra Class', 'Alita-extensions' ),
		         	'param_name' 	=> 'el_class',
		         	'description' 	=> esc_html__( 'Add your extra classes here.', 'Alita-extensions' )
		      	),
		    )
		)
	);

	#-----------------------------------------------------------------
	# Alita Terms
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name'        => esc_html__( 'Alita Terms', 'Alita-extensions' ),
			'base'        => 'Alita_terms',
			'description' => esc_html__( 'Adds a shortcode for get_terms. Used to get terms including categories, product categories, etc.', 'Alita-extensions' ),
			'class'		  => '',
			'controls'    => 'full',
			'icon'    	  => 'vc-el-element-icon',
			'category'    => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params'      => array(
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Taxonomy', 'Alita-extensions' ),
					'param_name'   => 'taxonomy',
					'description'  => esc_html__( 'Taxonomy name, or comma-separated taxonomies, to which results should be limited.', 'Alita-extensions' ),
					'value'        => 'category',
					'holder'       => 'div'
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Order By', 'Alita-extensions' ),
					'param_name'   => 'orderby',
					'description'  => esc_html__( 'Field(s) to order terms by. Accepts term fields (\'name\', \'slug\', \'term_group\', \'term_id\', \'id\', \'description\'). Defaults to \'name\'.', 'Alita-extensions' ),
					'value'        => 'name'
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name'   => 'order',
					'description'  => esc_html__( 'Whether to order terms in ascending or descending order. Accepts \'ASC\' (ascending) or \'DESC\' (descending). Default \'ASC\'.', 'Alita-extensions' ),
					'value'        => 'ASC'
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Hide Empty ?', 'Alita-extensions' ),
					'param_name'   => 'hide_empty',
					'description'  => esc_html__( 'Whether to hide terms not assigned to any posts. Accepts 1 or 0. Default 0.', 'Alita-extensions' ),
					'value'        => '0'
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Include IDs', 'Alita-extensions' ),
					'param_name'   => 'include',
					'description'  => esc_html__( 'Comma-separated string of term ids to include.', 'Alita-extensions' ),
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Exclude IDs', 'Alita-extensions' ),
					'param_name'   => 'exclude',
					'description'  => esc_html__( 'Comma-separated string of term ids to exclude. If Include is non-empty, Exclude is ignored.', 'Alita-extensions' ),
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Number', 'Alita-extensions' ),
					'param_name'   => 'number',
					'description'  => esc_html__( 'Maximum number of terms to return. Accepts 0 (all) or any positive number. Default 0 (all).', 'Alita-extensions' ),
					'value'        => '0',
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Offset', 'Alita-extensions' ),
					'param_name'   => 'offset',
					'description'  => esc_html__( 'The number by which to offset the terms query.', 'Alita-extensions' ),
					'value'        => '0',
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Name', 'Alita-extensions' ),
					'param_name'   => 'name',
					'description'  => esc_html__( 'Name or comma-separated string of names to return term(s) for.', 'Alita-extensions' ),
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Slug', 'Alita-extensions' ),
					'param_name'   => 'slug',
					'description'  => esc_html__( 'Slug or comma-separated string of slugs to return term(s) for.', 'Alita-extensions' ),
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Hierarchical', 'Alita-extensions' ),
					'param_name'   => 'hierarchical',
					'description'  => esc_html__( 'Whether to include terms that have non-empty descendants. Accepts 1 (true) or 0 (false). Default 1 (true)', 'Alita-extensions' ),
					'value'        => '1',
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Child Of', 'Alita-extensions' ),
					'param_name'   => 'child_of',
					'description'  => esc_html__( 'Term ID to retrieve child terms of. If multiple taxonomies are passed, child_of is ignored. Default 0.', 'Alita-extensions' ),
					'value'        => '0',
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Include "Child Of" term ?', 'Alita-extensions' ),
					'param_name'   => 'include_parent',
					'description'  => esc_html__( 'Include "Child Of" term in the terms list. Accepts 1 (yes) or 0 (no). Default 1.', 'Alita-extensions' ),
					'value'        => '1',
				),
				array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Parent', 'Alita-extensions' ),
					'param_name'   => 'parent',
					'description'  => esc_html__( 'Parent term ID to retrieve direct-child terms of.', 'Alita-extensions' ),
					'value'        => '',
				)
			)
		)
	);

	#-----------------------------------------------------------------
	# Alita Mobile Deals product Block
	#-----------------------------------------------------------------
	vc_map(
		array(
			'name' => esc_html__( 'Alita Mobile Deals Product', 'Alita-extensions' ),
			'base' => 'Alita_vc_mobile_deal_products_with_featured',
			'description' => esc_html__( 'Add deal product with featured to your page.', 'Alita-extensions' ),
			'class'		=> '',
			'controls' => 'full',
			'icon'  => 'vc-el-element-icon',
			'admin_enqueue_js'	=> Alita_EXTENSIONS_URL . 'assets/js/vc-admin.js',
			'category' => esc_html__( 'Alita Elements', 'Alita-extensions' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Enter header title', 'Alita-extensions' ),
					'param_name' => 'title',
					'holder' => 'div'
				),

				array(
					'type' => 'checkbox',
					'param_name' => 'header_timer',
					'heading' => esc_html__( 'Show Header Timer', 'Alita-extensions' ),
					'value' => array(
						esc_html__( 'Allow', 'Alita-extensions' ) => 'true'
					)
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_value',
					'heading'		=> esc_html__('Timer Value', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'textfield',
					'param_name'	=> 'timer_title',
					'heading'		=> esc_html__('Timer Title', 'Alita-extensions' ),
					'holder' => 'div'
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Shortcode', 'Alita-extensions' ),
					'param_name'	=> 'shortcode_tag',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )				=> '',
						esc_html__( 'Featured Products', 'Alita-extensions' )		=> 'featured_products' ,
						esc_html__( 'On Sale Products', 'Alita-extensions' )		=> 'sale_products' 	,
						esc_html__( 'Top Rated Products', 'Alita-extensions' )	=> 'top_rated_products' ,
						esc_html__( 'Recent Products', 'Alita-extensions' )		=> 'recent_products' 	,
						esc_html__( 'Best Selling Products', 'Alita-extensions' )	=> 'best_selling_products',
						esc_html__( 'Products', 'Alita-extensions' )				=> 'products' ,
						esc_html__( 'Product Category', 'Alita-extensions' )		=> 'product_category' ,
						esc_html__( 'Product Attribute', 'Alita-extensions' )		=> 'product_attribute' ,
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of products to display', 'Alita-extensions' ),
					'param_name' => 'limit',
					'holder' => 'div'
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order by', 'Alita-extensions' ),
					'param_name' => 'orderby',
					'description' => esc_html__( ' Sort retrieved posts by parameter. Defaults to \'date\'. One or more options can be passed', 'Alita-extensions' ),
					'value' => 'date',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Order', 'Alita-extensions' ),
					'param_name' => 'order',
					'description' => esc_html__( 'Designates the ascending or descending order of the \'orderby\' parameter. Defaults to \'DESC\'.', 'Alita-extensions' ),
					'value' => 'DESC',
				),

				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Product Choice', 'Alita-extensions' ),
					'param_name'	=> 'products_choice',
					'value'			=> array(
						esc_html__( 'Select', 'Alita-extensions' )		=> '',
						esc_html__( 'IDs', 'Alita-extensions' )		=> 'ids' ,
						esc_html__( 'SKUs', 'Alita-extensions' )		=> 'skus' ,
					),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Product IDs or SKUs', 'Alita-extensions'),
					'param_name'	=> 'product_id',
					'description'	=> esc_html__('Enter IDs/SKUs spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category', 'Alita-extensions' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__('Enter slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Category Operator', 'Alita-extensions' ),
					'param_name'	=> 'cat_operator',
					'description'	=> esc_html__('Operator to compare categories. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Attribute', 'Alita-extensions' ),
					'param_name'	=> 'attribute',
					'description'	=> esc_html__('Enter single attribute slug.', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms', 'Alita-extensions' ),
					'param_name'	=> 'terms',
					'description'	=> esc_html__('Enter term slug spearate by comma(,).', 'Alita-extensions'),
				),
				
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Terms Operator', 'Alita-extensions' ),
					'param_name'	=> 'terms_operator',
					'description'	=> esc_html__('Operator to compare terms. Possible values are \'IN\', \'NOT IN\', \'AND\'.', 'Alita-extensions'),
					'value'			=> 'IN',
				),
			)
		)
	);


endif;
