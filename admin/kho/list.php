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
        margin: 7px;
        width: 100%;
        border: 1px #CCC solid;
        border-radius: 5px;
    }

    .formtaikhoan input[type="checkbox"] {
        border-radius: 7px;
    }

    .formtaikhoan input[type="submit"],
    .frmcontent input[type="submit"],
    .formtaikhoan input[type="reset"],
    .frmcontent input[type="reset"],
    .frmcontent input[type="button"] {
        border-radius: 5px;
        padding: 5px 10px;
        margin: 7px;
        background-color: white;
        border: 1px #CCC solid;
    }



    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #333;
        color: #333;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    section {
        padding: 20px;
    }

    .card {
        background-color: #fff;
        padding: 20px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: black;
    }

    .row10.button {
        padding: 7px;
        border: 3px;
        box-sizing: 3px;
    }
</style>
<h1>dđmmm</h1>
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
                                <li class="breadcrumb-item active">Thêm biến thể</li>
                            </ol>
                        </div>
                        <h3 class="page-title">Danh sách loại biến thể</h3>
                    </div>

                    <section>
                        <div class="card">

                            <table>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th></th>

                                </tr>
                                <?php
                                foreach ($listKho as $kho) {
                                    extract($kho);
                                    $suadm = "index.php?act=suaKho&id=" . $IDKho;
                                    $xoadm = "index.php?act=xoaKho&id=" . $IDKho;
                                    echo '<tr>
                                    <td><input type="checkbox"></td>
                                    <td>' . $IDKho . '</td>
                                    <td>' . $TenLoai . '</td>
                                    <td><a href="' . $suadm . '"><input type="button" value="Sửa"></a> <a href="' . $xoadm . '"><input type="button" value="Xoá"></a></td>
                                </tr>';
                                }
                                ?>
                            </table>
                            <br>
                            <div class="row10">
                                <input type="button" value="Chọn tất cả">
                                <input type="button" value="Bỏ chọn tất cả">
                                <input type="button" value="Xoá các mục đã chọn">
                                <a href="index.php?act=addKho"> <input type="button" value="Nhập thêm"></a>
                            </div>
                        </div>

                    </section>

                </div>
            </div>

        </div>
        <!-- end page title -->