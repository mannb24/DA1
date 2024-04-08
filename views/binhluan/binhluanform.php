<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$IDNguoi = 0;
if (isset($_SESSION['user'])) {
    $IDNguoi = $_SESSION['user']['IDNguoi'];
} else {
    // echo "<script>alert('Vui lòng đăng nhập để bình luận.');</script>";
}
    

$IDSanPham = $_REQUEST['IDSanPham'];

$listbl = loadall_bl($IDSanPham);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .star {
            font-size: 25px;
            cursor: pointer;
        }

        .star:hover {
            color: gold;
        }
    </style>
</head>

<body>

<div class="container ">
    <h2>Bình Luận</h2>
    <form id="commentForm" action="binhluanform.php" method="POST">
        <input type="hidden" name="IDSanPham" id="" value="<?= $IDSanPham ?>">
        <div class="form-group">
            <label for="comment">Nội dung bình luận:</label>
            <input class="form-control" name="noidung" id="comment" rows="4"></input>
        </div>
        <button type="submit" name="add_bl" class="btn btn-primary">Gửi</button>
    </form>

    <div class="row mt-4" id="commentSection">
        <div class="col">
            <?php if (!empty($listbl)) : ?>
                <?php foreach ($listbl as $bl) : ?>
                    <div class="media mb-4">
                        <div class="media-body">
                            <h5 class="mt-0 nguoi_bl text-primary"><?= $bl['Ten'] ?>
                                <small class="text-muted ngay_binh_luan"><?= $bl['NgayBinhLuan'] ?></small>
                            </h5>
                            <p class="noidung"><?= $bl['NoiDung'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Chưa có bình luận. Hãy là người đầu tiên bình luận</p>
            <?php endif; ?>
        </div>
    </div>

    
</div>






    <?php


    if (isset($_POST['add_bl'])) {
        $noidung = $_POST['noidung'];
        // $sao = $_POST['sao'];
        $IDSanPham = $_POST['IDSanPham'];
        $IDNguoi = $_SESSION['user']['IDNguoi'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngayBinhLuan = date('d/m/Y h:i:s ');
        insert_bl($IDNguoi, $noidung, '', $ngayBinhLuan, $IDSanPham);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }


    ?>

<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        // Check if user is not logged in
        if (!<?php echo isset($_SESSION['user']) ? 'true' : 'false' ?>) {
            event.preventDefault(); // Prevent form submission
            alert('Vui lòng đăng nhập để bình luận.'); // Show alert message
        }
    });
</script>





 <!-- <div class="form-group">
                <label>Đánh giá:</label>
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
                <input type="hidden" id="rating" name="sao" value="5">
            </div> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.star').forEach(function(item) {
            item.addEventListener('click', function() {
                var rating = this.getAttribute('data-rating');
                document.getElementById('rating').value = rating;
                document.querySelectorAll('.star').forEach(function(star) {
                    if (star.getAttribute('data-rating') <= rating) {
                        star.style.color = 'gold';
                    } else {
                        star.style.color = 'black';
                    }
                });
            });
        });
    </script> -->
</body>

</html>