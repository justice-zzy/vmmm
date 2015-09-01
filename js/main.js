$( document ).ready(function() {
	
	
	function correctAppletSize() {
		var stdControls = $(".stdControls").height();
		var headerHeight = $(".site-branding").height();
		
		var appDivHeight = $("#jmolApplet0_appletdiv").height();
		var appDivWidth = $("#jmolApplet0_appletdiv").width();
		
		$(".visuals, .contentColumn").css("top", headerHeight);
		$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height()-stdControls);
		//$("#jmolApplet0_appletinfotablediv").width(appDivWidth);
		
		//$("#jmolApplet0_appletdiv canvas").attr("height",appDivHeight).height(appDivHeight);
		//$("#jmolApplet0_appletdiv canvas").attr("width",appDivWidth).width(appDivWidth);
		
		
	}
	
	correctAppletSize();
	
	//setTimeout(function() { correctAppletSize(); },5000);
	
	
	$(window).resize(function() {
		correctAppletSize();
	});
	
	$(".highlightingFeatures a").click(function(e) {
		$(".highlightingFeatures a").removeClass("selected");
		$(this).addClass("selected");
	});
	
	$(".stdControls a").click(function(e) {
		$(".stdControls a").removeClass("selected");
		$(this).addClass("selected");
	});

	
});