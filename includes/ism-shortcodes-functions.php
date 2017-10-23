<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 10.23
 */

add_shortcode('ism_offers', 'ism_shortcode_offers');

function ism_shortcode_offers($atts = [], $content = "")
{

    $defaultAtts = [
        'offset'         => 0,
        'limit'          => -1,
        'order_by'       => 'meta_value',
        'order'          => 'DESC',
        'is_carousel'    => false,
        'thumbnail_size' => 'medium',
    ];

    $atts = array_merge($defaultAtts, $atts);

    $query = new Wp_Query([
        'posts_per_page' => $atts['limit'],
        'orderby'        => $atts['order_by'],
        'order'          => $atts['order'],
        'offset'         => $atts['offset'],
        'meta_query'     => array(
            array(
                'key'     => 'ism_offers_date_departure',
                'value'   => strtotime("now"),
                'compare' => '>=',
                'type'    => 'DATE'
            )
        ),
    ]);

    $posts = $query->get_posts();

    $offers = [];

    foreach ($posts as $post) {

        $price = get_post_meta($post->ID, 'ism_offers_price', true);

        $priceType = get_post_meta($post->ID, 'ism_offers_price_type', true);

        $treatment = get_post_meta($post->ID, 'ism_offers_treatment', true);

        $arrivalDate = get_post_meta($post->ID, 'ism_offers_date_arrival', true);

        $departureDate = get_post_meta($post->ID, 'ism_offers_date_departure', true);

        $image = get_the_post_thumbnail_url($post->ID, $atts['thumbnail_size']);

        $offer = [
            'title'          => $post->post_title,
            'description'    => $post->post_content,
            'price'          => $price,
            'price_type'     => $priceType,
            'treatment'      => $treatment,
            'arrival_date'   => $arrivalDate,
            'departure_date' => $departureDate,
            'image'          => $image,
        ];

        $offers[] = $offer;
    }

    ism_get_template('listing/offers', [
        'offers' => $offers
    ]);
}

/**
 * Loop image
 */
function ism_shortcode_offers_loop_image()
{

}

/**
 * Loop title
 */
function ism_shortcode_offers_loop_title()
{
    ism_get_template('listing/offers', [
        'offers' => $offers
    ]);
}

/**
 * Loop description
 */
function ism_shortcode_offers_loop_description()
{

}