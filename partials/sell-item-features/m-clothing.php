<div id="m-clothing-features" class="features-cont">
    <?php
        $w_cloth_types = Array('Activewear', 'Tops & Sets', 'Bottoms', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Watches & Accessories', 'Others');
        $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
        $w_cloth_condition = Array('New', 'Used');
    ?>

    <label>Type</label>
    <select name="m-cloth-type" id="m-cloth-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($w_cloth_types) ?>
    </select>

    <label>Brand</label>
    <input type="text" name="w-cloth-brand" id="w-cloth-brand" placeholder="Enter brand here...">

    <label>Size</label>
    <select name="m-cloth-size" id="m-cloth-size">
        <option value="" disabled selected>- Size -</option>
        <?php option_tag($w_cloth_sizes) ?>
    </select>

    <label>Condition</label>
    <select name="m-cloth-condition" id="m-cloth-condition">
        <option value="" disabled selected>- Condition -</option>
        <?php option_tag($w_cloth_condition) ?>
    </select>
</div>
