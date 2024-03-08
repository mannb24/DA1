<style>  .content-page {
    background-color: #f8f9fa;
    padding: 20px;
    font-family: 'Arial', sans-serif;
  }

  .container-fluid {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .page-title-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  h3.page-title {
    text-align: center;
    font-size: 24px;
    color: #343a40;
  }

  #myChart {
    width: 100%;
    height: 300px;
    margin: 0 auto;
  }

  /* Thêm các điều chỉnh màu sắc và font chữ cho biểu đồ */
  .chartjs-render-monitor {
    font-family: 'Arial', sans-serif;
  }

  /* Thêm điều chỉnh màu sắc cho các thanh xấp xỉ */
  .chartjs-render-monitor .bar {
    background-color: rgba(75, 192, 192, 0.8);
  }

  .chartjs-render-monitor .line {
    background-color: rgba(75, 192, 192, 0.8);
  }

  /* Thêm một chút đổ bóng cho biểu đồ */
  .chartjs-render-monitor .bar {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  #myChart {
    width: 850px;
    height: 400px; /* Adjust the height as needed */

    margin: 0 auto;
  }

  /* Thêm kiểu hover cho thanh xấp xỉ */
  .chartjs-render-monitor .bar:hover {
    background-color: rgba(75, 192, 192, 1);
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
                <!-- <li class="breadcrumb-item"><a href="index.php">Trang chủ admin</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li> -->
              </ol>
            </div>
          </div>
          <div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          </div>
          <div>
            <canvas id="myChart"></canvas>
          </div>
          <script>
            // Đoạn mã JavaScript để tạo biểu đồ
            document.addEventListener('DOMContentLoaded', function() {
              var ctx = document.getElementById('myChart').getContext('2d');

              // Dữ liệu mẫu cho biểu đồ (điểm của đồ thị đường)
              var data = {
                labels: ['Áo Nam', 'Quần Nam', 'Phụ Kiện'],
                datasets: [{
                  label: 'Số lượng',
                  backgroundColor: 'rgba(55, 102, 102, 0.2)',
                  borderColor: 'rgba(55, 102, 102, 1)',
                  borderWidth: 2,
                  data: [6, 5, 4]
                }]
              };


              // Cấu hình cho biểu đồ
              var options = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              };

              // Tạo biểu đồ đường
              var myChart = new Chart(ctx, {
                type: 'bar', // Loại biểu đồ: 'line', 'bar', 'radar', 'doughnut',...
                data: data,
                options: options
              });
            });
          </script>

        </div>
      </div>

    </div>
    <!-- end page title -->