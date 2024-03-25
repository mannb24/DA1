<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    section {
        position: relative;
        width: 100%;
        height: 100vh;
        background-position: center;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login {
        position: relative;
        width: 440px;
        background: rgba(0, 0, 0, 0.6);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login h2 {
        text-align: center;
        color: #FF6633;
        font-size: 2em;
    }

    .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        margin-bottom: 20px;
    }

    .input-box .input {
        width: 100%;
        height: 50px;
        border: 2px solid #FF6633;
        border-radius: 40px;
        background: transparent;
        outline: none;
        padding: 0 20px;
        color: #fff;
    }

    .input-box .icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #FF6633;
    }

    .remember-forgot {
        color: #fff;
        display: flex;
        justify-content: space-between;
        font-weight: 500;
        margin: 15px 0;
    }

    .remember-forgot a {
        color: #fff;
        text-decoration: none;
    }

    .remember-forgot a:hover {
        text-decoration: underline;
    }

    .buttum {
        width: 100%;
        height: 50px;
        border: none;
        border-radius: 40px;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 20px;
        transition: .5s;
        background-color: #FF6633;
        color: #fff;
        cursor: pointer;
    }

    .register-link {
        display: flex;
        justify-content: center;
        color: #fff;
        font-weight: 600;
    }

    .register-link a {
        text-decoration: none;
        color: #fff;
        margin-left: 5px;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
    <section class="home">
        <div class="login">
            <h2> Đăng nhập </h2>
            <form action="index.php?act=dangnhap" method="POST">
                <div class="input-box">
                    <input type="text" name="taikhoan" class="input" placeholder="Enter username" autocomplete="off">
                    <div class="error-message" style="color: red;">
                        <?php echo isset($thongbao) ? $thongbao : ''; ?>
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" name="matkhau" class="input" placeholder="Enter your password" autocomplete="off">
                </div>
                <div class="remember-forgot">
                    <label> <input type="checkbox"> Nhớ</label>
                    <a href="index.php?act=quenmk"> Quên Mật Khẩu </a>
                </div>
                <input class="buttum" type="submit" value="Đăng nhập" name="dangnhap">
                <div class="register-link">
                    <p> Not a member?</p>
                    <a href="index.php?act=dangky"> Đăng ký tài khoản</a>
                </div>
            </form>
            <!-- <p class="thongbao">
                <?php

                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </p> -->
        </div>
    </section>
</body>

</html>