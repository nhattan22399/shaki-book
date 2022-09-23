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
    <link rel="stylesheet" href="./assets/css/styleLogin.css">
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
                    <li class="sub-menu"><a href="category.php">Danh mục</a>
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
                    <li ><a class="sign" href="signUp.php">Đăng kí</a></li>
                </div>
            </div>
        </div>
    </header>
    
    <div class="main">
        <div class="form">

            <form method="post" action="#">
                <div class="label-form">
                Login
                </div>  
                <div class="body-form">

                    <div class="name">Tên đăng nhập</div>
                    <input   type="text" name="username" value=""/>
            
                    <div class="name">Mật khẩu</div>
                    <input  type="password" name="password" value=""/>

                    <div class="name">Bạn là ..</div>
                            <select   name="level">
                                <option value="0">Thành Viên</option>
                                <option value="1">Quản trị</option>
                            </select>
                
                </div> 
                        <div class="btn-dk">
                            <button type="submit" name="do-login" value="Đăng nhập">Login</button>
                        </div>   
                        <div class="text-ali name">Don't have an account?<a class="name red" href="signup.php">&nbsp;register</a></div>
                        <div class="text-ali name"><a class="name red"  href="login.php">Forgot password</a></div>
                
            </form>
    </div>
    </div>

</body>
</html>

<?php
session_start();
include ('./connect.php');
if (isset($_POST['do-login']))
{
    // Lấy thông tin
 
    $username   = ($_POST['username']);
    $password   = ($_POST['password']);
    $role = ($_POST['level']);

    global $username;
   
  
if($role == 0){

      // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM khachhang WHERE tendangnhap = '$username' and matkhau = '$password'";
      
    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);
      
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL statement failed!";
        }else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($result);

           
                $_SESSION['user'] = $row['hoten'];
                $_SESSION['idkh'] = $row['makh'];
              
                echo '<script language="javascript">alert("Đăng nhập thành công"); window.location="homepage.php";</script>';

        }
    }else {

        echo '<script language="javascript">alert("Đăng nhập không thành công"); window.location="login.php";</script>';
    }
}else{
        $sql = "SELECT * FROM quanly where tendangnhap = '$username' and matkhau = '$password' ";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {

            
            if( $row['quyen'] ==0){
                $_SESSION['user_admin'] = $row['tendangnhap'];
            }else{
                $_SESSION['user_editer'] = $row['tendangnhap'];
            }
            echo '<script language="javascript">alert("Đăng nhập quản trị viên thành công"); window.location="admin.php";</script>';
            }
           

      
           
        } else{
            echo '<script language="javascript">alert("Đăng nhập không thành công"); window.location="login.php";</script>';
            }
    

       
        
    }
}

?>