<li class="type-<?php echo $value['type'];?>" id="container-<?php echo $value['id'];?>">
    <fieldset class="title">
        <div class="inner">
            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
            <?php if($value['desc']): ?><kbd><?php echo $value['desc']; ?></kbd><?php endif;?>
        </div>
        <!-- Image Preview Input -->
        <div class="preview" id="<?php echo $value['id']; ?>preview"><?php
        
        if($up_options->$value['id']):
            echo "<img src='".$up_options->$value['id']."' alt='Preview Image' />";
        	echo "</div>";
            echo '<a href="#" class="clear"><img src="' . THEME_DIR . '/includes/pro_framework/images/upfw_ico_delete.png" alt="' . __("Delete Text Field", PA_TEXTDOMAIN) . '" /></a>';
        endif;?>

    </fieldset>

    <fieldset class="data">
            <div class="inner">
                <div class="uploadify">
                    <button type="button" id="<?php echo $value['id']; ?>" class="secondary" <?php echo $attr; ?>><?php echo $value['value']; ?></button>
                    <span id="<?php echo $value['id']; ?>loader" class="loader"></span>
                </div>

                <!-- Hidden Input -->
                <input type="hidden" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if($up_options->$value['id']): echo $up_options->$value['id']; endif;?>" />

                <!-- Upload Status Input -->
                <div class="status hide" id="<?php echo $value['id']; ?>status"></div>

                
                <!-- All Images -->
                <div id="<?php echo $value['id']; ?>allimages" class="allimages">
                    <div class="thumbs">
                        <?php $path = UPFW_UPLOADS_DIR;
                        $directory = @opendir($path) or die("Unable to open folder. Please make sure your /wp-content/uploads/upfw/ folder exists and has permissions of 777.");
                        while (false !== ($file = readdir($directory))) {
                            if($file == "index.php") continue;
                            if($file == ".") continue;
                            if($file == "..") continue;
                            if($file == "list.php") continue;
                            if($file == "Thumbs.db") continue;?>
                            <a class="preview" href="<?php echo UPFW_UPLOADS_URL; ?>/<?php echo $file?>"><img src="<?php echo UPFW_UPLOADS_URL; ?>/<?php echo $file?>" /></a>
                        <?php }
                        closedir($directory);?>
                        <div class="clear"></div>
                    </div>
                    <?php if($value['url']):?>
                        <div class="default">
                            <p><em><?php _e("Default Image", PA_TEXTDOMAIN); ?></em></p>
                            <a href="<?php echo $value['url']; ?>"><img src="<?php echo $value['url']; ?>" /></a>
                        </div>
                    <?php endif;?>
                </div>

            </div>
    </fieldset>
    <div class="clear"></div>
	<!-- <a href="#" id="another">Add Another</a> -->
</li>