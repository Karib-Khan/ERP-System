<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/profile_styles.css">
</head>
<body>
    <div class="profile-container">
        <header>
            <a href="<?php echo ROOT?>/admin"><button class="go-back">Go Back</button></a>
        </header>
        <div class="profile-content">
            <h1>Profile</h1>
            <div class="profile-details">
                <p><strong>Full Name:</strong> John Doe</p>
                <p><strong>Age:</strong> 30</p>
                <p><strong>Date of Birth:</strong> 1995-03-15</p>
                <p><strong>Nationality:</strong> American</p>
                <p><strong>Marital Status:</strong> Single</p>
                <p><strong>NID/Passport:</strong> A12345678</p>
                <p><strong>Phone:</strong> +1-234-567-8900</p>
                <p><strong>Email:</strong> john.doe@example.com</p>
                <p><strong>Address:</strong> 123 Main St, New York, NY</p>
                <p><strong>Blood Group:</strong> O+</p>
            </div>
            <div class="profile-actions">
                <a href="<?php echo ROOT?>/verification"><button class="reset-password">Reset Password</button></a>
                <a href=""><button class="edit-details">Edit Details</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo ROOT?>/assets/js/profile_script.js"></script>
</body>
</html>