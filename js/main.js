$( document ).ready(function() {
	
	
	function correctAppletSize() {
		$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height());
	}
	
	correctAppletSize();
	
	$(window).resize(function() {
		correctAppletSize();
	});

	
});