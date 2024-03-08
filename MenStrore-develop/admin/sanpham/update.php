<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height = '80'>";
} else {
    $hinh = "no photo";
}

?>

<style>
    .row {
        display: block;
    }
</style>

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
                        <h3 class="page-title">Cập nhật sản phẩm</h3>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive1">
                                    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                                        <div class="row mb10">
                                            <select name="iddm">
                                                <option value="0" selected>Tât cả</option>
                                                <?php
                                                foreach ($listdanhmuc as $value) {
                                                    // extract($danhmuc);
                                                    if ($iddm == $value['id']) {
                                                        echo '<option value="' . $value['id'] . '"selected>' . $value['name'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="row mb10">
                                            Tên sản phẩm <br>
                                            <input type="text" name="tensp" value="<?= $name ?>">
                                        </div>
                                        <div class="row mb10">
                                            Giá <br>
                                            <input type="text" name="giasp" value="<?= $price ?>">
                                        </div>
                                        <div class="row mb10">
                                            Hình ảnh <br>
                                            <input type="file" name="hinh">
                                            <?= $hinh ?>
                                        </div>
                                        <div class="row mb10">Mô tả <br>
                                            <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
                                        </div>
                                        <div class="row mb10">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input class="btn-primary" type="submit" name="capnhat" value="Cập nhật">
                                            <a href="index.php?act=listsp"><input class="btn-success" type="button" value="Danh sách"></a>
                                        </div>
                                        <?php
                                        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end page title -->