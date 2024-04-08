<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Include any necessary stylesheets and scripts here -->
</head>
<style>
    .navbar {
        width: auto;
        height: 100px;
        float: right;
        padding-left: 0px;
        padding-right: 0px;
    }

    .navbar_menu li {
        display: inline-block;
    }

    .navbar_menu li a {
        display: block;
        color: black;
        background-color: white;
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 20px;
        -webkit-transition: color 0.3s ease;
        -moz-transition: color 0.3s ease;
        -ms-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .navbar_menu li a:hover {
        color: #b5aec4;
    }
</style>

<body>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ admin</a></li>
                                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                                </ol>
                            </div>
                            <h3 class="page-title">DANH SÁCH SẢN PHẨM</h3>
                        </div>
                        <form action="index.php?act=listsp" method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 offset-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm"
                                                name="kyw">
                                            <input type="hidden" name="listok" value="1">
                                            <!-- Giá trị này chỉ ra rằng biểu mẫu đã được gửi đi -->
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" name="timkiem">Tìm
                                                    kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="index.php?act=litssp" method="post"></form>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>STT</th>
                                                    <th>TÊN SẢN PHẨM</th>
                                                    <th>GÍA</th>
                                                    <th>HÌNH ẢNH</th>
                                                    <th>MÔ TẢ</th>
                                                    <th>MÃ LOẠI</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($listsanpham as $sanpham) {
                                                    extract($sanpham);
                                                    $suasp = "index.php?act=suasp&id=" . $IDSanPham;
                                                    $xoasp = "index.php?act=xoasp&id=" . $IDSanPham;
                                                    $hinhpath = "../views/images/" . $AnhBia;
                                                    if (is_file($hinhpath)) {
                                                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                                                    } else {
                                                        $hinh = "no photo";
                                                    }

                                                    echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk" id=""></td>
                                                            <td>' . $IDSanPham . '</td>
                                                            <td>' . $TenSanPham . '</td>
                                                            <td>' . $Gia . '</td>
                                                            <td>' . $hinh . '</td>
                                                            <td>' . $Mota . '</td>
                                                            <td>' . $IDDanhMuc . '</td>
                                                            <td>
                                                                <a href=' . $suasp . ' >
                                                                    <input style="margin-bottom: 5px" class="btn-primary" type="button" value="Sửa">
                                                                </a>
                                                                <a href="#" onclick="confirmDelete(\'' . $xoasp . '\')">
                                                                    <input class="btn-danger" type="button" value="Xóa">
                                                                </a>
                                                                
                                                                <a href="listdanhgia.php" >
                                                                    <input class="btn-danger" type="button" value="Danh sách đánh giá">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <nav class="navbar d-flex">
                                            <ul class=" navbar_menu" id="page-links">
                                                <li><a class="page-link" href="#">
                                                        << </a>
                                                </li>
                                                <li><a class="page-link" href="index.php?act=listsp&currentpage=1">1</a>
                                                </li>
                                                <li><a class="page-link" href="index.php?act=listsp&currentpage=2">2</a>
                                                </li>
                                                <li><a class="page-link" href="index.php?act=listsp&currentpage=3">3</a>
                                                </li>
                                                <li><a class="page-link" href="#">>></a></li>
                                            </ul>
                                        </nav>
                                        <div class="input_button">
                                            <input onclick="selects()" class="btn-info" type="button"
                                                value="Chọn tất cả">
                                            <input onclick="deSelect()" class="btn-info" type="button"
                                                value="Bỏ chọn tất cả">
                                            <input onclick="confirmDeleteSelected()" class="btn-danger" type="button"
                                                value="Xóa các mục đã chọn">
                                            <a href="index.php?act=addsp"><input class="btn-success" type="button"
                                                    value="Nhập thêm"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function confirmDelete(deleteUrl) {
            if (confirm("Bạn có muốn xóa không?")) {
                window.location.href = deleteUrl;
            }
        }

        function confirmDeleteSelected() {
            if (confirm("Bạn có muốn xóa các mục đã chọn không?")) {
                // Thêm logic xóa các mục đã chọn ở đây nếu cần
                // window.location.href = "index.php?act=deleteSelected";
            }
        }

        function selects() {
            var ele = document.getElementsByName('chk');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = true;
            }
        }

        function deSelect() {
            var ele = document.getElementsByName('chk');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = false;
            }
        }
    </script>

</body>

</html>