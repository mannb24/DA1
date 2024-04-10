<head>
	<link rel="stylesheet" type="text/css" href="views/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="views/styles/responsive.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<div class="main_slider" style="background-image:url(./views/images/slider_5.jpg)">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<h6>Bộ siêu tập mùa đông 2023</h6>
					<h1>Nhận tới 30% giảm giá hàng mới</h1>
					<div class="red_button shop_now_button"><a href="#">Mua ngay</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Banner -->

<div class="banner">
	<div class="container">
		<div class="row">
			<?php foreach ($dmsp as $dm): ?>

				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(./views/images/banner1.jpg)">
						<div class="banner_category">
							<a href="index.php?act=categories&iddm=<?= $dm['IDDanhMuc'] ?>">
								<?= $dm['TenDanhMuc'] ?>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Sản Phẩm Nổi Bật</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }' ,
					style="position: relative; height: 135vh;">

					<?php foreach ($spnew as $sp): ?>

						<div class="product-item men">
							<div class="product discount product_filter">
								<a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>" class="product_image">
									<img src="views/images/<?= $sp['AnhBia'] ?>" alt="" style="width: 100%; height:250px; ">
								</a>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name">
										<a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">
											<?php
											$productName = $sp['TenSanPham'];
											echo strlen($productName) > 20 ? substr($productName, 0, 20) . " ..." : $productName;
											?>
										</a>
									</h6>
									<div class="product_price">
										<?= number_format($sp['Gia']) ?> đ<span>
											<?= number_format($sp['Gia'] * 110 / 100) ?> đ
										</span>
									</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a
									href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">Chi tiết sản phẩm</a></div>
						</div>

					<?php endforeach; ?>




				</div>
			</div>

		</div>

	</div>
</div>

<div class="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div
					class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
					<h4>Ưu đãi người mới</h4>
					<p>Đăng kí thành viên và được giảm giá 20% cho lần đầu mùa hàng</p>
				</div>
			</div>
			<div class="col-lg-6">
				<form action="post">
					<div
						class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Your email" required="required"
							data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
							value="Submit">Gửi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>