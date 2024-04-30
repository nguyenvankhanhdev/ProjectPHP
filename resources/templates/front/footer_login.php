<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/daterangepicker/moment.min.js"></script>

<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../assets/js/main.js"></script>

</body>
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['email_sent']) && $_SESSION['email_sent'] == true) : ?>
            $('#myModal').modal('show');
            <?php unset($_SESSION['email_sent']); ?>
        <?php endif; ?>
    });
</script>

</html>