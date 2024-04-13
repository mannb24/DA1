<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <!-- Include any necessary stylesheets and scripts here -->
</head>
<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $listbl = loadall_bl_sao($id);
} else {
    echo "Không có ID sản phẩm được cung cấp.";
}


?>


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
                                                    <th> Số Sao</th>
                                                    <th>Người bình luận</th>
                                                    <th>Nội dung</th>
                                                    <th>Ngày bình luận</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Kiểm tra xem biến $listbl đã được khởi tạo chưa
                                                if (isset($listbl)) {
                                                    // Nếu có dữ liệu, thực hiện vòng lặp để hiển thị
                                                    foreach ($listbl as $bl) {
                                                        echo '
                    <tr>
                        <td>' . $bl['Sao'] . '</td>
                        <td>' . $bl['Ten'] . '</td>
                        <td>' . $bl['NoiDung'] . '</td>
                        <td>' . $bl['NgayBinhLuan'] . '</td>
                       
                    </tr>
                ';
                                                    }
                                                } else {
                                                    // Nếu không có dữ liệu, hiển thị thông báo
                                                    echo '<tr><td colspan="5">Không có dữ liệu để hiển thị.</td></tr>';
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