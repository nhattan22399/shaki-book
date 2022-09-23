<?php
include_once ('./modun/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/stylePay.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.theme.default.min.css">
    <title>Shaki</title>
</head>
<body>
    <?php
    include './modun/header.php';
    ?>

    <section id="content">
        <div class="inner">  
            <section id="banner">
                    <div class="banner">
                        <img class="banner-img" src="./assets/img/bannerButton.jpg">
                        <div class="banner-btn">
                            <a href="#">Đọc ngay</a>
                        </div>
                    </div>
            </section>

                
            <section id="breadrum">
            <a href="./homePage.php">Trang chủ&emsp;</a><i class="fa-solid fa-right-long"></i><a href="cart.php">&emsp;Giỏ hàng&emsp;</a><i class="fa-solid fa-right-long"></i><a href="pay.php">&emsp;Thanh toán&emsp;</a>
            </section>
            
            <section id="pay">
                <div class="location">
                    <form method="post" action="test.php">
                    <div class="label-form">
                    payment
                    </div>  
                    <div class="body-form">
                        
                        <div class="name">Địa chỉ chi tiết</div>
                        <input   type="text" name="add" value=""/>

                        <div class="name">Tỉnh thành</div>
                        <input   type="text" name="username" value=""/>
                
                        <div class="name">Quận huyện</div>
                        <input  type="text" name="password" value=""/>
                    
                        <div class="name">Phường xã</div>
                        <input  type="text" name="password" value=""/>

                        <div class="name">Ghi chú giao hàng</div>
                        <input  type="text" name="password" value=""/>
                        
                        </div> 

                        <div class="option name">Hình thức thanh  toán:</div>
                            <select   name="level">
                                <option value="0">Thanh  toán khi nhận hàng</option>
                                <option value="1">Thanh toán online</option>
                            </select>
                            <?php
                            
                            ?>
                            <div class="btn-dk">
                                <button type="submit" name="do-send" >Payment</button>
                            </div>                       
                    </form>
                </div>
            </section>
              
    </section>

   

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    
    <?php
    include './modun/footer.php';
    ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="./assets/font/owlcarousel/owl.carousel.min.js"></script>  
<script>
    $(document).ready(function(){
    $(".owl-carousel").owlCarousel();
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel({
    items:1,
    center:true,
    nav: true,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});
</script>
<script>
    // Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>



