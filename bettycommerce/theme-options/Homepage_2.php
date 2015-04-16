<?php /*  Array Options:
   
   name (string)
   desc (string)
   id (string)
   type (string) - text, color, image, select, multiple, textarea, page, pages, category, categories, text_list
   value (string) 	- default value - replaced when custom value is entered - (text, color, select, textarea, page, category)
					- For multiple default values in multiple selects, separate with a comma space ("value" => "option 1, options 2")
						- For pages "value" => "Page Name, Page Name 2"
						- For categories "value" => "slug, slug2"
   options (array)
   attr (array) - any form field attributes
   url (string) - for image type only - defines the default image
   default_text (string) - overrides "None" option text in selects
	
	How to use this file:
		1. Save this template to the 'theme-options' folder in the theme root
		2. Change the file name to this syntax (remember to add the php extension):  
			tab-name_#.php - # is the position you want your tab to appear. Each tab must have a unique ordinal number.
			Example: 
				colors-and-images_0.php - will render a tab "Colors and Images" that will be the first on the list.
		3. Create your options and BAM!
*/

$options = array(
	array(
		'name' => 'Show slider on Homepage',
		'desc' => 'Do you want the slider to appear on the Homepage?',
		'id' => 'homepage_slider',
		'type' => 'select',
		'value' => 'Yes',
		'default_text' => 'Yes',
		'options' => array 
		(
			'No' => 'No'
		)
	),
	array(
		'name' => 'Featured Products Title',
		'desc' => 'Change the title of Featured Products',
		'id' => 'featured_products_title',
		'type' => 'text'
	),
	array(
		'name' => 'Featured Products',
		'desc' => 'This displays a grid of featured products. Select the category you want to display.',
		'id' => 'featured_products',
		'type' => 'select',
		'value' => 'No',
		'default_text' => 'Select Product Category',
		'options' => pro_featured_products()
	),
	array(
		'name' => 'Bottom Newsletter Opt-in',
		'desc' => 'This appears under the content on the homepage.<br /><br /><strong>INPORTANT:</strong> Requires the MojoNewsletter WordPress plugin to work. <a href="http://www.mojo-code.com/item/mojo-newsletter-subscription-wordpress-plugin/" target="_blank">Get Plugin</a>',
		'id' => 'bottom_newsletter_optin',
		'type' => 'select',
		'value' => 'No',
		'default_text' => 'No',
		'options' => array 
		(
			'Yes' => 'Yes'
		)
	)
);


/* ------------ Do not edit below this line ----------- */

//Check if theme options set
global $default_check;
global $default_options;

if(!$default_check):
    foreach($options as $option):
        if($option['type'] != 'image'):
            $default_options[$option['id']] = $option['value'];
        else:
            $default_options[$option['id']] = $option['url'];
        endif;
    endforeach;
    $update_option = get_option('up_themes_'.UPTHEMES_SHORT_NAME);
    if(is_array($update_option)):
        $update_option = array_merge($update_option, $default_options);
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $update_option);
		set_thumbnail_h_w(); // set thumbnail height and width
		update_option('medium_size_w',500);
		update_option('medium_size_h',375);
    else:
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $default_options);
    endif;
endif;

render_options($options);