<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employee Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">

  <!-- Sidebar -->
  <nav class="w-64 bg-white shadow-md h-screen px-6 py-8 fixed top-0 left-0 z-10">
    <div class="text-2xl font-bold text-indigo-600 mb-8">Employee</div>
    <ul class="space-y-4 text-gray-700">
      <li><a href="<?php echo ROOT?>/employee/dashboard" class="block py-2 px-3 rounded hover:bg-indigo-100 font-medium <?php echo ($_SERVER['REQUEST_URI'] == '/employee/dashboard') ? 'bg-indigo-200 text-indigo-800' : '' ?>">Home</a></li>
      <li><a href="<?php echo ROOT?>/employee/profile" class="block py-2 px-3 rounded hover:bg-indigo-100">Profile</a></li>
      <li><a href="#" class="block py-2 px-3 rounded hover:bg-indigo-100">Announcements</a></li>
      <li><a href="<?php echo ROOT?>/notification" class="block py-2 px-3 rounded hover:bg-indigo-100">Notifications</a></li>
      <li><a href="<?php echo ROOT?>/task/ShowTaskById/<?php echo $_SESSION['USER']['user_id']?>" class="block py-2 px-3 rounded hover:bg-indigo-100">Task List</a></li>
      <li><a href="<?php echo ROOT?>/logout" class="block py-2 px-3 rounded hover:bg-red-100 text-red-600">Logout</a></li>
    </ul>
  </nav>

  <!-- Main Content -->
  <main class="flex-1 ml-64 p-8">

    <!-- Header -->
    <header class="flex justify-end items-center mb-6">
      <div class="flex items-center space-x-3">
        <img src="<?php echo ROOT?>/assets/img/admin.jpg" alt="User" class="w-10 h-10 rounded-full border-2 border-indigo-500">
        <div class="text-sm font-medium text-gray-800">
          <?php echo $_SESSION['USER']['user_id']?>
          <span class="ml-2 text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">Online</span>
        </div>
      </div>
    </header>

    <!-- Overview Cards -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <p class="text-sm text-gray-500">Welcome</p>
        <p class="text-2xl font-bold text-indigo-600">2500</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <p class="text-sm text-gray-500">Avg Time</p>
        <p class="text-2xl font-bold text-indigo-600">123.50</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <p class="text-sm text-gray-500">Collections</p>
        <p class="text-2xl font-bold text-indigo-600">1805</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <p class="text-sm text-gray-500">Comments</p>
        <p class="text-2xl font-bold text-indigo-600">54</p>
      </div>
    </section>

    <!-- Social Stats -->
    <section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
      <?php
        $stats = [
          'Friends' => '35k', 'Feeds' => '128', 'Followers' => '584k', 'Tweets' => '978',
          'Contacts' => '783+', 'Feeds' => '365', 'Followers' => '450', 'Circles' => '57'
        ];
        foreach ($stats as $label => $value): ?>
          <div class="bg-white p-4 rounded-lg shadow text-center">
            <p class="text-sm text-gray-600"><?php echo $label ?></p>
            <p class="text-xl font-semibold text-indigo-700"><?php echo $value ?></p>
          </div>
      <?php endforeach; ?>
    </section>

  </main>

 

</body>
</html>
