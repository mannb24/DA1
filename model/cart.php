<?php
function tongdonhang($iduser)
{

    $ltSp = GetInfor_SpForUserID($iduser);
    $tong = 0;
    foreach ($ltSp as $cart) {
        $tong += $cart["ThanhTien"];
    }

    return $tong;
}

function GetInfor_SpForUserID($UserID)
{
    $sql = "SELECT g.IDGioHang,g.IDNguoi,g.SoLuong,g.ThanhTien,s.* FROM giohang g Join sanpham s on g.IDSanPham = s.IDSanPham where g.IDNguoi = " . $UserID;
    return pdo_query($sql);
}
function insert_bill($iduser, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO hoadon(IDNguoi,pttt,ThoiGian,ThanhTien,TrangThai) values('$iduser','$pttt','$ngaydathang','$tongdonhang', 'Chờ xác nhận')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_cart($iduser, $idpro, $soluong, $thanhtien)
{
    $sql = "INSERT INTO giohang(IDNguoi,IDSanPham,SoLuong,ThanhTien) values('$iduser','$idpro','$soluong','$thanhtien')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from hoadon where IDHoaDon =" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadCT_bill($id)
{
    $sql = "select h.SoLuong,s.* from hoadon_sanpham h JOIN sanpham s on s.IDSanPham = h.IDSanPham where IDHoaDon =" . $id;
    $bill = pdo_query($sql);
    return $bill;
}
function load_cart($iduser)
{
    $sql = "select * from giohang where IDNguoi =" . $iduser;
    $cart = pdo_query($sql);
    return $cart;
}
function load_cart_count($idbill)
{
    $sql = "select COUNT(*) as total from giohang where IDNguoi =" . $idbill;
    $cart = pdo_query($sql);
    return sizeof($cart);
}
function load_bill_count($idbill)
{
    $sql = "select COUNT(*) as total from hoadon where IDHoaDon =" . $idbill;
    $cart = pdo_query($sql);
    return sizeof($cart);
}
function loadall_bill_admin($kyw = "", $iduser = 0)
{
    $sql = "select * from hoadon where 1";
    if ($iduser > 0)
        $sql .= " AND IDNguoi =" . $iduser;
    if ($kyw != "")
        $sql .= " AND IDHoaDon like '%" . $kyw . "%'";
    $sql .= " order by IDHoaDon desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_bill($iduser)
{
    $sql = "select * from hoadon where IDNguoi ='" . $iduser . "' order by IDHoaDon desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadcart_cthoadon($id)
{
    $sql = "SELECT * FROM hoadon WHERE IDHoaDon  = $id";
    $product = pdo_query($sql);
    return $product;
}

function update_bill($id, $bill_satus)
{
    $sql = "UPDATE hoadon set TrangThai=' " . $bill_satus . " 'where IDHoaDon=" . $id;
    pdo_execute($sql);
}
function update_SoLuong($idGioHang, $sl)
{
    $sql = "UPDATE giohang set SoLuong=' " . $sl . " 'where IDGioHang=" . $idGioHang;
    pdo_execute($sql);
}
function update_SoLuong_Now($sl, $ttien, $idGioHang)
{
    $sql = "UPDATE giohang set SoLuong= " . $sl . ", ThanhTien = " . $ttien . " Where IDGioHang=" . $idGioHang;
    pdo_execute($sql);
}
function update_bill_thanhtoan($idhd)
{
    $sql = "UPDATE hoadon set TrangThaiThanhToan = 1 where IDHoaDon = " . $idhd;
    pdo_execute($sql);
}
function update_bill_chuathanhtoan($bill_thanhtoan, $bill_satus)
{
    $sql = "UPDATE hoadon set TrangThaiThanhToan = 0 where TrangThai !=  3";
    pdo_execute($sql);
}

function insert_bill_sp($idhoadon, $idsanpham, $SoLuong)
{
    $sql = "INSERT INTO hoadon_sanpham(IDHoaDon,IDSanPham, SoLuong) values('$idhoadon','$idsanpham',$SoLuong)";
    return pdo_execute($sql);
}
function Delete_SP_ForCart($idGioHang, $id)
{
    $sql = "DELETE giohang where IDGioHang=" . $idGioHang;
    pdo_execute($sql);
}
function Delete_All_SP_ForCart($iduser)
{
    $sql = "DELETE FROM giohang where IDNguoi = " . $iduser;
    pdo_execute($sql);
}


function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đang chuẩn bị đơn hàng";
            break;
        case '1':
            $tt = "Đang vận chuyển";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;
        default:
            $tt = "Hong biet nua";
            break;
    }
    return $tt;
}
function get_pttt($n)
{
    switch ($n) {
        case '1':
            $tt = "Thanh toán trực tiếp";
            break;
        case '2':
            $tt = "Chuyển khoản";
            break;
        default:
            $tt = "Hong biet nua";
            break;
    }
    return $tt;
}
function get_tttt($n)
{
    switch ($n) {
        case '0':
            $tt = "Chưa thanh toán";
            break;
        case '1':
            $tt = "Đã thanh toán";
            break;
        default:
            $tt = "Hong biet nua";
            break;
    }
    return $tt;
}

function delete_donhang($id)
{
    $sql = "delete from hoadon where IDHoaDon=" . $id;
    pdo_execute($sql);

}
?>