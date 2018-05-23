<?php

use IsmOffers\Entity\IsmOffer;
use IsmOffers\Helper\OptionsHelper;
/*
add_action('admin_menu', function () {

    add_submenu_page('edit.php?post_type=' . IsmOffer::POST_TYPE, __('Impostazioni', 'ism-offers-menu'), __('Impostazioni', 'ism-offers-menu'), 'manage_options', 'ism_offers_settings_menu', function () {

        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;

        if ($slug) {

            OptionsHelper::setPostTypeSlug($slug);
        }

        OptionsHelper::setPostTypeArchive(isset($_POST['archive']));

        flush_rewrite_rules();

        echo ism_offers_get_template('admin/settings', [
            'slug'    => OptionsHelper::getPostTypeSlug(),
            'archive' => OptionsHelper::hasPostTypeArchive(),
        ]);
    });
});
*/