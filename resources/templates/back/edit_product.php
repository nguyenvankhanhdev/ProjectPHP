<?php
update_product();
if (isset($_GET['id'])) {
    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    while ($row = fetch_array($query)) {
        $pro_title = escape_string($row['product_title']);
        $pro_descrip = escape_string($row['product_description']);
        $pro_price = escape_string($row['product_price']);
        $pro_cat_id = escape_string($row['product_cat_id']);
        $pro_brand_id = escape_string($row['brand_id']);
        $display = escape_string($row['Display']);
        $chip = escape_string($row['Chip']);
        $ram = escape_string($row['Ram']);
        $memory = escape_string($row['Memory']);
        $quantity = escape_string($row['product_quantity']);
        $pro_img = $row['product_image'];
    }
}


?>
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            Add Product

        </h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="product-title">Product Title </label>
                <input type="text" name="product_title" value="<?php echo $pro_title; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="product-title">Product Description</label>
                <textarea name="product_description" id="" value="<?php echo $pro_descrip; ?>" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="product_price" value="<?php echo $pro_price; ?>" class="form-control" size="60">
                </div>
            </div>
            <div class="form-group">
                <label for="product-title">Product Category</label>

                <select name="product_cat_id" id="" class="form-control">
                    <option value="<?php echo $pro_cat_id; ?>"><?php echo show_cate_add_product($pro_cat_id);?></option>
                    <?php
                    $query = query("SELECT * FROM categories");
                    confirm($query);
                    while ($row = fetch_array($query)) {
                        echo "<option value='{$row['cat_id']}'>{$row['cat_title']}</option>";
                    }

                    ?>
                </select>
            </div>
            <!-- Product Brands-->
            <div class="form-group">
                <label for="product-title">Product Brand</label>
                <select name="product_brand_id" id="" class="form-control">
                <option value="<?php echo $pro_brand_id; ?>"><?php echo show_brands_add_product($pro_brand_id);?></option>
                    <?php
                    $query = query("SELECT * FROM brands");
                    confirm($query);
                    while ($row = fetch_array($query)) {
                        echo "<option value='{$row['brand_id']}'>{$row['brand_name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div><!--Main Content-->
        <!-- SIDEBAR-->
        <aside id="admin_sidebar" class="col-md-4">

            <!-- Product Categories-->
            <div class="form-group">
                <label for="product-display">Quantity</label>
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" class="form-control">
            </div>
            <!-- Product Display -->
            <div class="form-group">
                <label for="product-display">Display</label>

                <input type="text" name="display" value="<?php echo $display; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="product-display">Chip </label>
                <input type="text" name="chip" value="<?php echo $chip; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="product-display">Ram</label>
                <select name="ram" id="" class="form-control">
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-display">Memory</label>

                <select name="memory" id="" class="form-control">
                    <option value="64">64</option>
                    <option value="128">128</option>
                    <option value="256">256</option>
                    <option value="512">512</option>
                </select>
            </div>
            <!-- Product Image -->
            <div class="form-group">
                <label for="product-title">Product Image</label>
                <input type="file" name="image">
                <img src="../../assets/img/<?php echo $pro_img; ?>" width="100px" alt="">
            </div>

            <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
            </div>
        </aside><!--SIDEBAR-->
    </form>
</div>