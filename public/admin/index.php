<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>
D
<?php if (!isset($_SESSION['username'])) {
  redirect("../../public");
}
?>
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">


      </div>
    </div>
    <!-- /.row -->

    <?php
    if ($_SERVER['REQUEST_URI'] == "/Project_php/public/admin/" || $_SERVER['REQUEST_URI'] == "/Project_php/public/admin/index.php") {
      include(TEMPLATE_BACK . "/admin_content.php");
    }

    if (isset($_GET['orders'])) {
      include(TEMPLATE_BACK . "/orders.php");
    }
    if (isset($_GET['add_product'])) {
      include(TEMPLATE_BACK . "/add_product.php");
    }
    if (isset($_GET['products'])) {
      include(TEMPLATE_BACK . "/products.php");
    }
    if (isset($_GET['edit_product'])) {
      include(TEMPLATE_BACK . "/edit_product.php");
    }
    if (isset($_GET['delete_products'])) {
      include(TEMPLATE_BACK . "/delete_product.php");
    }
    if (isset($_GET['categories'])) {
      include(TEMPLATE_BACK . "/categories.php");
    }
    if (isset($_GET['delete_categories'])) {
      include(TEMPLATE_BACK . "/delete_categories.php");
    } 
    if (isset($_GET['add_img'])) {
      include(TEMPLATE_BACK . "/add_img.php");
    }
    ?>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include(TEMPLATE_BACK . "/footer.php"); ?>