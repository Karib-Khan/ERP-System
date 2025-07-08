<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">

  <!-- Flash Message Container -->
  <div id="flash-message-container" class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 hidden min-w-[300px] rounded-md px-6 py-3 text-center font-semibold text-white"></div>

  <div class="login-container bg-white shadow-lg rounded-lg max-w-md w-full p-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Login</h2>

    <form id="loginForm" method="post" action="<?php echo ROOT ?>/login" class="space-y-6">

      <!-- Role Select -->
      <fieldset>
        <legend class="text-gray-700 font-medium mb-3">Select Role:</legend>
        <div class="flex gap-4 justify-center">
          <?php 
            $roles = ['admin' => 'Admin', 'employee' => 'Employee', 'hr' => 'HR'];
            foreach ($roles as $value => $label): 
          ?>
            <div>
              <input 
                type="radio" 
                id="role_<?= $value ?>" 
                name="role" 
                value="<?= $value ?>" 
                class="hidden peer" 
                required 
              />
              <label 
                for="role_<?= $value ?>" 
                class="cursor-pointer rounded-lg border border-gray-300 px-5 py-3 text-gray-700 font-medium
                       peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600
                       transition select-none block text-center"
              >
                <?= $label ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      </fieldset>

      <!-- User ID -->
      <div>
        <label for="userId" class="block text-gray-700 font-medium mb-1">User ID</label>
        <input
          type="text"
          id="userId"
          name="userId"
          required
          class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
          autocomplete="username"
        />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600"
          autocomplete="current-password"
        />
      </div>

      <!-- Submit Button -->
      <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded shadow transition"
      >
        Login
      </button>

      <p class="text-center text-gray-600 mt-4">
        Forgot Password? 
        <a href="<?php echo ROOT ?>/register" class="text-blue-600 hover:underline font-semibold">Click Here</a>
      </p>

    </form>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/flashmessage.js"></script>

  <?php if (!empty($_SESSION['message'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      showFlashMessage("<?= addslashes($_SESSION['message']) ?>", "<?= $_SESSION['message_type'] ?? 'info' ?>");
    });
  </script>
  <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
  <?php endif; ?>
</body>
</html>
