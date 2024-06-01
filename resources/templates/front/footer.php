<footer>
    <div class="footer">
        <div class="container">
            <div class="footer-contact">
                <div class="contact-item">
                    <ul>
                        <li><a href="">Giới thiệu về công ty</a></li>
                        <li><a href="">Chính sách bảo mật</a></li>
                        <li><a href="">Quy chế hoạt động</a></li>
                        <li><a href="">Kiểm tra hóa đơn điện tử</a></li>
                        <li><a href="">Tra cứu thông tin bảo hành</a></li>
                        <li><a href="">Câu hỏi thường gặp </a></li>
                    </ul>
                    <div class="contact-icon">
                        <div class="icon-item">
                            <img class="cth1" src="./assets/img/ft-img1.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth2" src="./assets/img/ft-img2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="contact-item">
                    <ul>
                        <li><a href="">Tin tuyển dụng</a></li>
                        <li><a href="">Tin khuyến mãi</a></li>
                        <li><a href="">Hướng dẫn mua online</a></li>
                        <li><a href="">Hướng dẫn mua trả góp</a></li>
                    </ul>
                    <p class="trtit">Chứng nhận:</p>
                    <div class="contact-icon">
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img3.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img4.png" alt="">
                        </div>
                        <div class="icon-item">
                            <img class="cth3" src="./assets/img/ft-img5.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="contact-item">
                    <ul>
                        <li><a href="">Hệ thống cửa hàng</a></li>
                        <li><a href="">Chính sách đổi trả</a></li>
                        <li><a href="">Hệ thống bảo hành</a></li>
                        <li><a href="">Giới thiệu máy đổi trả</a></li>
                    </ul>
                </div>
                <div class="contact-item contact-custom">
                    <ul class="ftr2">
                        <li>
                            <p>Tư vấn mua hàng miễn phí</p>
                            <a href="">1800 6601 <span>(Nhánh 1)</span></a>
                        </li>
                        <li>
                            <p>Hỗ trợ kỹ thuật</p>
                            <a href="">1800 6601
                                <span>(Nhánh 2)</span>
                            </a>
                        </li>
                        <li>
                            <p>Góp ý, khiếu nại(8h - 22h00)</p>
                            <a href="">1800 6616</a>
                        </li>
                    </ul>
                    <p class="contact-title">Hỗ trợ thanh toán</p>
                    <div class="support-pay">
                        <div class="pay-item"><img src="./assets/img/visa.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/atm.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/zalo-pay.png" alt=""></div>
                        <div class="pay-item"><img src="./assets/img/master-card.png" alt=""></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</main>
<!-- fmklsd -->
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../assets/js/index.js"></script>
<script>
    //Get the button
    $('#myBtn').on('click', function() {
        $('html, body').animate({
            scrollTop: 0,
        }, 300);
    });

    $(window).on('scroll', function() {
        var scrolling = $(this).scrollTop();

        if (scrolling > 300) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
            // Get all elements with the class 'day_sale'
            var elements = document.querySelectorAll('.day_sale');
            
            elements.forEach(function(element, index) {
                // Create a new element to show the countdown
                var countdownElement = document.createElement('p');
                countdownElement.id = 'countdown' + index;
                countdownElement.className = 'countdown';
                element.insertAdjacentElement('afterend', countdownElement);

                // Get the text content and trim it
                var timeText = element.textContent.trim();
                console.log("Time Text:", timeText);  // Debug: Print the raw time text
                
                // Extract days, hours, minutes, and seconds from the text
                var parts = timeText.split(' ');
                console.log("Parts:", parts);  // Debug: Print the split parts
                
                var days = parseInt(parts[0].replace('ngày', '').trim());
                console.log("Days:", days);  // Debug: Print days
                
                var timeParts = parts[2].split(':');
                console.log("Time Parts:", timeParts);  // Debug: Print the time parts
                
                var hours = parseInt(timeParts[0]);
                var minutes = parseInt(timeParts[1]);
                var seconds = parseInt(timeParts[2]);

                console.log("Parsed Time - Hours:", hours, "Minutes:", minutes, "Seconds:", seconds);  // Debug: Print parsed time parts

                // Calculate the target time
                var now = new Date();
                var targetTime = new Date(now.getTime() + days * 24 * 60 * 60 * 1000 + hours * 60 * 60 * 1000 + minutes * 60 * 1000 + seconds * 1000);

                // Function to update the countdown timer
                function updateCountdown() {
                    var currentTime = new Date().getTime();
                    var distance = targetTime - currentTime;

                    if (distance < 0) {
                        clearInterval(countdownTimer);
                        countdownElement.innerHTML = "EXPIRED";
                        return;
                    }

                    var daysLeft = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hoursLeft = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutesLeft = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var secondsLeft = Math.floor((distance % (1000 * 60)) / 1000);

                    console.log("Countdown - Days:", daysLeft, "Hours:", hoursLeft, "Minutes:", minutesLeft, "Seconds:", secondsLeft);  // Debug: Print countdown values

                    countdownElement.innerHTML = daysLeft + " ngày " + hoursLeft + ":" + minutesLeft + ":" + secondsLeft;
                }

                // Update the countdown every second
                var countdownTimer = setInterval(updateCountdown, 1000);
                updateCountdown(); // Initial call to display the timer immediately
            });
        });
    </script>
</script>

</html>