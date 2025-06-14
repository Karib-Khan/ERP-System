<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Login Form</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm">
            <div class="input-box">
                <input type="email" id="email" required>
                <label>Email</label>
                <span class="icon">📧</span>
            </div>
            <div class="input-box">
                <input type="password" id="password" required>
                <label>Password</label>
                <span class="icon">🔒</span>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
    <script src="<?php echo ROOT?>/assets/js/script.js"></script>
</body>
</html>