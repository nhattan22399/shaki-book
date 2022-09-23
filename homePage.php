<?php
    session_start();
    include_once ('./modun/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.theme.default.min.css">
    <title>Shaki</title>
</head>
<body>
    <?php   
    include './modun/header.php';
    ?>

    <section id="slider">
        <div class="inner">
            <div class="owl-carousel">
                <img src="./assets/img/slider2.jpg">
                <img src="./assets/img/slider1.png">
                <img src="./assets/img/slider3.jpg">
                <img src="./assets/img/slider4.png">
                <img src="./assets/img/slider5.png">
    
            </div>
        </div>
    </section>

    <section id="app-container">
        <div class="heading-area">
            <h3>Khám phá kho tàng tri thức rộng lớn</h3>
            <h3>mọi lúc mọi nơi</h3>
        </div>
        <div class="content-app">
            <div class="row-content">
                <i class="fa-solid fa-check"></i>
                <p>Đọc và nghe trực tuyến trên nhiều thiết bị.</p>
            </div>
            <div class="row-content">
                <i class="fa-solid fa-check"></i>
                <p>Không có quảng cáo.</p>
            </div>
            <div class="row-content">
                <i class="fa-solid fa-check"></i>
                <p>Tìm kiếm sách dễ dàng, nhanh chóng.</p>
            </div>
            <div class="row-content">
                <i class="fa-solid fa-check"></i>
                <p>Đồng bộ trên mọi thiết bị.</p>
            </div>
            <div class="row-content">
                <i class="fa-solid fa-check"></i>
                <p>Ghi chú, share quote, lưu đọc dễ dàng.</p>
            </div>
            <div class="row-button">
                <img src="./assets/img/appstore.png">
                <img src="./assets/img/googleplay.png">
            </div>
        </div> 
    </section>
    <section id="statistical">
        <div class="statistical-content">
            <h3>3.2M<i class="fa-solid fa-plus"></i></h3>
            <div class="line"></div>
            <h3>Users</h3>
        </div>
        <div class="statistical-content">
            <h3>13.000<i class="fa-solid fa-plus"></i></h3>
            <div class="line"></div>
            <h3>Nội dung số</h3>
        </div>
        <div class="statistical-content">
            <h3>4.000<i class="fa-solid fa-plus"></i></h3>
            <div class="line"></div>
            <h3>Tác giả</h3>
        </div><div class="statistical-content">
            <h3>100<i class="fa-solid fa-plus"></i></h3>
            <div class="line"></div>
            <h3>Đối tác</h3>
        </div>
    </section>

    <section id="field-area">
        <div class="heading-area padding-30">
            <h3>Lĩnh vực hoạt động</h3>
        </div>
        <div class="field-content">
            <div class="col-field">
                <div class="img-field">
                    <img src="./assets/img/scope1.png">
                </div>
                <div class="body-col-field">
                    <h3>Kinh doanh nội dung xuất bản các sản phẩm điện tử</h3>
                    <p>Bao gồm sách điện tử (Ebook), sách nói (Audiobook), truyện tranh, ..</p>
                </div>
            </div>
        
       
            <div class="col-field">
                <div class="img-field">
                    <img src="./assets/img/scope2.png">
                </div>
                <div class="body-col-field">
                    <h3>Thương mại điện tử bán hàng</h3>
                    <p>Sàn thương mại điện tử bán sách giấy, sách điện tử,...đa dạng trên thị trường</p>
                </div>
            </div>
        </div>
    </section>

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
</body>
</html>