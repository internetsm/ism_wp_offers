<div>
    <div>
        <label><strong>Prezzo</strong></label>
    </div>
    <div>
        <input value="0" type="number" name="ism_offers_price"/>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Tipologia prezzo</strong></label>
    </div>
    <div>
        <label><input checked="checked" value="price_night" type="radio" name="ism_offers_price_type"/> Prezzo a
            notte</label>
        <label><input value="price_flat" type="radio" name="ism_offers_price_type"/> Prezzo forfettario</label>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Tipologia trattamento</strong></label>
    </div>
    <div>
        <select name="ism_offers_treatment">
            <option value="all_inclusive" selected="selected">All Inclusive</option>
            <option value="fullboard">Pensione completa</option>
            <option value="halfboard">Mezza pensione</option>
            <option value="bed_and_breakfast">Bed and breakfast</option>
        </select>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Data arrivo</strong></label>
    </div>
    <div>
        <input class="datepicker" data-arrival="#datepicker-arrival-1" type="text" name="ism_offers_date_arrival"/>
    </div>
</div>
<br/>
<div>
    <div>
        <label><strong>Data partenza</strong></label>
    </div>
    <div>
        <input id="datepicker-arrival-1" class="datepicker" type="text" name="ism_offers_date_arrival"/>
    </div>
</div>