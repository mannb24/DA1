<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/binhluan.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "../model/kho.php";


include "../model/thongke.php";
include "header.php";

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if (isset($_POST['tenloai']) && !empty($_POST['tenloai'])) {
                    $tenloai = $_POST['tenloai'];
                    inser_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                } else {
                    echo "<script>alert('Vui lòng nhập tên loại danh mục!');</script>";
                }
            }
            include "danhmuc/add.php";
            break;

        case 'lisdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'listDD':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $listbl = loadall_bl_sao($id);
               
            }
            include "sanpham/listdanhgia.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'addKho':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if (isset($_POST['tenkho']) && !empty($_POST['tenkho'])) {

                    $tenloai = $_POST['tenkho'];
                    $Type = $_POST['type'];

                    insert_kho($tenloai, $Type);
                    $thongbao = "Thêm thành công";
                } else {
                    echo "<script>alert('Vui lòng nhập tên loại!');</script>";
                }
            }
            include "kho/add.php";
            break;

        case 'lisKho':
            $listKho = loadall_kho();
            include "kho/list.php";
            break;

        case 'xoaKho':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_kho($_GET['id']);
            }
            $listKho = loadall_kho();
            include "kho/list.php";
            break;

        case 'suaKho':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_kho($_GET['id']);
            }
            include "kho/update.php";
            break;
        case 'updateKho':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenkho'];
                $id = $_POST['id'];
                $sql = "update kho set TenLoai='" . $tenloai . "'where IDKho=" . $id;
                pdo_execute($sql);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                $sql = "update danhmuc set TenDanhMuc='" . $tenloai . "'where IDDanhMuc=" . $id;
                pdo_execute($sql);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if (
                    isset($_POST['iddm']) && !empty($_POST['iddm']) &&
                    isset($_POST['tensp']) && !empty($_POST['tensp']) &&
                    isset($_POST['giasp']) && !empty($_POST['giasp']) &&
                    isset($_POST['mota']) && !empty($_POST['mota']) &&
                    isset($_FILES['hinh']) && !empty($_FILES['hinh']['name'])
                ) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $SoLuongSP = $_POST['SoLuongSP'];
                    $img = $_FILES['hinh']['name'];
                    $target_dir = "../views/images/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //
                    } else {
                        //
                    }

                    inser_sanpham($tensp, $giasp, $img, $mota, $iddm, $SoLuongSP, $_POST['kho']);



                    // foreach ($selectedKhos as $selectedKho) {
                    //     inser_kho_sanpham($lastInsertedID, $selectedKho);
                    // }
                    $thongbao = "Thêm thành công";
                } else {
                    echo "<script>alert('Vui lòng điền đầy đủ thông tin sản phẩm và chọn hình ảnh!');</script>";
                }
            }
            $listdanhmuc = loadall_danhmuc();
            $listKho1 = loadall_kho_type_1();
            $listKho2 = loadall_kho_type_2();
            include "sanpham/add.php";
            break;


        case 'listsp':
            if (isset($_POST['timkiem'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $currentpage = 1;
            if (isset($_GET['currentpage'])) {
                $currentpage = $_GET['currentpage'];
            }
            $total = count(loadall_sanpham($kyw, 0, $iddm)) / 10;
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $currentpage, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../views/images/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //
                } else {
                    //
                }

                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;
        case 'listtk':
            $listthongke = loadall_thongke();
            include "thongke/listthongke.php";
            break;

        case 'listbl':
            $listbl = all_binhluan();
            include "binhluan/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'xoakh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'listdh':
            if (isset($_POST['kyw'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill_admin($kyw, 0);
            include "donhang/list.php";
            break;
        case 'xoadh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_donhang($_GET['id']);
            }
            $listbill = loadall_bill($kyw, 0);
            include "donhang/list.php";
            break;
        case 'ctdh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $iduser = $_GET['iduser'];
            }
            $taikhoan = loadone_taikhoan($iduser);
            $cart = loadcart_cthoadon($id);
            $bill = loadone_bill($id);
            include "donhang/ctdh.php";
            break;
        case 'suadh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // $sql = "SELECT * FROM danhmuc where id =".$_GET['id'];
                // $dm = pdo_query_one($sql);
                $bill = loadone_bill($_GET['id']);
            }
            include "donhang/update.php";
            break;

        case 'updatedh':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $bill_satus = $_POST['bill_satus'];
                $id = $_POST['id'];
                update_bill($id, $bill_satus);
                if ($bill_satus == 3) {
                    update_bill_thanhtoan($id);
                }
            }
            echo "<script>
                        window.location.href='index.php?act=listdh';
                    </script>";
            // include "donhang/list.php";
            break;
        case 'suathanhtoan':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                update_bill_thanhtoan($id);
            }
            echo "<script>
                            window.location.href='index.php?act=listdh';
                        </script>";
            // include "donhang/list.php";
            break;
        default:
            echo "<script>
        window.location.href='index.php?act=bieudo';
    </script>";
            break;
    }
} else {
    echo "<script>
    window.location.href='index.php?act=bieudo';
</script>";
}


include "footer.php";
