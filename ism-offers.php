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

function ism_offers_metabox_save()
{
    // name="ism_offers_price"
    // name="ism_offers_price_type"
    // name="ism_offers_price_type"
    // name="ism_offers_treatment">
    // name="ism_offers_date_arrival"
    // name="ism_offers_date_arrival"
    global $post;
    $fields = [
        "ism_offers_price",
        "ism_offers_price_type",
        "ism_offers_treatment",
        "ism_offers_date_arrival",
        "ism_offers_date_departure",
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $data = apply_filters("ism_offers_save_metabox_value", $_POST[$field], $field);
            update_post_meta($post->ID, $field, $data);
        }
    }
}

add_action('save_post', 'ism_offers_metabox_save');


/**
 *
 *
 */
function ism_offers_metabox()
{
    add_meta_box('ism_offers_metabox', 'Descrizione offerta', 'ism_offers_metabox_template', 'ism_offers', 'side', 'default');
}

/**
 *
 */
function ism_offers_metabox_template()
{
    global $post;

    $ism_offers_price = get_post_meta($post->ID, 'ism_offers_price', true);
    $ism_offers_price_type = get_post_meta($post->ID, 'ism_offers_price_type', true);
    $ism_offers_treatment = get_post_meta($post->ID, 'ism_offers_treatment', true);
    $ism_offers_date_arrival = get_post_meta($post->ID, 'ism_offers_date_arrival', true);
    $ism_offers_date_departure = get_post_meta($post->ID, 'ism_offers_date_departure', true);

    echo ism_get_template("metabox/metabox.php", [
        'ism_offers_price'          => $ism_offers_price,
        'ism_offers_price_type'     => $ism_offers_price_type,
        'ism_offers_treatment'      => $ism_offers_treatment,
        'ism_offers_date_arrival'   => $ism_offers_date_arrival,
        'ism_offers_date_departure' => $ism_offers_date_departure,
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