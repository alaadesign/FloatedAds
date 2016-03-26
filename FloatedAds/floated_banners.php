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
			//cusotm code ad
			$left_banner_code_cond[] = $options_panel->addTextarea('left_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
			//conditinal block 
			$options_panel->addCondition('conditinal_fields_1',
			      array(
			        'name'   => __('Use image banner?','apc'),
			        'fields' => $left_banner_image_cond,
			        'std'    => false,
			));
			//conditinal block 
			$options_panel->addCondition('conditinal_fields_2',
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
			//image ad
			$right_banner_image_cond[] = $options_panel->addImage('right_banner_image',array('name'=> __('Upload Banner Image','apc')),true);
			//cusotm code ad
			$right_banner_code_cond[] = $options_panel->addTextarea('right_banner_code',array('name'=> __('Add your banner code','apc'), 'std'=> __('You can use any banner code here including Google Adsense', 'apc')),true);
			//conditinal block 
			$options_panel->addCondition('conditinal_fields_3',
			      array(
			        'name'   => __('Use image banner?','apc'),
			        'fields' => $right_banner_image_cond,
			        'std'    => false,
			));
			//conditinal block 
			$options_panel->addCondition('conditinal_fields_4',
			      array(
			        'name'   => __('Use custom code banner?','apc'),
			        'fields' => $right_banner_code_cond,
			        'std'    => false,
			));
		$options_panel->CloseTab();

/*** End of Admin Panel section ***/

/*** Front End Implemntation ***/

	//register main function
		function FloatedAds_main(){
			//load the saved data from the data base
			$FloatedAds_data = get_option('flads_options');

			if($FloatedAds_data['left_banner_active'] || $FloatedAds_data['right_banner_active']){

				add_action('wp_enqueue_scripts','FloatedAds_load_script');
				function FloatedAds_load_script() {
				    wp_enqueue_script( 'FloatedAds.js', plugins_url( '/js/FloatedAds.js', __FILE__ ));
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

				$right_banner_url = $FloatedAds_data['conditinal_fields_3']['right_banner_image']['src'];
				$left_banner_url = $FloatedAds_data['conditinal_fields_1']['left_banner_image']['src'];

				list($right_banner_width, $right_banner_height, $right_banner_type, $right_banner_attr) = getimagesize($right_banner_url);
				list($left_banner_width, $left_banner_height, $left_banner_type, $left_banner_attr) = getimagesize($left_banner_url);

				$screen_w	=	$FloatedAds_data['container_min_width'];
				$MainContentW	=	$FloatedAds_data['main_content_width'];
				
				//Width + height
				$LeftBannerW	=	$left_banner_width;
				$LeftBannerH	=	$left_banner_height;
				$RightBannerW	=	$right_banner_width;
				$RightBannerH	=	$right_banner_height;

				//Ajust
				$LeftAdjust		=	$FloatedAds_data['FloatedAds_margin_left'];
				$RightAdjust	=	$FloatedAds_data['FloatedAds_margin_right'];
				$TopAdjust		=	$FloatedAds_data['FloatedAds_margin_top'];


			if (isset($FloatedAds_data['left_banner_active']) && $FloatedAds_data['left_banner_active'] == "1"){ $left_banner_is_on = 1;} else { $left_banner_is_on = 0;};
			if (isset($FloatedAds_data['right_banner_active']) && $FloatedAds_data['right_banner_active'] == "1"){ $right_banner_is_on = 1;}else { $right_banner_is_on = 0;};

		    if(!wp_is_mobile())://desktop ?>
				<script type="text/javascript">
		            var clientWidth	=	window.screen.width;
		            var left_banner_on = <?php echo $left_banner_is_on; ?>;
		            var right_banner_on = <?php echo $right_banner_is_on; ?>;
		            if(clientWidth >= <?php echo $screen_w; ?>){
		                if (right_banner_on == 1){
		                	document.write('<div id="divAdRight" style="position: absolute; top: 0px; width:<?php echo $RightBannerW; ?>px; <?php if($RightBannerH) echo "height:".$RightBannerH."px;"; ?> overflow:hidden;"><img src="<?php echo $right_banner_url; ?>" /></div>');
		                }
		                else {
		                	document.write('<div id="FloatedAds_none"></div>');
		                }
		                if (left_banner_on == 1){
		                	document.write('<div id="divAdLeft" style="position: absolute; top: 0px; width:<?php echo $LeftBannerW; ?>px; <?php if($LeftBannerH) echo "height:".$LeftBannerH."px;"; ?> overflow:hidden;"><img src="<?php echo $left_banner_url; ?>" /></div>');
		                }
		                else {
		                	document.write('<div id="FloatedAds_none"></div>');
		                }
		                var MainContentW = <?php echo $MainContentW; ?>;
		                var LeftBannerW = <?php echo $LeftBannerW; ?>;
		                var RightBannerW = <?php echo $RightBannerW; ?>;
		                var LeftAdjust = <?php echo $LeftAdjust; ?>;
		                var RightAdjust = <?php echo $RightAdjust; ?>;
		                var TopAdjust = <?php echo $TopAdjust; ?>;		                
		                ShowAdDiv();
		                window.onresize=ShowAdDiv; 
		            }
		        </script>
		    <?php else: //mobile ?>    
		    	<?php if(wp_is_mobile() && $FloatedAds_data['show_on_mobile'] == 1):?>
				<script type="text/javascript">
		            var clientWidth	=	window.screen.width;
		            var left_banner_on = <?php echo $left_banner_is_on; ?>;
		            var right_banner_on = <?php echo $right_banner_is_on; ?>;
		            if(clientWidth >= <?php echo $screen_w; ?>){
		                if (right_banner_on == 1){
		                	document.write('<div id="divAdRight" style="position: absolute; top: 0px; width:<?php echo $RightBannerW; ?>px; <?php if($RightBannerH) echo "height:".$RightBannerH."px;"; ?> overflow:hidden;"><img src="<?php echo $right_banner_url; ?>" /></div>');	
		                }
		                else {
		                	document.write('<div id="FloatedAds_none"></div>');
		                }
		                if (left_banner_on == 1){
		                	document.write('<div id="divAdLeft" style="position: absolute; top: 0px; width:<?php echo $LeftBannerW; ?>px; <?php if($LeftBannerH) echo "height:".$LeftBannerH."px;"; ?> overflow:hidden;"><img src="<?php echo $left_banner_url; ?>" /></div>');
		                }
		                else {
		                	document.write('<div id="FloatedAds_none"></div>');
		                }
		                var MainContentW = <?php echo $MainContentW; ?>;
		                var LeftBannerW = <?php echo $LeftBannerW; ?>;
		                var RightBannerW = <?php echo $RightBannerW; ?>;
		                var LeftAdjust = <?php echo $LeftAdjust; ?>;
		                var RightAdjust = <?php echo $RightAdjust; ?>;
		                var TopAdjust = <?php echo $TopAdjust; ?>;		                
		                ShowAdDiv();
		                window.onresize=ShowAdDiv; 
		            }
		        </script>
		        <?php endif; ?>
		    <?php endif;//End check mobile?>
		    
		<?php	
		}
/*** End of Front End Implemntation ***/
?>