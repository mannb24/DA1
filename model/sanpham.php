<?php
function inser_sanpham($tensp, $price, $img, $mota, $iddm, $SoLuongSP, $listKho)
{
    $sql = "insert into sanpham (TenSanPham,Gia,AnhBia,Mota,IDDanhMuc,SoLuongSP) values('$tensp','$price','$img','$mota','$iddm','$SoLuongSP')";
    // pdo_execute($sql);

    $lastInsertedID = pdo_execute_return_lastInsertID($sql);

    foreach ($listKho as $IDKho) {
        $sql1 = "INSERT INTO kho_sanpham (IDSanPham, IDKho) 
                VALUES ('$lastInsertedID', '$IDKho')";
        pdo_execute($sql1);
    }


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
        $sql .= " and TenSanPham LIKE CONCAT('%'," . "'$kyw'" . ",'%')";
    }

    if ($iddm > 0) {
        $sql .= " and IDDanhMuc= '" . $iddm . "'";
    }


    $sql .= "order by IDSanPham desc";
    $pagesize = 10;
    if ($currentpage != 0) {
        if ($currentpage == 1) {
            $sql .= " limit 0,$pagesize";
        } else {
            $currentpage = ($currentpage - 1) * $pagesize;
            $sql .= " limit $currentpage,$pagesize";
        }
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_Sort($kyw = "", $currentpage = 1, $iddm = 0, $minPrice = 0, $maxPrice = 0, $category = 0)
{
    $sql = "select * from sanpham where 1 ";
    if ($kyw != "") {
        $sql .= " and TenSanPham LIKE CONCAT('%'," . "'$kyw'" . ",'%')";
    }
    if ($iddm > 0) {
        $sql .= " and IDDanhMuc= '" . $iddm . "'";
    }
    if ($minPrice > 0) {
        $sql .= " and Gia >= '" . $minPrice . "'";
    }
    if ($maxPrice > 0) {
        $sql .= " and Gia <= '" . $maxPrice . "'";
    }
    if ($category > 0) {
        if ($category == 1) {
            $sql .= "order by Gia asc";
        } else if ($category == 2) {
            $sql .= "order by Gia desc";
        } else if ($category == 3) {
            $sql .= "order by NgayTao desc";
        }
    } else {
        $sql .= "order by IDSanPham desc";
    }
    $pagesize = 12;
    if ($currentpage != 0) {
        if ($currentpage == 1) {
            $sql .= " limit 0,$pagesize";
        } else {
            $currentpage = ($currentpage - 1) * $pagesize;
            $sql .= " limit $currentpage,$pagesize";
        }
    }

    // echo "<script>console.log('$sql')</script>";
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