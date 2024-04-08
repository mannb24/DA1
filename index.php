<?php
session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include "./model/kho.php";
include "./model/binhluan.php";
include "./model/cart.php";
include "./model/bank.php";
include "./views/header.php";


if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];
$currentpage = 1;
if (isset($_GET['currentpage'])) {
    $currentpage = $_GET['currentpage'];
}
$spnew = loadall_sanpham_trangchu();
$dmsp = loadall_danhmuc();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'categories':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw = "", $currentpage = 1, $iddm = 0);
            $tendm = load_ten_dm($iddm);
            include "./views/categories.php";
            break;


        case 'post':
            include "./views/post.php";
            break;
        case 'ctsp':
            if ((isset($_GET['idsp'])) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                $mau = loadall_kho_type_1_ct($id, 2);
                $size = loadall_kho_type_1_ct($id, 1);
                extract($onesp);
                $sp_cung_loai = load_sanphamcungloai($id, $onesp['IDDanhMuc']);
                include "./views/chitietsp.php";
            } else {
                include "./views/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $ten = $_POST['ten'];


                $errors = [];

                if (empty($user)) {
                    $errors['user'] = "Vui lòng nhập tên người dùng";
                }

                if (empty($pass)) {
                    $errors['pass'] = "Vui lòng nhập mật khẩu";
                }

                if (empty($email)) {
                    $errors['email'] = "Vui lòng nhập địa chỉ email";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Địa chỉ email không hợp lệ";
                }

                if (empty($address)) {
                    $errors['address'] = "Vui lòng nhập địa chỉ";
                }

                if (empty($tel)) {
                    $errors['tel'] = "Vui lòng nhập số điện thoại";
                }
                if (empty($ten)) {
                    $errors['ten'] = "Vui lòng nhập số tên";
                }


                if (empty($errors)) {
                    insert_taikhoan($user, $pass, $email, $address, $tel, $ten);
                    $thongbao = "ĐĂNG KÍ THÀNH CÔNG";
                }
            }
            include "./views/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['taikhoan'];
                $pass = $_POST['matkhau'];

                // Validate input fields
                if (empty($user) || empty($pass)) {
                    $thongbao = "Vui lòng điền đầy đủ thông tin đăng nhập.";
                } else {
                    // Proceed with user authentication
                    $checkuser = checkuser($user, $pass);
                    if (is_array($checkuser)) {
                        // User credentials are valid
                        $_SESSION['user'] = $checkuser;

                        // Check user role
                        if ($checkuser['Role'] == 1) {
                            // If role is 1 (admin), redirect to admin dashboard
                            echo "<script>
                                    window.location.href='admin/index.php';
                                </script>";
                        } else {
                            // If role is a regular user, redirect to main page
                            echo "<script>
                                    window.location.href='index.php';
                                </script>";
                        }
                    } else {
                        // Invalid user credentials
                        $thongbao = "Tài khoản không tồn tại";
                    }
                }
            }

            include "views/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat'])) {
                $user = trim($_POST['user']);
                $email = trim($_POST['email']);
                $address = trim($_POST['address']);
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                $thongbao = "CẬP NHẬT THÀNH CÔNG";

                update_taikhoan($id, $user, $email, $address, $tel);
                $_SESSION['user'] = getUserByUsernameAndEmail($user, $email);
                header('Location:index.php?act=edit_taikhoan');
            }
            include "views/taikhoan/edit_taikhoan.php";
            break;
        case 'danhgia':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if (isset($_POST['add_dg'])) {
                    $noidung = $_POST['noidung'];
                    $sao = $_POST['sao'];
                    $IDSanPham = $id;
                    $IDNguoi = $_SESSION['user']['IDNguoi'];
                    $ngayBinhLuan = date(' d/m/Y');
                    insert_bl($IDNguoi, $noidung, $sao, $ngayBinhLuan, $IDSanPham);
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }

            include "views/cart/danhgia.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "views/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            // header('Location:index.php');
            echo "<script>
                    window.location.href='index.php';
                </script>";
            // include "./views/home.php";
            break;
        case 'addtocart':
            $thongbao = "";
            if (isset($_SESSION['user']['IDNguoi'])) {
                $iduser = $_SESSION['user']['IDNguoi'];

                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $ttien = $soluong * $price;
                    $size = $_POST['size'];
                    $mau = $_POST['mau'];

                    $ltSp = GetInfor_SpForUserID($iduser);
                    if ($ltSp != null) {
                        // Kiểm tra trùng lặp theo ID sản phẩm
                        $productExists = false;
                        foreach ($ltSp as $cart) {
                            if ($cart['IDSanPham'] == $id) {
                                $productExists = true;
                                // Cập nhật số lượng nếu sản phẩm đã tồn tại
                                $sl = $cart['SoLuong'] + $soluong;
                                $ttien = $cart['Gia'] * $sl;
                                update_SoLuong_Now($sl, $ttien, $cart['IDGioHang']);
                                break;
                            }
                        }
                        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
                        if (!$productExists) {
                            insert_cart($iduser, $id, $soluong, $ttien, $mau, $size);
                        }
                    } else {
                        insert_cart($iduser, $id, $soluong, $ttien, $mau, $size);
                    }
                }
            } else {
                $thongbao = "Bạn cần đăng nhập để thực hiện chức năng này!";
            }

            include "./views/cart/viewcart.php";
            break;
        case 'updatecart':
            $thongbao = "";
            if (isset($_POST["updatecart"])) {
                $fl = 0;
                $updatedQuantity = intval($_POST['soluong']);
                $idGioHang = intval($_POST['idCart']);
                $Gia = intval($_POST['Gia']);

                // Ensure the updated quantity is within the allowed range (1 to 15)
                if ($updatedQuantity < 1) {
                    $updatedQuantity = 1;
                } elseif ($updatedQuantity > 10) {
                    $updatedQuantity = 10;
                }

                $ttien = $Gia * $updatedQuantity;
                update_SoLuong_Now($updatedQuantity, $ttien, $idGioHang);
            }
            include "./views/cart/viewcart.php";
            break;

        case 'deletecart':
            if (isset($_GET['idcart'])) {
                $idGioHang = $_GET['idcart'];
                Delete_SP_ForCart($idGioHang);
            }
            echo "<script>
                    window.location.href='index.php?act=addtocart'
                </script>";

            break;
        case 'bill':
            if (isset($_SESSION['user']['IDNguoi'])) {
                $iduser = $_SESSION['user']['IDNguoi'];
                $ltSp = GetInfor_SpForUserID($iduser);
                if ($ltSp == null) {
                    $thongbao = "Giỏ hàng hiện đang rỗng!";
                } else {
                    $taikhoan = loadone_taikhoan($iduser);
                    include "./views/cart/bill.php";
                }
            } else {
                $thongbao = "Bạn cần đăng nhập để thực hiện chức năng này!";
                include "./views/cart/viewcart.php";
            }
            break;
        case 'billcomfirm':
            $qr = "";
            if (isset($_POST['dongydathang'])) {
                if (isset($_SESSION['user']['IDNguoi'])) {
                    $iduser = $_SESSION['user']['IDNguoi'];
                } else {
                    $iduser = 0;
                }
                $ltSp = GetInfor_SpForUserID($iduser);
                $pttt = $_POST['pttt'];
                if ($pttt == 2) {
                    $bank = Get_Bank();
                    include "./views/cart/viewbank.php";
                }
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('d/m/Y h:i:s');
                $tongdonhang = tongdonhang($iduser);
                $idbill = insert_bill($iduser, $pttt, $ngaydathang, $tongdonhang);
                if ($ltSp != null) {
                    foreach ($ltSp as $lt) {
                        insert_bill_sp($idbill, $lt['IDSanPham'], $lt['SoLuong']);
                    }
                }
                Delete_All_SP_ForCart($iduser);
            }
            $taikhoan = loadone_taikhoan($iduser);
            $bill = loadone_bill($idbill);
            $billct = loadCT_bill($idbill);
            include "./views/cart/billconfirm.php";
            break;
        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['IDNguoi']);
            include "./views/cart/mybill.php";
            break;
        case 'ctdh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $iduser = $_GET['iduser'];
            }
            $taikhoan = loadone_taikhoan($iduser);
            $cart = loadcart_cthoadon($id);
            $bill = loadone_bill($id);
            include "./views/cart/chitietdonhang.php";
            break;
        case 'Huydh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $iduser = $_GET['iduser'];
            }
            $bill = Delete_billForUser($id, $iduser);
            $listbill = loadall_bill($_SESSION['user']['IDNguoi']);
            include "./views/cart/mybill.php";
            break;
        // case 'star':
        //     if (isset ($_GET['id'])) {
        //         $id = $_GET['id'];
        //     }
        //     $taikhoan = loadone_taikhoan($iduser);
        //     $cart = loadcart_cthoadon($id);
        //     $bill = loadone_bill($id);
        //     include "./views/cart/chitietdonhang.php";
        //     break;
        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";
