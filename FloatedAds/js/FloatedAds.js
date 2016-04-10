function FloatBannerLeft() 
{ 
	startLX = ((document.body.clientWidth -MainContentW)/2) - (LeftBannerW+LeftAdjust) , startLY = TopAdjust; 
	var d = document; 
	function m2(id) 
	{ 
		var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id]; 
		e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';}; 
		e2.x = startLX;
		e2.y = startLY;
		return e2;
	} 
	window.sticky_left_banner=function() 
	{ 
		if (document.documentElement && document.documentElement.scrollTop) 
			var pY =  document.documentElement.scrollTop; 
		else if (document.body) 
			var pY =  document.body.scrollTop; 
		if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else {startLY = TopAdjust;startRY = TopAdjust;}; 
		ftlObj2.y += (pY+startLY-ftlObj2.y)/16; 
		ftlObj2.sP(ftlObj2.x, ftlObj2.y); 
		if (left_banner_sticky_js == 1){setTimeout("sticky_left_banner()", 1);}; 
	}
	if (left_banner_on == 1){ ftlObj2 = m2("divAdLeft"); }
	else {
		ftlObj2 = m2("FloatedAds_none");
	};
	sticky_left_banner();
}

function FloatBannerRight() 
{ 
	startRX = ((document.body.clientWidth -MainContentW)/2) + (MainContentW+RightAdjust) , startRY = TopAdjust; 
	var d = document; 
	function ml(id) 
	{ 
		var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id]; 
		el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';}; 
		el.x = startRX; 
		el.y = startRY; 
		return el; 
	} 
	window.sticky_right_banner=function() 
	{ 
		if (document.documentElement && document.documentElement.scrollTop) 
			var pY =  document.documentElement.scrollTop; 
		else if (document.body) 
			var pY =  document.body.scrollTop; 
		if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else {startLY = TopAdjust;startRY = TopAdjust;}; 
		ftlObj.y += (pY+startRY-ftlObj.y)/16; 
		ftlObj.sP(ftlObj.x, ftlObj.y); 
		if (right_banner_sticky_js == 1){setTimeout("sticky_right_banner()", 1);}; 
	}
	if (right_banner_on == 1){ ftlObj = ml("divAdRight"); }
	else {
		ftlObj = ml("FloatedAds_none");
	}; 
	sticky_right_banner();	
} 
function ShowAdDiv() 
{ 
	if (right_banner_on == 1 && device_is_mobile == 0){
		if (right_banner_is_image_js == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: right_url,
				      data: ({
				      	clientwidth_php:clientWidth,
				      	screen_w:screen_min_width,
				      	right_banner_is_on:right_banner_on,
				      	right_banner_is_image:right_banner_is_image_js,
				      	RightBannerW:RightBannerW,
				      	RightBannerH:RightBannerH,
				      	right_banner_link:right_banner_link,
				      	right_banner_url:right_banner_url
				      }),
				      success: function(data) {
				        jQuery("body").append(data);
				      }
				    });
				});
			jQuery(document).ajaxStop(function() {
				var objAdDivRight = document.getElementById("divAdRight");
				objAdDivRight.style.display = "block";
				FloatBannerRight();
			});
		}
		if (right_banner_is_code_js == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: right_url,
				      data: ({
				      	clientwidth_php:clientWidth,
				      	screen_w:screen_min_width,
				      	right_banner_is_on:right_banner_on,
				      	right_banner_custom:right_banner_custom,
				      	RightBannerW:RightBannerW,
				      	RightBannerH:RightBannerH,
				      	right_banner_is_code:right_banner_is_code_js
				      }),
				      success: function(data) {
				        jQuery("body").append(data);
				      }
				    });
				});
			jQuery(document).ajaxStop(function() {
				var objAdDivRight = document.getElementById("divAdRight");
				objAdDivRight.style.display = "block";
				FloatBannerRight();
			});
		}

		 
	}
	if (left_banner_on == 1 && device_is_mobile == 0){
		if (left_banner_is_image_js == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: left_url,
				      data: ({
				      	clientwidth_php:clientWidth,
				      	screen_w:screen_min_width,
				      	left_banner_is_on:left_banner_on,
				      	left_banner_is_image:left_banner_is_image_js,
				      	LeftBannerW:LeftBannerW,
				      	LeftBannerH:LeftBannerH,
				      	left_banner_link:left_banner_link,
				      	left_banner_url:left_banner_url
				      }),
				      success: function(data) {
				        jQuery("body").append(data);
				      }
				    });
				});
			jQuery(document).ajaxStop(function() {
				var objAdDivLeft = document.getElementById("divAdLeft");
				objAdDivLeft.style.display = "block";
				FloatBannerLeft();
			});
		}
		if (left_banner_is_code_js == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: left_url,
				      data: ({
				      	clientwidth_php:clientWidth,
				      	screen_w:screen_min_width,
				      	left_banner_is_on:left_banner_on,
				      	left_banner_custom:left_banner_custom,
				      	LeftBannerW:LeftBannerW,
				      	LeftBannerH:LeftBannerH,
				      	left_banner_is_code:left_banner_is_code_js
				      }),
				      success: function(data) {
				        jQuery("body").append(data);
				      }
				    });
				});
			jQuery(document).ajaxStop(function() {
				var objAdDivLeft = document.getElementById("divAdLeft");
				objAdDivLeft.style.display = "block";
				FloatBannerLeft();
			});
		}

	} 

	if (device_is_mobile == 1) {
		if (mobile_banner_is_image == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: mobile_url,
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
		}
		if (mobile_banner_is_code == 1){
				jQuery(function(){
				    jQuery.ajax({
				      type: "POST",
				      url: mobile_url,
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
		}

	} 	 
}
