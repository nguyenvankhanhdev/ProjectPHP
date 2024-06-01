<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Product
        </h1>
    </div>
    <div class="row"> 
        <h3 class="bg-success"><?php display_message();?></h3>
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
                <?php 

                //get_product_in_admin(); 

                $results_per_page = 5;

                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $current_page = (int) $_GET['page'];
                } else {
                    $current_page = 1;
                }
                $start= ($current_page - 1) * $results_per_page;
                $query = "SELECT * FROM products LIMIT  " . "{$start}". "," . "{$results_per_page}";
                $send_query = query($query);
                confirm($send_query);
                while ($row = fetch_array($send_query)) {
                    $product_id = $row['product_id'];
                    $query1 = "SELECT COUNT(*) AS total_comments FROM comments WHERE comment_pro_id = $product_id ";
                    $result = query($query1);
                    confirm($result);
                    $count = mysqli_fetch_assoc($result)['total_comments'];
                    $cate = show_cate_add_product($row['product_cat_id']);
                    $brand = show_brands_add_product($row['brand_id']);
                    $formated = number_format($row['product_price'], 0, ",", ".");
                    $product = <<<DELIMETER
                        <tr>
                            <td>{$row['product_id']}</td>
                            <td style="max-width:80px;">{$row['product_title']}</td>
                            <td style="max-width:100px;"><br>
                                <a href="index.php?edit_product&id={$row['product_id']}"><img class="image-responsive" style="max-width:100px;" src="../../assets/img/{$row['product_image']}" alt="logo.png"></a>
                            </td>
                            <td>{$cate}</td>
                            <td>{$brand}</td>
                            <td>{$row['product_quantity']}</td>
                            <td>{$formated}đ</td>
                            <td>{$row['Display']}</td>
                            <td>{$row['Chip']}</td>
                            <td>{$row['Ram']}</td>
                            <td>{$row['Memory']}</td>
                            <td>
                                <a href="../details.php?id={$row['product_id']}">{$count}</a>
                            </td>
                            <td>
                                <a class ="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        DELIMETER;
                    echo $product;
                }

                ?>
            </tbody>
        </table>
        <div class="row text-center fs-3 mb-5 " style="margin-bottom:40px">

        
        <?php
$result = mysqli_query($connection, "SELECT COUNT(*) AS total FROM products");
$page = mysqli_fetch_assoc($result);
$total_pages = ceil($page['total'] / $results_per_page);

// Display the "Prev" button
if ($current_page > 1) {
    echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?products&page=" . ($current_page - 1) . "\" class=\"btn btn-primary fs-5\">Prev</a> ";
}

// Display the page numbers
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?products&page=$i\" class=\"btn btn-danger active fs-5\">$i</a> ";
    } else {
        echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?products&page=$i\" class=\"btn btn-primary\"  >$i</a> ";
    }
}

// Display the "Next" button
if ($current_page < $total_pages) {
    echo "<a style='font-size:15px;margin-right:5px;' href=\"index.php?products&page=" . ($current_page + 1) . "\" class=\"btn btn-primary\" >Next</a> ";
}
?>
        </div>

    </div>