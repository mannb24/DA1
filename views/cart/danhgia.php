

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .star {
            font-size: 25px;
            cursor: pointer;
            color: black;
        }
        .star:hover {
            color: gold;
        }
        .form-control{
            max-width: 100%;
            height: 200px;
        }
        .form-control:focus::placeholder,
        .form-control:not(:placeholder-shown)::placeholder {
            color: #999;
        }
    </style>
</head>
<body>
<div class="container ">
    <center><h2>Đánh giá sản phẩm</h2></center>
    <div class="form-group">
                <label>Chất lượng sản phẩm:</label>
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
                <input type="hidden" id="rating" name="sao" value="5">
            </div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="comment">Nội dung đánh giá:</label>
            <textarea class="form-control" name="noidung" id="comment" rows="4" placeholder="Nhập nhận xét của bạn về sản phẩm"></textarea>
        </div>
        <button type="submit" name="" class="btn btn-primary">Gửi</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    </script>
</body>
</html>