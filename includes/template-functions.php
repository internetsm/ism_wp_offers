<?php


if (!function_exists("ism_offers_get_template")) {

    /**
     * Get template
     *
     * @param $slug
     * @param $args
     * @return string
     * @throws Exception
     */
    function ism_offers_get_template($slug, $args = [])
    {
        $slug = preg_replace("/\.php$/", "", $slug);

        $templatePathSelected = null;
        $templatePaths = [
            ISMO_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "{$slug}.php",
            get_stylesheet_directory() . "/templates/ism_wp_offers/{$slug}.php",
            get_stylesheet_directory() . "/templates/ism_offers/{$slug}.php",
            get_stylesheet_directory() . "/ism_wp_offers/{$slug}.php",
            get_stylesheet_directory() . "/ism_offers/{$slug}.php",
        ];
        foreach ($templatePaths as $templatePath) {
            if (file_exists($templatePath)) {
                $templatePathSelected = $templatePath;
            }
        }
        if (!$templatePathSelected) {
            throw new \Exception("ism_offers_get_template exception - Neither of these templates could be found: " . implode(", ", $templatePaths));
        }
        ob_start();
        extract($args);
        include $templatePathSelected;
        return ob_get_clean();
    }
}
