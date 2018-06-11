<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 10.23
 */

add_shortcode('ism_offers', 'ism_shortcode_offers');

function ism_shortcode_offers($atts, $content = "")
{
    if (!is_array($atts)) {
        $atts = [];
    }

    $defaultAtts = [
        'theme'                   => "",
        'offset'                  => 0,
        'limit'                   => -1,
        'order_by'                => 'meta_value',
        'order'                   => 'DESC',
        'month'                   => "",
        'is_carousel'             => false,
        'thumbnail_size'          => 'medium',
        'has_button'              => true,
        'category'                => null,
        'category_relation'       => 'AND',
        'carousel_columns'        => 3,
        'carousel_scroll_columns' => 1,
        'carousel_autoplay'       => true,
        'carousel_speed'          => 3000,
        'carousel_autoplay_speed' => 3000,
        'carousel_dots'           => true,
        'carousel_arrows'         => true,
        'carousel_infinite'       => true,
    ];

    $atts = array_merge($defaultAtts, $atts);

    $queryArguments = [
        'posts_per_page' => $atts['limit'],
        'meta_key'       => 'ism_offers_date_arrival',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'offset'         => $atts['offset'],
        'post_type'      => 'ism_offer',

    ];

    $metaQuery = [
        'AND',
        [
            'key'     => 'ism_offers_date_departure',
            'value'   => strtotime("now"),
            'compare' => '>=',
            'type'    => 'NUMERIC',
        ],
    ];

    if (!empty($atts['month'])) {

        $months = [
            'Gennaio'   => 1,
            'Febbraio'  => 2,
            'Marzo'     => 3,
            'Aprile'    => 4,
            'Maggio'    => 5,
            'Giugno'    => 6,
            'Luglio'    => 7,
            'Agosto'    => 8,
            'Settembre' => 9,
            'Ottobre'   => 10,
            'Novembre'  => 11,
            'Dicembre'  => 12,
        ];

        $month = $months[$atts['month']];

        $currentMonth = intval((new \DateTime())->format('m'));

        $currentYear = intval((new \DateTime())->format('Y'));

        $nextYearDate = new \DateTime();

        $nextYearDate->modify('+1 year');

        $nextYear = intval($nextYearDate->format('Y'));

        $year = $month < $currentMonth ? $nextYear : $currentYear;

        $dateString = sprintf('%s-%s-%s %s:%s:%s',
            '01',
            strlen($month) > 1 ? $month : '0' . $month,
            $year,
            '00',
            '00',
            '00'
        );

        $startDateTime = \DateTime::createFromFormat('d-m-Y H:i:s', $dateString);

        $endDateTime = \DateTime::createFromFormat('d-m-Y H:i:s', $dateString);

        $endDateTime->modify('+1 month');

        $tempMetaQuery = [
            [
                'key'     => 'ism_offers_date_departure',
                'value'   => $startDateTime->getTimestamp(),
                'compare' => '>=',
                'type'    => 'NUMERIC',
            ],
            [
                'key'     => 'ism_offers_date_arrival',
                'value'   => $endDateTime->getTimestamp(),
                'compare' => '<',
                'type'    => 'NUMERIC',
            ],
        ];

        $metaQuery = array_merge($metaQuery, $tempMetaQuery);

    }

    if (!is_null($atts['category'])) {

        $taxQuery = [
            'relation' => $atts['category_relation'],
        ];

        if (!is_array($atts['category'])) {
            $atts['category'] = [
                $atts['category'],
            ];
        }

        foreach ($atts['category'] as $categoryValue) {
            $taxQuery[] = [
                'taxonomy' => 'ism_offers_category',
                'field'    => is_numeric($categoryValue) ? 'id' : 'slug',
                'terms'    => [
                    $categoryValue,
                ],
                'operator' => 'IN',
            ];
        }
        $queryArguments['tax_query'] = $taxQuery;
    }

    $queryArguments['meta_query'] = $metaQuery;

    $query = new Wp_Query($queryArguments);

    $posts = $query->get_posts();

    $offers = [];

    foreach ($posts as $post) {

        $price = get_post_meta($post->ID, 'ism_offers_price', true);

        $priceType = get_post_meta($post->ID, 'ism_offers_price_type', true);

        $treatment = get_post_meta($post->ID, 'ism_offers_treatment', true);

        $arrivalDate = get_post_meta($post->ID, 'ism_offers_date_arrival', true);

        $departureDate = get_post_meta($post->ID, 'ism_offers_date_departure', true);

        $url = get_permalink($post->ID);

        $image = get_the_post_thumbnail_url($post->ID, $atts['thumbnail_size']);

        $offer = [
            'ID'             => $post->ID,
            'title'          => $post->post_title,
            'description'    => strip_tags($post->post_content, '<strong><b>'),
            'excerpt'        => get_the_excerpt($post->ID),
            'price'          => $price,
            'price_type'     => $priceType,
            'treatment'      => $treatment,
            'arrival_date'   => $arrivalDate,
            'departure_date' => $departureDate,
            'image'          => $image,
            'url'            => $url,
        ];

        $offers[] = $offer;
    }

    $templateName = $atts['is_carousel'] ? 'carousel/offers' . (!empty($atts['theme']) ? "-" . $atts['theme'] : "") : 'listing/offers' . (!empty($atts['theme']) ? "-" . $atts['theme'] : "");
    $templateAttrs = [
        'offers' => $offers,
    ];

    if ($atts['is_carousel']) {
        $templateAttrs['carousel'] = [
            'autoplay'       => $atts['carousel_autoplay'],
            'columns'        => $atts['carousel_columns'],
            'scroll_columns' => $atts['carousel_scroll_columns'],
            'dots'           => $atts['carousel_dots'],
            'arrows'         => $atts['carousel_arrows'],
            'speed'          => $atts['carousel_speed'],
            'autoplay_speed' => $atts['carousel_autoplay_speed'],
            'infinite'       => $atts['carousel_infinite'],
        ];
    }

    try {
        $template = ism_offers_get_template($templateName, $templateAttrs);

        return $template;
    } catch (\Exception $exception) {
        return $exception->getMessage();
    }
}