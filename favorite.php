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
    <link rel="stylesheet" href="./assets/css/styleFavorite.css">
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
            <a href="./homePage.php">Trang chủ&emsp;</a><i class="fa-solid fa-right-long"></i><a href="favorite.php">&emsp;Danh sách yêu thích&emsp;</a>
            </section>
            
            <section id="cart">
                <div class="left-area">
                    <div class="name-shop">Shaki - Sách bạn thích</div>
                    <div class="category-nav">
                        <div class="name-category">Sản phẩm</div>
                        <div class="amount-category">Tác giả</div>
                        <div class="price-category">Danh mục</div>
                        <div class="act-category">Ngày thích</div>
                        <div class="act-delete">Hành động</div>
                    </div>
                    <div class="list-book-cart">
                        <div class="list-book-item">
                        <?php 
                            $id = $_SESSION['idkh']; 
                            $sql = "SELECT * FROM sach LEFT JOIN yeuthich ON sach.masach = yeuthich.masach where makh = $id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $idsach = $row['masach'];       
                                echo '
                                        <div class="card-item">
                                            <div class="book-desc">
                                                <img src="./assets/img/book/'.$row["anh"].'">
                                                <h3>'.$row["tensach"].'</h3>
                                            </div>
                                                <div  class="amount-category">                                                   
                                                    <div class="amount">'.$row["tacgia"].'</div>                                                  
                                                </div>
                                                <div class="price-category">'.$row['madanhmuc'].'</div>
                                                <div  class="act-category">
                                                   '.$row["ngaythich"].' 
                                                </div>
                                                <form method="post" action="test.php" class="act-delete">
                                                    <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$row["masach"].'" class="amount">
                                                    <button style="padding: 10px;" type="submit"  name="delete-fv">
                                                    xoá
                                                    </button>
                                                </form>
                                        </div>
                                    
                                    ';
                                
                                }
                                }
                                else {
                                echo "Chưa có sản phẩm nào";
                                }
                        ?>  
                        </div>
                    </div>
                    <div class="voucher">
                        <i class="fa-solid fa-ticket"></i>
                        Shop Voucher giảm đến ₫12k
                    </div>
                    <div class="ship">
                        <i class="fa-solid fa-truck-fast"></i>
                        Giảm ₫25.000 phí vận chuyển đơn tối thiểu ₫50.000
                    </div>
                </div>
                
            </section>
           
    
            
            
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



