<?php

add_action('wp_footer', function(){
  wp_enqueue_script('ism-offers-jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
});
