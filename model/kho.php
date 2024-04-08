<?php
function insert_kho($tenkho, $Type)
{
    $sql = "INSERT INTO kho (TenLoai, Type) VALUES ('$tenkho', '$Type')";
    pdo_execute($sql);
}

function delete_kho($id)
{
    $sql = "delete from kho where IDKho=" . $id;
    pdo_execute($sql);

}
function loadall_kho()
{
    $sql = "select * from kho order by IDKho desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadall_kho_type_1()
{
    $sql = "select * from kho where type =1";
    
    $listKho = pdo_query($sql);
    return $listKho;
}

function loadall_kho_type_2()
{
    $sql = "select * from kho where type = 2 ";
    
    $listKho_1 = pdo_query($sql);
    return $listKho_1;
}
function loadall_kho_type_1_ct($IDSanPham, $type)
{
    $sql = "select k.TenLoai from kho_sanpham ks left join kho k on ks.IDKho = k.IDKho where Type =" . $type ." and IDSanPham = " .$IDSanPham;
    
    $listKho = pdo_query($sql);
    return $listKho;
}

function loadone_kho($id)
{
    $sql = "SELECT * from kho where IDKho=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_kho($id, $tenloai)
{
    $sql = "UPDATE kho set TenLoai='" . $tenloai . "' where IDKho=" . $id;
    pdo_execute($sql);
}
function inser_kho_sanpham($IDSanPham, $IDKho)
{
    $sql = "INSERT INTO kho_sanpham (IDSanPham, IDKho) VALUES ('$IDSanPham', '$IDKho')";
    pdo_execute($sql);
}
?>