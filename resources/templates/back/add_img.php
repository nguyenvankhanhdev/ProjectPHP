<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Add Image
        </h1>
    </div>
    <?php add_img(); ?>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="product-display">Hình cho SP</label>
            <select name="number" id="" class="form-control">
                <?php
                $query = query("SELECT * FROM products");
                confirm($query);
                while ($row = fetch_array($query)) {
                    echo "<option value='{$row['product_id']}'>{$row['product_title']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="images[]" id="images" multiple accept="image/*">
        </div>
        <div class="form-group">
            <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
        </div>
    </form>
</div>