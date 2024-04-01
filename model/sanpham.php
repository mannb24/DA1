<?php
function inser_sanpham($tensp, $price, $img, $mota, $iddm)
{
    $sql = "insert into sanpham (TenSanPham,Gia,AnhBia,Mota,IDDanhMuc) values('$tensp','$price','$img','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "delete from sanpham where IDSanPham=" . $id;
    pdo_execute($sql);

}
function loadall_sanpham_trangchu()
{
    $sql = "select * from sanpham where 1 order by Gia desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw = "", $currentpage = 1, $iddm = 0)
{
    $sql = "select * from sanpham where 1 ";
    if ($kyw != "") {
        $sql .= " and TenSanPham like '%" . $kyw . "%'";
    }

    if ($iddm > 0) {
        $sql .= " and IDDanhMuc= '" . $iddm . "'";
    }


    $sql .= "order by IDSanPham desc";
    $pagesize = 10;
    if ($currentpage == 1 || $currentpage == 0) {
        $sql .= " limit 0,$pagesize";
    } else {
        $currentpage = ($currentpage - 1) * $pagesize;
        $sql .= " limit $currentpage,$pagesize";
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}




function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where IDDanhMuc=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        // return $name;
    } else {
        return "";
    }
}

function loadone_sanpham($id)
{
    $sql = "SELECT * from sanpham where IDSanPham = " . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanphamcungloai($id, $iddm = 0)
{
    $sql = "SELECT * from sanpham where IDDanhMuc = " . $iddm . " AND IDSanPham <> " . $id;

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "") {
        $sql = "UPDATE sanpham set IDDanhMuc='" . $iddm . "', TenSanPham='" . $tensp . "', Gia='" . $giasp . "' , Mota='" . $mota . "', AnhBia='" . $hinh . "' where IDSanPham=" . $id;
    } else {
        $sql = "UPDATE sanpham set IDDanhMuc='" . $iddm . "', TenSanPham='" . $tensp . "', Gia='" . $giasp . "' , Mota='" . $mota . "' where IDSanPham=" . $id;
    }
    pdo_execute($sql);
}
?>