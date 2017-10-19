<div>
    <div>
        <label><strong>Prezzo</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_offers_price; ?>" type="number" name="ism_offers_price"/>
    </div>
</div>
<br/>
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
<div>
    <div>
        <label><strong>Tipologia trattamento</strong></label>
    </div>
    <div>
        <select name="ism_offers_treatment">
            <option value="all_inclusive" <?php printf($ism_offers_treatment == "all_inclusive" ? "selected='selected'" : ""); ?>>
                All Inclusive
            </option>
            <option value="fullboard" <?php printf($ism_offers_treatment == "fullboard" ? "selected='selected'" : ""); ?>>
                Pensione completa
            </option>
            <option value="halfboard" <?php printf($ism_offers_treatment == "halfboard" ? "selected='selected'" : ""); ?>>
                Mezza pensione
            </option>
            <option value="bed_and_breakfast" <?php printf($ism_offers_treatment == "bed_and_breakfast" ? "selected='selected'" : ""); ?>>
                Bed and breakfast
            </option>
        </select>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Data arrivo</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_offers_date_arrival; ?>" class="datepicker" id="datepicker-arrival"
               type="text"
               name="ism_offers_date_arrival"/>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Data partenza</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_offers_date_departure; ?>" id="datepicker-departure" class="datepicker"
               type="text" name="ism_offers_date_departure"/>
    </div>
</div>