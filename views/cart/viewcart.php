<?php
if ($thongbao != "") {
    echo "<script>alert('Bạn cần đăng nhập để thực hiện chức năng này!');</script>";
    $ltSp = [];
} else {
    if (isset ($_SESSION['user']['IDNguoi'])) {
        $iduser = $_SESSION['user']['IDNguoi'];
        $ltSp = GetInfor_SpForUserID($iduser);
    }
}

?>
<div style="width: 80%; margin-top: 170px;" class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        ĐƠN HÀNG
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body1">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Size</th>
                            <th>Thao tác</th>

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
                                    <form action="index.php?act=updatecart&id=<?= $cart['IDGioHang'] ?>" method="post">
                                        <input style="margin: 15px 0px;width: 30px" type="hidden" name="idCart"
                                            value=<?= $cart['IDGioHang'] ?>>
                                        <input style="margin: 15px 0px;width: 30px" type="hidden" name="Gia"
                                            value=<?= $cart['Gia'] ?>>
                                        <div style="display:flex;">
                                            <input style="margin: 0px 10px ;width: 30px;text-align:center;" type="text"
                                                class="quantity" name="soluong" value="<?= $cart['SoLuong'] ?>"><br>

                                            <input style="padding :0px 8px; height:30px;" class="btn-info" type="submit"
                                                name="updatecart" value="Cập nhật">

                                        </div>
                                    </form>

                                </td>
                                <td class="price">
                                    <span>
                                        <?= number_format($cart["ThanhTien"]) ?> đ
                                    </span>
                                </td>
                                <td>
                                    <?= $cart['ThanhTien'] ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?= $cart['IDGioHang'] ?>)">
                                        <input class="btn-danger" type="button" value="Xóa">
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        <td colspan="4"><b>Tổng thanh toán :</b></td>
                        <td><b>
                                <?= number_format($tong) ?>
                            </b>đ</td>

                    </tbody>
                </table>
            </div>
            <div class="input">
                <a href="index.php?act=bill"><input class="btn-success"
                        style="padding: 10px; font-size: 20px; margin-right: 8px;background-color: red;" type="button"
                        value="Đặt hàng"></a>
                <a href="index.php?act=mybill"><input class="btn-info" style="padding: 10px; font-size: 20px;"
                        type="button" value="Đơn hàng của tôi"></a>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll(".quantity").forEach(function (quantityInput) {
        quantityInput.addEventListener("change", function () {
            if (this.value < 1) {
                this.value = 1;
            }
        });
    });
</script>


<script>
    function confirmDelete(itemId) {
        var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
        if (result) {
            window.location.href = "index.php?act=deletecart&idcart=" + itemId;
        }
    }
</script>
<script>
    document.querySelectorAll(".quantity").forEach(function (quantityInput) {
        quantityInput.addEventListener("change", function () {
            if (this.value < 1) {
                this.value = 1;
            } else if (this.value > 10) {
                alert("Vượt quá giới hạn số lượng (tối đa 10)");
                this.value = 10;
            }
        });
    });
</script>


<!-- <script type="text/javascript">
        function selects(){
var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelect(){  
                var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                }  
            }  
    </script> -->
<!-- <script>
let tang = document.querySelector(".buttontang");
let giam = document.querySelector(".buttongiam");
let quantity = document.querySelector("#quantity");
tang.onclick = () => {
    quantity.value++;
}
giam.onclick = () => {
    quantity.value--;
    if (quantity.value <= 0) {
        quantity.value = 1;
    }
}
</script> -->