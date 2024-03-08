<style>
    * {
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1vw;
    }

    .row {
        float: left;
        width: 100%;
    }

    .mb {
        margin-bottom: 15px;
    }

    .mb10 {
        margin-bottom: 10px;
    }

    .demo {
        min-height: 100px;
        background-color: aqua;
    }

    .mr {
        margin-right: 2%;
    }

    /* boxtaikhoan */
    .formtaikhoan {
        line-height: 150%;
    }

    .formtaikhoan input[type="text"],
    .formtaikhoan input[type="email"],
    .formtaikhoan input[type="password"],
    .frmcontent input[type="text"] {
        padding: 5px 10px;
        margin: 5px;
        width: 100%;
        border: 1px #CCC solid;
        border-radius: 5px;
    }

    .formtaikhoan input[type="checkbox"] {
        border-radius: 5px;
    }

    .formtaikhoan input[type="submit"],
    .frmcontent input[type="submit"],
    .formtaikhoan input[type="reset"],
    .frmcontent input[type="reset"],
    .frmcontent input[type="button"] {
        border-radius: 5px;
        padding: 5px 10px;
        margin: 5px;
        background-color: white;
        border: 1px #CCC solid;
    }
</style>
<?php
if (is_array($dm)) {
    extract($dm);
}
?>
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
                        <h3 class="page-title">Cập nhật danh mục sản phẩm</h3>
                    </div>

                    <div class="row frmcontent">
                        <form action="index.php?act=updatedm" method="post">
                            <div class="row mb10">Mã loại <br>
                                <input type="text" name="maloai" disabled placeholder="auto number">
                            </div>
                            <div class="row mb10">Tên loại <br>
                                <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                            </div>
                            <div class="row mb10">
                                <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                                <input type="submit" name="capnhat" value="Cập nhật">
                                <input type="reset" value="Nhập lại">
                                <a href="index.php?act=lisdm"> <input type="button" value="Danh sách"></a>
                            </div>
                            <?php
                            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                            ?>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        <!-- end page title -->