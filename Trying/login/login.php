<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">

    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" />



</head>

<body>

    <div class="login">
        <div class="polinema-1">
        </div>
        <div class="rectangle-parent">
            <div class="group-child">
            </div>
            <div class="frame-parent">
                <img class="group-item" alt="" src="../img/icon/usersmall.png">
                <div class="group-inner">
                </div>
                <div class="username">Username</div>
            </div>
            <div class="frame-group">
                <img class="group-item" alt="" src="../img/icon/Pass.png">
                <div class="group-inner">
                </div>
                <div class="username">Password</div>
            </div>
            <div class="rectangle-group">
                <div class="group-child1">
                </div>
                <div class="login1">LOGIN</div>
            </div>
            <div class="forgot-password">Forgot Password?</div>
            <div class="remember-me-parent">
                <div class="remember-me">Remember me</div>
                <div class="group-child2">
                </div>
            </div>
        </div>
        <img class="login-child" alt="" src="../img/icon/user.png">

    </div>

</body>

</html>
<?php
include '../connection.php';
$stmt = $conn->query("SELECT * FROM pemesanan");
        $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>