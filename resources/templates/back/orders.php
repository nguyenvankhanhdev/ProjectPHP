
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">
            All Orders
        </h1>
    </div>
    <div class="row">
       
        <table class="table table-hover">
            <thead>

                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Total Price</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    get_orders();
                ?>
            </tbody>
        </table>
    </div>
