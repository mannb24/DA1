<!DOCTYPE html>
<html lang="en">

<head>
    <title>ShopMenStrore</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./views/styles/bootstrap4/bootstrap.min.css">
    <link href="./views/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./views/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="./views/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="./views/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="./views/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="./views/styles/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- <style>
        h6 {
            color: whitesmoke;
            font-size: 20;
            font-family: bold;
            
        }

        h1 {
            font-family: bold;
            color: whitesmoke;
            background-color: red;
            border: black;
            color: white;
            
        }

        
    </style> -->
</head>

<body>

    <?php

    $dmsp = loadall_danhmuc();
    ?>
    <div class="error-container">
        <?php if (isset($errors) && !empty($errors)) : ?>
            <div class="error-message">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Top Navigation -->

            <div class="top_nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top_nav_left">MIỄN PHÍ GIAO HÀNG TRÊN TOÀN QUỐC KHI MUA 5 SẢN PHẨM !</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="top_nav_right">
                                <ul class="top_nav_menu">

                                    <!-- Currency / Language / My Account -->
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        $user = $_SESSION['user'];
                                        ?>
                                        <li class="account">
                                            <a href="#">
                                                Xin chào!!
                                                <?= $user['Ten'] ?>
                                            </a>
                                            <ul class="account_selection">

                                                <li><a href="index.php?act=edit_taikhoan"><i class="fa fa-user-plus"
                                                            aria-hidden="true"></i>Thông tin</a></li>
                                                <?php
                                                if ($user['Role'] == 1) {
                                                    ?>
                                                    <li><a href="admin"><i class="fa fa-user-plus"
                                                                aria-hidden="true"></i>Admin</a></li>
                                                <?php } ?>
                                                <li><a href="index.php?act=thoat"><i class="fa fa-user-plus"
                                                            aria-hidden="true"></i>Đăng xuất</a></li>
                                            </ul>
                                        </li>

                                        <?php

                                    } else {
                                        ?>

                                        <li class="account">
                                            <a href="#">
                                                My Account
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="account_selection">
                                                <li><a href="index.php?act=dangnhap"><i class="fa fa-sign-in"
                                                            aria-hidden="true"></i>Sign In</a></li>
                                                <li><a href="index.php?act=dangky"><i class="fa fa-user-plus"
                                                            aria-hidden="true"></i>Register</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="index.php">Men<span>Strore</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="index.php">Trang chủ</a></li>
                                    <li><a href="index.php?act=categories&iddm=1">Áo Nam</a></li>
                                    <li><a href="index.php?act=categories&iddm=3">Quần Nam</a></li>
                                    <li><a href="index.php?act=categories&iddm=5">Phụ Kiện</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li>
                                        <form action="index.php?act=categories" method="post">
                                            <input type="text" name="kyw" style="width: 200px;">
                                            <input type="submit" name="timkiem" value="Tìm kiếm"
                                                style="margin: 5px; background-color: red;  color: white;">
                                        </form>
                                    </li>
                                    </li>

                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                    <li class="checkout">
                                        <a href="index.php?act=addtocart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>