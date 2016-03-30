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
	if (right_banner_on == 1){
		if (right_banner_is_image_js == 1 || right_banner_is_code_js == 1){
			var objAdDivRight = document.getElementById("divAdRight");
			objAdDivRight.style.display = "block";
			FloatBannerRight();
		}
		else {var objAdDivRight = document.getElementById("FloatedAds_none");}
		 
	}
	if (left_banner_on == 1){
		if (left_banner_is_image_js == 1 || left_banner_is_code_js == 1){
			var objAdDivLeft = document.getElementById("divAdLeft");
			objAdDivLeft.style.display = "block";
			FloatBannerLeft();
		}
		else {var objAdDivLeft = document.getElementById("FloatedAds_none");}
	} 
	else {
		var objAdDivRight = document.getElementById("FloatedAds_none");
		var objAdDivLeft = document.getElementById("FloatedAds_none");
	}    	 
}