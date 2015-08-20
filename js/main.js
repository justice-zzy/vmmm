$( document ).ready(function() {
	
	
	function correctAppletSize() {
		var stdControls = $(".stdControls").height();
		var headerHeight = $(".site-branding").height();
		
		$(".visuals, .contentColumn").css("top", headerHeight);
		$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height()-stdControls);
		
		
	}
	
	correctAppletSize();
	
	setTimeout(function() { alert("hi"); },5000);
	
	
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