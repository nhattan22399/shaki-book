<?php
include_once ('./modun/connect.php');
session_start();
include ('./connect.php');
include './assets/PHPMailer-master/src/OAuth.php';
include './assets/PHPMailer-master/src/Exception.php';
include './assets/PHPMailer-master/src/PHPMailer.php';
include './assets/PHPMailer-master/src/POP3.php';
include './assets/PHPMailer-master/src/SMTP.php';


    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


   
    if(isset($_POST['do-bonus'])){
        $id = $_SESSION['idkh'];
        $sl = $_POST['amount'];
        $masach = $_POST['masach'];
        $sl = $sl +1;
        $sql = "UPDATE giohang set soluong = '$sl'  where masach = '$masach' and makh = '$id'";
        if ($conn->query($sql) === TRUE) {
            
            echo '<script language="javascript">; window.location="cart.php";</script>';
           
        } else {
        echo "Error updating record: " . $conn->error;
    }}

    if(isset($_POST['do-reduce'])){
        $id = $_SESSION['idkh'];
        $sl = $_POST['amount'];
        $sl = $sl-1;
        if($sl<1){
            $sl = 1;
        }
        
        $masach = $_POST['masach'];
        $sql = "UPDATE giohang set soluong = '$sl' where masach = '$masach' and makh = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">; window.location="cart.php";</script>';
        }
        else {
            echo '<a href="cart.php"></a>' . $conn->error;
        }}

   
    
    if(isset($_POST['do-pay'])){
        if(isset($_SESSION['idkh'])){
            echo '<script language="javascript"> window.location="pay.php";</script>';
        }else{
            echo '<script language="javascript">alert("Vui lòng đăng nhập để tiếp tục"); window.location="cart.php";</script>';
        }

        
    }

    if(isset($_POST['do-payment'])){
        $id = $_SESSION['idkh'];
        $sum = $_POST['sum'];
        $sql = "INSERT INTO hoadon  (makh, Tongtien) VALUES ('$id','$sum')";
       
        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT masach,soluong FROM giohang  where makh = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $masach = $row['masach'];
                $soluong = $row['soluong'];
                $sql = "UPDATE sach set soluong = (soluong - $soluong), luotmua = (luotmua + $soluong) where masach = '$masach'";
                    if ($conn->query($sql) === TRUE) {
                    echo '<script language="javascript">; window.location="pay.php";</script>';
                    }
                }
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }

        
    }

    if(isset($_POST['do-send'])){       
        $id = $_SESSION['idkh'];
        $mail = $_POST['email'];
        $sql = "SELECT * FROM khachhang where makh = $id";
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
            // $mail->addReplyTo('ntykn123@gmail.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Hi '.$row["tendangnhap"];
            $mail->Body    = 'Bạn đã mua hàng thành công tại Shaki!</b><br>Đơn hàng của bạn đang được vận chuyển<br>Chúc bạn có những phút giây đọc sách vui vẻ!';
            $mail->AltBody = 'shaki';
        
            $mail->send();
            
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    
        $sql = "DELETE FROM giohang  WHERE  makh = '$id'";
       
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">alert("Mua hàng thành công, hãy kiểm tra hộp thư điện tử của bạn");  window.location="finish.php"</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }

    
   
    
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); </script>';
        }
        
    }

    if (isset($_POST['do-update']))
              {
                  $tensach   = ($_POST['namebook']);
                  $tacgia      = ($_POST['tacgia']);
                  $soluong      = ($_POST['soluong']);
                  $gia    = ($_POST['gia']) ;
                  $sotap     = ($_POST['sotap']) ;
                  $mota     = ($_POST['mota']) ;
                  $madanhmuc     = ($_POST['madanhmuc']) ;
                  $id = $_POST['id'];                 
              
                  $sql = "UPDATE sach set tensach = '".$tensach."', tacgia = '".$tacgia."', soluong = '".$soluong."', gia = '".$gia."', sotap = '".$sotap."' , madanhmuc = '".$madanhmuc."' WHERE masach=$id";
                  
                  if ($conn->query($sql) === TRUE) {
                    echo '<script language="javascript">alert("Cập nhật thông tin thành công!"); window.location="admin.php";</script>';

                  } else {
                    echo '<script language="javascript">alert("cap nhat that bai"); window.location="admin.php";</script>';}
                    
                  }
    if (isset($_POST['delete-fv']))
    {
        $id = $_SESSION['idkh'];
        $masach = $_POST['id'];                 
    
        $sql = "DELETE FROM yeuthich  WHERE  makh = '$id' and masach ='$masach'";
        
        if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Đã xoá!"); window.location="favorite.php";</script>';

        } else {
        echo '<script language="javascript">alert("cap nhat that bai"); window.location="favorite.php";</script>';}
        
        } 
    
    




?>
