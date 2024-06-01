    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="../assets/cart.css">
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/reset.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <style>
            .trending-searches {
                display: none;
                position: absolute;
                margin-top: 6px;
                background-color: #c6c6c6;
                border-radius: 10px;
                border: 1px solid #ccc;
                width: 550px;
                z-index: 1000;

            }

            .trending-searches h3 {
                padding: 8px 0 5px 8px;
                text-align: start;
            }

            .input-box {

                position: relative;
            }

            .input-box ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            .input-box li {
                border-radius: 3px;
                text-align: start;
                padding: 8px;
                cursor: pointer;
            }

            .input-box a {
                color: #000;
                text-decoration: none;
            }

            .input-box li:hover {
                background-color: #dfdede;
            }

            @keyframes scroll_amini {
                from {
                    bottom: 60px;
                }

                to {
                    bottom: 80px;
                }
            }

            #myBtn {
                position: fixed;
                bottom: 60px;
                right: 30px;
                z-index: 111;
                cursor: pointer;
                text-align: center;
                transform: rotate(90deg);
                background: #ee2626;
                border: 1px solid #ffffff;
                color: #ffffff;
                text-transform: capitalize;
                padding: 5px 15px 7px 15px;
                border-radius: 30px;
                -webkit-transform: rotate(90deg);
                -moz-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                animation: scroll_amini linear 2s infinite alternate;
                -webkit-animation: scroll_amini linear 2s infinite alternate;

            }

            #myBtn:hover {
                background-color: #555;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.querySelector('.search-input');
                var trendingSearches = document.getElementById('trending-searches');
                searchInput.addEventListener('focus', function() {
                    trendingSearches.style.display = 'block';
                });
                searchInput.addEventListener('blur', function() {
                    setTimeout(function() {
                        trendingSearches.style.display = 'none';
                    }, 100);
                });
            });
        </script>
    </head>

    <body>
        <main>
            <header>
                <div class="header">
                    <div class="logo ">
                        <div class="container">
                            <div class="flex logo-inner">
                                <div class="logo-item flex-align-center">
                                    <a href="./index.php"><img class="mr-4" src="../assets/img/logo-mb.png" alt=""></a>
                                </div>
                                <?php
                                $query = "SELECT search_term FROM search_history ORDER BY search_count DESC LIMIT 5";
                                $result = mysqli_query($connection, $query);
                                $trendingSearches = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $trendingSearches[] = $row['search_term'];
                                }
                                ?>
                                <div class="g-search">
                                    <form action="../public/search.php" method="post">
                                        <div class="input-box">
                                            <input type="text" placeholder="Nhập tên điện thoại, máy tính, phụ kiện.... cần tìm" name="s-title" class="search-input">
                                            <button type="submit" class="input-box-search" name="search-s">
                                                <i class="bi bi-search"></i>
                                            </button>
                                            <div class="trending-searches" id="trending-searches">
                                                <h3>Xu hướng tìm kiếm</h3>
                                                <ul>
                                                    <?php foreach ($trendingSearches as $term) : ?>
                                                        <a href="search.php?s-title=<?php echo urlencode($term); ?>">
                                                            <li>
                                                                <?php echo htmlspecialchars($term); ?>
                                                            </li>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                                if (check_role() === "admin") {
                                    $acc = <<<DELIMITER
                                    <div class="home-page">
                                        <div class="home-page-inner">
                                            <div class="home-page-item">
                                            <a href='./admin/index.php' target='_blank'><i class='bi bi-house-door-fill'></i>Admin</a>
                                            </div>
                                        </div>
                                    </div>
                                    DELIMITER;
                                    echo $acc;
                                } else {
                                    echo '';
                                }
                                ?>
                                <div class="market">
                                    <a href="./checkout.php" target="_blank"><i class="bi bi-cart"></i></a>
                                    <p class="count-cart">
                                        <?php
                                        if (isset($_SESSION['cart_quantity'])) {
                                            echo $_SESSION['cart_quantity'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </p>
                                    <a style="margin-left: 10px;" href="./wishlists.php" target="_blank"><i class="bi bi-heart"></i></a>
                                    <p class="count-cart">
                                        <?php
                                        if (isset($_SESSION['id'])) {
                                            echo count_wishlist();
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="register">
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $acc = <<<DELIMITER
                                                <div class="register-inners">
                                                <div class="register-login">
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Xin chào, {$_SESSION['username']} 
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="./admin/logout.php">Logout</a></li>
                                                    </ul>
                                                </div>
                                                DELIMITER;
                                        echo $acc;
                                    } else {
                                        $acc = <<<DELIMITER
                                                <div class="register-inner">
                                                <div class="register-login">
                                                    <a href="./log-in.php" target="_blank"> Đăng kí / Đăng nhập</a>
                                                </div>
                                            </div>
                                            DELIMITER;
                                        echo $acc;
                                    }
                                    ?>

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>
                </div>
            </header>