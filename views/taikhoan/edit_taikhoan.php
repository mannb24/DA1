<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;

  }

  .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .login-box {
    width: 400px;
    padding: 20px;
    background: rgba(0, 0, 0, 0.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
    border-radius: 10px;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    color: #FF6633;
    text-align: center;
  }

  .login-box h2 {
    margin-bottom: 20px;
    font-size: 2em;
  }

  .user-box {
    position: relative;
    margin-bottom: 20px;
  }

  .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 10px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
  }

  .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #FF6633;
    pointer-events: none;
    transition: 0.5s;
  }

  .user-box input:focus~label,
  .user-box input:valid~label {
    top: -20px;
    left: 0;
    color: #FF6633;
    font-size: 12px;
  }

  .btn-info {
    padding: 10px 20px;
    background-color: #FF6633;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.5s;
  }

  .btn-info:hover {
    background-color: #FF6633;
  }

  .thongbao {
    color: #fff;
  }
</style>

<head>
</head>
<div class="login-container">
  <div class="login-box">
    <h2>Cập nhât tài khoản</h2>
    <?php
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
    }
    ?>
    <form action="index.php?act=edit_taikhoan" method="POST">
      <div class="user-box">
        <input type="text" name="user" required="" value="<?= $user['taikhoan'] ?>">
        <label>Tên đăng nhập</label>
      </div>
      <div class="user-box">
        <input type="email" name="email" required="" value="<?= $user['Email'] ?>">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="text" name="tel" required="" value="<?= $user['SoDienThoai'] ?>">
        <label>Số điện thoại</label>
      </div>
      <div class="user-box">
        <input type="text" name="address" required="" value="<?= $user['DiaChi'] ?>">
        <label>Đia chỉ</label>
      </div>
      <input type="hidden" name="id" value="<?= $user['IDNguoi'] ?>">
      <input class="btn-info" type="submit" value="Cập nhật" name="capnhat">
    </form>
    <h2 class="thongbao">
      <?php

      if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
      }
      ?>
    </h2>
  </div>
</div>