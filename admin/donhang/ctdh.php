
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ admin</a></li>
                                <li class="breadcrumb-item active">Thông Tin Khách hàng</li>
                            </ol>
                        </div>
                        <h3 class="page-title">Thông Tin Khách Hàng</h3>

                        <div class="container-fluid">
                            <?php extract($bill);
                            $pttt = get_pttt($bill['bill_pttt']);
                            $ttdh = get_ttdh($bill['bill_satus']);
                            extract($taikhoan);
                            $tttt = get_tttt($bill['bill_thanhtoan']);
                            ?>

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div>
                                            <p>Người đặt hàng : <?= $taikhoan['user'] ?></p>
                                            <p>Số điện thoại : <?= $taikhoan['tel'] ?></p>
                                            <p>Địa chỉ : <?= $taikhoan['address'] ?></p>
                                            <p>email : <?= $taikhoan['email'] ?></p>
                                            <p>Phương thức thanh toán : <?= $pttt ?></p>
                                            <p>Tình trạng đơn hàng : <?= $ttdh ?></p>
                                            <p>Ngày lập hóa đơn : <?= $bill['ngaydathang'] ?></p>
                                            <p>Tình trạng thanh toán : <?= $tttt ?></p>

                                        </div>
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Hình ảnh</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $tong = 0;
                                                ?>
                                                <?php foreach ($cart as $cart) : ?>
                                                    <?php
                                                    $tong += $cart['thanhtien'];

                                                    ?>

                                                    <tr>
                                                        <td class="cart_product_img">
                                                            <img src="../views/images/<?= $cart['img'] ?> " alt="" height="100">
                                                        </td>
                                                        <td class="cart_product_desc">
                                                            <h5><?= $cart['name'] ?></h5>
                                                        </td>
                                                        <td class="price">
                                                            <span><?= number_format($cart['price']) ?> đ</span>
                                                        </td>
                                                        <td class="price">
                                                            <span><?= $cart["soluong"] ?></span>
                                                        </td>

                                                    </tr>


                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <p class="tien" style="color: red;
    font-size: 16px;">Tổng thanh toán : <?= number_format($bill['total']) ?> $</p>
                                    </div>

                                    <!-- <div class="col-12 col-lg-10">
                    <div class="cart-summary">
                        <h5>Tổng Thanh Toán : <?= number_format($tong) ?> đ</h5>
                        <h5>Miễn phí vận chuyển</h5>

                       
                    </div>
                </div> -->
                                </div>
                            </div>

                            <!-- ##### Main Content Wrapper End ##### -->
                        </div>
                    </div>

                </div>