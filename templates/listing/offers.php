<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.16
 */

foreach ($offers as $offer){

    ?>

    <div class="offer">

        <?php
        /**
         * @hooked ism_shortcode_offers_loop_image 10
         * @hooked ism_shortcode_offers_loop_title 20
         * @hooked ism_shortcode_offers_loop_description 30
         */
        do_action("ism_offers_loop");
        ?>

    </div>

    <?php

}