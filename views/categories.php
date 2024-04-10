<head>
	<link rel="stylesheet" type="text/css" href="views/styles/categories_responsive.css">
	<link rel="stylesheet" type="text/css" href="views/styles/categories_styles.css">
</head>
<style>
	/* ... (previous styles remain unchanged) ... */

	/* Product Grid Styles */
	.product-grid {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		padding-bottom: 10px;

	}

	.product-item {
		width: 23%;
		/* Adjust the width of each product item */
		margin-bottom: 20px;
		box-sizing: border-box;
		/* Include padding and border in the element's total width and height */
	}
	#productName {
        height: 30px; /* Điều chỉnh chiều cao của trường nhập tại đây */
    }
	/* ... (previous styles remain unchanged) ... */
</style>

<div class="container product_section_container">
	<div class="row">
		<div class="col product_section clearfix">

			<!-- Breadcrumbs -->


			<!-- Sidebar -->

			<div class="sidebar">
				<div class="sidebar_section">
					<div class="sidebar_title">
						<h5>Danh mục sản phẩm</h5>
					</div>
					<ul class="sidebar_categories">
						<li><a href="index.php?act=categories&iddm=0">Tất cả sản phẩm</a></li>

						<?php foreach ($dmsp as $dm) : ?>
							<li><a href="index.php?act=categories&iddm=<?= $dm['IDDanhMuc'] ?>">
									<?= $dm['TenDanhMuc'] ?>
								</a></li>
						<?php endforeach; ?>

					</ul>
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Lọc sản phẩm</h5>
						</div>
						<form id="filterForm"  action="index.php?act=categories" method="post">
							<div class="form-group">
								<label for="productName">Tên sản phẩm:</label>
								<input type="text" class="form-control" id="productName" name="">
							</div>
							<div class="form-group">
								<label for="minPrice">Giá từ:</label>
								<input type="number" min="0" class="form-control" id="minPrice" name="minPrice" onchange="checkMaxPrice()">
							</div>
							<div class="form-group">
								<label for="maxPrice">Đến:</label>
								<input type="number" class="form-control" id="maxPrice" name="maxPrice">
							</div>
							<div class="form-group">
								<label for="category">Danh mục:</label>
								<select class="form-control" id="category" name="category">
									<option value="">Tất cả</option>

									<?php foreach ($dmsp as $dm) : ?>
										<option value="<?= $dm['IDDanhMuc'] ?>"><?= $dm['TenDanhMuc'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<button type="submit" class="btn btn-primary" name="timkiem">Lọc</button>
						</form>
					</div>

				</div>
			</div>

			<!-- Main Content -->
			
			<div class="main_content">

				<!-- Products -->

				<div class="products_iso">
					<div class="row">
						<div class="col">


							<div class="product-grid">
								<?php foreach ($dssp as $sp) : ?>

									<div class="product-item women">
										<div class="product product_filter">
											<a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>" class="product_image">
												<img src="views/images/<?= $sp['AnhBia'] ?>" alt="">
											</a>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">
														<?= $sp['TenSanPham'] ?>
													</a></h6>
												<div class="product_price">
													<?= number_format($sp['Gia']) ?> $<span>
														<?= number_format($sp['Gia'] * 110 / 100) ?> $
													</span>
												</div>

											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="index.php?act=ctsp&idsp=<?= $sp['IDSanPham'] ?>">Chi tiết sản phẩm</a>
										</div>

									</div>
								<?php endforeach; ?>

							</div>
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
						<h6>free shipping</h6>
						<p>Suffered Alteration in Some Form</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>cach on delivery</h6>
						<p>The Internet Tend To Repeat</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>45 days return</h6>
						<p>Making it Look Like Readable</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>opening all week</h6>
						<p>8AM - 09PM</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>