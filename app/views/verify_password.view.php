<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Verify Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-6">

  
  <main class="w-full max-w-md bg-white rounded-lg shadow p-8">
    <h1 class="text-2xl font-semibold mb-2 text-gray-800">Verify Password</h1>
    <p class="mb-6 text-gray-600">We’ve sent you a verification code. Please enter it.</p>

    <form id="verifyForm" method="post" action="<?php echo ROOT ?>/verification/verifyCode" class="space-y-4">
      <input
        type="text"
        id="verificationCode"
        name="verificationCode"
        placeholder="Enter verification code"
        required
        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:border-yellow-700"
      />
      <button
        type="submit"
        class="w-full bg-red-700 text-white py-2 rounded font-semibold hover:bg-green-800 transition"
      >
        Submit
      </button>
      <a href="javascript:history.back()" class="inline-block">
  <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
    ← Go Back
  </button>
</a>

    </form>
  </main>

  <script src="<?php echo ROOT ?>/assets/js/verify_script.js"></script>
</body>
</html>
