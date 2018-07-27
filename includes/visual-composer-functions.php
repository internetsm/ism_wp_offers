<?php

add_action('vc_before_init', 'ism_offers_vc_shortcode');

function ism_offers_vc_shortcode($shortcodes)
{
//        -'offset'                  => 0,
//        -'limit'                   => -1,
//        'order_by'                => 'meta_value',
//        'order'                   => 'DESC',
//        -'is_carousel'             => false,
//        -'thumbnail_size'          => 'medium',
//        -'category'                => null,
//        -'category_relation'       => 'AND',
//        -'carousel_columns'        => 3,
//        -'carousel_scroll_columns' => 1,
//        -'carousel_autoplay'       => true,
//        -'carousel_dots'           => true,
//        -'carousel_arrows'         => true,


    vc_map([
        'name'        => "Lista offerte",
        'base'        => 'ism_offers',
        'category'    => "InternetSm",
        'description' => "Lista delle offerte",
        'params'      => [
            [
                'type'        => 'textfield',
                'heading'     => 'Tema',
                'param_name'  => 'theme',
                'value'       => 0,
                'description' => 'Tema del template (il nome del template avrà il suffisso "-nome_tema"',
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Offset',
                'param_name'  => 'offset',
                'value'       => 0,
                'description' => 'Numero di offerte da skippare',
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Numero massimo risultati',
                'param_name'  => 'limit',
                'value'       => -1,
                'description' => 'Numero massimo di risultati (-1 per "nessun limite")',
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Dimensione thumbnail immagine',
                'param_name'  => 'thumbnail_size',
                'value'       => 'thumbnail',
                'description' => 'Dimensione thumbnail (thumbnail, medium, large, full, ecc.)',
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Categoria/e',
                'param_name'  => 'category',
                'value'       => '',
                'description' => '',
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Categoria relation query',
                'param_name'  => 'category_relation',
                'value'       => [
                    'AND', 'OR',
                ],
                'description' => '',
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Mese',
                'param_name'  => 'month',
                'value'       => [
                    '',
                    'Gennaio',
                    'Febbraio',
                    'Marzo',
                    'Aprile',
                    'Maggio',
                    'Giugno',
                    'Luglio',
                    'Agosto',
                    'Settembre',
                    'Ottobre',
                    'Novembre',
                    'Dicembre',
                ],
                'description' => '',
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Carosello',
                'param_name'  => 'is_carousel',
                'value'       => 1,
                'description' => 'Carosello o listing normale',
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Numero colonne carosello',
                'param_name'  => 'carousel_columns',
                'value'       => [
                    1, 2, 3, 4,
                ],
                'std'         => 3,
                'description' => '',
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Numero colonne carosello Tablet',
                'param_name'  => 'carousel_columns_tablet',
                'value'       => [
                    1, 2, 3, 4,
                ],
                'std'         => 2,
                'description' => '',
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Numero colonne carosello Mobile',
                'param_name'  => 'carousel_columns_mobile',
                'value'       => [
                    1, 2, 3, 4,
                ],
                'std'         => 1,
                'description' => '',
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Scroll colonne carosello',
                'param_name'  => 'carousel_scroll_columns',
                'value'       => [
                    1, 2, 3, 4,
                ],
                'std'         => 1,
                'description' => '',
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Velocità scorrimento in ms (1000ms = 1s)',
                'param_name'  => 'carousel_speed',
                'value'       => '',
                'description' => '',
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Autoplay carosello',
                'param_name'  => 'carousel_autoplay',
                'description' => '',
                'value'       => 1,
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Velocità autoplay in ms (1000ms = 1s)',
                'param_name'  => 'carousel_autoplay_speed',
                'value'       => '',
                'description' => '',
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Pallini carosello',
                'param_name'  => 'carousel_dots',
                'description' => '',
                'value'       => 1,
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Freccie carosello',
                'param_name'  => 'carousel_arrows',
                'description' => '',
                'value'       => 1,
                'dependency'  => [
                    'element'   => 'is_carousel',
                    'not_empty' => true,
                ],
            ],
        ],
    ]);
    return $shortcodes;
}
