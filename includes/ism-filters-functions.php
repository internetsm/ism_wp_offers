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
});

add_filter('ism_offers_print_date', function ($value){
    $value = date("d-m-Y", $value);
    return $value;
});