<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 300px;
            text-align: center;
            position: relative;
        }
        .login-container .avatar {
            width: 80px;
            height: 80px;
            background-color: #3b5998;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: -40px;
            left: calc(50% - 40px);
        }
        .login-container .avatar i {
            color: #fff;
            font-size: 40px;
        }
        .login-container h2 {
            margin: 0;
            padding: 0;
            font-size: 24px;
            color: #333;
        }
        .login-container .input-group {
            margin: 20px 0;
            position: relative;
        }
        .login-container .input-group input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #e7e7ff;
        }
        .login-container .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #3b5998;
        }
        .login-container .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }
        .login-container .options input {
            margin-right: 5px;
        }
        .login-container .options a {
            color: #333;
            text-decoration: none;
        }
        .login-container .login-btn {
            background-color: #3b5998;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username">
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password">
        </div>
        <div class="options">
            <label>
                <input type="checkbox"> Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div>
        <button class="login-btn">LOGIN</button>
    </div>
    
</body>
</html>



