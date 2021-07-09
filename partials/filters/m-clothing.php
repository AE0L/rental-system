<div class="m-cloth-filter">
    <?php
        $w_cloth_types = Array('Activewear', 'Tops & Sets', 'Bottoms', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Watches & Accessories', 'Others');
        $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
        $w_cloth_condition = Array('New', 'Used');
    ?>

    <form action="" id="m-cloth-filter-form">
        <label>Type</label>
        <select name="m-cloth-type" id="m-cloth-type">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_types) ?>
        </select>

        <label>Size</label>
        <select name="m-cloth-size" id="m-cloth-size">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_sizes) ?>
        </select>

        <label>Condition</label>
        <select name="m-cloth-condition" id="m-cloth-condition">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_condition) ?>
        </select>
    </form>
</div>
