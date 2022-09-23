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
    <link rel="stylesheet" href="./assets/css/styleAbout.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/font/owlcarousel/assets/owl.theme.default.min.css">
    <title>Shaki</title>
</head>
<body>
    <?php
    include './modun/header.php';
    ?>

    <section id="link">
        <div class="inner">
            <a href="./homePage.php">Trang chủ&emsp;</a><i class="fa-solid fa-right-long"></i><a href="">&emsp;About</a>
        </div>
    </section>

    <section id="banner">
        <img src="./assets/img/banner.png" alt="">
    </section>

    <section id="intro-menu">
        <div class="inner">
            <div class="icon-intro flex">
                <div class="row-img">
                    <img class="gioithieu" src="./assets/img/gioi-thieu.png">
                    <a href="#introduce"><h3>Giới thiệu</h3></a>
                </div>
                <div class="row-img">
                    <img class="lichsu" src="./assets/img/lichsu.png">
                    <a href="#history"><h3>Lịch sử hình thành</h3></a>
                </div>
                <div class="row-img">
                    <img class="linhvuc" src="./assets/img/linh-vuc.png">
                    <a href="#field-area"><h3>Lĩnh vực hoạt động</h3></a>
                </div>
                <div class="row-img">
                    <img class="doitac" src="./assets/img/doi-tac.png">
                    <a href="#partner"><h3>Đối tác</h3></a>
                </div>
            </div>
        </div>
    </section>

    <section id="introduce">
        <div class="inner">
            <div class="heading-area">
                <H3>Giới thiệu chung</H3>
            </div>
            <div class="content-area">
                <img class="shark" src="./assets/img/logo.png">
                <div class="body-area">
                    <p>Nền tảng Shaki là một sản phẩm của mình được chính thức ra mắt vào năm 2022 với mục tiêu là cầu nối giữa tác giả, dịch giả, nhà xuất bản và bạn đọc, kho nội dung của Waka liên tục được cung cấp và cập nhật các nội dung số đa dạng giúp nâng cao văn hóa đọc của người Việt và mang đến một phong cách đọc sách hiện đại, tiện ích hơn.</p>
                    <p>Sau hơn 2 tuần xây dựng và phát triển, từ một sản phẩm nền tảng xuất bản điện tử, Shaki được chính thức thành lập Công ty Cổ phần sách điện tử Shaki (Shaki Ebook Corporation) từ tháng 9/2022.</p>
                    <p>Với định hướng: Đưa tri thức tới mọi tầng lớp nhân dân, nâng tầm tri thức Việt.</p>
                    <p>Hiện tại, Công ty cổ phần Shaki tự hào là đơn vị tiên phong trong việc ứng dụng công nghệ cao trong triển khai và cung cấp Ebooks trả phí ở Việt Nam, Công ty Cổ phần Shaki sở hữu nền tảng công nghệ hiện đại và đội ngũ phát triển sản phẩm chất lượng cao, đảm bảo xây dựng nền tảng xuất bản tiên tiến, đáp ứng mọi nhu cầu đọc của người dùng từ tìm kiếm nội dung đến trải nghiệm đọc sách, truyện tranh hay sách nói (audiobooks) trên bất cứ thiết bị di động thông minh nào, ngay cả khi không có kết nối Internet.</p>
                    <p>Ngoài ra, Công ty Cổ phần Shaki cũng là một trong trong các đối tác cung cấp các dịch vụ đọc sách điện tử, truyện tranh trả phí trên các nhà mạng trong và ngoài nước (Viettel, Vinaphone, Mobifone, Vietnamobile, Metfone, Natcom, Unitel…).</p>
                </div>
            </div>
            </div>   
    
    </section>

    <section id="history">
        <div class="inner">
            <div class="history">
                <div class="heading-area">
                    <H3>Lịch sử hình thành</H3>
                </div>
                <div class="body-area flex">
                    <img class="img-history" src="./assets/img/history.png">
                </div>
            </div>
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

    <section id="partner">
        <div class="inner">
            <div class="partner">
                <div class="heading-area padding-30">
                    <h3>Đối tác</h3>
                </div>
                <div class="owl-carousel">
                    <img src="./assets/img/dt-1.jpg">
                    <img src="./assets/img/dt-2.jpg">
                    <img src="./assets/img/dt-3.jpg">
                    <img src="./assets/img/dt-4.jpg">
                    <img src="./assets/img/dt-5.jpg">
                    <img src="./assets/img/dt-6.jpg">
                    <img src="./assets/img/dt-7.jpg">
                    <img src="./assets/img/dt-8.jpg">
                    <img src="./assets/img/dt-9.jpg">
                    <img src="./assets/img/dt-10.jpg">
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
    items:5,
    center:true,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});
</script>
</body>
</html>