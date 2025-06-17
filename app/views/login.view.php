<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Login</title>
  <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/login.css" />
</head>
<body>
<?php if (!empty($_SESSION['message'])): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        showFlashMessage("<?= addslashes($_SESSION['message']) ?>", "<?= $_SESSION['message_type'] ?? 'info' ?>");
    });
</script>
<?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>


<div id="flash-message-container" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%);
    z-index: 1000; display: none; min-width: 300px; padding: 10px 20px; border-radius: 5px; text-align: center; font-weight: bold;">
</div>



  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm" method="post" action="<?php echo ROOT?>/login">
    <div class="role-select">
    <label>Select Role:</label>
    <div class="role-options">
      <input type="radio" id="admin" name="role" value="admin" hidden />
      <label for="admin" class="role-box">Admin</label>

      <input type="radio" id="employee" name="role" value="employee" hidden />
      <label for="employee" class="role-box">Employee</label>

      <input type="radio" id="hr" name="role" value="hr" hidden />
      <label for="hr" class="role-box">HR</label>
    </div>
  </div>

      <div class="input-group">
        <label for="userId">User ID</label>
        <input type="text" id="userId" name="userId" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>



      <button type="submit" class="login-btn">Login</button>

      <p class="signup-link">Forgot Password? <a href="<?php echo ROOT ?>/register">Click Here</a></p>
    </form>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/login.js"></script>
  <script src="<?php echo ROOT ?>/assets/js/flashmessage.js"></script>

</body>
</html>
