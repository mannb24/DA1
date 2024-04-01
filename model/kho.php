<?php
function inser_kho($tenloai)
{
    $sql = "INSERT INTO kho(TenLoai) VALUES ('$tenloai')";
    pdo_execute($sql);

    $IDKho = pdo_execute_return_lastInsertID($sql);

    $IDSanPham = isset($_POST['IDSanPham']) ? $_POST['IDSanPham'] : 1;

    // Thêm dữ liệu vào bảng kho_sanpham
    $sql = "INSERT INTO kho_sanpham(IDSanPham, IDKho) VALUES ('$IDSanPham', '$IDKho')";
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
?>