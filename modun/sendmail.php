<?php
    include './assets/PHPMailer-master/src/OAuth.php';
    include './assets/PHPMailer-master/src/Exception.php';
    include './assets/PHPMailer-master/src/PHPMailer.php';
    include './assets/PHPMailer-master/src/POP3.php';
    include './assets/PHPMailer-master/src/SMTP.php';
    

     
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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
    $mail->setFrom('hoangdinhnhattan99@gmail.com', 'shaki');
    $mail->addAddress('ntykn123@gmail.com', 'puc');     // Add a recipient          // Name is optional
    $mail->addReplyTo('ntykn123@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'hi puc';
    $mail->Body    = 'Bạn đã đăng kí thành công tài khoản tại Shaki!</b>';
    $mail->AltBody = 'shaki';
 
    $mail->send();
    echo '<script language="javascript">alert("Đăng ký thành công kiểm tra mail của bạn");</script>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>