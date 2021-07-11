<div id="<?php echo $is_mobile ? "mobile-furniture-filter" : "furniture-filter" ?>">
    <?php
        $furn_types = Array('Furniture', 'Outdoor Furniture', 'Office Furniture & Fixtures', 'Lighting & Fans', 'Home Decor', 'Bedding & Towels', 'Bathroom & Kitchen Fixtures', 'Cleaning & Homecare Supplies', 'Kitchenware & Tableware', 'Security & Locks', 'Gardening', 'Home Improvement & Organization');
        $furn_condition = Array('New', 'Used');
    ?>

    <form action="" id="<?php echo $is_mobile ? "mobile-furniture-filter-form" : "furniture-filter-form" ?>">
        <label>Type</label>
        <select name="furn-type" id="furn-type">
            <option value="any" selected>Any</option>
            <?php option_tag($furn_types) ?>
        </select>

        <label>Condition</label>
        <select name="furn-condition" id="furn-condition">
            <option value="any" selected>Any</option>
            <?php option_tag($furn_condition) ?>
        </select>
    </form>
</div>
