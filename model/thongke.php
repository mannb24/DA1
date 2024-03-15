<?php
function loadall_thongke()
{
    $sql = "select danhmuc.IDDanhMuc as madm, danhmuc.TenDanhMuc as tendm, count(sanpham.IDSanPham) as countsp, min(sanpham.Gia) as minprice, max(sanpham.Gia) as maxprice, avg(sanpham.Gia) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.IDDanhMuc = sanpham.IDDanhMuc";
    $sql .= " group by danhmuc.IDDanhMuc order by danhmuc.IDDanhMuc desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>