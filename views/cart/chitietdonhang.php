<style>
    p{
        
        color: black;
    }
    .card-body{
        padding: 180px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>

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

                            <div class="thongtin">
                                <h3 class="page-title">Chi tiết hóa đơn</h3>
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
                                                <img src="./views/images/<?= $cart['img'] ?> " alt="" height="100">
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
                            <p class="tien" style="color: red;font-size: 16px;">
                            Tổng thanh toán : <?= number_format($bill['total']) ?> đ</p>
                                                         
                        </div>