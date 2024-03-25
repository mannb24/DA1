<?php 
function insert_bl($IDNguoi, $noidung, $sao, $ngayBinhLuan, $IDSanPham) { 
    $sql = "INSERT INTO danhgia (IDNguoi, NoiDung, Sao, NgayBinhLuan, IDSanPham) VALUES ('$IDNguoi', '$noidung', '$sao', '$ngayBinhLuan', '$IDSanPham')";
    
    pdo_execute($sql);
}


function delete_binhluan($id)
{
    $sql = "delete from danhgia where id=" . $id;
    pdo_execute($sql);
}

function all_binhluan(){
    $sql = "select * from danhgia where 1 order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}


?>