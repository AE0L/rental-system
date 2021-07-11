<div id="<?php echo $is_mobile ? "mobile-prop-filter" : "prop-filter" ?>">
    <?php
        $prop_type = Array('Apartment & Condo', 'House & Lot', 'Townhouse', 'Lot', 'Commercial');
        $prop_room = Array('1','2','3','4','5','5+');
        $prop_park = Array('0','1','2','2+');
    ?>

    <form action="" id="<?php echo $is_mobile ? "mobile-prop-filter-form" : "prop-filter-form" ?>">
        <label>Property Type</label>
        <select id="prop-type">
            <option value="any">Any</option>
            <?php option_tag($prop_type) ?>
        </select>

        <label>Min Floor Area</label>
        <input type="number" name="min-floor-area" id="prop-min-floor-area" placeholder="Enter area here...">

        <label>Max Floor Area</label>
        <input type="number" name="max-floor-area" id="prop-max-floor-area" placeholder="Enter area here...">

        <label>Min Lot Area</label>
        <input type="number" name="min-lot-area" id="prop-min-lot-area" placeholder="Enter area here...">

        <label>Max Lot Area</label>
        <input type="number" name="max-lot-area" id="prop-max-lot-area" placeholder="Enter area here...">

        <label>Bedrooms</label>
        <select name="bedrooms" id="prop-bedrooms">
            <option value="any">Any</option>
            <?php option_tag($prop_room) ?>
        </select>

        <label>Bathrooms</label>
        <select name="bathrooms" id="prop-bathrooms">
            <option value="any">Any</option>
            <?php option_tag($prop_room) ?>
        </select>

        <label>Parking Space</label>
        <select name="parking" id="prop-parking">
            <option value="any">Any</option>
            <?php option_tag($prop_park) ?>
        </select>

        <label>
            <input type="checkbox" name="allow-pet" id="prop-allow-pet">
            Pets allowed
        </label>

        <label>Location</label>
        <select name="prop-location" id="prop-location">
            <option disabled selected>- location -</option>
        </select>
    </form>
</div>
