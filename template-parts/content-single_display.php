<?php
/**
 * Template part for displaying single posts.
 *
 * @package vmmm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
		
		<div class="visuals">
			<div id="appdiv"></div>
			
			<script src="<?php echo get_template_directory_uri(); ?>/jsmol/JSmol.min.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/jsmol/JSmol.GLmol.min.js"></script>
			
			
			
			
			<script type="text/javascript">
				
							
var themePath = "<?php echo get_template_directory_uri(); ?>";

var molvis = "<?php the_field('molvis'); ?>";
var loadscript = "<?php the_field('load_script'); ?>";

var rendering = "<?php the_field('display_rendering'); ?>"

var molname = "<?php the_field('moleculemineral_name'); ?>"
var uploadedFile = "<?php the_field('mol_file'); ?>";




console.log(uploadedFile);
 
Jmol._isAsync = false;

// last update 2/18/2014 2:10:06 PM


var jmolApplet0; // set up in HTML table, below

// logic is set by indicating order of USE -- default is HTML5 for this test page, though

var s = document.location.search;

// Developers: The _debugCode flag is checked in j2s/core/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println, document.title, or alert commands
// anywhere in the Java or Jmol code.

Jmol._debugCode = (s.indexOf("debugcode") >= 0);

jmol_isReady = function(applet) {
	//document.title = (applet._id + " - Jmol " + Jmol.___JmolVersion)
	//Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
}		

//var stdControls = $(".stdControls").height();
//var headerHeight = $(".site-branding").height();
var windowHeight = $(window).height();

var finalHeight = windowHeight - 140;
//alert(finalHeight);

if(molvis == "name") {
	if(rendering == "html5") {
		var Info = {
			width: '100%',
			height: finalHeight,
			debug: false,
			color: "0x112233",
			addSelectionOptions: false,
			use: "HTML5 WEBGL",   // JAVA HTML5 WEBGL are all options
			j2sPath: themePath+"/jsmol/j2s", // this needs to point to where the j2s directory is.
			//jarPath: themePath+"/jsmol/java",// this needs to point to where the java directory is.
			//jarFile: "JmolAppletSigned.jar",
			//isSigned: true,
			script: "set antialiasDisplay;load '"+molname+"'",
			//script: "load "+themePath+"/jsmol/data/caffeine.mol",
			serverURL: themePath+"/jsmol/php/jsmol.php",
			readyFunction: jmol_isReady,
			disableJ2SLoadMonitor: false,
			disableInitialConsole: true,
		  	allowJavaScript: true
			//defaultModel: "$dopamine",
			//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
		}
		
	} else {
		var Info = {
			width: '100%',
			height: finalHeight,
			debug: false,
			color: "0x112233",
			addSelectionOptions: false,
			use: "WEBGL HTML5",   // JAVA HTML5 WEBGL are all options
			j2sPath: themePath+"/jsmol/j2s", // this needs to point to where the j2s directory is.
			//jarPath: themePath+"/jsmol/java",// this needs to point to where the java directory is.
			//jarFile: "JmolAppletSigned.jar",
			//isSigned: true,
			script: "set antialiasDisplay;load '"+molname+"'",
			//script: "load "+themePath+"/jsmol/data/caffeine.mol",
			serverURL: themePath+"/jsmol/php/jsmol.php",
			readyFunction: jmol_isReady,
			disableJ2SLoadMonitor: false,
			disableInitialConsole: true,
		  	allowJavaScript: true
			//defaultModel: "$dopamine",
			//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
		}
	}
	
} else {
	
	if(rendering == "html5") {
		var Info = {
		width: '100%',
		height: finalHeight,
		debug: false,
		color: "0x112233",
		addSelectionOptions: false,
		use: "HTML5 WEBGL",   // JAVA HTML5 WEBGL are all options
		j2sPath: themePath+"/jsmol/j2s", // this needs to point to where the j2s directory is.
		//jarPath: themePath+"/jsmol/java",// this needs to point to where the java directory is.
		//jarFile: "JmolAppletSigned.jar",
		//isSigned: true,
		script: "set antialiasDisplay;load "+uploadedFile+"",
		//script: "load "+themePath+"/jsmol/data/caffeine.mol",
		serverURL: themePath+"/jsmol/php/jsmol.php",
		readyFunction: jmol_isReady,
		disableJ2SLoadMonitor: true,
		disableInitialConsole: true,
	  	allowJavaScript: true
		//defaultModel: "$dopamine",
		//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
		}
	} else {
		var Info = {
		width: '100%',
		height: finalHeight,
		debug: false,
		color: "0x112233",
		addSelectionOptions: false,
		use: "WEBGL HTML5",   // JAVA HTML5 WEBGL are all options
		j2sPath: themePath+"/jsmol/j2s", // this needs to point to where the j2s directory is.
		//jarPath: themePath+"/jsmol/java",// this needs to point to where the java directory is.
		//jarFile: "JmolAppletSigned.jar",
		//isSigned: true,
		script: "set antialiasDisplay;load "+uploadedFile+"",
		//script: "load "+themePath+"/jsmol/data/caffeine.mol",
		serverURL: themePath+"/jsmol/php/jsmol.php",
		readyFunction: jmol_isReady,
		disableJ2SLoadMonitor: true,
		disableInitialConsole: true,
	  	allowJavaScript: true
		//defaultModel: "$dopamine",
		//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
		}
	}
		
	
	
	
}



$(document).ready(function() {
	//run the initial load script
	console.log("delaying...");
  setTimeout(function() {
	$("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info));	  
  },4000);
  
  
  //In the event of a load script being set, the load script is pulled into JS, evaluated to fix any file paths, then executed.
  
  
  if(loadscript) {
	jQuery.get(loadscript, function(data) {
	    //alert(data);
	    var items = data.split(' ');
	    
	    var fileext = ".cif";
	    
	    var re = new RegExp('^\\W?' + fileext + '.*$', 'gi');
	    var matches = [];
	    for(var i = 0; i < items.length; i++) {
	        if(items[i].indexOf(fileext) > -1)
	            matches.push(items[i]);
	    }
	    
	    
	    if(matches.length == 0) {
		    //no matches for cif, attempting mol
		    var fileext = ".mol";
	    
		    var re = new RegExp('^\\W?' + fileext + '.*$', 'gi');
		    var matches = [];
		    for(var i = 0; i < items.length; i++) {
		        if(items[i].indexOf(fileext) > -1)
		            matches.push(items[i]);
		    }
		    
	    }
	   
		var foundmatch = matches[0];
		
		
		if (foundmatch.substr(-1) === ";") {
			// if grabbed match has a semicolon at the end, re add it to its replacement.	
			uploadedFile = uploadedFile + ";";
		}

		
		data = data.replace(foundmatch,uploadedFile);
		
		
		//Load fixed script
		Jmol.script(jmolApplet0,'load ' + data +'');	
		
		
	    
	});

}
  
});
var lastPrompt=0;


</script>


	<!--<a href="javascript:Jmol.script(jmolApplet0,'select *;cartoons off;spacefill 23%;wireframe 0.15')">ball&amp;stick</a>
			<a href="javascript:Jmol.script(jmolApplet0, 'spin on')">spin on</a>

<a href="javascript:Jmol.script(jmolApplet0, 'spin off')">spin off</a>-->

		
<div class="key">
			<?php if( have_rows('key') ) { ?>
				
				<?php while ( have_rows('key') ) : the_row(); ?>
				
					<div class="element" id="<?php the_sub_field('element'); ?>" title="<?php the_sub_field('element_full_name'); ?>">
					<?php the_sub_field('element'); ?>
					</div>
				
				<?php endwhile; ?>
				
		<?php } ?>
		</div>
		<div class="stdControls cf">
			
			
			<?php if( have_rows('controls_below_visuals') ) { ?>
				
				<?php while ( have_rows('controls_below_visuals') ) : the_row(); ?>
				
					<?php if( get_row_layout() == 'add_formatted_control' ) { ?>
							<a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('control_action'); ?>')" class="<?php the_sub_field('control_label'); ?>" data-action="<?php the_sub_field('control_action'); ?>"><?php the_sub_field('control_label'); ?></a>
							
							<?php if(get_sub_field('is_this_a_nested_control')) { ?>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('nested_controls') ): ?>
											<div class="nestedGroup">
										 	
										    <?php while ( have_rows('nested_controls') ) : the_row(); ?>
										
										        
										        <a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('nested_control_action'); ?>')" data-action="<?php the_sub_field('nested_control_action'); ?>"><?php the_sub_field('nested_control_action'); ?></a>
										
										   <?php endwhile; ?>
											</div>
										<?php else :
										
										    // no rows found
										
										endif;
										
										?>
							<?php } ?>
							
							
					<?php } else { ?>
							<?php the_sub_field('custom_html'); ?>
					<?php } ?>
				
				<?php endwhile; ?>
				
		<?php } ?>
		</div>
		</div>
		
		<div class="contentColumn">
			<div class="contentColumnInner">
		<header class="entry-header">
			
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
				
	</header><!-- .entry-header -->
		<?php the_content(); ?>
		
		
		
		<?php if( have_rows('controls_after_content') ) { ?>
				<div class="highlightingFeatures">
					<h2>Highlighting Features</h2>
				<?php while ( have_rows('controls_after_content') ) : the_row(); ?>
				
					<?php if( get_row_layout() == 'add_formatted_control' ) { ?>
							<a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('control_action'); ?>')" class="<?php the_sub_field('control_label'); ?> highlightingLink"><?php the_sub_field('control_label'); ?></a>
							<div class="controlDescription"><?php the_sub_field('control_description'); ?></div>
					<?php } else { ?>
							<?php the_sub_field('custom_html'); ?>
					<?php } ?>
				
					
				
				<?php endwhile; ?>
				</div>
		<?php } ?>
		<?php the_field("post_highlighting_features"); ?>
		
		<?php if(get_field("distribution")) { ?>
			<h2>Distribution</h2>
			<?php the_field("distribution"); ?>
		<?php } ?>
		
		<?php if(get_field("crystallographic_data")) { ?>
			<h2>Crystallographic Data</h2>
			<?php the_field("crystallographic_data"); ?>
		<?php } ?>
		
		<?php if(get_field("references")) { ?>
			<?php the_field("references"); ?>
		<?php } ?>
		
		<?php if(get_field("footer")) { ?>
			<?php the_field("footer"); ?>
		<?php } ?>
		
		<!--<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vmmm' ),
				'after'  => '</div>',
			) );
		?>-->
		</div>
		</div>
	</div><!-- .entry-content -->

	<!--<footer class="entry-footer">
		<?php vmmm_entry_footer(); ?>
	</footer>--><!-- .entry-footer -->
</article><!-- #post-## -->
