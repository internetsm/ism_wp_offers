<?php
/*
Plugin Name: Ism Offers
Plugin URI: #
Description: Ism Offers
Version: 1.0.0
Author: #
Author URI: #
License: MIT
*/

// https://code.jquery.com/ui/1.12.1/jquery-ui.min.js

define("ISMO_ROOT_DIR", __DIR__);
define("ISMO_ROOT_FILE", __FILE__);
define("ISMO_ROOT_URL", plugin_dir_url(ISMO_ROOT_FILE));
define("ISMO_TEMPLATE_DIR", ISMO_ROOT_DIR . DIRECTORY_SEPARATOR . "templates");
define("ISMO_ASSETS_URL", ISMO_ROOT_URL . "/" . "assets");

require_once "src/autoload.php";
require_once "includes/template-functions.php";
require_once "includes/assets-functions.php";
require_once "includes/filters-functions.php";
require_once "includes/post-types-functions.php";
require_once "includes/taxonomies-functions.php";
require_once "includes/shortcodes-functions.php";
require_once "includes/enqueue-functions.php";
require_once "includes/post-metaboxes-functions.php";
require_once "includes/columns-functions.php";
require_once "includes/visual-composer-functions.php";
require_once "includes/menu-pages-functions.php";