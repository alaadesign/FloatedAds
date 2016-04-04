<?php
if (isset($_POST["clientwidth_php"])) { $clientwidth_php = $_POST['clientwidth_php']; }
if (isset($_POST["screen_w"])) { $screen_w = $_POST['screen_w']; }
if (isset($_POST["left_banner_is_on"])) { $left_banner_is_on = $_POST['left_banner_is_on']; } else {$left_banner_is_on = 0;}
if (isset($_POST["left_banner_is_image"])) { $left_banner_is_image = $_POST['left_banner_is_image']; } else {$left_banner_is_image = 0;}
if (isset($_POST["left_banner_is_code"])) { $left_banner_is_code = $_POST['left_banner_is_code']; } else {$left_banner_is_code = 0;}
if (isset($_POST["LeftBannerW"])) { $LeftBannerW = $_POST['LeftBannerW']; }
if (isset($_POST["LeftBannerH"])) { $LeftBannerH = $_POST['LeftBannerH']; }
if (isset($_POST["left_banner_link"])) { $left_banner_link = $_POST['left_banner_link']; }
if (isset($_POST["left_banner_url"])) { $left_banner_url = $_POST['left_banner_url']; }
if (isset($_POST["left_banner_custom"])) { $left_banner_custom = $_POST['left_banner_custom']; }

if($clientwidth_php >= $screen_w){
        if ($left_banner_is_on == 1 && $left_banner_is_image == 1){
				echo "<div id=\"divAdLeft\" style=\"position: absolute; top: 0px; width:",$LeftBannerW,"px;height:",$LeftBannerH,"px;overflow:hidden;\"><a href=",isset($left_banner_link) ? $left_banner_link : '',"><img src=",isset($left_banner_url) ? $left_banner_url : ''," /></a></div>";
		}
		elseif ($left_banner_is_on == 1 && $left_banner_is_code == 1){
            	echo "<div id=\"divAdLeft\" style=\"position: absolute; top: 0px; width:",$LeftBannerW,"px;height:",$LeftBannerH,"px;overflow:hidden;\">",htmlspecialchars_decode(stripslashes($left_banner_custom)),"</div>";
        }		            
        else {
            	echo '<div id="FloatedAds_none"></div>';
        }				
}
?>