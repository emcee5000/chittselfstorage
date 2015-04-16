	<?php $upthemes =  THEME_DIR.'/includes/pro_framework/';?>
	
	<script type="text/javascript">
	    var upThemes = "<?php echo THEME_DIR; ?>";
	</script>

    <div id="upthemes_framework" class="wrap">
    
		<?php upfw_admin_header(); ?>

        <div id="up_docs">

	    <?php
	    if ( file_exists ( TEMPLATEPATH . '/readme.php' ) )
	    {
	    	require TEMPLATEPATH . '/readme.php';
	    }
	    else if ( file_exists ( TEMPLATEPATH . '/readme.html' ) )
	    {
	    	echo file_get_contents( TEMPLATEPATH . '/readme.html' );
	    }
	    else
	    {
	    	echo "<h3>" . __("No documentation available.", PA_TEXTDOMAIN) . "</h3>";
			echo "<p>" . __("To add theme documentation for this theme, please add a file named 'readme.html' to your theme folder with instructions for users of this theme. There's no need to add a doctype or &lt;head&gt; section. Basic HTML will do.", PA_TEXTDOMAIN);
	    }
	    
	    ?>
	    
	</div>
    </div>