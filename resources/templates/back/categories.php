<?php addCate();?>

<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">
            Product Categories
        </h1>
        <div class="col-md-4">
            <h3 class="bg-success"><?php display_message();?></h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="category-title">Title</label>
                    <input type="text" class="form-control" name ="cat_title">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="addcate" value="Add Category">
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        showCategories();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->