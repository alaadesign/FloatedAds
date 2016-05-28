/*re-position banners when window resize*/
function AdsWindowResize(){
	if (left_banner_on == 1 && device_is_mobile == 0)
		FloatBannerLeft();
	if (right_banner_on == 1 && device_is_mobile == 0)
		FloatBannerRight();
}
/*calcualte left banner position*/
function FloatBannerLeft(){ 
	startLX = ((document.body.clientWidth -MainContentW)/2) - (LeftBannerW+LeftAdjust) , 
	startLY = TopAdjust;	
	var e2=document.getElementById("divAdLeft");
		if(e2 != null){
			e2.style.left=startLX + 'px';
			e2.style.top=startLY + 'px'; 
		}
}
/*calcualte right banner position*/
function FloatBannerRight(){ 
	startRX = ((document.body.clientWidth -MainContentW)/2) + (MainContentW+RightAdjust) , 
	startRY = TopAdjust; 
	var e2=document.getElementById("divAdRight");
		if(e2 != null){
			e2.style.left=startRX + 'px';
			e2.style.top=startRY + 'px'; 
		}
}
/*render banners into body*/
function ShowAdDiv(){
	//check if right banner is on and the device isn't mobile
	if (right_banner_on == 1 && device_is_mobile == 0){
		//check if right banner is image
		if (right_banner_is_image_js == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: right_url,	//defined in floated_banners.php
					data: ({
						clientwidth_php:clientWidth,
						screen_w:screen_min_width,
						right_banner_is_on:right_banner_on,
						right_banner_is_image:right_banner_is_image_js,
						RightBannerW:RightBannerW,
						RightBannerH:RightBannerH,
						right_banner_link:right_banner_link,
						right_banner_sticky_php:right_banner_sticky_js,
						right_banner_url:right_banner_url
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
			//after ajax call to right banner file, display the banner
			jQuery(document).ajaxStop(function() {
				var objAdDivRight = document.getElementById("divAdRight");
				objAdDivRight.style.display = "block";
				FloatBannerRight();
			});
		}//end of right banner image condition

		//check if right banner is code
		if (right_banner_is_code_js == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: right_url,	//defined in floated_banners.php
					data: ({
						clientwidth_php:clientWidth,
						screen_w:screen_min_width,
						right_banner_is_on:right_banner_on,
						right_banner_custom:right_banner_custom,
						RightBannerW:RightBannerW,
						RightBannerH:RightBannerH,
						right_banner_sticky_php:right_banner_sticky_js,
						right_banner_is_code:right_banner_is_code_js
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
			jQuery(document).ajaxStop(function() {
				//after ajax call to right banner file, display the banner
				var objAdDivRight = document.getElementById("divAdRight");
				objAdDivRight.style.display = "block";
				FloatBannerRight();
			});
		}//end of right banner code condition
	}//end of right banner

	//check if left banner is on and the device isn't mobile 
	if (left_banner_on == 1 && device_is_mobile == 0){
		//check if left banner is image
		if (left_banner_is_image_js == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: left_url, //defined in floated_banners.php
					data: ({
						clientwidth_php:clientWidth,
						screen_w:screen_min_width,
						left_banner_is_on:left_banner_on,
						left_banner_is_image:left_banner_is_image_js,
						LeftBannerW:LeftBannerW,
						LeftBannerH:LeftBannerH,
						left_banner_sticky_php:left_banner_sticky_js,
						left_banner_link:left_banner_link,
						left_banner_url:left_banner_url
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
			jQuery(document).ajaxStop(function() {
				//after ajax call to left banner file, display the banner
				var objAdDivLeft = document.getElementById("divAdLeft");
				objAdDivLeft.style.display = "block";
				FloatBannerLeft();
			});
		}//end of left banner image condition

		//check if left banner is code
		if (left_banner_is_code_js == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: left_url,	//defined in floated_banners.php
					data: ({
						clientwidth_php:clientWidth,
						screen_w:screen_min_width,
						left_banner_is_on:left_banner_on,
						left_banner_custom:left_banner_custom,
						LeftBannerW:LeftBannerW,
						LeftBannerH:LeftBannerH,
						left_banner_sticky_php:left_banner_sticky_js,
						left_banner_is_code:left_banner_is_code_js
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
			jQuery(document).ajaxStop(function() {
				//after ajax call to left banner file, display the banner
				var objAdDivLeft = document.getElementById("divAdLeft");
				objAdDivLeft.style.display = "block";
				FloatBannerLeft();
			});
		}//end of left banner code condition
	}//end of left banner

	//check if the device is mobile
	if (device_is_mobile == 1) {
		//check if the mobile banner is image
		if (mobile_banner_is_image == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: mobile_url, //defined in floated_banners.php
					data: ({
						mobile_banner_is_on:mobile_banner_is_on,
						mobile_banner_is_image:mobile_banner_is_image,
						MobileBannerW:MobileBannerW,
						MobileBannerH:MobileBannerH,
						mobile_banner_link:mobile_banner_link,
						mobile_banner_url:mobile_banner_url
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
		}//end of mobile banner image condition

		//check if mobile banner is code
		if (mobile_banner_is_code == 1){
			jQuery(function(){
				jQuery.ajax({
					type: "POST",
					url: mobile_url,	//defined in floated_banners.php
					data: ({
						mobile_banner_is_on:mobile_banner_is_on,
						mobile_banner_custom:mobile_banner_custom,
						MobileBannerW:MobileBannerW,
						MobileBannerH:MobileBannerH,
						mobile_banner_is_code:mobile_banner_is_code
					}),
					success: function(data) {
						jQuery("body").append(data);
					}
				});
			});
		}//end of mobile banner code condition
	}//end of mobile banner
}//end of render banners into body
