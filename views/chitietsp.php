<style>
	.flex-quantity {
		display: flex;
	}

	.buttontang {
		padding: 0px 5px;
	}

	.buttongiam {

		padding: 0px 5px;
	}

	.soluong {
		margin-top: 5px;
	}

	/* ... (previous styles remain unchanged) ... */

	/* Product Grid Styles for "Sản phẩm cùng loại" */
	#tab_1 .product-item {
		width: 18%;
		/* Adjust the width of each product item for five columns */
		margin-right: 2%;
		/* Add a small right margin for spacing */
		margin-bottom: 20px;
		box-sizing: border-box;
		/* Include padding and border in the element's total width and height */
	}

	#tab_1 .product-item:nth-child(5n) {
		margin-right: 0;
		/* Remove right margin for the last item in each row */
	}

	#tab_1 .product_image img {
		width: 100%;
		/* Make sure product images take full width */
		height: auto;
	}

	#tab_1 .product_info {
		text-align: center;
	}

	#tab_1 .product_name {
		margin-top: 10px;
		font-size: 16px;
	}

	#tab_1 .product_price {
		font-size: 14px;
		color: #888;
	}

	.tab_container.active {
		width: 100%;
		height: 100%;
	}

	.size_selector {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.size_selector label {
    margin-right: 10px;
}

.size_selector select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-danger {
    margin: 0 0 0 20px;
    padding: 6px;
}

	/* ... (previous styles remain unchanged) ... */
</style>

<head>
	<link rel="stylesheet" type="text/css" href="views/styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="views/styles/single_responsive.css">
</head>
<div class="container single_product_container">
	<div class="row">
		<?php extract($onesp);

		extract($dmsp=loadall_danhmuc($onesp['IDDanhMuc']));
		

		
		?>

		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<!-- <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li> -->
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $onesp['TenSanPham'] ?></a></li>
				</ul>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-lg-7">
			<div class="single_product_pics">
				<div class="row">
					<div class="col-lg-1 thumbnails_col order-lg-1 order-2">

					</div>
					<div class="col-lg-11 image_col order-lg-2 order-1">
						<div class="single_product_image">
							<div class="single_product_image_background" style="background-image:url(views/images/<?= $onesp['AnhBia'] ?>)"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-5">
			<div class="product_details">
				<div class="product_details_title">
					<h2><?= $onesp['TenSanPham'] ?></h2>
					<p><?= $onesp['Mota'] ?></p>
				</div>
				<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
					<span class="ti-truck"></span><span>Miễn phí giao hàng</span>
				</div>
				<div class="original_price"><?= number_format($onesp['Gia'] * 120 / 100) ?> $</div>
				<div class="product_price"><?= number_format($onesp['Gia']) ?> $</div>


				<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
					<span>SL :</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>

					<form action="index.php?act=addtocart" method="post">
						<!-- ... (previous input fields remain unchanged) ... -->
						<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<input type="hidden" name="id" value="<?=$onesp['IDSanPham']?>">
	                        <input type="hidden" name="name" value="<?=$onesp['TenSanPham']?>">
	                        <input type="hidden" name="img" value="<?=$onesp['AnhBia']?>">
	                        <input type="hidden" name="price" value="<?=$onesp['Gia']?>">
	                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
							<span>Số lượng:</span>
							<div class="quantity_selector">
								<span class="minus">
									<div class="buttongiam btn-secondary"><i class="fa fa-minus" aria-hidden="true"></i></div>
								</span>
								<input style="margin: 15px 0px;width: 30px;text-align:center;" type="text" id="quantity" name="soluong" value=1><br>
								<span class="plus">
									<div class="buttontang btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i></div>
								</span>
							</div>
							<!-- Size selection -->
							<div class="size_selector">
								<label for="size">Chọn size:</label>
								<select id="size" name="size" >
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<!-- Add more size options as needed -->
								</select>
							</div>
							<input style="margin:0px 0px 0px 20px;padding:6px;" class="btn-danger" type="submit" name="addtocart" value="Thêm vào giỏ hàng">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Tabs -->

<div class="tabs_section_container">

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabs_container">
					<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
						<li class="tab active" data-active-tab="tab_1"><span>Sản phẩm cùng loại</span></li>

						<li class="tab" data-active-tab="tab_3"><span>Bình luận</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

				<!-- Tab Description -->

				<div id="tab_1" class="tab_container active">
					<div class="row">
						<div class="col-xl-12 tab_title">
							<h4>Sản phẩm cùng loại</h4>
						</div>
						<?php foreach ($sp_cung_loai as $sp) : ?>
							<div class="product-item men">
								<div class="product discount product_filter">
									<div class="product_image">
										<a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">
											<img src="views/images/<?= $sp['AnhBia'] ?>" alt="">
										</a>
									</div>
									<div class="favorite favorite_left"></div>
									<div class="product_info">
										<h6 class="product_name"><a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>"><?= $sp['TenSanPham'] ?></a></h6>
										<div class="product_price"><?= number_format($sp['Gia']) ?>
											$<span><?= number_format($sp['Gia'] * 110 / 100) ?> $</span></div>
									</div>
								</div>
								<div class="red_button add_to_cart_button"><a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">Chi tiết sản phẩm</a></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				
				<div id="tab_3" class="tab_container">
	                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	                    <script>
	                    $(document).ready(function() {
	                        $("#binhluan").load("views/binhluan/binhluanform.php", {
	                            $idpro: <?=$id?>
	                        });
	                    });
	                    </script>
	                </div>
			</div>
		</div>

	</div>
</div>
</div>

</div>

<!-- Benefit -->

<div class="benefit">
	<div class="container">
		<div class="row benefit_row">
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>MIỄN PHÍ VẬN CHUYỂN</h6>
						<p>Bị thay đổi trong một số hình thức</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>CACH KHI GIAO</h6>
						<p>Internet có xu hướng lặp lại</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>7 NGÀY TRẢ LẠI</h6>
						<p>Sản phâm còn nguyên vẹn khi trả hàng và còn mác sản phẩm</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>MỞ CỬA CẢ TUẦN</h6>
						<p>8AM - 09PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Newsletter -->
<script>
    let tang = document.querySelector(".buttontang");
    let giam = document.querySelector(".buttongiam");
    let quantity = document.querySelector("#quantity");

    tang.onclick = () => {
        quantity.value++;
        checkQuantityLimit();
    }

    giam.onclick = () => {
        quantity.value--;
        if (quantity.value <= 0) {
            quantity.value = 1;
        }
        checkQuantityLimit();
    }

    quantity.oninput = () => {
        checkQuantityLimit();
    }

    function checkQuantityLimit() {
        let maxQuantity = 10; // Số lượng tối đa cho phép
        if (quantity.value > maxQuantity) {
            alert("Vượt quá giới hạn số lượng");
            quantity.value = maxQuantity;
        }
    }
</script>


<script>
	let tang = document.querySelector(".buttontang");
	let giam = document.querySelector(".buttongiam");
	let quantity = document.querySelector("#quantity");
	tang.onclick = () => {
		quantity.value++;
	}
	giam.onclick = () => {
		quantity.value--;
		if (quantity.value <= 0) {
			quantity.value = 1;
		}
	}
</script>