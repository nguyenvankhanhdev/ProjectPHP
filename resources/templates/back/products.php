<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Product
        </h1>
    </div>
    <div class="row"> <h3 class="bg-success"><?php display_message();?></h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Display</th>
                    <th>Chip</th>
                    <th>Ram</th> 
                    <th>Memory</th>
                    <th>Comments</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php get_product_in_admin(); ?>
            </tbody>
        </table>
    </div>