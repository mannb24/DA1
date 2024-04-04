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
                            $pttt = get_pttt($bill['pttt']);
                            $ttdh = get_ttdh($bill['TrangThai']);
                            // extract($taikhoan);
                            $tttt = get_tttt($bill['TrangThaiThanhToan']);
                            ?>

                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div>
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
                                            <p>Tình trạng đơn hàng :
                                                <?= $ttdh ?>
                                            </p>
                                            <p>Ngày lập hóa đơn :
                                                <?= $bill['ThoiGian'] ?>
                                            </p>
                                            <p>Tình trạng thanh toán :
                                                <?= $tttt ?>
                                            </p>

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
                                                <?php foreach ($cart as $c): ?>
                                                    <?php
                                                    $tong += $c['Gia'] * $c['SoLuong'];

                                                    ?>

                                                    <tr>
                                                        <td class="cart_product_img">
                                                            <img src="../views/images/<?= $c['AnhBia'] ?>" alt=""
                                                                style=" height: 100px">
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

                                                    </tr>


                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <p class="tien" style="color: red;
    font-size: 16px;">Tổng thanh toán :
                                            <?= number_format($tong) ?>
                                        </p>
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