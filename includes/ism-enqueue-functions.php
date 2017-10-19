<?php


add_action('admin_enqueue_scripts', 'ism_offers_admin_scripts');

function ism_offers_admin_scripts()
{
    wp_enqueue_script('ism_jqueryui', plugin_dir_url(__DIR__) . "assets/vendor/jquery-ui/jquery-ui.min.js");
    wp_enqueue_style('ism_jqueryui_theme', plugin_dir_url(__DIR__) . "/assets/vendor/jquery-ui/themes/flick/theme.css");
    wp_enqueue_style('ism_jqueryui_css', plugin_dir_url(__DIR__) . "/assets/vendor/jquery-ui/themes/flick/jquery-ui.min.css");
    wp_enqueue_script('ism_app', plugin_dir_url(__DIR__) . "/assets/js/ism_app.js");
}
