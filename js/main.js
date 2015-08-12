$( document ).ready(function() {
	
	
	function correctAppletSize() {
		var stdControls = $(".stdControls").height();
		var headerHeight = $(".site-branding").height();
		
		$(".visuals, .contentColumn").css("top", headerHeight);
		$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height()-stdControls);
		
		
	}
	
	correctAppletSize();
	
	$(window).resize(function() {
		correctAppletSize();
	});

	
});