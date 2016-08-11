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
			script: "set antialiasDisplay;load '"+molname+"'",
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
  $("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info));
  
   //Jmol.evaluateVar(myJmol, "alert('background red; print backgroundColor')");
  //Jmol.scriptWait(jmolApplet0, "alert('background red')");
  
  
  if(loadscript) {
	  Jmol.script(jmolApplet0, 'script <?php the_field('load_script'); ?>');	  
	  
	  setTimeout(function() {
		  Jmol.script(jmolApplet0, 'script <?php the_field('load_script'); ?>');	  
	  },2000);
	
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
		
		<div id="buttons">
    <button id="fullscreen">Fullscreen</button>
    <button id="vr">VR (WebVR/Mobile only)</button>
    <button id="reset">Reset</button>
  </div>

		
	</header><!-- .entry-header -->
		<?php the_content(); ?>
		
		
		
		<?php if( have_rows('controls_after_content') ) { ?>
				<div class="highlightingFeatures">
					<h2>Highlighting Features</h2>
				<?php while ( have_rows('controls_after_content') ) : the_row(); ?>
				
					<?php if( get_row_layout() == 'add_formatted_control' ) { ?>
							<a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('control_action'); ?>')" class="<?php the_sub_field('control_label'); ?>"><?php the_sub_field('control_label'); ?></a>
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



<script>
WebVRConfig = {
  BUFFER_SCALE: 1.0,
};

document.addEventListener('touchmove', function(e) {
  e.preventDefault();
});
</script>

<!-- three.js library -->
<script src="<?php echo get_template_directory_uri(); ?>/js/three/three.js"></script>

<!-- VRControls.js applies the WebVR transformations to a three.js camera object. -->
<script src="<?php echo get_template_directory(); ?>/js/three/examples/js/controls/VRControls.js"></script>

<!-- VREffect.js handles stereo camera setup and rendering.  -->
<script src="<?php echo get_template_directory(); ?>/js/three/examples/js/effects/VREffect.js"></script>

<!-- A polyfill for the WebVR API.  -->
<script src="<?php echo get_template_directory(); ?>/js/webvr-polyfill.js"></script>


<script>
// Setup three.js WebGL renderer. Note: Antialiasing is a big performance hit.
// Only enable it if you actually need to.
var renderer = new THREE.WebGLRenderer({antialias: false});
renderer.setPixelRatio(Math.floor(window.devicePixelRatio));

// Append the canvas element created by the renderer to document body element.
document.body.appendChild(renderer.domElement);

// Create a three.js scene.
var scene = new THREE.Scene();

// Create a three.js camera.
var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);

// Apply VR headset positional data to camera.
var controls = new THREE.VRControls(camera);

// Apply VR stereo rendering to renderer.
var effect = new THREE.VREffect(renderer);
effect.setSize(window.innerWidth, window.innerHeight);


// Add a repeating grid as a skybox.
var boxWidth = 5;
var loader = new THREE.TextureLoader();
loader.load('img/box.png', onTextureLoaded);

// Get the VRDisplay and save it for later.
var vrDisplay = null;
navigator.getVRDisplays().then(function(displays) {
  if (displays.length > 0) {
    vrDisplay = displays[0];
  }
});

function onTextureLoaded(texture) {
  texture.wrapS = THREE.RepeatWrapping;
  texture.wrapT = THREE.RepeatWrapping;
  texture.repeat.set(boxWidth, boxWidth);

  var geometry = new THREE.BoxGeometry(boxWidth, boxWidth, boxWidth);
  var material = new THREE.MeshBasicMaterial({
    map: texture,
    color: 0x01BE00,
    side: THREE.BackSide
  });

  var skybox = new THREE.Mesh(geometry, material);
  scene.add(skybox);
}

// Create 3D objects.
var geometry = new THREE.BoxGeometry(0.5, 0.5, 0.5);
var material = new THREE.MeshNormalMaterial();
var cube = new THREE.Mesh(geometry, material);

// Position cube mesh
cube.position.z = -1;

// Add cube mesh to your three.js scene
scene.add(cube);

// Request animation frame loop function
var lastRender = 0;
function animate(timestamp) {
  var delta = Math.min(timestamp - lastRender, 500);
  lastRender = timestamp;

  // Apply rotation to cube mesh
  cube.rotation.y += delta * 0.0006;

  // Update VR headset position and apply to camera.
  controls.update();

  // Render the scene.
  effect.render(scene, camera);

  // Keep looping.
  requestAnimationFrame(animate);
}

function onResize() {
  console.log('Resizing to %s x %s.', window.innerWidth, window.innerHeight);
  effect.setSize(window.innerWidth, window.innerHeight);
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
}

function onVRDisplayPresentChange() {
  console.log('onVRDisplayPresentChange');
  onResize();
}

// Kick off animation loop.
requestAnimationFrame(animate);

// Resize the WebGL canvas when we resize and also when we change modes.
window.addEventListener('resize', onResize);
window.addEventListener('vrdisplaypresentchange', onVRDisplayPresentChange);

// Button click handlers.
document.querySelector('button#fullscreen').addEventListener('click', function() {
  enterFullscreen(renderer.domElement);
});
document.querySelector('button#vr').addEventListener('click', function() {
  vrDisplay.requestPresent([{source: renderer.domElement}]);
});
document.querySelector('button#reset').addEventListener('click', function() {
  vrDisplay.resetPose();
});

function enterFullscreen (el) {
  if (el.requestFullscreen) {
    el.requestFullscreen();
  } else if (el.mozRequestFullScreen) {
    el.mozRequestFullScreen();
  } else if (el.webkitRequestFullscreen) {
    el.webkitRequestFullscreen();
  } else if (el.msRequestFullscreen) {
    el.msRequestFullscreen();
  }
}

</script>
