<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex justify-center items-start p-6">

  <div class="bg-white max-w-4xl w-full rounded-lg shadow-lg p-8">
    <header class="mb-8 flex items-center justify-between">
     
      <h1 class="text-3xl font-semibold text-blue-700">Profile</h1>
      <div></div> <!-- empty for spacing -->
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6 text-gray-700 text-lg">
      <p><strong class="font-medium">Full Name:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->name) ?></span></p>
      <p><strong class="font-medium">Age:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->age) ?></span></p>
      <p><strong class="font-medium">Date of Birth:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->dob) ?></span></p>
      <p><strong class="font-medium">Nationality:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->nationality) ?></span></p>
      <p><strong class="font-medium">Marital Status:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->maritial_status) ?></span></p>
      <p><strong class="font-medium">NID/Passport:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->nid) ?></span></p>
      <p><strong class="font-medium">Phone:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->phone) ?></span></p>
      <p><strong class="font-medium">Email:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->email) ?></span></p>
      <p class="sm:col-span-2"><strong class="font-medium">Address:</strong> <span class="ml-2"><?php echo htmlspecialchars($profile->address) ?></span></p>
    </div>

    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?php echo ROOT ?>/verification" class="w-full sm:w-auto">
        <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow transition">
          Reset Password
        </button>
      </a>
      <a href="<?php echo ROOT ?>/userpdf/generate/<?php echo $profile->user_id ?>" target="_blank" class="w-full sm:w-auto">
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
          Print Details
        </button>
      </a>
      <button 
        onclick="history.back()" 
        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition"
      >
        ← Go Back
      </button>

    </div>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/profile_script.js"></script>
</body>
</html>
