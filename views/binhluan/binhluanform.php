<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";


$IDNguoi = $_SESSION['user']['IDNguoi'];
$IDSanPham = $_REQUEST['IDSanPham'];
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

    <div class="container mt-5">
        <div>
            <?php
            echo "Nội dung bình luận ở đây";
            ?>
        </div>

        <h2>Bình Luận</h2>
        <form action="binhluanform.php" method="POST">
            <input type="hidden" name="IDSanPham" id="" value="<?= $IDSanPham ?>">
            <div class="form-group">
                <label for="comment">Nội dung bình luận:</label>
                <input class="form-control" name="noidung" id="comment" rows="4"></input>
            </div>
            <!-- <div class="form-group">
                <label>Đánh giá:</label>
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
                <input type="hidden" id="rating" name="sao" value="5">
            </div> -->
            <button type="submit" name="add_bl" class="btn btn-primary">Gửi</button>
        </form>

    </div>
    <?php


    if (isset ($_POST['add_bl'])) {
        $noidung = $_POST['noidung'];
        $sao = $_POST['sao'];
        $IDSanPham = $_POST['IDSanPham'];
        $IDNguoi = $_SESSION['user']['IDNguoi'];
        $ngayBinhLuan = date(' d/m/Y');
        insert_bl($IDNguoi, $noidung, '', $ngayBinhLuan, $IDSanPham);


    }


    ?>








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