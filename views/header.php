<?php
    require './backend/treatment.php' ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X_Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<div class="overlay" id="formLogin">
        <div class="overlay-login bg-white" id="overlay-login">
            <form action="" method="post">
                <h2 class="text-center">Đăng nhập</h2>
                <div class="form-group">
                    <label for="">Tên đăng nhập</label> <br>
                    <input type="text" name="username_login" placeholder="Tên đăng nhập" class="form-control my-2">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label> <br>
                    <input type="password" name="password_login" placeholder="Mật khẩu" class="form-control my-2 pass">
                </div>
                <div class="form-group">
                    <input type="checkbox" class="my-2" id="check"> Hiển thị mật khẩu
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" value="Đăng nhập" class="form-control my-2 btn btn-primary">
                </div>
            </form>
            <i class="fa-solid fa-xmark close-login"></i>
        </div>
    </div>
    <div class="container bg-white">
        <nav class="navbar navbar-expand-lg nav-background">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./images/Logo.svg" width="170px" height="auto"></a>
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Danh mục sản phẩm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?action=product">Tất cả sản phẩm</a>
                                <?php foreach($category as $key => $value) : ?>
                                    <a class="dropdown-item" href="?action=product&&sector=<?php echo $value -> idsectors ?>"><?php echo $value -> sectors ?></a>
                                <?php endforeach ; ?>
                                
                            </div>
                        </li>
                        
                        <?php
                            if(!isset($_SESSION['login'])) {
                        ?>
                            <li class="nav-item" id="btn-open-login">
                                <a class="nav-link text-white">Đăng nhập</i></a>
                            </li>
                        <?php
                            }else {
                        ?>
                            <li class="nav-item" id="btn-cart">
                                <a href="?action=myCart" class="nav-link text-white">Giỏ hàng (<?php echo $quantityProductInCart -> quantity ?>)</a>
                            </li>
                            <!-- <li class="nav-item" id="btn-open-logout">
                                <a class="nav-link text-white" href="./backend/logout.php">Đăng xuất</i></a>
                            </li> -->
                        <?php
                            }
                        ?>
                        <li class="nav-item" id="btn-cart">
                            <a href="?action=posts" class="nav-link text-white">Bài viết</a>
                        </li>
                        <li class="nav-item" id="btn-cart">
                            <a href="?action=contact" class="nav-link text-white">Liên hệ</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="post" action="?action=searchProduct">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="keyword">
                        <button name="btn-search" class="btn btn-outline text-white border-white" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>