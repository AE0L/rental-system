<div id="w-clothing-features" class="features-cont">
    <?php
        $w_cloth_types = Array('Activewear', 'Tops', 'Bottoms', 'Dresses & Sets', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Swimwear', 'Maternity Wear', 'Watches & Accessories', 'Undergarment & Lounges', 'Jewelry & Organizers', 'Others');
        $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
        $w_cloth_condition = Array('New', 'Used');
    ?>

    <label>Type</label>
    <select name="w-cloth-type" id="w-cloth-type">
        <option value="" disabled selected>- Type -</option>
        <?php option_tag($w_cloth_types) ?>
    </select>

    <label>Brand</label>
    <input type="text" name="w-cloth-brand" id="w-cloth-brand" placeholder="Enter brand here...">

    <label>Size</label>
    <select name="w-cloth-size" id="w-cloth-size">
        <option value="" disabled selected>- Size -</option>
        <?php option_tag($w_cloth_sizes) ?>
    </select>

    <label>Condition</label>
    <select name="w-cloth-condition" id="w-cloth-condition">
        <option value="" disabled selected>- Condition -</option>
        <?php option_tag($w_cloth_condition) ?>
    </select>
</div>
