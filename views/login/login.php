<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <div class="login-middle">
            <div class="login-inner">
                <div>
                    <img class="login-image" src="../../assets/image/logo.png" width="210" height="210" alt="logo" />
                </div>
                <div class="login-input-form">
                    <div class="login-title-div">
                        <p class="login-title">ลงชื่อเข้าสู่ระบบ</p>
                    </div>
                    <input class="login-input" type="text" placeholder="Tel"></input>
                    <div class="login-textfield-div">
                        <input class="login-input" type="password" placeholder="Password"></input>
                    </div>
                    <div class="login-suggest-text-div">
                        <p class="login-suggest-text">
                            กรุณาเข้าใช้งานด้วยรหัสผ่านของท่าน
                        </p>
                    </div>
                    <button class="login-button" type="submit">
                        เข้าสู่ระบบ
                    </button>
                    <div class="login-reset-password-div">
                        <p class="login-forgot-password-text">
                            ลืมรหัสผ่าน ? <span>&nbsp;&nbsp;</span>
                            <Link class="login-reset-password-text" to="/">
                            รีเซ็ตรหัสผ่าน
                            </Link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>