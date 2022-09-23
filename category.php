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
    <link rel="stylesheet" href="./assets/css/styleCategory.css">
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

            <section id="slider">
                    <div class="owl-carousel">
                        <img src="./assets/img/banner-book.png">
                        <img src="./assets/img/banner-book1.png">
            
                    </div>
            </section>
    
            <section id="banner">
                    <div class="banner">
                        <img class="banner-img" src="./assets/img/bannerButton.jpg">
                        <div class="banner-btn">
                            <a href="#">Đọc ngay</a>
                        </div>
                    </div>
            </section>
    
            <section id="breadrum">
                    <a href="./homePage.php">Trang chủ&emsp;</a><i class="fa-solid fa-right-long"></i><a href="category.php">&emsp;Danh mục sách</a>
            </section>
    
            <section id="new-book">
                <h1 class="title">Sách mới</h1>
                    <div class="book-list flex">
                        <?php 
                        $sql ="SELECT * FROM sach ORDER BY masach ASC limit 6;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed!";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <div class="book-item"><a href="aboutbook.php?masach='.$row["masach"].'">
                                    <div class="book-item-img">
                                        <img class="img-book" src="./assets/img/book/'.$row["anh"].'">
                                    </div>
                                    <div class="book-item-body">
                                        <h3 class="limit">'.$row["tensach"].'</h3>
                                        <p class="limit">'.$row["tacgia"].'</p>
                                        <hr>
                                        <h3>'.number_format($row["gia"], 0, ",", ".").'đ</h3>
                                    </div>
                                    </a>
                                </div>
                                ';
                            }
                        }
                            
                    ?>




                        
                    </div>
            </section>
    
            <section id="category-main">
                    <div class="category-main-left">
                        <div class="category-heading">
                            Danh mục:
                        </div>
                    <div class="category-list">   
                    <?php 
                       $sql = "SELECT * FROM danhmuc";
                       $result = $conn->query($sql);
                       
                       if ($result->num_rows > 0) {
    
                         // output data of each row
                         while($row = $result->fetch_assoc()) {
                           echo ' <li><a href="">'.$row["tendanhmuc"].'</a></li>';
                         }
                       } else {
                         echo "0 results";
                       }
                       
                       ?>

                        </div>
                    </div>
    
                    <div class="category-main-right">
                        <div class="filter">
                            <a href="">All</a>
                            <div class="name">Xếp theo</div>
                            <select   name="Sort">
                                    <option value="0">Mới nhất</option>
                                    <option value="1">Hot nhất</option>
                                    <option value="3">Giá cao đến thấp</option>
                                    <option value="4">Giá thấp đến cao</option>
                                </select>
                        </div>
                        <div class="category-book-list">

                    <?php 
                        $start = !empty($_GET['start'])?$_GET['start']:0;
                        $limit= !empty($_GET['limit'])?$_GET['limit']:8;
                        $current_page = (int)!empty($_GET['page'])?$_GET['page']:1;
                        if($current_page > 1){
                            $sql ="SELECT * FROM sach order by masach limit ".$limit.",". "$start;"; 
                        }else{
                            $sql ="SELECT * FROM sach order by masach limit ".$limit."";
                        }
                        
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed!";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <div class="category-book-item">
                                    <div class="bg-white">
                                        <div class="card-book">
                                                    <div class="card-book-content">
                                                        <a href="aboutbook.php?masach='.$row["masach"].'" class="card-book-img">
                                                            <div class="book-bg">
                                                                <img src="./assets/img/book/'.$row["anh"].'">
                                                                <span><i class="fa-regular fa-heart"></i></span>
                                                            </div>
                                                        </a>
                                                        <div class="card-book-info">
                                                        <a href="./aboutbook.php?masach='.$row["masach"].'">
                                                            <h3>'.$row["tensach"].'</h3>
                                                        </a>
                                                        <p class="author">'.$row["tacgia"].'</p>
                                                        <p class="des">'.$row["mota"].'</p>
                                                    </div>
                                                </div>
                                                    <div class="card-book-like">
                                                        <hr>
                                                        <div class="card-book-like-body">
                                                            <div class="book-view">
                                                            '.number_format($row["gia"], 0, ",", ".").'đ                                                         
                                                            </div>
                                                            <a href="aboutbook.php?masach='.$row["masach"].'" class="add-cart"><i class="fa-solid fa-cart-plus"></i> &nbsp;Add Cart</a>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                            
                    ?>
              
                        </div>
                        <div class="paging">
                            <?php
                                include './pagination.php';
                                $config = array(
                                    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, // Trang hiện tại
                                    'total_record'  => $totalRecords , // Tổng số record
                                    'limit'         => 8,// limit
                                    'link_full'     => '?page={page}&start={start}&limit={limit}',// Link full có dạng như sau: domain/com/page/{page}
                                    'link_first'    => '?limit={limit}',// Link trang đầu tiên
                                );
                                 
                                $paging = new Pagination();
                                 
                                $paging->init($config);
                                
                                echo $paging->html();
                            ?>
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