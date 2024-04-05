<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ admin</a></li>
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>
                        <h3 class="page-title">Thêm danh mục sản phẩm</h3>

                        <div class="container-fluid">

                            <!-- Page Heading -->

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
                                            <div class="input">
                                                Danh mục <br>
                                                <select name="iddm">
                                                    <?php
                                                    foreach ($listdanhmuc as $danhmuc) {
                                                        extract($danhmuc);
                                                        echo '<option value="' . $IDDanhMuc . '">' . $TenDanhMuc . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input">
                                                Danh mục <br>
                                                <select name="kho[]" multiple>
                                                    <?php
                                                    foreach ($listKho1 as $kho) {
                                                        extract($kho);
                                                        echo '<option value="' . $IDKho . '">' . $TenLoai . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input">
                                                Danh mục <br>
                                                <select name="kho[]" multiple >
                                                    <?php
                                                    foreach ($listKho2 as $kho) {
                                                        extract($kho);
                                                        echo '<option value="' . $IDKho . '">' . $TenLoai . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input">
                                                Tên sản phẩm <br>
                                                <input type="text" name="tensp">
                                            </div>
                                            <div class="input">
                                                Giá <br>
                                                <input type="text" name="giasp">
                                            </div>
                                            <div class="input">
                                                Số lượng <br>
                                                <input type="number" name="SoLuongSP">
                                            </div>
                                            <div class="input ">
                                                Hình ảnh <br>
                                                <input type="file" name="hinh">
                                            </div>
                                            <div class="input">
                                                Mô tả <br>
                                                <textarea name="mota" id="" cols="30" rows="10"></textarea>
                                            </div>
                                            <div style="margin: 20px 0 0 15px;" class="">
                                                <input class="btn-primary" type="submit" name="themmoi"
                                                    value="THÊM MỚI">
                                                <input class="btn-secondary" type="reset" value="NHẬP LẠI">
                                                <a href="index.php?act=listsp"><input class="btn-success" type="button"
                                                        value="Danh sách"></a>
                                            </div>
                                            <?php
                                            if (isset ($thongbao) && ($thongbao != ""))
                                                echo $thongbao;
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

            </div>
            <!-- end page title -->