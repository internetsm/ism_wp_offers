<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.16
 */

?>

<ul class="slick-carousel"
    data-columns="<?php echo $carousel['columns']; ?>"
    data-columns-tablet="<?php echo $carousel['columns_tablet']; ?>"
    data-columns-mobile="<?php echo $carousel['columns_mobile']; ?>"
    data-scroll-columns="<?php echo $carousel['scroll_columns']; ?>"
    data-autoplay="<?php echo $carousel['autoplay']; ?>"
    data-arrows="<?php echo $carousel['arrows']; ?>"
    data-dots="<?php echo $carousel['dots']; ?>"
    data-speed="<?php echo $carousel['speed']; ?>"
    data-autoplay-speed="<?php echo $carousel['autoplay_speed']; ?>">
    <?php foreach ($offers as $offer) {
        ?>
        <li class="offer columns-<?php echo $carousel['columns']; ?>">
            <img class="offer-image" src="<?php echo $offer['image']; ?>"/>
            <h2 class="offer-title"><?php echo $offer['title']; ?></h2>
            <div class="offer-content"><?php echo substr($offer['description'], 0, 100); ?></div>
            <button></button>
        </li>
        <?php
    } ?>

</ul>
