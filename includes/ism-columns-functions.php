<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 25/10/17
 * Time: 11.43
 */

add_filter('manage_ism_offer_posts_columns', 'ism_offers_columns');

function ism_offers_columns($columns)
{

    // name="ism_offers_price"
    // name="ism_offers_price_type"
    // name="ism_offers_price_type"
    // name="ism_offers_treatment">
    // name="ism_offers_date_arrival"
    // name="ism_offers_date_departure"

    $new_columns = array(
        'ism_offers_price'          => "Prezzo",
        'ism_offers_price_type'     => "Tipologia prezzo",
        'ism_offers_treatment'      => "Trattamento",
        'ism_offers_date_arrival'   => "Data arrivo",
        'ism_offers_date_departure' => "Data partenza",
        'ism_offers_categories'     => "Categorie",
        'ism_offers_thumbnail'      => "Immagine",
    );
    unset($columns['author']);
    unset($columns['comments']);
    unset($columns['categories']);
    unset($columns['tags']);
    return array_merge($columns, $new_columns);
}

add_action('manage_ism_offer_posts_custom_column', 'ism_offers_manage_columns', 10, 2);

function ism_offers_manage_columns($column, $post_id)
{

    $translations = [
        "price_night"       => "Prezzo per notte",
        "price_flat"        => "Prezzo forfettario",
        "all_inclusive"     => "All Inclusive",
        "fullboard"         => "Pensione completa",
        "halfboard"         => "Mezza pensione",
        "bed_and_breakfast" => "Bed & Breakfast",
    ];

    switch ($column){

        case 'ism_offers_price':

            printf("%s €", get_post_meta($post_id, 'ism_offers_price', true));
            break;
        case 'ism_offers_price_type':

            $priceType = get_post_meta($post_id, 'ism_offers_price_type', true);

            $priceType = isset($translations[$priceType]) ? $translations[$priceType] : $priceType;

            echo $priceType;
            break;

        case 'ism_offers_treatment':

            $treatment = get_post_meta($post_id, 'ism_offers_treatment', true);

            $treatment = isset($translations[$treatment]) ? $translations[$treatment] : $treatment;

            echo $treatment;
            break;

        case 'ism_offers_date_arrival':

            $dateArrival = get_post_meta($post_id, 'ism_offers_date_arrival', true);

            $dateArrival = $dateArrival ? apply_filters("ism_offers_print_date", $dateArrival) : $dateArrival;

            echo $dateArrival;
            break;

        case 'ism_offers_date_departure':

            $dateDeparture = get_post_meta($post_id, 'ism_offers_date_departure', true);
            $valid = ($dateDeparture >= strtotime("now"));
            $color = ($valid ? "green" : "red");

            printf("<span style='color: %s;'>%s</span>",
                $color,
                apply_filters("ism_offers_print_date", $dateDeparture)
            );
            break;

        case 'ism_offers_categories':

            $categories = array_map(function ($term){
                return $term->name;
            }, wp_get_post_terms($post_id, 'ism_offers_category'));

            echo implode(", ", $categories);
            break;

        case 'ism_offers_thumbnail':

            $thumbnailUrl = get_the_post_thumbnail_url($post_id, 'thumbnail');

            printf("<img src='%s'/>", $thumbnailUrl);
            break;
    }
}