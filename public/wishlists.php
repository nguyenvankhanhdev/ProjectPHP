<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<div class="container">
    <div class="col-md-12 mt-5">
        <div class="row">
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr class="d-flex justify-content-between">
                        <th style="margin-left: 16px;">Image</th>
                        <th style="margin-right: 150px;">Title</th>
                        <th style="margin-right: 90px;">Giá</th>
                        <th style="margin-right: 20px;">Xem Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <thead>
                        <?php
                        get_wishlists();
                        delete_wishlists();
                        ?>
                    </thead>
                </tbody>
            </table>
        </div>
    </div>
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>