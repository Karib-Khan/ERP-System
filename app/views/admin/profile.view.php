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
                <p><strong>Full Name:</strong> <span><?php echo htmlspecialchars($profile->name) ?></span></p>
                <p><strong>Age: </strong><span><?php echo htmlspecialchars($profile->age) ?></span></p></p>
                <p><strong>Date of Birth: </strong><span><?php echo htmlspecialchars($profile->dob) ?></span></p></p>
                <p><strong>Nationality: </strong><span><?php echo htmlspecialchars($profile->nationality) ?></span></p></p>
                <p><strong>Marital Status: </strong> <span><?php echo htmlspecialchars($profile->maritial_status) ?></span></p></p>
                <p><strong>NID/Passport: </strong><span><?php echo htmlspecialchars($profile->nid) ?></span></p></p>
                <p><strong>Phone: </strong> <span><?php echo htmlspecialchars($profile->phone) ?></span></p></p>
                <p><strong>Email: </strong> <span><?php echo htmlspecialchars($profile->email) ?></span></p></p>
                <p><strong>Address: </strong><span> <?php echo htmlspecialchars($profile->address) ?></span></p></p>
                
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