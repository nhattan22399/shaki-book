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
    <link rel="stylesheet" href="./assets/css/styleUser.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Shaki</title>
</head>
<body>
    <?php
    include './modun/header.php';
    ?>
    
    <div class="main">
        <div class="form">
        <?php 
            $id = $_SESSION['idkh'];
            $sql = "SELECT * FROM khachhang where makh = $id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {

              // output data of each row
              $row = $result->fetch_assoc();
                echo ' 
            <form method="post" action="#">
                <div class="label-form">
                Infomation
                </div>  
                <div class="body-form">
                    <div class="row-input">    
                        <div class="name">Họ và tên</div>
                        <input   type="text" name="name" value="'.$row["hoten"].'"/></div>

                    <div class="row-input">
                        <div class="name">Địa chỉ</div>
                        <input   type="text" name="add" value="'.$row["diachi"].'"/></div>

                    <div class="row-input">
                        <div class="name">Tên đăng nhập</div>
                        <input   type="text" name="username" value="'.$row["tendangnhap"].'"/></div>
                
                    <div class="row-input">
                        <div class="name">Email</div>
                        <input type="email" name="email" value="'.$row["email"].'"/></div>
                
                    <div class="row-input">
                        <div class="name">Phone</div>
                        <input   type="text" name="phone" value="'.$row["sodt"].'"/></div>
                </div> 
                        <div class="btn-dk">
                            <button type="submit" name="do-update">Update</button>
                        </div>   
                       
                
            </form>
            ';
              }
        ?>
    </div>
    </div>



</body>
</html>

<?php




if (isset($_POST['do-update']))
{
    $username   = ($_POST['username']);
    $email      = ($_POST['email']);
    $phone      = ($_POST['phone']);
    $name     = ($_POST['name']) ;
    $add     = ($_POST['add']) ;
             
    $id = $_SESSION['idkh'];

    $sql = "UPDATE khachhang set hoten = '".$name."', diachi = '".$add."', sodt = '".$phone."', email = '".$email."'  WHERE makh=$id";
      
    if (mysqli_query($conn,$sql)){
       
          echo '<script language="javascript">alert("Cập nhật thông tin thành công!"); window.location="user.php";</script>';
        
        }
      else {
        echo '<script language="javascript">alert("Khong tim thay username"); window.location="user.php";</script>';}
}
    
?>