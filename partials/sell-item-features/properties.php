<div id="property-features" class="features-cont">
    <?php
        $prop_type = Array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Lot', 'Commercial');
        $prop_room = Array('1','2','3','4','5','5+');
        $prop_park = Array('0','1','2','2+');
    ?>

    <label>Property Type</label>
    <select name="prop-type" id="prop-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($prop_type) ?>
    </select>

    <label id="prop-min-floor-label">Min Floor Area</label>
    <input type="number" name="min-floor-area" id="prop-min-floor-area" placeholder="Enter area here...">

    <label id="prop-max-floor-label">Max Floor Area</label>
    <input type="number" name="max-floor-area" id="prop-max-floor-area" placeholder="Enter area here...">

    <label id="prop-min-lot-label">Min Lot Area</label>
    <input type="number" name="min-lot-area" id="prop-min-lot-area" placeholder="Enter area here...">

    <label id="prop-max-lot-label">Max Lot Area</label>
    <input type="number" name="max-lot-area" id="prop-max-lot-area" placeholder="Enter area here...">

    <label id="prop-bedroom-label">Bedrooms</label>
    <select name="bedrooms" id="prop-bedrooms">
        <option value="" selected disabled>- Bedrooms -</option>
        <?php option_tag($prop_room) ?>
    </select>

    <label id="prop-bathroom-label">Bathrooms</label>
    <select name="bathrooms" id="prop-bathrooms">
        <option value="" selected disabled>- Bathrooms -</option>
        <?php option_tag($prop_room) ?>
    </select>

    <label id="prop-park-label">Parking Space</label>
    <select name="parking" id="prop-parking">
        <option value="" selected disabled>- Parking Space -</option>
        <?php option_tag($prop_park) ?>
    </select>

    <label id="prop-pet-label">
        <input type="checkbox" name="allow-pet" id="prop-allow-pet">
        Pets allowed
    </label>
</div>
