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
    
    
    <div class="main">
        <div class="form">
     
             
            <form method="post" action="#">
                <div class="label-form">
                Add
                </div>  
                <div class="body-form">
                    <div class="row-input">    
                        <div class="name">Họ và tên</div>
                        <input   type="text" name="name" value=""></div>

                    <div class="row-input">
                        <div class="name">Địa chỉ</div>
                        <input   type="text" name="add" value=""></div>
                
                    <div class="row-input">
                        <div class="name">Email</div>
                        <input type="email" name="email" value=""></div>
                
                    <div class="row-input">
                        <div class="name">Phone</div>
                        <input   type="text" name="phone" value=""></div>
                    
                    <div class="row-input">
                    <div class="name">Tên đăng nhập</div>
                    <input   type="text" name="username" value=""/></div>

                    <div class="row-input">
                    <div class="name">Mật khẩu</div>
                    <input  type="password" name="password" value=""/></div>
                    </div>
                        <div class="btn-dk">
                            <button type="submit" name="do-them">ADD</button>
                        </div>   
                       
                
            </form>
            
    </div>
    </div>



</body>
</html>

<?php




if (isset($_POST['do-them']))
{
   
    $email      = ($_POST['email']);
    $phone      = ($_POST['phone']);
    $name     = ($_POST['name']) ;
    $add     = ($_POST['add']) ;
    $username   = ($_POST['username']);
    $password   = ($_POST['password']);
             
    $sql = "SELECT * FROM khachhang WHERE tendangnhap = '$username' OR email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Ten dang nhap hoac mail da ton tai"); window.location="add.php";</script>';
          
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO khachhang (hoten, diachi, sodt, email, tendangnhap, matkhau) VALUES ('$name','$add','$phone','$email', '$username','$password')";
          
        if (mysqli_query($conn, $sql)){    
          echo '<script language="javascript">alert("Cập nhật thông tin thành công!"); window.location="admin.php";</script>';       
        }
      else {
        echo '<script language="javascript">alert("Khong tim thay username"); window.location="admin.php";</script>';}
}}
    
?>