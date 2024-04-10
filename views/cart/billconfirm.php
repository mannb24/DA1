<style>
    .cart-table-area {
        margin-top: 100px;
        /* margin-left: 110px; */
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
        max-width: 100vw;
    }

    table img {
        width: 150px;
    }
</style>


<link rel="stylesheet" href="./styles/core-style.css">


<body>
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-title">
                            <h2>Đặt hàng thành công !</h2>
                        </div>
                        <div>
                            <?php $pttt = get_pttt($pttt); ?>
                            <h3>Thông tin khách hàng :</h3><br>
                            <p>Người đặt hàng :
                                <?= $taikhoan['Ten'] ?>
                            </p>
                            <p>Số điện thoại :
                                <?= $taikhoan['SoDienThoai'] ?>
                            </p>
                            <p>Địa chỉ :
                                <?= $taikhoan['DiaChi'] ?>
                            </p>
                            <p>email :
                                <?= $taikhoan['Email'] ?>
                            </p>
                            <p>Phương thức thanh toán :
                                <?= $pttt ?>
                            </p>
                            <p>Ngày lập hóa đơn :
                                <?= $bill['ThoiGian'] ?>
                            </p>
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
                                    <th>Màu</th>
                                    <th>size</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $tong = 0;
                                ?>
                                <?php foreach ($billct as $c) : ?>

                                    <tr>
                                        <td class="cart_product_img">
                                            <img src="./views/images/<?= $c['AnhBia'] ?> ">
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>
                                                <?= $c['TenSanPham'] ?>
                                            </h5>
                                        </td>
                                        <td class="price">
                                            <span>
                                                <?= number_format($c['Gia']) ?> đ
                                            </span>
                                        </td>
                                        <td class="price">
                                            <span>
                                                <?= $c["SoLuong"] ?>
                                            </span>
                                        </td>
                                        <td class="price">
                                            <span>
                                                <?= $c["mau"] ?>
                                            </span>
                                        </td>
                                        <td class="price">
                                            <span>
                                                <?= $c["size"] ?>
                                            </span>
                                        </td>
                                    </tr>


                                <?php endforeach; ?>


                            </tbody>
                        </table>
                        <p class="tien" style="color: red;
                            font-size: 16px;">Tổng thanh toán :
                            <?= number_format($bill['ThanhTien']) ?> đ
                        </p>
                    </div>
                </div>

                <!-- <div class="col-12 col-lg-10">
                    <div class="cart-summary">
                        <h5>Tổng Thanh Toán : <?= number_format($tong) ?> đ</h5>
                        <h5>Miễn phí vận chuyển</h5>

                       
                    </div>
                </div> -->
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

</body>