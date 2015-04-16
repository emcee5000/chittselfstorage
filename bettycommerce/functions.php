<?php
/********************************************************
* Required
*********************************************************/

/*****************************************
* Set up textdomain
******************************************/
define ( 'MOJO_TEXTDOMAIN', 'pro_betty' );


/*****************************************
* Pro Framework
******************************************/
require_once 'includes/pro_framework/admin.php';

/*****************************************
* Pro Framework
******************************************/
require_once 'includes/admin/functions.php';


/********************************************************
* Options
*********************************************************/

/*****************************************
* Common functions
******************************************/
// require_once 'includes/functions.php';
require_once 'includes/admin/admin_general_functions.php';


/*****************************************
* Add scripts and styles to the admin area
******************************************/
require_once 'includes/admin/admin_scripts_styles.php';


/*****************************************
* add_theme_support()
******************************************/
require_once 'includes/admin/admin_theme_support.php';


/*****************************************
* register_sidebar()
******************************************/
require_once 'includes/admin/admin_sidebars.php';


/*****************************************
* Add scripts and styles to the front end
******************************************/
require_once 'includes/admin/admin_scripts.php';