<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.57
 */

add_filter('ism_offers_save_metabox_value', function ($value, $field){

    switch ($field){
        case "ism_offers_date_arrival":
        case "ism_offers_date_departure":
            $date = DateTime::createFromFormat("d-m-Y", $value);
            return $date->getTimestamp();
            break;
    }
    return $value;
}, 10, 2);

add_filter('ism_offers_print_date', function ($value){
    if(!empty($value)) {
        $value = date("d-m-Y", $value);
    }
    return $value;
}, 10, 1);

add_filter('ism_offers_translate_treatment', function ($value) {

    $slugs = [
        "all_inclusive" => __('All inclusive', 'ism_offers'),
        "fullboard" => __('Full Board', 'ism_offers'),
        "halfboard" => __('Half Board', 'ism_offers'),
        "bed_and_breakfast" => __('Bed and Breakfast', 'ism_offers'),
    ];

    return $slugs[$value];

});
