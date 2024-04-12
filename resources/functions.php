<?php
function set_massage($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function redirect($location)
{
    header("Location: $location");
}
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($query)
{
    return mysqli_fetch_array($query);
}

// font_end
function getProduct()
{

    $query = 'SELECT * FROM products ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $formatted = number_format($row['product_price'], 0, ",", ".");
        $product = <<<DELIMITER
        <div class='cart-item'>
            <div class="cart-product-img">
                <a href="../public/details.php?id={$row['product_id']}" target="_blank"> <img class="cart-img" src='../assets/img/{$row['product_image']}' alt=''></a>
                <div class="cart-product-label">
                    <div class="badge-warning">Trả góp 0%</div>
                    <div class="badge-primary">Giảm 2.000.000đ</div>
                </div>
            </div>
            <div class='item-name ml-4'>{$row['product_title']}</div>
            <div class="price-cart">
                <div class="price-sale"></div>
                <div class="price-strike">
                    <strike>{$formatted}đ</strike>
                </div>
            </div>
            <div class="cart-product">
                <div class="rating p-t-4">
                    <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                    <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                    <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                    <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                    <div icon="star" class="icon is-active"><svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg></div>
                </div>
                <div class="icon">
                    <span><i class="bi bi-cpu"></i>Apple A15 Bionic</span>
                    <span><i class="bi bi-phone"></i>6.1inch</span>
                    <span><i class="bi bi-postage-fill"></i>4GB</span>
                    <span><i class="bi bi-hdd"></i>128GB</span>
                    <div class="title">Mua kèm Apple Pencil tặng 500k</div>
                </div>
            </div>
            <div class="cart-btn">
                <div class="btn-buynow">
                    <a href="../resources/cart.php?add={$row['product_id']}">Mua ngay</a>
                </div>
            </div>
        </div>
        DELIMITER;
        echo $product;
    }
}
function get_categories()
{
    $query = "SELECT * FROM categories";
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        echo "<li class='menu'>";
        echo "<a class='item-product' href='./categories.php?cat_id={$row['cat_id']}'><i class='bi bi-phone'></i>{$row['cat_title']}</a>";
        // Fetch brands associated with this category
        $cat_id = $row['cat_id'];
        $nav_query = "SELECT * FROM brands WHERE cat_id = $cat_id";

        confirm($nav_query);
        $send_nav_query = query($nav_query);
        if (mysqli_num_rows($send_nav_query) > 0) {
            echo "<div class='subnav'>";
            while ($row1 = fetch_array($send_nav_query)) {
                echo "<div class='nav-item'><a href='./categories.php?id={$row1['brand_id']}' target='_blank'>{$row1['brand_name']}</a></div>";
            }
            echo "</div>";
        }
        echo "</li>";
    }
}


function get_categories_in_page()
{
    $cat_id = $_GET['cat_id'];
    if (isset($_GET['brand_name'])) {
        $data = $_GET['brand_name'];
        $catequery = "SELECT brand_id FROM brands WHERE brand_name = '$data'";
        $send_cate = query($catequery);

        if ($send_cate && mysqli_num_rows($send_cate) > 0) {
            $row = fetch_array($send_cate);
            $brand_id = $row['brand_id'];

            $query1 = "SELECT * FROM products WHERE product_cat_id = $cat_id AND brand_id = $brand_id";
            $cate_query = query($query1);
            confirm($cate_query);
            while ($row = fetch_array($cate_query)) {
                $price_format = number_format($row['product_price'], 0, ",", ".");
                $cat = <<<DELIMITER
            <div class="cart-item">
        <div class="cart-product-img">
            <a href="./details.php?id={$row['product_id']}" target="_blank"> <img class="cart-img"
                    src="../assets/img/{$row['product_image']}"
                    alt=""></a>
            <div class="cart-product-label">
                <div class="badge-warning">Trả góp 0%</div>
                <div class="badge-primary">Giảm 7.230.000đ</div>
            </div>
        </div>
        <div class="cart-product">
            <h3>
                <a href="">{$row['product_title']}</a>
            </h3>
            <div class="circle-color">
                <div class="circle-item pink" style="background:#2D2926"></div>
                <div class="circle-item pink" style="background:#4F5A61"></div>
                <div class="circle-item pink" style="background:#D5CDC1"></div>
                <div class="circle-item pink" style="background:#74424F"></div>
            </div>
            <div class="cart-price">
                <div class="price-sale"> {$price_format} đ</div>
                <div class="price-strike">
                    <strike>40.990.000đ</strike>
                </div>
            </div>
            <div class="cart-memory">
                <button class="cart-memory-item-active">
                    256GB
                </button>
                <button class="cart-memory-item">
                    512GB
                </button>
            </div>

        </div>
        <div class="cart-btn">
            <div class="btn-buynow">
                <a href="">Mua ngay</a>
            </div>
        </div>
    </div>
   
    DELIMITER;

                echo $cat;
            }
        }
    } else {
        $query1 = "SELECT * FROM products WHERE product_cat_id = $cat_id";
        $cate_query = query($query1);
        confirm($cate_query);
        while ($row = fetch_array($cate_query)) {
            $price_format = number_format($row['product_price'], 0, ",", ".");
            $cat = <<<DELIMITER
            <div class="cart-item">
        <div class="cart-product-img">
            <a href="./details.php?id={$row['product_id']}" target="_blank"> <img class="cart-img"
                    src="../assets/img/{$row['product_image']}"
                    alt=""></a>
            <div class="cart-product-label">
                <div class="badge-warning">Trả góp 0%</div>
                <div class="badge-primary">Giảm 7.230.000đ</div>
            </div>
        </div>
        <div class="cart-product">
            <h3>
                <a href="">{$row['product_title']}</a>
            </h3>
            <div class="circle-color">
                <div class="circle-item pink" style="background:#2D2926"></div>
                <div class="circle-item pink" style="background:#4F5A61"></div>
                <div class="circle-item pink" style="background:#D5CDC1"></div>
                <div class="circle-item pink" style="background:#74424F"></div>
            </div>
            <div class="cart-price">
                <div class="price-sale"> {$price_format} đ</div>
                <div class="price-strike">
                    <strike>40.990.000đ</strike>
                </div>
            </div>
            <div class="cart-memory">
                <button class="cart-memory-item-active">
                    256GB
                </button>
                <button class="cart-memory-item">
                    512GB
                </button>
            </div>

        </div>
        <div class="cart-btn">
            <div class="btn-buynow">
                <a href="">Mua ngay</a>
            </div>
        </div>
    </div>
    DELIMITER;
            echo $cat;
        }
    }
}

function login_user()
{
    if (isset($_POST['submit1'])) {
        $username = escape_string($_POST['username_login']);
        $password = escape_string($_POST['password_login']);
        $query1 = query("SELECT * FROM users WHERE username ='{$username}'AND password = '{$password}'");
        confirm($query1);
        if (mysqli_num_rows($query1) == 0) {
            set_massage("Your Password or Username are wrong");
            redirect("log-in.php");
        } else {
            
            $query = query("SELECT * FROM users WHERE username ='{$username}'");
            confirm($query);

            if ($row = fetch_array($query)) {
                $_SESSION['id'] = $row['user_id'];
            }
            $_SESSION['username'] = $username;
            set_massage("Welcom to Admin {$username}");
            redirect("admin");
        }
    }
}


// product Admin//

function get_product_in_admin()
{
    $query = 'SELECT * FROM products ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
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
            <td>{$formated}đ</td>
            <td>{$row['Display']}</td>
            <td>{$row['Chip']}</td>
            <td>{$row['Ram']}</td>
            <td>{$row['Memory']}</td>
            <td>
                <a class ="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
        DELIMETER;
        echo $product;
    }
}

// add_product Admin//
function add_product()
{

    if (isset($_POST['publish'])) {
        $pro_title = escape_string($_POST['product_title']);
        $pro_descrip = escape_string($_POST['product_description']);
        $pro_price = escape_string($_POST['product_price']);
        $pro_cat_id = escape_string($_POST['product_cat_id']);
        $pro_brand_id = escape_string($_POST['product_brand_id']);
        $display = escape_string($_POST['display']);
        $chip = escape_string($_POST['chip']);
        $ram = escape_string($_POST['ram']);
        $memory = escape_string($_POST['memory']);
        $quantity = escape_string($_POST['quantity']);

        $pro_img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($img_tmp, "../../assets/img/$pro_img");


        $query = query("INSERT INTO products (product_title, product_cat_id, brand_id, product_price, product_quantity, product_description, product_image, Display, Chip, Ram, Memory) VALUES ('{$pro_title}', {$pro_cat_id}, {$pro_brand_id}, {$pro_price}, {$quantity}, '{$pro_descrip}', '{$pro_img}', '{$display}', '{$chip}', '{$ram}', '{$memory}')");
        confirm($query);
        set_massage("Thêm thành công");
        redirect("index.php?products");
    }
}
function update_product()
{

    if (isset($_POST['update'])) {
        $pro_title = escape_string($_POST['product_title']);
        $pro_descrip = escape_string($_POST['product_description']);
        $pro_price = escape_string($_POST['product_price']);
        $pro_cat_id = escape_string($_POST['product_cat_id']);
        $pro_brand_id = escape_string($_POST['product_brand_id']);

        $display = escape_string($_POST['display']);
        $chip = escape_string($_POST['chip']);
        $ram = escape_string($_POST['ram']);
        $memory = escape_string($_POST['memory']);
        $quantity = escape_string($_POST['quantity']);

        $pro_img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];

        if (empty($pro_img)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
            confirm($get_pic);
            while ($row = fetch_array($get_pic)) {
                $pro_img = $row['product_image'];
            }
        }

        move_uploaded_file($img_tmp, "../../assets/img/$pro_img");


        $query = "UPDATE products SET ";
        $query  .= " product_title ='{$pro_title}',";
        $query  .= " product_cat_id ={$pro_cat_id} ,";
        $query  .= " brand_id ={$pro_brand_id}, ";
        $query  .= " product_price ={$pro_price} ,";
        $query  .= " product_quantity ={$quantity},";
        $query  .= " product_image ='{$pro_img}',";
        $query  .= " product_description ='{$pro_descrip}',";
        $query  .= " Display ='{$display}',";
        $query  .= " Chip ='{$chip}',";
        $query  .= " Ram ='{$ram}',";
        $query  .= " Memory ='{$memory}'";
        $query  .= " WHERE product_id =" . escape_string($_GET['id']) . ' ';



        $send_query = query($query);
        confirm($send_query);

        set_massage("Update thành công");
        redirect("index.php?products");
    }
}

function show_cate_add_product($pro_cat_id)
{
    $query = query("SELECT * FROM categories WHERE cat_id= '{$pro_cat_id}' ");
    confirm($query);
    while ($row = fetch_array($query)) {
        return $row['cat_title'];
    }
}

function show_brands_add_product($pro_brand_id)
{
    $query = query("SELECT * FROM brands WHERE brand_id= '{$pro_brand_id}' ");
    confirm($query);
    while ($row = fetch_array($query)) {
        return $row['brand_name'];
    }
}

function showCategories()
{
    $query = 'SELECT * FROM categories ';
    $send_query = query($query);
    confirm($send_query);
    while ($row = fetch_array($send_query)) {
        $product = <<<DELIMETER
        <tr>
            <td>{$row['cat_id']}</td>
            <td style="max-width:80px;">{$row['cat_title']}</td>
            <td>
            <a class ="btn btn-danger" href="../../resources/templates/back/delete_categories.php?id={$row['cat_id']}">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
        </td>
        </tr>
        DELIMETER;
        echo $product;
    }
}

function addCate()
{
    if (isset($_POST['addcate'])) {
        $cat_title = escape_string($_POST['cat_title']);
        if (isset($cat_title) || $cat_title == " ") {
            set_massage("<p class='bg-danger'>THIS CANNOT BE EMPTY</p>");
        } else {
            $query = query("INSERT INTO categories (cat_title) VALUES('{$cat_title}')");
            confirm($query);
            set_massage("CATEGORY CREATED");
        }
    }
}

function add_img()
{
    if (isset($_POST['publish'])) {
        if (isset($_FILES['images']['name'])) {
            $pro_id = $_POST['number'];
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['images']['name'][$key];
                $file_tmp = $_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp, "../../assets/img/$file_name");
                $sql = "INSERT INTO pro_images (img_name, pro_id) VALUES ('$file_name','$pro_id')";
                query($sql);
                confirm($sql);
                set_massage("Thành công");
            }
        } else {
            echo "Vui lòng chọn ít nhất một tệp hình ảnh.";
        }
    }
}

function set_img_product()
{
    if (isset($_GET['id'])) {
        $query = query("SELECT * FROM pro_images WHERE pro_id = " . escape_string($_GET['id'] . " "));
        confirm($query);
        while ($row = fetch_array($query)) {
            $img = <<<DELIMETER
            <div class="carousel-item">
                <img src="../assets/img/{$row['img_name']}" class="d-block w-100" alt="logo.png">
            </div>
            DELIMETER;
            echo $img;
        }
    }
}
