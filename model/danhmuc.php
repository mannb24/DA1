<?php
function inser_danhmuc($tenloai)
{
    $sql = "insert into danhmuc(TenDanhMuc) values('$tenloai')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "delete from danhmuc where IDDanhMuc=" . $id;
    pdo_execute($sql);

}
function loadall_danhmuc()
{
    $sql = "select * from danhmuc order by IDDanhMuc desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id)
{
    $sql = "SELECT * from danhmuc where IDDanhMuc=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id, $tenloai)
{
    $sql = "UPDATE danhmuc set TenDanhMuc='" . $tenloai . "' where IDDanhMuc=" . $id;
    pdo_execute($sql);
}
?>