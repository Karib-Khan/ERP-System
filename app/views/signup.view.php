<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>New User Registration</title>
  <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/signup.css">
</head>
<body>
  <header><a href="<?php echo ROOT?>/admin"><button class="go-back">Go Back</button></a></header>
<?php if (!empty($_SESSION['message'])): ?>
  <div class="flash-message <?= $_SESSION['message_type'] == 'success' ? 'success-msg' : 'error-msg' ?>">
    <?= htmlspecialchars($_SESSION['message']) ?>
  </div>
  <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>



  <div class="form-container">
    <h2>New User Registration</h2>

    <form id="registrationForm" method="post" action="<?= ROOT ?>/register">

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="1" max="120" required />
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required />
      </div>

      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="" disabled selected hidden></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="nationality">Nationality</label>
        <input type="text" id="nationality" name="nationality" required />
      </div>

      <div class="form-group">
        <label for="marital">Marital Status</label>
        <select id="marital" name="maritial_status" required>
          <option value="" disabled selected hidden></option>
          <option value="married">Married</option>
          <option value="single">Single</option>
          <option value="widowed">Widowed</option>
          <option value="divorced">Divorced</option>
        </select>
      </div>

      <div class="form-group">
        <label for="religion">Religion</label>
        <select id="religion" name="religion" required>
          <option value="" disabled selected hidden></option>
          <option value="islam">Islam</option>
          <option value="hinduism">Hinduism</option>
          <option value="christianity">Christianity</option>
          <option value="buddhism">Buddhism</option>
          <option value="other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required />
      </div>

      <div class="form-group">
        <label for="nid">NID/Passport</label>
        <input type="text" id="nid" name="nid" required />
      </div>

      <div class="form-group">
        <label for="blood">Blood Group</label>
        <input type="text" id="blood" name="blood_group" required />
      </div>

      <div class="full-width">
        <label>Role</label>
        <div class="role-options">
            <label>
                <input type="radio" name="role" value="Administration" required />
                <span class="custom-radio">Admin</span>
            </label>
            <label>
                <input type="radio" name="role" value="Employee" />
                <span class="custom-radio">Employee</span>
            </label>
            <label>
                <input type="radio" name="role" value="HR" />
                <span class="custom-radio">HR</span>
            </label>
        </div>
      </div>

      <button class="submit-btn" type="submit">Register</button>

    </form>
  </div>

  <script src="<?php echo ROOT?>/assets/js/signup.js"></script>
</body>
</html>
