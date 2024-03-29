<?php
function insert_taikhoan($user, $pass, $email, $address, $tel,$ten,)
{
    $sql = "INSERT INTO user(taikhoan,matkhau,Email,DiaChi,SoDienThoai,Ten) values('$user','$pass','$email','$address','$tel','$ten')";
    pdo_execute($sql);
    
}

function checkuser($user, $pass)
{
    $sql = "select * from user where taikhoan='" . $user . "' and matkhau='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function checkemail($email)
{
    $sql = "select * from user where Email='" . $email . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan()
{
    $sql = "select * from user order by IDNguoi desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function getUserByUsernameAndEmail($user, $email)
{
    $sql = "select * from user where taikhoan='" . $user . "' and Email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id, $user, $email, $address, $tel)
{
    $sql = "UPDATE user set taikhoan='" . $user . "', Email='" . $email . "',DiaChi='" . $address . "',SoDienThoai='" . $tel . "'where IDNguoi=" . $id;
    pdo_execute($sql);
}
function loadone_taikhoan($id)
{
    $sql = "select * from user where IDNguoi =" . $id;
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}
function delete_taikhoan($id)
{
    $sql = "delete from user where IDNguoi=" . $id;
    pdo_execute($sql);
}

?>