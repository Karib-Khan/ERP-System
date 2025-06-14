<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Stylish Signup Form</title>
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/signup.css" />
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form id="signupForm" method="post">
            <?php if (!empty($errors)) : ?>
                <?php foreach ($errors as $message): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" id="fullname" name="name" required />
                <label>Full Name</label>
                <span class="icon">👤</span>
            </div>

            <div class="input-box">
                <input type="number" id="age" name="age" required min="1" max="120" />
                <label>Age</label>
                <span class="icon">🎂</span>
            </div>

            <div class="input-box">
                <input type="email" id="email" name="email" required />
                <label>Email</label>
                <span class="icon">📧</span>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" required />
                <label>Password</label>
                <span class="icon">🔒</span>
            </div>

            <div class="terms">
                <label>
                    <input type="checkbox" required /> I agree to the <a href="#">Terms & Conditions</a>
                </label>
            </div>

            <button type="submit" name="signup">Sign Up</button>

            <div class="login-link">
                <p>Already have an account? <a href="#">Login</a></p>
            </div>
        </form>
    </div>

    <script src="<?php echo ROOT ?>/assets/js/signup.js"></script>
</body>
</html>
