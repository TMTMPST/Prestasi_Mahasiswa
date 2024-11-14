<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>

<body>
    <div class="avatar">
        <img src="img/akun.png" alt="User Icon" class="user-icon">
    </div>
    <div class="container">
        <form action="" method="post" class="login-form">
            <div class="input-group">
                <label for="username" class="input-icon">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password" class="input-icon">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"  required>
            </div>
            
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
  
            
            <button type="submit" class="login">LOGIN</button>
        </form>
    </div>
</body>

</html>
