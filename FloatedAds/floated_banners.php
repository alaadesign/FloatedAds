<?php 
	/*
		Plugin Name: FloatedAds
		Plugin URI: http://www.intelaka.com/
		Description: Plugin for displaying floated banners ads on both sides of your website.
		Author: Alaa Salama
		Version: 1.0
		Author URI: http://www.alaadesign.com
	*/

/* Admin Panel Section */

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

	//initiate your admin page
	$options_panel = new BF_Admin_Page_Class($config);
	$options_panel->OpenTabs_container('');

	//define your admin page tabs listing
	$options_panel->TabsListing(array(
	    'links' => array(
	    	'general' =>  __('General','apc'),
	    	'left_banner' =>  __('Left Banner','apc'),		    	
	    	'right_banner' =>  __('Right Content','apc'),
	    	'mobile_banner' =>  __('Mobile Banner','apc'),
	    )
	));

//general settings panel
	$options_panel->OpenTab('general');
	//title
	$options_panel->Title(__("General Settings","apc"));
	//theme content width
	$options_panel->addText('main_content_width',
		array(
			'name'     => __('Enter the width of your main website container','apc'),
			'std'      => 1220,
			'desc'     => __("Your banners will be positioned on the sides of this container width, use <a href='https://www.piliapp.com/measure-webpage/'>this tool</a> to help you measuring your website container width.","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
	);
	//minimum window width to display banners
	$options_panel->addText('container_min_width',
		array(
			'name'     => __('Minimum browser window size to show the banners','apc'),
			'std'      => 1000,
			'desc'     => __("Your banners will not be displayed on browser window less than this value, suitable to hide the banners on small screens","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
	);
	//margin top for banners
	$options_panel->addText('FloatedAds_margin_top',
		array(
			'name'     => __('Top Margin Adjustment','apc'),
			'std'      => 0,
			'desc'     => __("Enter numeric value of the top margin adjustment","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
	);
	//left margin from the main layout
	$options_panel->addText('FloatedAds_margin_left',
		array(
			'name'     => __('Left Margin Adjustment','apc'),
			'std'      => 0,
			'desc'     => __("Enter numeric value of the left margin adjustment","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
	);
	//right margin from the main layout
	$options_panel->addText('FloatedAds_margin_right',
		array(
			'name'     => __('Right Margin Adjustment','apc'),
			'std'      => 0,
			'desc'     => __("Enter numeric value of the right margin adjustment","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
	);
	//show banners on homepage checkbox
	$options_panel->addCheckbox('show_on_homepage',
		array(
			'name'=> __('Show banners on homeapge only','apc'),
			'std' => false,
			'desc' => __('Activate this option to show the banners on homepage only','apc')
		)
	);
	//end of general settings panel
	$options_panel->CloseTab();

//left banner settings panel
	$options_panel->OpenTab('left_banner');
	//title
	$options_panel->Title(__("Left Banner Settings","apc"));	
	//checkbox to check if left banner is active
	$options_panel->addCheckbox('left_banner_active',
		array(
			'name'=> __('Activate Left Banner Area','apc'),
			'std' => true, 
			'desc' => __('Activate this option to display the left banner area','apc')
		)
	);
	//checkbox to check if left banner is sticky
	$options_panel->addCheckbox('left_banner_sticky',
		array(
			'name'=> __('Activate Sticky Option','apc'),
			'std' => true,
			'desc' => __('Activate this option to display the banner in a sticky style','apc')
		)
	);
	//left banner image condition fields
	$left_banner_image_cond[] = $options_panel->addImage('left_banner_image',
		array('name'=> __('Upload banner image','apc'))
		,true
	);
	//left banner image condition fields
	$left_banner_image_cond[] = $options_panel->addText('left_banner_image_link',
		array(
			'name'=> __('Enter your banner image link','apc'),
			'std'      => '#',
			'desc'     => __("Add your banner image link, or keep it set to # in case you don't want to link your image anywhere!","apc"),
		)
		,true
	);
	//left banner code condition fields
	$left_banner_code_cond[] = $options_panel->addTextarea('left_banner_code',
		array(
			'name'=> __('Add your banner custom code','apc'),
			'std'=> __('You can use any banner code here including Google Adsense code', 'apc')
		)
		,true
	);
	//left banner code condition fields
	$left_banner_code_cond[] = $options_panel->addText('left_banner_code_width',
		array(
			'name'     => __('Your custom banner code width','apc'),
			'std'      => 160,
			'desc'     => __("Enter numeric value of the banner width","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '','message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//left banner code condition fields
	$left_banner_code_cond[] = $options_panel->addText('left_banner_code_height',
		array(
			'name'     => __('Your custom banner height','apc'),
			'std'      => 600,
			'desc'     => __("Enter numeric value of the banner height","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//conditinal check box for left banner image 
	$options_panel->addCondition('left_banner_image_state',
		array(
			'name'   => __('Use image banner?','apc'),
			'fields' => $left_banner_image_cond,
			'std'    => false,
		)
	);
	//conditinal check box for left banner code 
	$options_panel->addCondition('left_banner_code_state',
		array(
			'name'   => __('Use custom code banner?','apc'),
			'fields' => $left_banner_code_cond,
			'std'    => false,
		)
	);
	//end of left banner settings panel
	$options_panel->CloseTab();

//right banner settings panel
	$options_panel->OpenTab('right_banner');
	//title
	$options_panel->Title(__("Right Banner Settings","apc"));
	//checkbox to check if right banner is active
	$options_panel->addCheckbox('right_banner_active',
		array(
			'name'=> __('Activate Right Banner Area','apc'),
			'std' => true, 
			'desc' => __('Activate this option to display the Right banner area','apc')
		)
	);
	//checkbox to check if right banner is sticky
	$options_panel->addCheckbox('right_banner_sticky',
		array(
			'name'=> __('Activate Sticky Option','apc'), 
			'std' => false, 
			'desc' => __('Activate this option to display the banner in a sticky style','apc')
		)
	);
	//right banner image condition fields
	$right_banner_image_cond[] = $options_panel->addImage('right_banner_image',
		array('name'=> __('Upload banner image','apc'))
		,true
	);
	//right banner image condition fields
	$right_banner_image_cond[] = $options_panel->addText('right_banner_image_link',
		array(
			'name'     => __('Enter your banner image link','apc'),
			'std'      => '#',
			'desc'     => __("Add your banner image link, or keep it set to # in case you don't want to link your image anywhere!","apc"),
		)
		,true
	);
	//right banner code condition fields
	$right_banner_code_cond[] = $options_panel->addTextarea('right_banner_code',
		array(
			'name'=> __('Add your banner custom code','apc'),
			'std'=> __('You can use any banner code here including Google Adsense code', 'apc')
		)
		,true
	);
	//right banner code condition fields
	$right_banner_code_cond[] = $options_panel->addText('right_banner_code_width',
		array(
			'name'     => __('Your custom banner width','apc'),
			'std'      => 160,
			'desc'     => __("Enter numeric value of the banner width","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//right banner code condition fields
	$right_banner_code_cond[] = $options_panel->addText('right_banner_code_height',
		array(
			'name'     => __('Your custom banner height','apc'),
			'std'      => 600,
			'desc'     => __("Enter numeric value of the banner height","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//conditinal check box for right banner image
	$options_panel->addCondition('right_banner_image_state',
		array(
			'name'   => __('Use image banner?','apc'),
			'fields' => $right_banner_image_cond,
			'std'    => false,
		)
	);
	//conditinal check box for right banner code
	$options_panel->addCondition('right_banner_code_state',
		array(
			'name'   => __('Use custom code banner?','apc'),
			'fields' => $right_banner_code_cond,
			'std'    => false,
		)
	);
	//end of right banner settings panel
	$options_panel->CloseTab();

//mobile banner settings panel
	$options_panel->OpenTab('mobile_banner');
	//title
	$options_panel->Title(__("Mobile Banner Settings","apc"));
	//checkbox to check if mobile banner is active or not
	$options_panel->addCheckbox('show_mobile_banner',
		array(
			'name'=> __('Show Footer Banner on Mobile Devices','apc'),
			'std' => false, 
			'desc' => __('Activate this option to show footer banner on mobile devices including tablets','apc')
		)
	);
	//mobile banner image condition
	$mobile_banner_image_cond[] = $options_panel->addImage('mobile_banner_image',
		array('name'=> __('Upload banner image','apc'))
		,true
	);
	//mobile banner image condition
	$mobile_banner_image_cond[] = $options_panel->addText('mobile_banner_image_link',
		array(
			'name'     => __('Enter your banner image link','apc'),
			'std'      => '#',
			'desc'     => __("Add your banner image link, or keep it set to # in case you don't want to link your image anywhere!","apc"),
		)
		,true
	);
	//mobile banner code condition
	$mobile_banner_code_cond[] = $options_panel->addTextarea('mobile_banner_code',
		array(
			'name'=> __('Add your banner custom code','apc'),
			'std'=> __('You can use any banner code here including Google Adsense code', 'apc')
		)
		,true
	);
	//mobile banner code condition
	$mobile_banner_code_cond[] = $options_panel->addText('mobile_banner_code_width',
		array(
			'name'     => __('Your custom banner width','apc'),
			'std'      => 160,
			'desc'     => __("Enter numeric value of the banner width","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//mobile banner code condition
	$mobile_banner_code_cond[] = $options_panel->addText('mobile_banner_code_height',
		array(
			'name'     => __('Your custom banner height','apc'),
			'std'      => 600,
			'desc'     => __("Enter numeric value of the banner height","apc"),
			'validate' => array(
				'numeric' => array(
					'param' => '',
					'message' => __("must be numeric value","apc")
				)
			)
		)
		,true
	);
	//conditinal check box for mobile banner image
	$options_panel->addCondition('mobile_banner_image_state',
		array(
			'name'   => __('Use image banner?','apc'),
			'fields' => $mobile_banner_image_cond,
			'std'    => false,
		)
	);
	//conditinal check box for mobile banner code
	$options_panel->addCondition('mobile_banner_code_state',
		array(
			'name'   => __('Use custom code banner?','apc'),
			'fields' => $mobile_banner_code_cond,
			'std'    => false,
		)
	);
	//end of mobile banner panel settings
	$options_panel->CloseTab();

/*** end of admin panel section ***/

/*** front end implemntation ***/

	//register main function
	function FloatedAds_main(){
		//load the saved data from the data base
		$FloatedAds_data = get_option('flads_options');

		if($FloatedAds_data['left_banner_active'] || $FloatedAds_data['right_banner_active']){
			//include the script only if at least any of the banners is active
			add_action('wp_enqueue_scripts','FloatedAds_load_script');
			function FloatedAds_load_script() {
			    wp_enqueue_script( 'FloatedAds.js', plugins_url( '/js/FloatedAds.js', __FILE__ ));
			    wp_enqueue_style( 'FloatedAds.css', plugins_url( '/css/style.css', __FILE__ ));
			}
			add_action('wp_footer', 'FloatedAds_load_ads');			
		}	
	}

	//call the main fucntion
	add_action('init', 'FloatedAds_main');

	//load the banners
	function FloatedAds_load_ads(){
		//load the saved data from the data base
		$FloatedAds_data = get_option('flads_options');

		//check if the right banner is active
		if ($FloatedAds_data['right_banner_active'] == "1"){
			//check if the image option is active and there is an image assigned
			if (isset($FloatedAds_data['right_banner_image_state']['enabled']) && $FloatedAds_data['right_banner_image_state']['right_banner_image']['src']!=="") {
					$right_banner_url = $FloatedAds_data['right_banner_image_state']['right_banner_image']['src'];
					$right_banner_link = $FloatedAds_data['right_banner_image_state']['right_banner_image_link'];
					list($right_banner_width, $right_banner_height, $right_banner_type, $right_banner_attr) = getimagesize($right_banner_url);
					$right_banner_is_on = $right_banner_is_image = 1;
					$right_banner_is_code = 0;
					?>
					<script>
						var right_banner_on = <?php echo $right_banner_is_on; ?>;
						var right_banner_url = <?php echo json_encode($right_banner_url); ?>;
     				var right_banner_link = <?php echo json_encode($right_banner_link); ?>;
     				var RightBannerW = <?php echo $right_banner_width; ?>;
      			var RightBannerH = <?php echo $right_banner_height; ?>;
      			var right_banner_is_image_js = <?php echo $right_banner_is_image; ?>;
  					var right_banner_is_code_js = <?php echo $right_banner_is_code; ?>;
					</script>
					<?php
			}
			//check if the code option is active
			elseif (isset($FloatedAds_data['right_banner_code_state']['enabled'])) {
					$right_banner_custom = $FloatedAds_data['right_banner_code_state']['right_banner_code'];
					$right_banner_is_on = $right_banner_is_code = 1;
					$right_banner_is_image = $right_banner_width = $right_banner_height = 0;
					?>
					<script>
						var right_banner_on = <?php echo $right_banner_is_on; ?>;
      			var right_banner_custom = <?php echo json_encode($right_banner_custom); ?>;
      			var RightBannerW = <?php echo $FloatedAds_data['right_banner_code_state']['right_banner_code_width']; ?>;
      			var RightBannerH = <?php echo $FloatedAds_data['right_banner_code_state']['right_banner_code_height']; ?>;
      			var right_banner_is_image_js = <?php echo $right_banner_is_image; ?>;
  					var right_banner_is_code_js = <?php echo $right_banner_is_code; ?>;	
					</script>
					<?php
			}
			//if not code nor image
			else {
				$right_banner_is_on = $right_banner_width = $right_banner_height = $right_banner_is_image = $right_banner_is_code = 0;
				?>
					<script>
						var right_banner_on = <?php echo $right_banner_is_on; ?>;
            var right_banner_is_image_js = <?php echo $right_banner_is_image; ?>;
          	var right_banner_is_code_js = <?php echo $right_banner_is_code; ?>;	
					</script>
				<?php
			}
		}//end of the right banner

		//check if the left banner is active and there is an image assigned
		if ($FloatedAds_data['left_banner_active'] == "1"){
			if (isset($FloatedAds_data['left_banner_image_state']['enabled']) && $FloatedAds_data['left_banner_image_state']['left_banner_image']['src']!==""){
					$left_banner_url = $FloatedAds_data['left_banner_image_state']['left_banner_image']['src'];
					$left_banner_link = $FloatedAds_data['left_banner_image_state']['left_banner_image_link'];
					list($left_banner_width, $left_banner_height, $left_banner_type, $left_banner_attr) = getimagesize($left_banner_url);
					$left_banner_is_on = $left_banner_is_image = 1; 
					$left_banner_is_code = 0;	
					?>
					<script>
						var left_banner_on = <?php echo $left_banner_is_on; ?>;
						var left_banner_url = <?php echo json_encode($left_banner_url); ?>;
          	var left_banner_link = <?php echo json_encode($left_banner_link); ?>;
          	var LeftBannerW = <?php echo $left_banner_width; ?>;
          	var LeftBannerH = <?php echo $left_banner_height; ?>;
          	var left_banner_is_image_js = <?php echo $left_banner_is_image; ?>;
          	var left_banner_is_code_js = <?php echo $left_banner_is_code; ?>;
					</script>
					<?php
			}
			//check if the left banner code is active
			elseif (isset($FloatedAds_data['left_banner_code_state']['enabled'])) {
				$left_banner_custom = $FloatedAds_data['left_banner_code_state']['left_banner_code'];
				$left_banner_is_on = $left_banner_is_code = 1; 
				$left_banner_is_image = $left_banner_width = $left_banner_height = 0;
				?>
				<script>
					var left_banner_on = <?php echo $left_banner_is_on; ?>;
     			var left_banner_custom = <?php echo json_encode($left_banner_custom); ?>;
					var LeftBannerW = <?php echo $FloatedAds_data['left_banner_code_state']['left_banner_code_width']; ?>;
     			var LeftBannerH = <?php echo $FloatedAds_data['left_banner_code_state']['left_banner_code_height']; ?>;
     			var left_banner_is_image_js = <?php echo $left_banner_is_image; ?>;
  				var left_banner_is_code_js = <?php echo $left_banner_is_code; ?>;	
				</script>
				<?php
			}
			//if not code nor image
			else {
				$left_banner_is_on = $left_banner_width = $left_banner_height = $left_banner_is_image = $left_banner_is_code = 0;
				?>
				<script>
					var left_banner_on = <?php echo $left_banner_is_on; ?>;
          var left_banner_is_image_js = <?php echo $left_banner_is_image; ?>;
          var left_banner_is_code_js = <?php echo $left_banner_is_code; ?>;	
				</script>
				<?php
			}
		}//end of the left banner

		//if the left banner is not active
		if ($FloatedAds_data['left_banner_active'] == ""){
			$left_banner_is_on = 0;
			?>
				<script>
					var left_banner_on = <?php echo $left_banner_is_on; ?>;
				</script>
			<?php
		}
		//if the right banner is not active
		if ($FloatedAds_data['right_banner_active'] == ""){
			$right_banner_is_on = 0;
			?>
				<script>
        	var right_banner_on = <?php echo $right_banner_is_on; ?>;
				</script>
			<?php
		}
			
		//check if mobile banner is active
		if ($FloatedAds_data['show_mobile_banner'] == "1"){
			//check if the mobile banner image option is active and there is an image assigned
			if (isset($FloatedAds_data['mobile_banner_image_state']['enabled']) && $FloatedAds_data['mobile_banner_image_state']['mobile_banner_image']['src']!==""){
				$mobile_banner_url = $FloatedAds_data['mobile_banner_image_state']['mobile_banner_image']['src'];
				$mobile_banner_link = $FloatedAds_data['mobile_banner_image_state']['mobile_banner_image_link'];
				list($mobile_banner_width, $mobile_banner_height, $mobile_banner_type, $mobile_banner_attr) = getimagesize($mobile_banner_url);
				$mobile_banner_is_on = $mobile_banner_is_image = 1;
				$mobile_banner_is_code = 0;
				?>
				<script>
					var mobile_banner_is_on = <?php echo $mobile_banner_is_on; ?>;
					var mobile_banner_url = <?php echo json_encode($mobile_banner_url); ?>;
        	var mobile_banner_link = <?php echo json_encode($mobile_banner_link); ?>;
        	var MobileBannerW = <?php echo $mobile_banner_width; ?>;
        	var MobileBannerH = <?php echo $mobile_banner_height; ?>;
        	var mobile_banner_is_image = <?php echo $mobile_banner_is_image; ?>;
        	var mobile_banner_is_code = <?php echo $mobile_banner_is_code; ?>;
				</script>
				<?php
			}
			//check if the mobile banner code option is active
			elseif (isset($FloatedAds_data['mobile_banner_code_state']['enabled'])) {
				$mobile_banner_custom = $FloatedAds_data['mobile_banner_code_state']['mobile_banner_code'];
				$mobile_banner_is_on = $mobile_banner_is_code = 1; 
				$mobile_banner_is_image = $mobile_banner_width = $mobile_banner_height = 0;
				?>
				<script>
					var mobile_banner_is_on = <?php echo $mobile_banner_is_on; ?>;
          var mobile_banner_custom = <?php echo json_encode($mobile_banner_custom); ?>;
					var MobileBannerW = <?php echo $FloatedAds_data['mobile_banner_code_state']['mobile_banner_code_width']; ?>;
          var MobileBannerH = <?php echo $FloatedAds_data['mobile_banner_code_state']['mobile_banner_code_height']; ?>;
          var mobile_banner_is_image = <?php echo $mobile_banner_is_image; ?>;
          var mobile_banner_is_code = <?php echo $mobile_banner_is_code; ?>;	
				</script>
				<?php
			}
			//if neitehr image nor code is active
			else {
				$mobile_banner_is_on = $mobile_banner_width = $mobile_banner_height = $mobile_banner_is_image = $mobile_banner_is_code = 0;
				?>
				<script>
					var mobile_banner_is_on = <?php echo $mobile_banner_is_on; ?>;
          var mobile_banner_is_image = <?php echo $mobile_banner_is_image; ?>;
          var mobile_banner_is_code = <?php echo $mobile_banner_is_code; ?>;	
				</script>
				<?php
			}
		}//end of mobile banners

		//getting device state
		if (wp_is_mobile()){ $device_is_mobile = 1; }
		if (!wp_is_mobile()){	$device_is_mobile = 0; }
		
		//getting minmium screen width, and main theme layout width
		$screen_w	=	$FloatedAds_data['container_min_width'];
		$MainContentW	=	$FloatedAds_data['main_content_width'];
		
		//getting the adjustment margin values
		$LeftAdjust		=	$FloatedAds_data['FloatedAds_margin_left'];
		$RightAdjust	=	$FloatedAds_data['FloatedAds_margin_right'];
		$TopAdjust		=	$FloatedAds_data['FloatedAds_margin_top'];

		//getting the sticky state
		if ($FloatedAds_data['left_banner_sticky'] == "1"){ $left_banner_is_sticky = 1;} else { $left_banner_is_sticky = 0;};
		if ($FloatedAds_data['right_banner_sticky'] == "1"){ $right_banner_is_sticky = 1;} else { $right_banner_is_sticky = 0;};
		?>

		<script type="text/javascript">
			var left_url = <?php echo json_encode(plugins_url('/includes/left_banner.php', __FILE__ )); ?>;
			var right_url = <?php echo json_encode(plugins_url('/includes/right_banner.php', __FILE__ )); ?>;
			var mobile_url = <?php echo json_encode(plugins_url('/includes/mobile_banner.php', __FILE__ )); ?>;
			var clientWidth	= jQuery(window).width();
			var screen_min_width	=	<?php echo $screen_w; ?>;		            
			var MainContentW = <?php echo $MainContentW; ?>;	                
			var LeftAdjust = <?php echo $LeftAdjust; ?>;
			var RightAdjust = <?php echo $RightAdjust; ?>;
			var TopAdjust = <?php echo $TopAdjust; ?>;
			var left_banner_sticky_js = <?php echo $left_banner_is_sticky; ?>;
			var right_banner_sticky_js = <?php echo $right_banner_is_sticky; ?>;
			var device_is_mobile = <?php echo $device_is_mobile; ?>;
			//call the banners display function
			ShowAdDiv();
			//call the position function on window resize
			window.addEventListener('resize', AdsWindowResize, true);
    </script>
    <?php
	}//end of load the banners

/*** end of front end implemntation ***/

/*** show ads on homepage only function ***/

	//get the data from the database
	$FloatedAds_data = get_option('flads_options');
	//check if the homepage only option is checked
	if (isset($FloatedAds_data['show_on_homepage']) && $FloatedAds_data['show_on_homepage'] == "1"){
		function show_on_homepage_only () {
			if (!is_home() && !is_front_page()) {
				global $post;
				remove_action('wp_enqueue_scripts', 'FloatedAds_load_script');
 				remove_action('wp_footer', 'FloatedAds_load_ads');
		  }
		}
		add_action( 'get_header', 'show_on_homepage_only' );
	}
?>