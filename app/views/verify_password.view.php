<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Password</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/verify_styles.css">
</head>
<body>
<header><a href="<?php echo ROOT?>/admin"><button class="go-back">Go Back</button></a></header>
    <div class="verify-container">
        <h1>Verify Password</h1>
        <p>We’ve sent you a verification code. Please enter it.</p>
        <form id="verifyForm" method="post" action="<?php echo ROOT?>/verification/verifyCode">
            <input type="text" id="verificationCode" name="verificationCode" placeholder="Enter verification code" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="<?php echo ROOT?>/assets/js/verify_script.js"></script>
</body>
</html>