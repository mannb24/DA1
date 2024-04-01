<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <!-- Include any necessary stylesheets and scripts here -->
</head>

<body>
<div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h3 class="page-title">BÌNH LUẬN</h3>
                        </div>
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800">DANH SÁCH BÌNH LUẬN</h1>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="commentTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Người bình luận</th>
                                                    <th>Nội dung</th>
                                                    <th>Thời gian</th>
                                                    <th>Sản phẩm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($listbl as $bl) {
                                                    extract($bl);
                                                    echo '
                                                        <tr>
                                                            <td>' . $IDDanhGia . '</td>
                                                            <td>' . $IDNguoi . '</td>
                                                            <td>' . $NoiDung . '</td>
                                                            <td>' . $NgayBinhLuan . '</td>
                                                            <td>' . $IDSanPham . '</td>
                                                        </tr>
                                                    ';
                                                }
                                                ?>
                                                <!-- Kết thúc dữ liệu bình luận -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Script và các hàm JavaScript -->
    <script type="text/javascript">
        // Các hàm JavaScript có thể được thêm ở đây
    </script>

</body>

</html>
