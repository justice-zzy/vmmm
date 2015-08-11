$( document ).ready(function() {
	
	
	function correctAppletSize() {
		var stdControls = $(".stdControls").height();
		
		$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height()-stdControls);
	}
	
	correctAppletSize();
	
	$(window).resize(function() {
		correctAppletSize();
	});

	
});