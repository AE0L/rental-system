<div id="app-features" class="features-cont">
    <?php
        $app_types = Array('TV & Entertainment','Kitchen Appliances','Air Conditioning & Heating','Washing Machine & Dryers','Vacuum Cleaner & Housekeeping','Water Heater & Instant Showers','Air Purifier & Dehumidifiers','Electrical, Adaptors, & Sockets','Irons & Steamers','Other Home Appliances');
        $app_condition = Array('New', 'Used');
    ?>

    <label for="app-type">Type</label>
    <select name="app-type" id="app-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($app_types) ?>
    </select>

    <label>Condition</label>
    <select name="app-condition" id="app-condition">
        <option value="" disabled selected>- Condition -</option>
        <?php option_tag($app_condition) ?>
    </select>
</div>
