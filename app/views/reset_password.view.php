<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reset Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-6">

 

  <main class="reset-container bg-white p-8 rounded-lg shadow max-w-md w-full">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Reset Password</h1>
    
    <form id="resetForm" method="post" action="resetpassword" class="space-y-6">
      <input
        type="password"
        id="newPassword"
        name="password"
        placeholder="New Password"
        required
        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-red-700"
      />
      <input
        type="password"
        id="confirmPassword"
        name="confirm_password"
        placeholder="Confirm Password"
        required
        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-red-700"
      />
      <button
        type="submit"
        class="w-full bg-red-700 text-white font-semibold py-3 rounded hover:bg-red-800 transition"
      >
        Reset
      </button>

      <a href="javascript:history.back()" class="inline-block">
  <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
    ← Go Back
  </button>
</a>

    </form>
    
  </main>

  <script src="<?php echo ROOT ?>/assets/js/reset_script.js"></script>
</body>
</html>
