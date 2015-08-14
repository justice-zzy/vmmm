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
			<script src="<?php echo get_template_directory_uri(); ?>/jsmol/JSmol.min.js"></script>

			<script type="text/javascript">
var themePath = "<?php echo get_template_directory_uri(); ?>";
var uploadedFile = "<?php the_field('mol_file'); ?>";
 
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

var Info = {
	width: '100%',
	height: 300,
	debug: false,
	color: "0x112233",
	addSelectionOptions: false,
	use: "HTML5",   // JAVA HTML5 WEBGL are all options
	j2sPath: themePath+"/jsmol/j2s", // this needs to point to where the j2s directory is.
	jarPath: themePath+"/jsmol/java",// this needs to point to where the java directory is.
	jarFile: "JmolAppletSigned.jar",
	isSigned: true,
	script: "set antialiasDisplay;load "+uploadedFile+"",
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
	readyFunction: jmol_isReady,
	disableJ2SLoadMonitor: true,
  disableInitialConsole: true,
  allowJavaScript: true
	//defaultModel: "$dopamine",
	//console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
}

$(document).ready(function() {
  $("#appdiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
})
var lastPrompt=0;
</script>

<div id="appdiv"></div>
	<!--<a href="javascript:Jmol.script(jmolApplet0,'select *;cartoons off;spacefill 23%;wireframe 0.15')">ball&amp;stick</a>
			<a href="javascript:Jmol.script(jmolApplet0, 'spin on')">spin on</a>

<a href="javascript:Jmol.script(jmolApplet0, 'spin off')">spin off</a>-->
		<div class="stdControls cf">
			<?php if( have_rows('controls_below_visuals') ) { ?>
				
				<?php while ( have_rows('controls_below_visuals') ) : the_row(); ?>
				
					<a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('control_action'); ?>')"><?php the_sub_field('control_label'); ?></a>
				
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
				
					<a href="javascript:Jmol.script(jmolApplet0, 'script <?php the_sub_field('control_action'); ?>')"><?php the_sub_field('control_label'); ?></a>
				
				<?php endwhile; ?>
				</div>
		<?php } ?>
		<?php the_field("post_highlighting_features"); ?>
		
		<?php if(get_field("distribution")) { ?>
			<h2>Distribution</h2>
			<?php the_field("distribution"); ?>
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

