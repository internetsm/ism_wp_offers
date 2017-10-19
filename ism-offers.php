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

add_action('admin_enqueue_scripts', 'ism_offers_admin_scripts');

function ism_offers_admin_scripts()
{
//    wp_enqueue_script('ism_jquery', "https://code.jquery.com/jquery-3.2.1.min.js");
//    wp_enqueue_script('ism_jqueryui', "https://code.jquery.com/ui/jquery-ui-git.js");
    wp_enqueue_script('ism_jqueryui', plugin_dir_url(__FILE__) . "assets/vendor/jquery-ui/jquery-ui.min.js");
    wp_enqueue_style('ism_jqueryui_theme', plugin_dir_url(__FILE__) . "/assets/vendor/jquery-ui/themes/flick/theme.css");
    wp_enqueue_style('ism_jqueryui_css', plugin_dir_url(__FILE__) . "/assets/vendor/jquery-ui/themes/flick/jquery-ui.min.css");

    wp_enqueue_script('ism_app', plugin_dir_url(__FILE__) . "/assets/js/ism_app.js");
}


add_action('init', 'ism_offers_custom_post_type_declaration');

/**
 * Register a offer post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ism_offers_custom_post_type_declaration()
{
    $labels = array(
        'name'               => "Offerte",
        'singular_name'      => "Offerta",
        'menu_name'          => "Offerte",
        'name_admin_bar'     => "Offerta",
        'add_new'            => "Aggiungi",
        'add_new_item'       => "Aggiungi",
        'new_item'           => "Nuova",
        'edit_item'          => "Modifica",
        'view_item'          => "Visualizza",
        'all_items'          => "Tutte",
        'search_items'       => "Cerca",
        'parent_item_colon'  => "Genitori",
        'not_found'          => "Non trovato",
        'not_found_in_trash' => "Non trovato in bidone",
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'your-plugin-textdomain'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'offer'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('ism_offers', $args);
}

add_action('add_meta_boxes', 'ism_offers_metabox');

/**
 *
 *
 */
function ism_offers_metabox()
{
    add_meta_box('ism_offers_metabox', 'Offerte', 'ism_offers_metabox_template', 'ism_offers', 'side', 'default');
}

/**
 *
 */
function ism_offers_metabox_template()
{

    echo ism_get_template("metabox/metabox.php", [
        "pippo" => "Ciao",
    ]);
}

if (!function_exists("ism_get_template")) {
    function ism_get_template($slug, $args)
    {
        ob_start();
        extract($args);
        include __DIR__ . "/templates/{$slug}";
        return ob_get_clean();
    }
}