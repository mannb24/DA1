<?php
session_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/danhmuc.php";
include "./model/taikhoan.php";
include "./model/cart.php";
include "./views/header.php";

if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

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
            $dssp = loadall_sanpham($kyw, $iddm);
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
                extract($onesp);
                $sp_cung_loai = load_sanphamcungloai($id, $iddm);
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
                insert_taikhoan($user, $pass, $email, $address, $tel);
                $thongbao = "ĐĂNG KÍ THÀNH CÔNG";
            }
            include "./views/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['taikhoan'];
                $pass = $_POST['matkhau'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    // Kiểm tra vai trò
                    if ($checkuser['Role'] == 1) {
                        // Nếu vai trò là 1 (admin), chuyển hướng đến trang quản trị admin
                        echo "<script>
                                    window.location.href='admin/index.php';
                                </script>";
                    } else {
                        // Nếu vai trò là người dùng thông thường, chuyển hướng đến trang chính
                        echo "<script>
                                    window.location.href='index.php';
                                </script>";
                    }
                } else {
                    $thongbao = "Tài khoản không tồn tại";
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
            // Kiểm tra trùng lặp và thêm sản phẩm vào giỏ hàng
            if (isset($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $ttien = $soluong * $price;
                $size = $_POST['size'];
                $spadd = [$id, $name, $img, $price, $soluong, $ttien, $size];

                // Kiểm tra trùng lặp theo ID sản phẩm
                $productExists = false;
                foreach ($_SESSION['mycart'] as $key => $cart) {
                    if ($cart[0] == $id && $cart[6] == $size) {
                        $productExists = true;
                        // Cập nhật số lượng nếu sản phẩm đã tồn tại
                        $_SESSION['mycart'][$key][4] += $soluong;
                        break;
                    }
                }

                // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
                if (!$productExists) {
                    $_SESSION['mycart'][] = $spadd;
                }
            }
            include "./views/cart/viewcart.php";
            break;
        case 'updatecart':
            if (isset($_POST["updatecart"])) {
                $fl = 0;
                $updatedQuantity = intval($_POST['soluong']);

                // Ensure the updated quantity is within the allowed range (1 to 15)
                if ($updatedQuantity < 1) {
                    $updatedQuantity = 1;
                } elseif ($updatedQuantity > 10) {
                    $updatedQuantity = 10;
                }

                for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
                    if ($_SESSION['mycart'][$i][0] == $_GET["id"]) {
                        $fl = 1;
                        $_SESSION['mycart'][$i][4] = $updatedQuantity;
                        break;
                    }
                }
            }
            include "./views/cart/viewcart.php";
            break;

        case 'deletecart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            echo "<script>
                    window.location.href='index.php?act=addtocart'
                </script>";

            break;
        case 'bill':
            if ($_SESSION['mycart'][0] == "") {
                echo "<script>
                    alert('Giỏ hàng của ban đang rỗng. ');
                </script>";
                include "./views/cart/viewcart.php";
            } else {

                if ($_SESSION['user']['id'] == 0) {
                    echo "<script>
                    alert('Bạn cần đăng nhâp để đặt hàng.');
                </script>";
                    include "./views/cart/viewcart.php";
                } else {
                    $iduser = $_SESSION['user']['id'];
                    $taikhoan = loadone_taikhoan($iduser);

                    include "./views/cart/bill.php";
                }
            }

            break;
        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user']))
                    $iduser = $_SESSION['user']['id'];
                else
                    $iduser = 0;
                $pttt = $_POST['pttt'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('d/m/Y h:i A');
                $tongdonhang = tongdonhang();
                $idbill = insert_bill($iduser, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($iduser, $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                $_SESSION['mycart'] = [];
            }
            $taikhoan = loadone_taikhoan($iduser);
            $bill = loadone_bill($idbill);
            $billct = load_cart($idbill);
            include "./views/cart/billconfirm.php";
            break;
        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "./views/cart/mybill.php";
            break;
        case 'categories&iddm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $dssp = loadall_sanpham($kyw, $id);
            include "./views/categories.php";
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
        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";
