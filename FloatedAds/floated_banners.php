<?php 
    /*
    Plugin Name: FloatedAds
    Plugin URI: http://www.intelaka.com/
    Description: Plugin for displaying floated banners ads on both sides of your website.
    Author: Alaa Salama
    Version: 1.0
    Author URI: http://www.alaadesign.com
    */

//include the main class file
	require_once("admin/flban_admin_framework.php");
  
//configure your admin page
	$config = array(    
		'menu'=> array('top' => 'floated-ads'),             //register the menu item settings
	    'page_title'     => __('FloatedAds','apc'),       //The name of this page 
	    'capability'     => 'edit_themes',         // The capability needed to view the page 
	    'option_group'   => 'flads_options',       //the name of the option to create in the database
	    'id'             => 'floated-ads',            // meta box id, unique per page
	    'fields'         => array(),            // list of fields (can be added by field arrays)
	    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
	    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);  

//instantiate your admin page
	$options_panel = new BF_Admin_Page_Class($config);
	$options_panel->OpenTabs_container('');

//define your admin page tabs listing
	$options_panel->TabsListing(array(
	    'links' => array(
	    	'left_banner' =>  __('Left Banner','apc'),
	    	'general' =>  __('General','apc'),
	    	'right_banner' =>  __('Right Content','apc'),
	    )
	));

//left banner
	$options_panel->OpenTab('left_banner');
		
		$options_panel->Title(__("Left Banner Options","apc"));

		//checkbox field
		$options_panel->addCheckbox('left_banner_active',array('name'=> __('Activate Left Banner Area','apc'), 'std' => true, 'desc' => __('Activate this option to display the left banner area','apc')));
		//checkbox field
		$options_panel->addCheckbox('left_banner_sticky',array('name'=> __('Activate Sticky Option','apc'), 'std' => false, 'desc' => __('Activate this option to display the banner in a sticky style','apc')));
		//is_numeric
		$options_panel->addText('left_banner_margin_right',
		    array(
		      'name'     => __('Right Margin','apc'),
		      'std'      => 0,
		      'desc'     => __("Enter numeric value of the right margin","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//is_numeric
		$options_panel->addText('left_banner_margin_top',
		    array(
		      'name'     => __('Top Margin','apc'),
		      'std'      => 0,
		      'desc'     => __("Enter numeric value of the top margin","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//image ad
		$left_banner_image_cond[] = $options_panel->addImage('left_banner_image',array('name'=> __('Upload Banner Image','apc')),true);
		//cusotm code ad
		$left_banner_code_cond[] = $options_panel->addTextarea('left_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
		//conditinal block 
		$options_panel->addCondition('conditinal_fields',
		      array(
		        'name'   => __('Use image banner?','apc'),
		        'fields' => $left_banner_image_cond,
		        'std'    => false
		));
		//conditinal block 
		$options_panel->addCondition('conditinal_fields',
		      array(
		        'name'   => __('Use custom code banner?','apc'),
		        'fields' => $left_banner_code_cond,
		        'std'    => false
		));
	$options_panel->CloseTab();

//main content
	$options_panel->OpenTab('general');
		
		$options_panel->Title(__("General Options","apc"));
		//is_numeric
		$options_panel->addText('main_content_width',
		    array(
		      'name'     => __('Enter your website main content width','apc'),
		      'std'      => 0,
		      'desc'     => __("Enter numeric value of the website container width","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//is_numeric
		$options_panel->addText('container_min_width',
		    array(
		      'name'     => __('Minimum browser window size to show the ads','apc'),
		      'std'      => 0,
		      'desc'     => __("Banners will disaplyed on any browser window size more than this number","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//checkbox field
		$options_panel->addCheckbox('show_on_mobile',array('name'=> __('Show Banners On Mobile Devices','apc'), 'std' => true, 'desc' => __('Activate this option to display the banners on mobile devices','apc')));
		//checkbox field
		$options_panel->addCheckbox('show_on_archive',array('name'=> __('Show Banners On Archives Pages','apc'), 'std' => false, 'desc' => __('Activate this option to display the banners in archives pages (caetgories, tags, etc...)','apc')));

	$options_panel->CloseTab();

//right banner

	$options_panel->OpenTab('right_banner');
		
		$options_panel->Title(__("Right Banner Options","apc"));

		//checkbox field
		$options_panel->addCheckbox('right_banner_active',array('name'=> __('Activate Right Banner Area','apc'), 'std' => true, 'desc' => __('Activate this option to display the Right banner area','apc')));
		//checkbox field
		$options_panel->addCheckbox('right_banner_sticky',array('name'=> __('Activate Sticky Option','apc'), 'std' => false, 'desc' => __('Activate this option to display the banner in a sticky style','apc')));
		//is_numeric
		$options_panel->addText('right_banner_margin_left',
		    array(
		      'name'     => __('Left Margin','apc'),
		      'std'      => 0,
		      'desc'     => __("Enter numeric value of the left margin","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//is_numeric
		$options_panel->addText('right_banner_margin_top',
		    array(
		      'name'     => __('Top Margin','apc'),
		      'std'      => 0,
		      'desc'     => __("Enter numeric value of the top margin","apc"),
		      'validate' => array(
		          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
		      )
		    )
		);
		//image ad
		$right_banner_image_cond[] = $options_panel->addImage('right_banner_image',array('name'=> __('Upload Banner Image','apc')),true);
		//cusotm code ad
		$right_banner_code_cond[] = $options_panel->addTextarea('right_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
		//conditinal block 
		$options_panel->addCondition('conditinal_fields',
		      array(
		        'name'   => __('Use image banner?','apc'),
		        'fields' => $right_banner_image_cond,
		        'std'    => false
		));
		//conditinal block 
		$options_panel->addCondition('conditinal_fields',
		      array(
		        'name'   => __('Use custom code banner?','apc'),
		        'fields' => $right_banner_code_cond,
		        'std'    => false
		));
	$options_panel->CloseTab();