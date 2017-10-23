<?php

/**
 * Offers metabox
 */
add_action("ism_offers_metabox_fields", "ism_offers_metabox_template_price", 20);
add_action("ism_offers_metabox_fields", "ism_offers_metabox_template_price_type", 25);
add_action("ism_offers_metabox_fields", "ism_offers_metabox_template_treatment", 30);
add_action("ism_offers_metabox_fields", "ism_offers_metabox_template_date_arrival", 35);
add_action("ism_offers_metabox_fields", "ism_offers_metabox_template_date_departure", 40);


/**
 * Offers loop
 */
add_action("ism_offers_loop", "ism_shortcode_offers_loop_image", 10);
add_action("ism_offers_loop", "ism_shortcode_offers_loop_title", 20);
add_action("ism_offers_loop", "ism_shortcode_offers_loop_description", 30);