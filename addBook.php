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
    <style>
        .row-input {
        display: block;
        }
    
        input[type="text"]{
        padding: 7px;
        width: 100%;
        border-radius: 3px;
        border: unset;}
    </style>
</head>
<body>
    
    
    <div class="main">
    <div class="send-file" style="display: flex; flex-direction: column; justify-content: center;align-items: center; min-height: 100vh;">

        <?php

            if(isset($_POST['do-them'])){
                echo '
                    <div class="book-upload" style="display: flex; flex-direction: column; justify-content: center;align-items: center; min-height: 100vh;">
                    <h2 style="font-size: 30px;margin-bottom: 20px;">Upload</h2>
                    <form style="display: flex;flex-direction: column;gap: 10px;" class="form-upload" action="upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filename" placeholder="&ensp; Tên file....">
                        <input type="text" name="filenamebook" placeholder="&ensp; Tên sách....">
                        <input type="text" name="filenametg" placeholder="&ensp; Tác giả...">
                        <input type="text" name="filesl" placeholder="&ensp; Số lượng....">
                        <input type="text" name="filegia" placeholder="&ensp; Giá....">
                        <input type="text" name="filesotap" placeholder="&ensp; Số tập...">
                        <input type="text" name="filedanhmuc" placeholder="&ensp; Mã danh mục...">
                        <input type="text" name="filedesc" placeholder="&ensp; Mô tả...">
                        <input style="border-radius: unset;" type="file" name="file">
                        <button type="submit" name="submit" style="    padding: 10px 0;" >UPLOAD</button>
                    </form>
                    </div>
                ';
            }

            if(isset($_POST['do-sua'])){
                $id = $_POST['id'];
                $sql = "SELECT * FROM sach where masach = $id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {

                // output data of each row
                $row = $result->fetch_assoc();
                    echo ' 
                <form method="post" action="test.php">
                    <div class="label-form">
                    Infomation
                    </div>  
                    <div class="body-form">
                        <div class="row-input">    
                            <div class="name">Tên sách</div>
                            <input   type="text" name="namebook" value="'.$row["tensach"].'"/></div>

                        <div class="row-input">
                            <div class="name">Tác giả</div>
                            <input   type="text" name="tacgia" value="'.$row["tacgia"].'"/></div>

                        <div class="row-input">
                            <div class="name">Số lượng</div>
                            <input   type="text" name="soluong" value="'.$row["soluong"].'"/></div>
                    
                        <div class="row-input">
                            <div class="name">Giá</div>
                            <input type="text" name="gia" value="'.$row["gia"].'"/></div>
                    
                        <div class="row-input">
                            <div class="name">Số tập</div>
                            <input   type="text" name="sotap" value="'.$row["sotap"].'"/></div>

                        <div class="row-input">
                            <div class="name">Mô tả</div>
                            <input   type="text" name="mota" value="'.$row["mota"].'"/></div>

                        <div class="row-input">
                            <div class="name">Mã danh mục</div>
                            <input   type="text" name="madanhmuc" value="'.$row["sotap"].'"/></div>

                    </div> 
                            <div class="btn-dk">
                                <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$row['masach'].'" >

                                <button type="submit" name="do-update">Update</button>
                            </div>   
                        
                    
                </form>
                ';
                }           
        }

        if(isset($_POST['do-xoa'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM sach  WHERE  masach = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script language="javascript">alert("Xoá thành công"); window.location="admin.php";</script>';

            }}

        ?>  
    </div>
            
    </div>
    </div>



</body>
</html>

<?php





    
?>