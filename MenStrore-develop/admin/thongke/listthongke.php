<style>
    /* .input_button{
        
    } */
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
                                <li class="breadcrumb-item active">Danh sách thống kê</li>
                            </ol>
                        </div>
                        <h3 class="page-title">THỐNG KÊ</h3>
                        <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao</th>
                        <th>Giá thấp</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        foreach($listthongke as $thongke){
                            extract($thongke);
                         echo '<tr>
                            <td>'.$madm.'</td>
                            <td>'.$tendm.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.number_format($maxprice).' $</td>
                            <td>'.number_format($minprice).' $</td>
                            <td>'.number_format($avgprice).' $</td>                          
                        </tr>';
                        }
                        
                    ?>
                    </tr>
                </tbody>
            </table>
            <div class="input_button">
                <a href="index.php?act=bieudo" ><input type="button"  value="Xem biểu đồ" style="background-color: blue;"></a>
            </div>
        </div>
    </div>
</div>
                    </div>
                
                    
                </div>
            </div>

        </div>
        <!-- end page title -->








































