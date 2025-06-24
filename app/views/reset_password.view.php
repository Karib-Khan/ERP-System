<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/reset_styles.css">
</head>
<body>
    
    <div class="reset-container">
        <h1>Reset Password</h1>
        <form id="resetForm" method="post" action="resetpassword">
            <input type="password" id="newPassword" name="password" placeholder="New Password" required>
            <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Reset</button>
        </form>
    </div>
    <script src="<?php echo ROOT?>/assets/js/reset_script.js"></script>
</body>
</html>