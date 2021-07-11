<div id="<?php echo $is_mobile ? "mobile-app-filter" : "app-filter" ?>">
    <?php
        $app_types = Array('TV & Entertainment','Kitchen Appliances','Air Conditioning & Heating','Washing Machine & Dryers','Vacuum Cleaner & Housekeeping','Water Heater & Instant Showers','Air Purifier & Dehumidifiers','Electrical, Adaptors, & Sockets','Irons & Steamers','Other Home Appliances');
        $app_condition = Array('New', 'Used');
    ?>
    <form action="" id="<?php echo $is_mobile ? "mobile-app-filter-form" : "app-filter-form" ?>">
        <label>Type</label>
        <select name="app-type" id="app-type">
            <option value="Any" selected>Any</option>
            <?php option_tag($app_types) ?>
        </select>

        <label>Condition</label>
        <select name="app-condition" id="app-condition">
            <option value="Any">Any</option>
            <?php option_tag($app_condition) ?>
        </select>
    </form>
</div>
