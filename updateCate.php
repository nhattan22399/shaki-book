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
        <?php
        if (isset($_POST['suadanhmuc']))
        {    
            $madanhmuc     = ($_POST['id']) ; 
            echo ' 
            <form method="post" action="#">
                <div class="label-form">
                Add
                </div>  
                <div class="body-form">
                    <div class="row-input">
                        <div class="name">Tên danh mục</div>
                        <input   type="text" name="tendanhmuc" value=""></div>      
                    </div>
                        <div class="btn-dk">
                            <input style="visibility: hidden;position: absolute;" type="text" name="id" value="'.$madanhmuc.'" >
                            <button type="submit" name="do-sua">UPDATE</button>
                        </div>   
                       
                
            </form>';}
        ?>    
    </div>
    </div>



</body>
</html>

<?php




if (isset($_POST['do-sua']))
    {
        
        $madanhmuc     = ($_POST['id']) ;               
        $tendanhmuc = $_POST['tendanhmuc'];
        $sql = "UPDATE danhmuc set tendanhmuc = '$tendanhmuc' WHERE madanhmuc = $madanhmuc";
        
        if ($conn->query($sql) === TRUE) {
          echo '<script language="javascript">alert("Cập nhật danh mục thành công!"); window.location="admin.php";</script>';

        } else {
          echo '<script language="javascript">alert("cap nhat that bai"); window.location="admin.php";</script>';}
          
}
if (isset($_POST['xoa-danhmuc']))
{
    
    $madanhmuc     = ($_POST['id']) ;               
    $sql = "DELETE FROM danhmuc  WHERE  madanhmuc = $madanhmuc";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("xoá danh mục thành công!"); window.location="admin.php";</script>';

    } else {
        echo '<script language="javascript">alert("cap nhat that bai"); window.location="admin.php";</script>';}
        
}

    
?>