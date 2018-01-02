<?php

namespace IsmOffers\Helper;

class OptionsHelper
{

    const POST_TYPE_SLUG_KEY = "_ism_offers_post_type_slug";

    const POST_TYPE_HAS_ARCHIVE_KEY = "_ism_offers_post_type_has_archive";

    /**
     * @return string
     */
    public static function getPostTypeSlug()
    {
        return get_option(self::POST_TYPE_SLUG_KEY, 'offer');
    }

    /**
     * @param $slug
     * @return string
     */
    public static function setPostTypeSlug($slug)
    {
        return update_option(self::POST_TYPE_SLUG_KEY, $slug);
    }


    /**
     * @return bool
     */
    public static function hasPostTypeArchive()
    {
        return get_option(self::POST_TYPE_HAS_ARCHIVE_KEY, false);
    }

    /**
     * @param bool $archive
     * @return bool
     */
    public static function setPostTypeArchive($archive)
    {
        return update_option(self::POST_TYPE_HAS_ARCHIVE_KEY, $archive);
    }
}