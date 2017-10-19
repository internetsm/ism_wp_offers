<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 19/10/17
 * Time: 15.38
 */

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
    add_meta_box('ism_offers_metabox', 'Campi offerta', 'ism_offers_metabox_template', 'ism_offers', 'side', 'default');
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

    echo ism_get_template("metabox/metabox", [
        'ism_offers_price'          => $ism_offers_price,
        'ism_offers_price_type'     => $ism_offers_price_type,
        'ism_offers_treatment'      => $ism_offers_treatment,
        'ism_offers_date_arrival'   => $ism_offers_date_arrival,
        'ism_offers_date_departure' => $ism_offers_date_departure,
    ]);
}

/**
 * Template for price metabox
 */
function ism_offers_metabox_template_price()
{
    echo ism_get_template("metabox/fields/price");
}

/**
 * Template for price type metabox
 */
function ism_offers_metabox_template_price_type()
{
    echo ism_get_template("metabox/fields/price-type");
}

/**
 * Template for treatment metabox
 */
function ism_offers_metabox_template_treatment()
{
    echo ism_get_template("metabox/fields/treatment");
}

/**
 * Template for date arrival metabox
 */
function ism_offers_metabox_template_date_arrival()
{
    echo ism_get_template("metabox/fields/date-arrival");
}

/**
 * Template for date departure metabox
 */
function ism_offers_metabox_template_date_departure()
{
    echo ism_get_template("metabox/fields/date-departure");
}