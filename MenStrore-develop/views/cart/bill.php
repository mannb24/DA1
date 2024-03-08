<style>
    .cart-table-area {
        margin-top: 200px;
        margin-left: 210px;
    }

    .cart-summary {
        text-align: left;
        margin-top: 50px;
        margin-left: 50px;
        font-size: 18px;
    }

    .btn {
        background-color: yellow;
        color: black;
        font-size: 20px;
        font-weight: bold;
        margin-top: 14px;
    }

    .radio {
        font-size: 18px;
        margin-left: 18px;
    }

    .radio label {
        margin-right: 8px;

    }

    table {
        width: 100%;
        text-align: center;

    }

    table img {
        width: 50px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Checkout</title>

    <link rel="stylesheet" href="./styles/core-style.css">

</head>

<body>
    <form action="index.php?act=billcomfirm" method="post">

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>Thông tin đặt hàng</h2>
                            </div>

                            <?php

                            if (isset($_SESSION['user']) && ($_SESSION['user'] != 0)) {
                                extract($taikhoan);
                                $name = $taikhoan['user'];
                                $email = $taikhoan['email'];
                                $tel = $taikhoan['tel'];
                                $address = $taikhoan['address'];
                            } else {
                            }

                            ?>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="company" placeholder="Tên khách hàng" name="name" value="<?= $name ?>" required="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $email ?>" required="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="text" placeholder="Số Điện Thoại" name="tel" value="<?= $tel ?>" required="">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="street_address" placeholder="Địa chỉ" name="address" value="<?= $address ?>" required="">
                                </div>
                                <div class="radio" class="col-12 mb-3">
                                    <label for="">Phương thức thanh toán: </label>
                                    <label for=""><input type="radio" name="pttt" id="" value="1" required="" checked>Thanh toán khi nhận
                                        hàng</label>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-12">
                            <table class="" border="1">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Size</th>
                                        <th>Thành tiền</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tong = 0;
                                    ?>
                                    <?php foreach ($_SESSION['mycart'] as $cart) : ?>
                                        <?php $ttien = $cart[3] * $cart[4];
                                        $tong += $ttien;

                                        ?>

                                        <tr>
                                            <td class="cart_product_img">
                                                <img src="./views/images/<?= $cart[2] ?> " alt="">
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5><?= $cart[1] ?></h5>
                                            </td>
                                            <td class="price">
                                                <span><?= number_format($cart[3]) ?> đ</span>
                                            </td>
                                            <td class="price">
                                                <span><?= $cart[4] ?></span>
                                            </td>
                                            <td>
                                                <?= $cart[6] ?>
                                            </td>
                                            <td class="price">
                                                <span><?= number_format($ttien) ?> đ</span>
                                            </td>

                                        </tr>


                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 col-lg-10">
                            <div class="cart-summary">
                                <h5>Tổng Thanh Toán : <?= number_format($tong) ?> đ</h5>
                                <h5>Miễn phí vận chuyển</h5>
                                <div class="cart-btn mt-100">
                                    <input style="margin: 10px 10px; font-size: 18px; padding:4px;background-color: red;" type="submit" class="btn-primary" name="dongydathang" value="Đồng ý đặt hàng">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Main Content Wrapper End ##### -->

        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/active.js"></script>
    </form>

</body>

</html>