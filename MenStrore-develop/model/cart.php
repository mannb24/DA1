<?php
function tongdonhang(){
    $tong=0;
    foreach($_SESSION['mycart'] as $cart){
        $ttien=$cart[3]*$cart[4];
        $tong+=$ttien;
        
    }

    return  $tong;
}

function insert_bill($iduser,$pttt,$ngaydathang,$tongdonhang){
    $sql = "INSERT INTO bill(iduser,bill_pttt,ngaydathang,total) values('$iduser','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertID($sql);
}

function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql = "select * from bill where id =".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function load_cart($idbill){
    $sql = "select * from cart where idbill =".$idbill;
    $cart = pdo_query($sql);
    return $cart;
}
function load_cart_count($idbill){
    $sql = "select * from cart where idbill =".$idbill;
    $cart = pdo_query($sql);
    return sizeof($cart);
}
function loadall_bill_admin($kyw="",$iduser = 0){
    
    $sql = "select * from bill where 1"; 
    if($iduser> 0) $sql.=" AND iduser =".$iduser;
    if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_bill($iduser){
    $sql = "select * from bill where iduser ='".$iduser."'order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadcart_cthoadon($id){
    $sql = "SELECT * FROM cart WHERE idbill  = $id";
    $product = pdo_query($sql);
    return $product;
}

function update_bill($id,$bill_satus){
    $sql = "UPDATE bill set bill_satus=' ".$bill_satus." 'where id=".$id;
    pdo_execute($sql);
}
function update_bill_thanhtoan($bill_thanhtoan,$bill_satus){
    $sql = "UPDATE bill set bill_thanhtoan = 1 where bill_satus = 3";
    pdo_execute($sql);
}
function update_bill_chuathanhtoan($bill_thanhtoan,$bill_satus){
    $sql = "UPDATE bill set bill_thanhtoan = 0 where bill_satus !=  3";
    pdo_execute($sql);
}


function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt="Đang chuẩn bị đơn hàng";
            break;
        case '1':
            $tt="Đang vận chuyển";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        default:
            $tt="Hong biet nua";
            break;
    }return $tt;
}
function get_pttt($n){
    switch ($n) {      
        case '1':
            $tt="Thanh toán trực tiếp";
            break;
        case '2':
            $tt="Chuyển khoản";
            break;
        default:
            $tt="Hong biet nua";
            break;
    }return $tt;
}
function get_tttt($n){
    switch ($n) {      
        case '0':
            $tt="Chưa thanh toán";
            break;
        case '1':
            $tt="Đã thanh toán";
            break;
        default:
            $tt="Hong biet nua";
            break;
    }return $tt;
}

function delete_donhang($id){
    $sql="delete from bill where id=".$id;
    pdo_execute($sql);

}
?>