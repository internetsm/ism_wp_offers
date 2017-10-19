<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 19/10/17
 * Time: 15.44
 */

?>

<div>
    <div>
        <label><strong>Tipologia prezzo</strong></label>
    </div>
    <div>
        <label>
            <input <?php printf(($ism_offers_price_type == "price_night" || $ism_offers_price_type == "") ? "checked='checked'" : ""); ?>
                    value="price_night" type="radio" name="ism_offers_price_type"/> Prezzo a
            notte</label>
        <label><input <?php printf($ism_offers_price_type == "price_flat" ? "checked='checked'" : ""); ?>
                    value="price_flat" type="radio" name="ism_offers_price_type"/> Prezzo forfettario</label>
    </div>
</div>
<br/>