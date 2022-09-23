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
    <link rel="stylesheet" href="./assets/css/stylebook.css">
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
            <?php 
                $masach = !empty($_GET['masach'])?$_GET['masach']:1;
                $sql = "SELECT * FROM sach,danhmuc where masach = $masach";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                    echo '
                    <section id="breadrum">
                    <a href="./homePage.php">Trang chủ&emsp;</a><i class="fa-solid fa-right-long"></i><a href="category.php">&emsp;Danh mục sách&emsp;</a><i class="fa-solid fa-right-long"></i><a href="aboutBook.php">&emsp;'.$row["tensach"].'</a>
                     </section>
                    ';}else{
                        echo "loi";
                    }
            ?>
           
            <?php 
                $masach = !empty($_GET['masach'])?$_GET['masach']:1;
                $sql = "SELECT * FROM sach LEFT JOIN danhmuc ON sach.madanhmuc = danhmuc.madanhmuc where masach = '$masach'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                    echo '
                    <section id="book">
                        <div class="big-img">
                            <img class="book-product" src="./assets/img/book/'.$row["anh"].'">
                        </div>

                        <div class="book-info">
                            <div class="title" style="text-align: left; margin-bottom: 20px;">'.$row["tensach"].'</div>
                            <h3>Tác giả: <span>'.$row["tacgia"].'</span></h3>
                            <h3>Thể loại: <span>'.$row["tendanhmuc"].'</span></h3>
                            <div class="price-book">Giá bán: <span>'.number_format($row["gia"], 0, ",", ".").'</span> VNĐ</div>
                            <div class="row-btn">
                                <form class="btn=-thich" action="#" method="post">
                                    <button style="border: unset; background: unset;" type="submit" name="do-like" ><i class="fa-regular fa-heart favorite-btn"></i></button>
                                </form>
                                <form class="add-btn" action="#" method="post">
                                    <button class="add-btn"  type="submit" name="do-add" class="add-btn-child">
                                        <i class="fa-solid fa-cart-plus" style=" color: red;  font-size: 30px;"></i>
                                        Thêm vào giỏ hàng!
                                    </button>
                                </form>
                        
                            </div>
                            <p class="ship"><i style=" color: grey;  font-size: 20px;" class="fa-solid fa-truck-fast"></i>Miễn phí vận chuyển cho đơn hàng từ 150k</p>
                            <p class="ship"><i style=" color: grey;  font-size: 20px;" class="fa-solid fa-phone"></i>Hotline: 1900545482</p>
                            <p class="ship"><i style=" color: grey;  font-size: 20px;" class="fa-solid fa-envelope"></i>Email: support.shakishop@shaki.vn</p>
                        </div>

                    </section>


                    <section class="book-desc">
                    <div class="title">Giới thiệu:</div>
                    <h4>'.$row["mota"].'</h4>
                    </section>
                    
                    ';
                }
                else {
                echo "Có lỗi xảy ra! Vui lòng kiểm tra lại";
                }

            ?>
           
            
            <section id="hot-book">
                <h1 class="title">Sách bán chạy nhất</h1>
                        <div class="book-list flex">
                            <?php 
                            $sql ="SELECT * FROM sach order by luotmua deSC limit 6;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "SQL statement failed!";
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                    <div class="book-item hot" ><a href="aboutbook.php?masach='.$row["masach"].'">
                                        <div class="book-item-img">
                                            <img class="img-book" src="./assets/img/book/'.$row["anh"].'">
                                        </div>
                                        <div class="book-item-body">
                                            <h3 class="price" >'.number_format($row["gia"], 0, ",", ".").'đ</h3>
                                        </div>
                                        </a>
                                    </div>
                                    
                                        ';
                                    }
                                }
                                    
                            ?>
            </section>
                
        </div>
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

<?php

if(isset($_POST['do-add'])){
    if(isset($_SESSION['idkh'])){
    $makh = $_SESSION['idkh'];
    $masach = $_GET['masach'];
    $sql = "INSERT INTO giohang (masach, soluong, makh) VALUES ('$masach',1,'$makh')";
          
    
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Đã thêm vào giỏ hàng");</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    }else{
        echo '<script language="javascript">alert("Vui lòng đăng nhập để tiếp tục"); window.location="login.php";</script>';
    }  
}

if(isset($_POST['do-like'])){
    if(isset($_SESSION['idkh'])){
    $makh = $_SESSION['idkh'];
    $masach = $_GET['masach'];
    $sql = "INSERT INTO yeuthich (makh,masach) VALUES ('$makh','$masach')";
          
    
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Đã thêm vào danh sách yêu thích");</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    }else{
        echo '<script language="javascript">alert("Vui lòng đăng nhập để tiếp tục"); window.location="login.php";</script>';
    }


    
}
?>
