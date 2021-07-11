<div id="<?php echo $is_mobile ? "mobile-w-cloth-filter" : "w-cloth-filter" ?>">
    <?php
        $w_cloth_types = Array('Activewear', 'Tops', 'Bottoms', 'Dresses & Sets', 'Footwear', 'Coats, Jackets, & Outerwear', 'Bags & Wallets', 'Swimwear', 'Maternity Wear', 'Watches & Accessories', 'Undergarment & Lounges', 'Jewelry & Organizers', 'Others');
        $w_cloth_sizes = Array('XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL');
        $w_cloth_condition = Array('New', 'Used');
    ?>

    <form action="" id="<?php echo $is_mobile ? "mobile-w-cloth-filter-form" : "w-cloth-filter-form" ?>">
        <label>Type</label>
        <select name="w-cloth-type" id="w-cloth-type">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_types) ?>
        </select>

        <label>Size</label>
        <select name="w-cloth-size" id="w-cloth-size">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_sizes) ?>
        </select>

        <label>Condition</label>
        <select name="w-cloth-condition" id="w-cloth-condition">
            <option value="Any" selected>Any</option>
            <?php option_tag($w_cloth_condition) ?>
        </select>
    </form>
</div>
