<?php
if (isset($_POST["mobile_banner_is_on"])) { $mobile_banner_is_on = $_POST['mobile_banner_is_on']; }
if (isset($_POST["mobile_banner_is_image"])) { $mobile_banner_is_image = $_POST['mobile_banner_is_image']; } else {$mobile_banner_is_image = 0;}
if (isset($_POST["mobile_banner_is_code"])) { $mobile_banner_is_code = $_POST['mobile_banner_is_code']; } else {$mobile_banner_is_code = 0;}
if (isset($_POST["MobileBannerW"])) { $MobileBannerW = $_POST['MobileBannerW']; }
if (isset($_POST["MobileBannerH"])) { $MobileBannerH = $_POST['MobileBannerH']; }
if (isset($_POST["mobile_banner_link"])) { $mobile_banner_link = $_POST['mobile_banner_link']; }
if (isset($_POST["mobile_banner_url"])) { $mobile_banner_url = $_POST['mobile_banner_url']; }
if (isset($_POST["mobile_banner_custom"])) { $mobile_banner_custom = $_POST['mobile_banner_custom']; }

if ($mobile_banner_is_on == 1 && $mobile_banner_is_image == 1){
  	echo "<div id=\"bottom_banner\"><span class=\"close-btn\"></span><a href=",isset($mobile_banner_link) ? $mobile_banner_link : '',"><img src=",isset($mobile_banner_url) ? $mobile_banner_url : ''," /></a></div>";
  	$margin_left = $MobileBannerW+20;
	$margin_top = $MobileBannerH*(-1);
  	?>
  	<script>
  		jQuery('.close-btn').css({'left': '<?php echo $margin_left."px" ;?>', 'top': '<?php echo $margin_top."px" ;?>'});
		jQuery('.close-btn').click(function(){
		    jQuery('#bottom_banner').fadeOut();
		});
  	</script>
  	<?php
}
elseif ($mobile_banner_is_on == 1 && $mobile_banner_is_code == 1){
  	echo "<div id=\"bottom_banner\"><span class=\"close-btn\"></span>",htmlspecialchars_decode(stripslashes($mobile_banner_custom)),"</div>";
  	$margin_left = $MobileBannerW/2;
  	  	?>
  	<script>
  		jQuery('.close-btn').css({'left': '<?php echo $margin_left."px" ;?>'});
		jQuery('.close-btn').click(function(){
		    jQuery('#bottom_banner').fadeOut();
		});
  	</script>
  	<?php
}		            
else {
	echo '<div id="bottom_banner"></div>';
}
?>