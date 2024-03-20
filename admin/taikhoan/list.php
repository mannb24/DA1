<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <!-- Include any necessary stylesheets and scripts here -->
</head>

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
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800">DANH SÁCH KHÁCH HÀNG</h1>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>MÃ TK</th>
                                                    <th>NAME</th>
                                                    <th>USER</th>
                                                    <th>PASS</th>
                                                    <th>EMAIL</th>
                                                    <th>ADDRESS</th>
                                                    <th>TEL</th>
                                                    <th>ROLE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($listtaikhoan as $taikhoan) {
                                                    extract($taikhoan);
                                                    $suatk = "index.php?act=suatk&id=" . $IDNguoi;
                                                    $xoatk = "index.php?act=xoakh&id=" . $IDNguoi;

                                                    echo '
                                                        <tr>
                                                            <td><input type="checkbox" name="chk" id="' . $IDNguoi . '"></td>
                                                            <td>' . $IDNguoi . '</td>
                                                            <td>' . $Ten . '</td>
                                                            <td>' . $taikhoan . '</td>
                                                            <td>' . $matkhau . '</td>
                                                            <td>' . $Email . '</td>
                                                            <td>' . $DiaChi . '</td>
                                                            <td>' . $SoDienThoai . '</td>
                                                            <td>' . $Role . '</td>
                                                            <td>
                                                                <a href="#" onclick="confirmDelete(\'' . $xoatk . '\')">
                                                                    <input class="btn-danger" type="button" value="Xóa">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="input_button">
                                            <input onclick="selects()" class="btn-info" type="button"
                                                value="Chọn tất cả">
                                            <input onclick="deSelect()" class="btn-info" type="button"
                                                value="Bỏ chọn tất cả">
                                            <button onclick="deleteSelected()" class="btn-danger">Xóa các mục đã
                                                chọn</button>
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

        function deleteSelected() {
            document.cookie = "isSelected=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            var ele = document.getElementsByName('chk');
            let idSelected = '';
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].checked) {
                    idSelected += ele[i].id + ',';
                }
            }
            if (idSelected) {
                document.cookie = `isSelected=${idSelected}`;
                confirmDelete('index.php?act=deletealluser');
            }
        }
    </script>

</body>

</html>