$( document ).ready(function() {
	
	
	function correctAppletSize() {
		
		var windowW = $(window).width();
		var windowH = $(window).height();
		
		if(windowW <= 800) {
			var stdControls = $(".stdControls").height();
			var key = $(".key").height();
			var headerHeight = $(".site-branding").height();
			
			var appDivHeight = $("#jmolApplet0_appletdiv").height();
			var appDivWidth = $("#jmolApplet0_appletdiv").width();
			
			$(".visuals, .contentColumn").css("top", headerHeight);
			$("#jmolApplet0_appletinfotablediv").height((windowH/2)-headerHeight-stdControls-key);
			
		} else {
		
			var stdControls = $(".stdControls").height();
			var key = $(".key").height();
			var headerHeight = $(".site-branding").height();
			
			var appDivHeight = $("#jmolApplet0_appletdiv").height();
			var appDivWidth = $("#jmolApplet0_appletdiv").width();
			
			$(".visuals, .contentColumn").css("top", headerHeight);
			$("#jmolApplet0_appletinfotablediv").height($(".contentColumn").height()-stdControls-key);
			//$("#jmolApplet0_appletinfotablediv").width(appDivWidth);
			
			//$("#jmolApplet0_appletdiv canvas").attr("height",appDivHeight).height(appDivHeight);
			//$("#jmolApplet0_appletdiv canvas").attr("width",appDivWidth).width(appDivWidth);
		}
		
	}
	
	correctAppletSize();
	
	//setTimeout(function() { correctAppletSize(); },3000);
	
	
	$(window).resize(function() {
		correctAppletSize();
	});
	
	$(".highlightingFeatures a").click(function(e) {
		//$(".stdControls a").removeClass("selected");
		
		$(".highlightingFeatures a").removeClass("selected");
		$(".stdControls a").removeClass("selected");
		$(this).addClass("selected");
	});
	

	
	$(".stdControls a").click(function(e) {
		
		if($(this).hasClass("selected")) {
			//console.log("already selected");
		} else {
			
			$(this).removeAttr("counter");
		}
		
		//$(this).attr("counter",elemclicked);	
		$(".stdControls a").removeClass("selected");
		
		
		
		$(this).addClass("selected");
		
		var elem = $(this);
		var nextelem = $(this).next();
		var label = $(this).text();
		
		if(label == "reset" || label == "Reset" || label == "RESET") {
			setTimeout(function() {
				$(elem).removeClass("selected");	
			},1000);
			
		}
		
		
		
		if($(this).attr("counter")) {
			var tempcount = $(this).attr("counter");
			tempcount = parseInt(tempcount);
			tempcount = tempcount + 1;
			$(this).attr("counter",tempcount);
		} else {
			var tempcount = 0;
			$(this).attr("counter",tempcount);
		}
		
		if($(nextelem).hasClass("nestedGroup")) {
			var nestedCount = 0
			
			$(nextelem).find("a").each(function() {
				
				nestedCount = nestedCount + 1;
				$(this).attr("data-counted",nestedCount);
				
				if(tempcount == nestedCount) {
					e.preventDefault();
					var action = $(this).attr("data-action");
					Jmol.script(jmolApplet0, 'script '+action+'')
					
					
				}
			});
			
			$(elem).attr("nestedCount",nestedCount);
		}
		
		
		
		if(tempcount > nestedCount) {
			var action = $(elem).attr("data-action");
			//Jmol.script(jmolApplet0, 'script '+action+'');
			$(this).attr("counter","0");
			
		}
	});
	
	
	/*$(".stdControls a").each(function(e) {
		
		var elem = $(this);
		var label = $(this).text();
		
		if(label == "reset" || label == "Reset" || label == "RESET") {
			$(elem).addClass("reset");
			
		}
	});*/

		
		
	/**
	 * ----------------------------------------------------------------------------
	 *
	 *  Detect for IE and apply body class.
	 *
	 * ----------------------------------------------------------------------------
	 */
	
	function getInternetExplorerVersion()
	{
	  var rv = -1;
	  if (navigator.appName == 'Microsoft Internet Explorer')
	  {
	    var ua = navigator.userAgent;
	    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
	    if (re.exec(ua) != null)
	      rv = parseFloat( RegExp.$1 );
	  }
	  else if (navigator.appName == 'Netscape')
	  {
	    var ua = navigator.userAgent;
	    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
	    if (re.exec(ua) != null)
	      rv = parseFloat( RegExp.$1 );
	  }
	  return rv;
	}
	
	
	//If its IE, place "IE" and IE version number class on body tag
	if(getInternetExplorerVersion() != "-1") {
		var bodyClass = "IE" + getInternetExplorerVersion();
		$("body").addClass("IE").addClass(bodyClass);
	}
	
	
	/**
	 * ----------------------------------------------------------------------------
	 *
	 *  Apply fast click polyfill for mobile browsers
	 *
	 * ----------------------------------------------------------------------------
	 */
	 
	FastClick.attach(document.body);
	
	/**
	 * ----------------------------------------------------------------------------
	 *
	 *  Detect Browser and Mobile and apply it as a class to the body element
	 *
	 * ----------------------------------------------------------------------------
	 */
	 
	var browser = BrowserDetect.browser;
	
	
	$("body").addClass(browser);
	
	var isMobile = {
	            Android: function() {
	                return navigator.userAgent.match(/Android/i);
	            },
	            BlackBerry: function() {
	                return navigator.userAgent.match(/BlackBerry/i);
	            },
	            iOS: function() {
	                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	            },
	            Opera: function() {
	                return navigator.userAgent.match(/Opera Mini/i);
	            },
	            Windows: function() {
	                return navigator.userAgent.match(/IEMobile/i);
	            },
	            any: function() {
	                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	            }
	};
	
	var mobileBrowser = isMobile.any();  //will return true of false
	
	if( mobileBrowser ) {
	    $('body').addClass("mobile");
	}
	
	
	/**
	 * ----------------------------------------------------------------------------
	 *
	 *  Search AJAX Logic
	 *
	 * ----------------------------------------------------------------------------
	 */	
 	/*var searchUiHeight = $(".searchContainer").height();
 	var remainingHeight = $(window).height();
 	var resultsMinHeight = remainingHeight - searchUiHeight;
 	var bodyHeight = $("body").height();

 	$("searchContainer form.search-form").submit(function(e) {
	 	e.preventDefault();
	 	
	 	var searchTerm = $(this).find("input[name='s']").val();
	 	var fixedSearchTerm = searchTerm.split(' ').join('+');
	 	var searchUrl = templateUrl + "/?s=" + fixedSearchTerm + " #main";
	 	
	 	$(".searchContainer").addClass("searching");
		 	
	 	
	 	
	 	$( "#ajaxResults" ).load( searchUrl, function() {
		  //completed loading results
		  $("#ajaxResults").css("height",resultsMinHeight);
		  $(".searchUI").removeClass("searching");
		  
		  setTimeout(function() {
			  window.scrollTo(0, 0);
			  $("#ajaxResults").css("height","auto");
			  $(".searchUI").css("position","absolute");
		  },500);
		});
 	});
 	
 	$(window).resize(function() {
	 	searchUiHeight = $(".searchUI").height();
	 	remainingHeight = $(window).height();
 		resultsMinHeight = remainingHeight - searchUiHeight;
 	});
	*/


	
});