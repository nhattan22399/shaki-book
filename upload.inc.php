<?php
if(isset($_POST['submit'])){
    $newFileName = $_POST['filename'];
    if(empty($newFileName)){
        $newFileName ="gallery";
    }else  {
        $newFileName = strtolower(str_replace(" ","-",$newFileName));
    }
    $tensach = $_POST['filenamebook'];
    $tacgia = $_POST['filenametg'];
    $soluong =$_POST['filesl'];
    $gia =$_POST['filegia'];
    $sotap =$_POST['filesotap'];
    $madanhmuc =$_POST['filedanhmuc'];
    $mota =$_POST['filedesc'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array("jpg","jpeg","gif","png");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 7000000){
                $imageFullName = $newFileName.".".uniqid("",true).".".$fileActualExt;
                $fileDestination = "./assets/img/book/".$imageFullName;
                echo $fileDestination;

                include_once ('./modun/connect.php');
                if(empty($tensach) || empty($mota)){
                    header("Location: ./admin.php?upload=empty");
                    exit();
                }else {
                    $sql = "SELECT * FROM sach;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed";
                    }else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        // $masach = $rowCount +1;

                        $sql = "INSERT INTO sach (tensach, tacgia, soluong, gia, sotap, anh,mota,madanhmuc) VALUES (?,?,?,?,?,?,?,?)";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL statement failed!";

                        }else{
                            mysqli_stmt_bind_param($stmt,"ssssssss",$tensach,$tacgia,$soluong,$gia, $sotap,$imageFullName, $mota ,$madanhmuc);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName,$fileDestination);
                            echo $sql;
                            header("Location: ./admin.php?upload=success");

                        }
                    }
                }
            }
        }else{
            echo "you had an error!";
            exit();
        }
    }else {
        echo "you need to upload a proper file type!";
        exit(); 
    }
}
?>