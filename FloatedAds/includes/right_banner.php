<?php
if (isset($_POST["clientwidth_php"])) { $clientwidth_php = $_POST['clientwidth_php']; }
if (isset($_POST["screen_w"])) { $screen_w = $_POST['screen_w']; }
if (isset($_POST["right_banner_is_on"])) { $right_banner_is_on = $_POST['right_banner_is_on']; } else {$right_banner_is_on = 0;}
if (isset($_POST["right_banner_is_image"])) { $right_banner_is_image = $_POST['right_banner_is_image']; } else {$right_banner_is_image = 0;}
if (isset($_POST["right_banner_is_code"])) { $right_banner_is_code = $_POST['right_banner_is_code']; } else {$right_banner_is_code = 0;}
if (isset($_POST["RightBannerW"])) { $RightBannerW = $_POST['RightBannerW']; }
if (isset($_POST["RightBannerH"])) { $RightBannerH = $_POST['RightBannerH']; }
if (isset($_POST["right_banner_link"])) { $right_banner_link = $_POST['right_banner_link']; }
if (isset($_POST["right_banner_url"])) { $right_banner_url = $_POST['right_banner_url']; }
if (isset($_POST["right_banner_custom"])) { $right_banner_custom = $_POST['right_banner_custom']; }

if($clientwidth_php >= $screen_w){
        if ($right_banner_is_on == 1 && $right_banner_is_image == 1){
				echo "<div id=\"divAdRight\" style=\"position: absolute; top: 0px; width:",$RightBannerW,"px;height:",$RightBannerH,"px;overflow:hidden;\"><a href=",isset($right_banner_link) ? $right_banner_link : '',"><img src=",isset($right_banner_url) ? $right_banner_url : ''," /></a></div>";
		}
		elseif ($right_banner_is_on == 1 && $right_banner_is_code == 1){
            	echo "<div id=\"divAdRight\" style=\"position: absolute; top: 0px; width:",$RightBannerW,"px;height:",$RightBannerH,"px;overflow:hidden;\">",htmlspecialchars_decode(stripslashes($right_banner_custom)),"</div>";
        }		            
        else {
            	echo '<div id="FloatedAds_none"></div>';
        }				
}
?>