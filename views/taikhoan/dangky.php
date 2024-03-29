<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
p{
    color: red;
}   
        section {
            padding-top: 100px;
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('./media/pexels-craig-adderley-1563356.jpg') no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            position: relative;
            width: 400px; /* Adjusted width */
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login h2 {
            text-align: center;
            color: #FF6633;
            font-size: 2em;
            margin-bottom: 20px; /* Added margin */
        }

       

        .input-box .input {
            width: 100%;
            height: 40px; /* Adjusted height */
            border: 2px solid #FF6633;
            border-radius: 40px;
            background: transparent;
            outline: none;
            padding: 0 20px;
            color: #fff;
            margin-bottom: 10px;
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

        .button {
            width: 100%;
            height: 40px; /* Adjusted height */
            border: 2px solid #FF6633;
            border-radius: 40px;
            font-size: 16px; /* Adjusted font size */
            font-weight: 600; /* Adjusted font weight */
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
            margin-top: 20px; /* Added margin */
        }

        .register-link a {
            text-decoration: none;
            color: #fff;
            margin-left: 5px;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
        .form {
            margin-top: 50px;
        }
   
    </style>
    <script>
    // Cuộn trang đến đầu phần header
    window.scrollTo(0, 0);
</script>
</head>
<body>  
    <section>
        <div class="login">
            <h2> Đăng Ký </h2>
            <form action="index.php?act=dangky" class="form " method="POST">
            <div class="input-box">
                <input type="text" name="user" class="input" placeholder="Enter user name" autocomplete="off">
            </div>
            <?php if(isset($errors['user'])): ?>
                <p class="error"><?php echo $errors['user']; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" name="ten" class="input" placeholder="Enter name" autocomplete="off">
            </div>
            <?php if(isset($errors['ten'])): ?>
                <p class="error"><?php echo $errors['ten']; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="password" name="pass" class="input" placeholder="Enter your password" autocomplete="off">
            </div>
            <?php if(isset($errors['pass'])): ?>
                <p class="error"><?php echo $errors['pass']; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="email" name="email" class="input" placeholder="Enter your email" autocomplete="off">
            </div>
            <?php if(isset($errors['email'])): ?>
                <p class="error"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="tel" name="tel" class="input" placeholder="Enter your phone" autocomplete="off">
            </div>
            <?php if(isset($errors['tel'])): ?>
                <p class="error"><?php echo $errors['tel']; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <input type="text" name="address" class="input" placeholder="Enter your address" autocomplete="off">
            </div>
            <?php if(isset($errors['address'])): ?>
                <p class="error"><?php echo $errors['address']; ?></p>
            <?php endif; ?>
            <input class="button" type="submit" value="Đăng ký ngay" name="dangky">
            <div class="register-link">
                <p>Not a member?</p>
                <a href="index.php?act=dangnhap">Bạn đã có tài khoản</a>
            </div>
        </form>
            <p class="thongbao">
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </p>
        </div>
    </section>
</body>
</html>
