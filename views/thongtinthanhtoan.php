<?php
$tong = 0;
foreach ($ltSp as $lt) {
    $tong += $lt["ThanhTien"];
}
number_format($tong);

$MaHoaDon = uniqid();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>

    <div class="container">
        <h3>Thông tin đơn hàng</h3>
        <div class="table-responsive">
            <form action="./views/momo.php" id="create_form" enctype="application/x-www-form-urlencoded" method="post">
                <div class="form-group">
                    <label for="order_id">Mã hóa đơn</label>
                    <input class="form-control" id="order_id" name="order_id" type="text"
                        value="<?= $MaHoaDon ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount" name="amount" type="number" value="<?= $tong ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2"
                        placeholder="Nội dung thanh toán" required></textarea>
                </div>
                <div class="form-group" required>
                    <label for="bank_code">Thanh toán qua</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="qr"> QR MOMO</option>
                        <option value="atm"> ATM MOMO</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" id="btnPopup">Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
    <div style="margin-top: 20px;">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Size</th>
                    <th>Màu</th>

                </tr>
            </thead>
            <tbody>

                <?php $tong = 0; ?>
                <?php foreach ($ltSp as $cart): ?>
                    <?php
                    $tong += $cart['ThanhTien'];
                    ?>
                    <tr>
                        <td class="cart_product_img">
                            <img src="./views/images/<?= $cart['AnhBia'] ?> " alt="" width="50px" height="auto">
                        </td>
                        <td class="cart_product_desc">


                            <h5>
                                <?= $cart["TenSanPham"] ?>
                            </h5>
                        </td>
                        <td class="price">
                            <span>
                                <?= number_format($cart['Gia']) ?> đ
                            </span>
                        </td>
                        <td class="price">
                            <input style="margin: 15px 0px;width: 30px" type="hidden" name="idCart"
                                value=<?= $cart['IDGioHang'] ?>>
                            <input style="margin: 15px 0px;width: 30px" type="hidden" name="Gia" value=<?= $cart['Gia'] ?>>
                            <div style="display:flex;">
                                <?= $cart['SoLuong'] ?><br>
                            </div>
                        </td>
                        <td class="price">
                            <span>
                                <?= number_format($cart["ThanhTien"]) ?> đ
                            </span>
                        </td>
                        <td>
                            <?= $cart['size'] ?>
                        </td>
                        <td>
                            <?= $cart['mau'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet" />
    <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
    <script type="text/javascript">
        $("#btnPopup").click(function () {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    console.log(x.data)
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        } else {
                        
                        }
                        location.href = x.data;
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>


</body>

</html>