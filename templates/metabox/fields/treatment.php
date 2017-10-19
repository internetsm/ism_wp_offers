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