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
            <a href="<?php echo ROOT?>/employee"><button class="go-back">Go Back</button></a>
        </header>
        <div class="profile-content">
            <h1>Profile</h1>
            <div class="profile-details">
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($profile->name) ?></p>
                <p><strong>Age:</strong><?php echo htmlspecialchars($profile->age) ?></p></p>
                <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($profile->dob) ?></p></p>
                <p><strong>Nationality:</strong> <?php echo htmlspecialchars($profile->nationality) ?></p></p>
                <p><strong>Marital Status:</strong> <?php echo htmlspecialchars($profile->maritial_status) ?></p></p>
                <p><strong>NID/Passport:</strong> <?php echo htmlspecialchars($profile->nid) ?></p></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($profile->phone) ?></p></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($profile->email) ?></p></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($profile->address) ?></p></p>
                
            </div>
            <div class="profile-actions">
                <a href="<?php echo ROOT?>/verification"><button class="reset-password">Reset Password</button></a>
                <a href="<?php echo ROOT ?>/userpdf/generate/<?php echo $profile->user_id ?>" target="_blank"><button class="edit-details">Print Details</button></a>
            </div>
        </div>
    </div>
    <script src="<?php echo ROOT?>/assets/js/profile_script.js"></script>
</body>
</html>