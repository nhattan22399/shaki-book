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
    <link rel="stylesheet" href="./assets/css/styleSignUp.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Shaki</title>
</head>
<body>
    <header>
        <div class="inner">
            <div class="container">
                <div class="logo">
                    <h1>Shaki</h1>
                </div>
        
                <div class="menu">
                    <li><a href="">Trang chủ</a></li>
                    <li class="sub-menu"><a href="">Danh mục</a>
                        <ul class="drop-menu">
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
                        </ul>
                    </li>
                    <li><a href="">Sách mới nhất</a></li>
                    <li><a href="">Sách hot</a></li>
                    <li><a href="./about.php">Về Shaki</a></li>
                </div>
        
                <div class="others">
                    <li><input placeholder="Tìm kiếm" type="text"><i class="fa-solid fa-magnifying-glass"></i></li>
                    <li><a  class="login" href="login.php">Đăng nhập</a></li>
                </div>
            </div>
        </div>
    </header>
    
    <div class="main">
        <div class="form">

            <form method="post" action="#">
                <div class="label-form">
                Register
                </div>  
                <div class="body-form">
                    <div class="name">Họ và tên</div>
                    <input   type="text" name="name" value=""/>

                    <div class="name">Địa chỉ</div>
                    <input   type="text" name="add" value=""/>

                    <div class="name">Tên đăng nhập</div>
                    <input   type="text" name="username" value=""/>
            
                    <div class="name">Mật khẩu</div>
                    <input  type="password" name="password" value=""/>
                
                    <div class="name">Email</div>
                    <td><input type="email" name="email" value=""/></td>
                
                    <div class="name">Phone</div>
                    <td><input   type="text" name="phone" value=""/></td>
                </div> 
                        <div class="btn-dk">
                            <button type="submit" name="do-register" value="Đăng Ký">Sign Up</button>
                        </div>   
                        <div class="text-ali name">Already have an account&ensp;<a class="name red"  href="login.php"><i class="fa-solid fa-arrow-right"></i>&ensp;Login</a></div>
                
            </form>
    </div>
    </div>



</body>
</html>

<?php

include ('./connect.php');
include './assets/PHPMailer-master/src/OAuth.php';
include './assets/PHPMailer-master/src/Exception.php';
include './assets/PHPMailer-master/src/PHPMailer.php';
include './assets/PHPMailer-master/src/POP3.php';
include './assets/PHPMailer-master/src/SMTP.php';


    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['do-register']))
{
    $username   = ($_POST['username']);
    $password   = ($_POST['password']);
    $email      = ($_POST['email']);
    $phone      = ($_POST['phone']);
    $name     = ($_POST['name']) ;
    $add     = ($_POST['add']) ;
        
    // Validate Thông Tin Username và Email có bị trùng hay không
      
   
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM khachhang WHERE tendangnhap = '$username' OR email = '$email'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Ten dang nhap hoac mail da ton tai"); window.location="signup.php";</script>';
          
        // Dừng chương trình
        die ();
    }
    else {
        // Ngược lại thì thêm bình thường
        $sql = "INSERT INTO khachhang (hoten, diachi, sodt, email, tendangnhap, matkhau) VALUES ('$name','$add','$phone','$email', '$username','$password')";
          
        if (mysqli_query($conn, $sql)){
            $last_id = mysqli_insert_id($conn);

                $sql = "SELECT * FROM khachhang where makh = $last_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'hoangdinhnhattan99@gmail.com';                 // SMTP username
                    $mail->Password = 'ahnykwppptcycwpp';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                
                    //Recipients
                    $mail->setFrom('hoangdinhnhattan99@gmail.com', 'Shaki');
                    $mail->addAddress(''.$row["email"], ''.$row["hoten"]);     // Add a recipient          // Name is optional
                    $mail->addReplyTo('ntykn123@gmail.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    
                
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Hi '.$row["tendangnhap"];
                    $mail->Body    = 'Bạn đã đăng kí thành công tài khoản tại Shaki!</b><br>Chúc bạn có những phút giây đọc sách vui vẻ!';
                    $mail->AltBody = 'shaki';
                
                    $mail->send();
                    
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }

            echo '<script language="javascript">alert("Đăng ký thành công, hãy kiểm tra hộp thư điện tử của bạn"); window.location="login.php";</script>';
           
            
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="signup.php";</script>';
        }
    }
}}
?>