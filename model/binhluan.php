<?php
function insert_bl($IDNguoi, $noidung, $sao, $ngayBinhLuan, $IDSanPham)
{
    $sql = "INSERT INTO danhgia (IDNguoi, NoiDung, Sao, NgayBinhLuan, IDSanPham) VALUES ('$IDNguoi', '$noidung', '$sao', '$ngayBinhLuan', '$IDSanPham')";

    pdo_execute($sql);
}
function loadall_bl_2($IDSanPham)
{
    $sql =  "SELECT BL.NoiDung, BL.NgayBinhLuan, U.Ten
    FROM danhgia BL
    INNER JOIN user U ON BL.IDNguoi = U.IDNguoi WHERE BL.IDSanPham = $IDSanPham limit 2";
    $listbl=pdo_query($sql);
    return  $listbl;
}
function loadall_bl($IDSanPham)
{
    $sql =  "SELECT BL.NoiDung, BL.NgayBinhLuan, U.Ten
    FROM danhgia BL
    INNER JOIN user U ON BL.IDNguoi = U.IDNguoi WHERE BL.IDSanPham = $IDSanPham";
    $listbl=pdo_query($sql);
    return  $listbl;
}

function delete_binhluan($id)
{
    $sql = "delete from danhgia where id=" . $id;
    pdo_execute($sql);
}

function all_binhluan()
{
    $sql = "select * from danhgia where 1 order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
