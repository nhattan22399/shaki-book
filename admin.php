<?php
include_once ('./modun/connect.php');
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleAdmin.css">
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
            <div class="main">
                <div class="left-main" >
                    <form class="sub-nav" action="#" method="post">
                        <input type="submit" name="khachhang" class="name-sub" value="Khách hàng">
                        <input type="submit" name="danhmuc" class="name-sub" value="Danh mục"> 
                        <input type="submit" name="sach" class="name-sub" value="Sản phẩm"> 
                        <input type="submit" name="hoadon" class="name-sub" value="Hoá đơn"> 
                        <input type="submit" name="thongke" class="name-sub" value="Thống kê">  
                    </form>
                           
                </div>
                <div class="content">
                    
                    <?php
                        if(isset($_POST['sach']) && isset($_SESSION['user_admin'])){
                            echo
                            '<form action="addBook.php" method="post">
                            <input class="addsp" type="submit" name="do-them" value="Thêm" style="padding: 5px 10px; background: orange;"></input>
                            </form>
                            <div class="category-nav">
                                <div class="name-category">Sản phẩm</div>
                                <div class="amount-category">Số lượng</div>
                                <div class="price-category">Đơn giá</div>
                                <div class="act-category">Hành động</div>
                            </div>';

                        }elseif(isset($_POST['danhmuc']) && isset($_SESSION['user_admin'])){
                            echo '
                            <form action="addCategory.php" method="post">
                            <input class="addsp" type="submit" value="Thêm" style="padding: 5px 10px; background: orange;"></input>
                            </form>
                            ';
                        }elseif(isset($_POST['khachhang']) && isset($_SESSION['user_admin'])){
                            echo '
                            <form action="add.php" method="post">
                            <input class="addsp" type="submit" value="Thêm" style="padding: 5px 10px; background: orange;"></input>
                            </form>
                            ';}
                    ?>
                    
                    <div class="list-book-cart">
                        <div class="list-book-item">
                        <?php
                        $start = !empty($_GET['start'])?$_GET['start']:0;
                        $limit= !empty($_GET['limit'])?$_GET['limit']:8;
                        $current_page = (int)!empty($_GET['page'])?$_GET['page']:1;
                        if(isset($_POST['sach'])){

                            if($current_page > 1){
                                $sql ="SELECT * FROM sach order by masach limit ".$limit.",". "$start;"; 
                            }else{
                                $sql ="SELECT * FROM sach order by masach limit ".$limit."";
                            }
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                echo '
                                <div class="card-item">
                                    <div class="book-desc">
                                        <img src="./assets/img/book/'.$row["anh"].'">
                                        <h3>'.$row["tensach"].'</h3>
                                    </div>
                                        <div class="amount-category">'.$row["soluong"].'</div>
                                        <div class="price-category">'.number_format($row["gia"], 0, ",", ".").' VNĐ</div>';
                                        if(isset($_SESSION['user_admin'])){
                                            echo 
                                        '<form  action="addbook.php" method="post" class="act-category">
                                            <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$row['masach'].'" >
                                            <input class="sub" name="do-sua" type="submit" value="Sửa">
                                            <input class="sub" name="do-xoa" type="submit" value="Xoá">
                                        </form>';}
                                        echo '
                                </div>
                                            
                                ';
    
                            }}
                        }elseif(isset($_POST['danhmuc'])){

                            
                            $sql ="SELECT * FROM danhmuc order by madanhmuc"; 
                            
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                echo '
                                <div class="card-item">
                                    <div style="margin-left :20px;line-height: 41px;width: 130px;">Mã danh mục: '.$row["madanhmuc"].'</div>
                                    <div style="margin-left: 20px;line-height: 41px;" > '.$row["tendanhmuc"].'</div>';
                                    if(isset($_SESSION['user_admin'])){
                                        echo'
                                    <form  action="updateCate.php" method="post" class="act-category" style="justify-content: flex-end;">
                                        <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$row['madanhmuc'].'" >
                                        <input class="sub" name="suadanhmuc" type="submit" value="Sửa">
                                        <input class="sub" name="xoa-danhmuc" type="submit" value="Xoá">
                                    </form>';}
                                    echo'
                                </div>
                                
                                ';
    
                            }}
                        }elseif(isset($_POST['khachhang'])){                
                                $sql ="SELECT * FROM khachhang order by makh"; 
                        
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_assoc()){
                                    echo '
                                    <div class="card-item">
                                        <div style="margin-left :20px;line-height: 41px;width: 70px;">Mã KH: '.$row["makh"].'</div>
                                        <div style="margin-left: 15px;line-height: 41px;width: 140px;" > '.$row["hoten"].'</div>
                                        <div style="margin-left: 15px;line-height: 41px;width: 80px;" >ĐC: '.$row["diachi"].'</div>
                                        <div style="margin-left: 15px;line-height: 41px;width: 180px;" >Số ĐT: '.$row["sodt"].'</div>
                                        <div style="margin-left: 15px;line-height: 41px;" > '.$row["email"].'</div>';
                                        if(isset($_SESSION['user_admin'])){
                                            echo'
                                        <form  action="update-kh.php" method="post" class="act-category" style="justify-content: flex-end;">
                                            <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$row['makh'].'" >
                                            <input class="sub" name="suakh" type="submit" value="Sửa">
                                            <input class="sub" name="xoakh" type="submit" value="Xoá">
                                        </form>';}
                                        echo '
                                    </div>
                                    
                                    ';

                                }}
                                }elseif(isset($_POST['hoadon'])){                
                                    $sql ="SELECT * FROM hoadon LEFT JOIN khachhang ON hoadon.makh = khachhang.makh  order by mahoadon"; 
                            
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                        while($row = $result->fetch_assoc()){
                                        echo '
                                        <div class="card-item">
                                            <div style="margin-left :20px;line-height: 41px;width: 150px;">Mã HĐ: '.$row["mahoadon"].'</div>
                                            <div style="margin-left: 15px;line-height: 41px;width: 250px;" > '.$row["hoten"].'</div>
                                            <div style="margin-left: 15px;line-height: 41px;width: 300px;" >Ngày mua: '.$row["ngaymua"].'</div>
                                            <div style="margin-left: 15px;line-height: 41px;" >Tổng tiền: '.$row["Tongtien"].'VNĐ</div>
                                        </div>
                                        
                                        ';
    
                                    }}
                                }elseif(isset($_POST['thongke'])){                
                                    $sql = "SELECT sum(Tongtien) as total FROM hoadon where DATE(ngaymua) = CURDATE() GROUP BY DATE(ngaymua)"; 
                            
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                       ($row = $result->fetch_assoc());
                                        echo '
                                        <div class="card-item">    
                                            <div style="margin-left: 15px;line-height: 41px;" >Tổng doanh thu trong ngày '.date("d/m/Y").': '.number_format($row["total"], 0, ",", ".").' VNĐ</div>
                                        </div>    
                                        ';
    
                                    }
                                    $sql1 = "SELECT sum(Tongtien) as total FROM hoadon where DATE(ngaymua) BETWEEN '2022-09-19 00:00:00' AND '2022-09-26 23:59:59' "; 
                            
                                    $result = $conn->query($sql1);
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                       ($row = $result->fetch_assoc());
                                       echo '
                                        <div class="card-item">    
                                            <div style="margin-left: 15px;line-height: 41px;" >Tổng doanh thu trong tuần: '.number_format($row["total"], 0, ",", ".").' VNĐ</div>
                                        </div>    
                                        ';
                                    }
                                    $sql2 = "SELECT sum(Tongtien) as total FROM hoadon where MONTH(ngaymua) BETWEEN '8' AND '10' "; 
                            
                                    $result = $conn->query($sql2);
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                       ($row = $result->fetch_assoc());
                                       echo '
                                        <div class="card-item">    
                                            <div style="margin-left: 15px;line-height: 41px;" >Tổng doanh thu trong Tháng '.date("m").': '.number_format($row["total"], 0, ",", ".").' VNĐ</div>
                                        </div>    
                                        ';
                                }}
                                
                        ?>
 
                        </div>
                    </div>
                    <div class="paging">
                            <?php
                            if(isset($_POST['sach']) ){

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
                            }
                                
                            ?>
                    </div>
                </div>
            </div>
                
        </div>
    </section>

   

    
    
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

