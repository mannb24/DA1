<?php
    function inser_sanpham($tensp,$price,$img,$mota,$iddm){
        $sql= "insert into sanpham (name,price,img,mota,iddm) values('$tensp','$price','$img','$mota','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);

    }
    function loadall_sanpham_trangchu(){
        $sql = "select * from sanpham where 1 order by price desc limit 15 "; 
        $listsanpham =pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw="", $iddm=0)
    {
        $sql = "select * from sanpham where 1";
        if ($kyw != "") {
            $sql .= " and name like '%" . $kyw . "%'";
        }
        if ($iddm > 0) {
            $sql .= " and iddm= '" . $iddm . "'";
        }
        $sql .= " order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function load_ten_dm($iddm){
        if($iddm>0){
            $sql="select * from danhmuc where id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
    }

    function loadone_sanpham($id)
    {
        $sql = "SELECT * from sanpham where id=" . $id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function load_sanphamcungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <>".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
    {
        if ($hinh != "") {
            $sql = "UPDATE sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "' , mota='" . $mota . "', img='" . $hinh . "' where id=" . $id;
        } else {
            $sql = "UPDATE sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "' , mota='" . $mota . "' where id=" . $id;
        }
        pdo_execute($sql);
    }
?>