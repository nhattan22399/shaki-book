<?php
echo '
    <header>
        <div class="inner">
            <div class="container">
                <div class="logo"> 
                    <h1>Shaki</h1>
                </div>
        
                <div class="menu">
                    <li><a href="homePage.php">Trang chủ</a></li>
                    <li class="sub-menu"><a href="category.php">Danh mục</a>
                        <ul class="drop-menu">';
                        
                            $sql ="SELECT * FROM danhmuc;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "SQL statement failed!";
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                    <li><a href="">'.$row["tendanhmuc"].'</a></li>
                                    ';
                                }
                            }
                                
                    echo '    
                        </ul>
                    </li>
                    <li><a href="">Sách mới nhất</a></li>
                    <li><a href="">Sách hot</a></li>
                    <li><a href="./about.php">Về Shaki</a></li>
                </div>
        
                <div class="others">
                    <li><input placeholder="Tìm kiếm" type="text"><i class="fa-solid fa-magnifying-glass"></i></li>
                    <div class="header-hello" style="margin-left: 7%; font-size:1.5em;font-family: "Kaushan Script", cursive;display: flex;flex-direction: row-reverse;">';  
                        
                
                    if(isset($_SESSION['user'])){
                        $ten   = $_SESSION['user'];
                        echo '
                        <span><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></span>
                        <li class="account" ><a class="username" style="font-weight: bold;font-family: monospace ;-webkit-line-clamp: 1; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;text-overflow: ellipsis;;text-transform: uppercase;" href="user.php">
                        <i class="fa-solid fa-user"></i>&#160;&#160;'.$ten.'</a>
                            <ul class="user-info">
                                <li><a href="favorite.php"><i style="color: red;" class="fa-regular fa-heart"></i>Danh sách yêu thích</a></li>
                                <li><a href="user.php"><i class="fa-solid fa-user-pen"></i>Cập nhật thông tin</a></li>
                                <li><a href="logout.php"><span class="logout" ><i style="color: red;" class="fa-solid fa-power-off"></i>Log out</a></span></li>
                            </ul>
                        </li>
                        ';
                        
                    
                    }else{
                        echo '
                        <li><a  class="login" href="login.php">Đăng nhập</a></li>
                        <li><a class="sign" href="signup.php">Đăng kí</a></li>
                        ';
                    }
                echo '
                </div>
            </div>
        </div>
    </header>';    

?>