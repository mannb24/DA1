<?php
function inser_kho($tenloai)
{
    $sql = "insert into kho(TenLoai) values('$tenloai')";
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