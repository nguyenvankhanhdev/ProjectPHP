<?php require_once("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <title>Đặt hàng thành công</title>
  <link rel="icon" type="image/png" sizes="64x64" href="assets/img/favicon.png">
  <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="../assets/css/lightgallery-bundle.css">
  <link rel="stylesheet" href="../assets/css/header-footer.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../vendor/autoload.php';

  try {
    $pdo = new PDO('mysql:host=localhost:33071;dbname=ecom_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

    if ($order_id) {
      $query = "SELECT * FROM products  
                  INNER JOIN order_details ON order_details.product_id = products.product_id 
                  INNER JOIN orders ON order_details.order_detail_id = orders.order_id 
                  WHERE orders.order_id = :order_id";
      $statement = $pdo->prepare($query);
      $statement->bindValue(":order_id", $order_id, PDO::PARAM_INT);
      $statement->execute();
      $order = $statement->fetchAll(PDO::FETCH_ASSOC);

      if ($order) {
        if (isset($_SESSION['id'])) {
          $user_query = "SELECT * FROM users WHERE user_id = :user_id";
          $user_statement = $pdo->prepare($user_query);
          $user_statement->bindValue(":user_id", $_SESSION['id'], PDO::PARAM_INT);
          $user_statement->execute();
          $human = $user_statement->fetch(PDO::FETCH_ASSOC);

          if ($human) {
            $email = $human['email'];
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nguyenkhanh13082003@gmail.com';
            $mail->Password = 'ufoxgsercnffmcis';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('nguyenkhanh13082003@gmail.com', 'Nguyễn Văn Khánh');
            $mail->addAddress($email);
            $mail->Subject = 'Cảm Ơn Bạn Đã Chọn Sản Phẩm Của Chúng Tôi';
            $body = '<!DOCTYPE html>
            <html>
            <head>
              <style>
                .email-container {
                  font-family: Arial, sans-serif;
                  max-width: 600px;
                  margin: auto;
                  padding: 20px;
                  border: 1px solid #ddd;
                  border-radius: 10px;
                  background-color: #f9f9f9;
                }
                .email-header, .email-footer {
                  text-align: center;
                  margin-bottom: 20px;
                }
                .email-header {
                  font-size: 24px;
                  font-weight: bold;
                  color: #333;
                }
                .email-footer {
                  font-size: 14px;
                  color: #666;
                }
                .order-item {
                  border-bottom: 1px solid #ddd;
                  padding: 10px 0;
                }
                .order-item:last-child {
                  border-bottom: none;
                }
                .order-item-title {
                  font-size: 18px;
                  font-weight: bold;
                  color: #333;
                }
                .order-item-details {
                  font-size: 16px;
                  color: #555;
                }
                .order-summary {
                  margin-top: 20px;
                  font-size: 18px;
                  font-weight: bold;
                  text-align: right;
                }
              </style>
            </head>
            <body>
              <div class="email-container">
                <div class="email-header">Cảm Ơn Bạn Đã Chọn Sản Phẩm Của Chúng Tôi</div>';
            
                foreach ($order as $order_item) {
                  $product_title = $order_item["product_title"];
                  $detail_quantity = $order_item["detail_quantity"];
                  $product_price = number_format($order_item["detail_quantity"] * $order_item["product_price"], 0, ".", ",");
                  $body .= '
                  <div class="order-item">
                    <div class="order-item-title">' . htmlspecialchars($product_title) . '</div>
                    <div class="order-item-details">Số lượng: ' . htmlspecialchars($detail_quantity) . '</div>
                    <div class="order-item-details">Giá: ' . htmlspecialchars($product_price) . ' đ</div>
                  </div>';
              }
            $body .= '
                <div class="email-footer">Cảm ơn quý khách đã mua hàng tại F.Studio by FPT</div>
              </div>
            </body>
            </html>';
            
            $mail->Body = $body;
            
            $mail->Body = $body;

            if (!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
              $_SESSION['email_sent'] = true;
            }
          } else {
            echo 'User not found.';
          }
        } else {
          echo 'User session ID not set.';
        }
      } else {
        echo 'Order not found.';
      }
    } else {
      echo 'No order ID provided.';
    }
  } catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  }
  ?>



  <div class="over-suggestion"></div>
  <main class="main">
    <div class="c-cart bg-gray-100 gallery-off">
      <div class="container">
        <div class="c-cart__wrap p-y-32">
          <div class="card">
            <div class="card-title">Đặt hàng thành công</div>
            <div class="card-body">
              <div class="c-cart__noti loyalty">
                <div class="loyalty-img"><img src="../assets/img/booking-success.png"></div>
                <p class="f-s-p-18 text-grayscale-800 f-w-500 p-t-8">Cảm ơn quý khách đã mua hàng tại F.Studio by FPT</p>
                <div class="text-size--normal text-normal contact-txt p-t-8">
                  Bộ phận chăm sóc khách hàng FPT Shop sẽ liên hệ đến quý khách trong vòng
                  <span class="text-size--lg">5 phút</span>
                </div>
              </div>
              <div class="c-cart__data-user">
                <div class="c-modal__row info-ship">
                  <div class="st-table-title f-s-p-16">Thông tin giao hàng</div>
                  <table class="table-default st-table">
                    <?php if (!empty($order)) : ?>
                      <?php foreach ($order as $index => $order_item) : ?>
                        <?php if ($index === 0) : ?>
                          <tr>
                            <td>Mã số đơn hàng</td>
                            <td class="ship_number f-w-500 f-s-p-18"><?php echo $order_item['order_id'] ?>
                              <a class="btn btn-xs btn-link m-l-8" href="" aria-controls="cart-check-order">Tra cứu đơn hàng</a>
                            </td>
                          </tr>
                          <tr>
                            <td>Tên khách hàng</td>
                            <td class="phone_ship"><?php echo $order_item['name'] ?></td>
                          </tr>
                          <tr>
                            <td>Số điện thoại</td>
                            <td class="phone_ship"><?php echo $order_item['phoneNumber'] ?></td>
                          </tr>
                          <tr>
                            <td>Giao hàng đến</td>
                            <td class="addressship_ship"><?php echo $order_item['address'] ?></td>
                          </tr>
                          <tr>
                            <td>Thời gian đặt hàng</td>
                            <td class="time_ship"><?php echo $order_item['order_date'] ?></td>
                          </tr>
                          <tr>
                            <td>Ghi chú yêu cầu</td>
                            <td class="text_ship">Chỉ giao hàng giờ hành chính</td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </table>
                </div>
              </div>
              <div class="c-modal__row info-ship">
                <div class="st-table-title f-s-p-16">Thông tin đơn hàng
                  <p class="cart-quantity-text f-w-500 f-s-p-16">Số lượng</p>
                  <p class="f-w-500 f-s-p-16">Thành tiền</p>
                </div>
              </div>
              <div class="c-cart__product-success p-x-16 p-y-24" data-brand="Apple (iPhone)" data-variant="597164" data-producttype="1" data-productid="34678">
                <?php foreach ($order as $order_item) : ?>
                  <div class="product-cart cart-shadow">
                    <div class="product-cart__img"><img src="../assets/img/<?php echo $order_item['product_image'] ?>" alt="Demo"></div>
                    <div class="product-cart__info">
                      <div class="product-cart__inside">
                        <h3 class="product-cart__name product-cart__name--lg name-product-split" data-sku="00714499" data-color="Vàng"><?php echo $order_item['product_title'] ?></h3>
                        <div class="product-cart__line"></div>
                      </div>
                      <div class="product-cart__quality">
                        <div class="product-cart__quality__wrap"><span><?php echo $order_item['detail_quantity'] ?></span></div>
                      </div>
                      <div class="product-cart__price">
                        <div class="cs-price cs-price--main"><?php echo number_format($order_item['detail_quantity'] * $order_item['product_price'], 0, ".", ","); ?> đ</div>
                        <div class="cs-price cs-price--sub" style="text-decoration: line-through"></div>
                        <div class="fst-cart-tag m-t-4">
                          <div class="cs-price cs-price--main f-w-500"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
                <div class="c-cart__success-pay m-t-16">
                  <div class="text--lg success-pay-title">
                    <div class="group-number">
                      <span class="text-size--lg p-r-24">Cần thanh toán:</span>
                      <span class="re-price f-w-500 f-s-p-16 re-red">
                        <?php if (!empty($order)) : ?>
                          <?php foreach ($order as $index => $order_item) : ?>
                            <?php if ($index === 0) : ?>
                              <?php echo number_format($order_item['order_amount'], 0, ".", ","); ?>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php endif; ?>
                        đ
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="c-cart__callback text-center p-y-24">
                <a href="./index.php">
                  <button class="btn btn-xl btn-link" id="btnCompleteOrder">VỀ TRANG CHỦ</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="../assets/js/header-footer.js">
  </script>
  <script src="../assets/js/util.js"></script>
  <script src="../assets/js/modal.js"></script>
  <script src="../assets/js/dropdown.js"></script>
  <script src="../assets/js/cart.2.js"></script>
  <script src="../assets/js/detail.4.js">
  </script>
</body>

</html>