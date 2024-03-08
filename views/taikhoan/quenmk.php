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

        .input-box {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
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
        }

        .input-box .icon {
            position: absolute;
            top: 50%;
            left: 10px; /* Adjusted left position */
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
    </style>
</head>
<body>  
    <section>
        <div class="login">
            <h2> Quên Mật Khẩu </h2>
            <form action="index.php?act=quenmk" method="POST">
                <div class="input-box">
                    <i class="icon">&#xf007;</i>
                    <input type="text" name="email" class="input" placeholder="Enter user mail" autocomplete="off" required>
                </div>
                <input class="button" type="submit" value="Gửi" name="guiemail">
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
