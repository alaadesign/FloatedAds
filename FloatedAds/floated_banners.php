<?php 
    /*
    Plugin Name: FloatedAds
    Plugin URI: http://www.intelaka.com/
    Description: Plugin for displaying floated banners ads on both sides of your website.
    Author: Alaa Salama
    Version: 1.0
    Author URI: http://www.alaadesign.com
    */

/*** Admin Panel Section ***/

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
			//image ad
			$left_banner_image_cond[] = $options_panel->addImage('left_banner_image',array('name'=> __('Upload Banner Image','apc')),true);
			//is_url
			$left_banner_image_cond[] = $options_panel->addText('left_banner_image_link',
			    array(
			      'name'     => __('Enter your banner image link','apc'),
			      'std'      => '#',
			      'desc'     => __("Add your banner link, or keep it set to # in case you don't want to link your image anywhere!","apc"),
			    ),true
			);
			//cusotm code ad
			$left_banner_code_cond[] = $options_panel->addTextarea('left_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
			//is_numeric
			$left_banner_code_cond[] = $options_panel->addText('left_banner_code_width',
			    array(
			      'name'     => __('Your custom banner width','apc'),
			      'std'      => 160,
			      'desc'     => __("Enter numeric value of the banner width","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			    ,true
			);
			//is_numeric
			$left_banner_code_cond[] = $options_panel->addText('left_banner_code_height',
			    array(
			      'name'     => __('Your custom banner height','apc'),
			      'std'      => 600,
			      'desc'     => __("Enter numeric value of the banner height","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			    ,true
			);
			//conditinal block 
			$options_panel->addCondition('left_banner_image_state',
			      array(
			        'name'   => __('Use image banner?','apc'),
			        'fields' => $left_banner_image_cond,
			        'std'    => false,
			));
			//conditinal block 
			$options_panel->addCondition('left_banner_code_state',
			      array(
			        'name'   => __('Use custom code banner?','apc'),
			        'fields' => $left_banner_code_cond,
			        'std'    => false,
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
			//is_numeric
			$options_panel->addText('FloatedAds_margin_top',
			    array(
			      'name'     => __('Top Margin','apc'),
			      'std'      => 0,
			      'desc'     => __("Enter numeric value of the top margin","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			);
			//is_numeric
			$options_panel->addText('FloatedAds_margin_left',
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
			$options_panel->addText('FloatedAds_margin_right',
			    array(
			      'name'     => __('Right Margin','apc'),
			      'std'      => 0,
			      'desc'     => __("Enter numeric value of the right margin","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			);
			//checkbox field
			$options_panel->addCheckbox('show_on_homepage',array('name'=> __('Show Banners Homeapge ONLY','apc'), 'std' => true, 'desc' => __('Activate this option to show the banners on homepage only','apc')));
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
			//image ad
			$right_banner_image_cond[] = $options_panel->addImage('right_banner_image',array('name'=> __('Upload Banner Image','apc')),true);
			//is_url
			$right_banner_image_cond[] = $options_panel->addText('right_banner_image_link',
			    array(
			      'name'     => __('Enter your banner image link','apc'),
			      'std'      => '#',
			      'desc'     => __("Add your banner link, or keep it set to # in case you don't want to link your image anywhere!","apc"),
			    ),true
			);
			//cusotm code ad
			$right_banner_code_cond[] = $options_panel->addTextarea('right_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
			//is_numeric
			$right_banner_code_cond[] = $options_panel->addText('right_banner_code_width',
			    array(
			      'name'     => __('Your custom banner width','apc'),
			      'std'      => 160,
			      'desc'     => __("Enter numeric value of the banner width","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			    ,true
			);
			//is_numeric
			$right_banner_code_cond[] = $options_panel->addText('right_banner_code_height',
			    array(
			      'name'     => __('Your custom banner height','apc'),
			      'std'      => 600,
			      'desc'     => __("Enter numeric value of the banner height","apc"),
			      'validate' => array(
			          'numeric' => array('param' => '','message' => __("must be numeric value","apc"))
			      )
			    )
			    ,true
			);
			//conditinal block 
			$options_panel->addCondition('right_banner_image_state',
			      array(
			        'name'   => __('Use image banner?','apc'),
			        'fields' => $right_banner_image_cond,
			        'std'    => false,
			));
			//conditinal block 
			$options_panel->addCondition('right_banner_code_state',
			      array(
			        'name'   => __('Use custom code banner?','apc'),
			        'fields' => $right_banner_code_cond,
			        'std'    => false,
			));
		$options_panel->CloseTab();

/*** End of Admin Panel section ***/

/*** Front End Implemntation ***/
?>
<?php
	//register main function
		function FloatedAds_main(){
			//load the saved data from the data base
			$FloatedAds_data = get_option('flads_options');

			if($FloatedAds_data['left_banner_active'] || $FloatedAds_data['right_banner_active']){

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

	//load the ads
		function FloatedAds_load_ads(){
				//load the saved data from the data base
				$FloatedAds_data = get_option('flads_options');

				if ($FloatedAds_data['right_banner_active'] == "1"){
					if (isset($FloatedAds_data['right_banner_image_state']['enabled']) && $FloatedAds_data['right_banner_image_state']['right_banner_image']['src']!=="") { 
							$right_banner_url = $FloatedAds_data['right_banner_image_state']['right_banner_image']['src'];
							$right_banner_link = $FloatedAds_data['right_banner_image_state']['right_banner_image_link'];
							list($right_banner_width, $right_banner_height, $right_banner_type, $right_banner_attr) = getimagesize($right_banner_url);
							$right_banner_is_on = 1; $right_banner_is_image = 1; $right_banner_is_code = 0;
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
					elseif (isset($FloatedAds_data['right_banner_code_state']['enabled'])) {
							$right_banner_custom = $FloatedAds_data['right_banner_code_state']['right_banner_code'];
							$right_banner_is_on = 1; $right_banner_is_code = 1; $right_banner_is_image = 0; 
							$right_banner_width = $right_banner_height = 0;
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
				}
				if ($FloatedAds_data['left_banner_active'] == "1"){
					if (isset($FloatedAds_data['left_banner_image_state']['enabled']) && $FloatedAds_data['left_banner_image_state']['left_banner_image']['src']!==""){
							$left_banner_url = $FloatedAds_data['left_banner_image_state']['left_banner_image']['src'];
							$left_banner_link = $FloatedAds_data['left_banner_image_state']['left_banner_image_link'];
							list($left_banner_width, $left_banner_height, $left_banner_type, $left_banner_attr) = getimagesize($left_banner_url);
							$left_banner_is_on = 1; $left_banner_is_image = 1; $left_banner_is_code = 0;	
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
					elseif (isset($FloatedAds_data['left_banner_code_state']['enabled'])) {
						$left_banner_custom = $FloatedAds_data['left_banner_code_state']['left_banner_code'];
						 $left_banner_is_on = 1; $left_banner_is_code = 1; $left_banner_is_image = 0; 
						$left_banner_width = $left_banner_height = 0;
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

				}
				if ($FloatedAds_data['left_banner_active'] == ""){
					$left_banner_is_on = 0;
						?>
						<script>
								var left_banner_on = <?php echo $left_banner_is_on; ?>;
						</script>
						<?php
				}
				if ($FloatedAds_data['right_banner_active'] == ""){
					$right_banner_is_on = 0;
						?>
						<script>
	                			var right_banner_on = <?php echo $right_banner_is_on; ?>;
						</script>
						<?php
				}
				
				$screen_w	=	$FloatedAds_data['container_min_width'];
				$MainContentW	=	$FloatedAds_data['main_content_width'];
				
				//Ajust
				$LeftAdjust		=	$FloatedAds_data['FloatedAds_margin_left'];
				$RightAdjust	=	$FloatedAds_data['FloatedAds_margin_right'];
				$TopAdjust		=	$FloatedAds_data['FloatedAds_margin_top'];

			if ($FloatedAds_data['left_banner_sticky'] == "1"){ $left_banner_is_sticky = 1;} else { $left_banner_is_sticky = 0;};
			if ($FloatedAds_data['right_banner_sticky'] == "1"){ $right_banner_is_sticky = 1;} else { $right_banner_is_sticky = 0;};

			?><script type="text/javascript">
					var left_url = <?php echo json_encode(plugins_url('/includes/left_banner.php', __FILE__ )); ?>;
					var right_url = <?php echo json_encode(plugins_url('/includes/right_banner.php', __FILE__ )); ?>;					
					var clientWidth	=	window.screen.width;
					var screen_min_width	=	<?php echo $screen_w; ?>;		            
	    			var MainContentW = <?php echo $MainContentW; ?>;	                
	                var LeftAdjust = <?php echo $LeftAdjust; ?>;
	                var RightAdjust = <?php echo $RightAdjust; ?>;
	                var TopAdjust = <?php echo $TopAdjust; ?>;
	                var left_banner_sticky_js = <?php echo $left_banner_is_sticky; ?>;
	            	var right_banner_sticky_js = <?php echo $right_banner_is_sticky; ?>;
	                ShowAdDiv();
	                window.onresize=ShowAdDiv;
	        </script>
	    <?php
	    //print_r($FloatedAds_data);				
	}
/*** End of Front End Implemntation ***/

/*** Show Ads on Homepage only function ***/
	$FloatedAds_data = get_option('flads_options');

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
