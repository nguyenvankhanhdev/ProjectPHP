<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Add Product <?php add_product();?>
        </h1>

    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="form-group">
                <label for="product-title">Product Title </label>
                <input type="text" name="product_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="product-title">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="product_price" class="form-control" size="60">
                </div>
            </div>
            <div class="form-group">
                <label for="product-title">Product Category</label>
                
                <select name="product_cat_id" id="" class="form-control">
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
                <input type="text" name="quantity" class="form-control">
            </div>
            <!-- Product Display -->
            <div class="form-group">
                <label for="product-display">Display</label>
                
                <input type="text" name="display" class="form-control">
            </div>
            <div class="form-group">
                <label for="product-display">Chip </label>
                <input type="text" name="chip" class="form-control">
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
            </div>

              <div class="form-group">
                <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
            </div>
        </aside><!--SIDEBAR-->
    </form>
</div>