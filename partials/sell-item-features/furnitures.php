<div id="furniture-features" class="features-cont">
    <?php
        $furn_types = Array('Furniture', 'Outdoor Furniture', 'Office Furniture & Fixtures', 'Lighting & Fans', 'Home Decor', 'Bedding & Towels', 'Bathroom & Kitchen Fixtures', 'Cleaning & Homecare Supplies', 'Kitchenware & Tableware', 'Security & Locks', 'Gardening', 'Home Improvement & Organization');
        $furn_condition = Array('New', 'Used');
    ?>

    <label>Type</label>
    <select name="furn-type" id="furn-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($furn_types) ?>
    </select>

    <label>Condition</label>
    <select name="furn-condition" id="furn-condition">
        <option value="" disabled selected>- Condition -</option>
        <?php option_tag($furn_condition) ?>
    </select>
</div>
