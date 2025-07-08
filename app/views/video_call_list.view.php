<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Employee List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-6">

  <!-- Header -->
  <header class="mb-6 flex justify-start max-w-7xl mx-auto w-full">
  <a href="javascript:history.back()" class="inline-block">
  <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
    ← Go Back
  </button>
</a>

  </header>

  <main class="max-w-7xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">All Employees</h1>

    <!-- Filter Bar -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
      <input
        type="text"
        id="searchInput"
        placeholder="Search by name or email..."
        class="flex-grow px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-700 focus:border-red-700"
      />
      <select
        id="statusFilter"
        class="w-full md:w-48 px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-700 focus:border-red-700"
      >
        <option value="">All Status</option>
        <option value="active">Active</option>
        <option value="blocked">Blocked</option>
      </select>
    </div>

    <!-- Employee Table -->
    <div class="overflow-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-600">
          <tr>
            <th class="px-4 py-3 text-left font-medium">User ID</th>
            <th class="px-4 py-3 text-left font-medium">Department</th>
            <th class="px-4 py-3 text-left font-medium">Joined</th>
            <th class="px-4 py-3 text-left font-medium">Status</th>
            <th class="px-4 py-3 text-left font-medium">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach($data as $user): ?>
            <?php if($user['user_id'] !== $_SESSION['USER']['user_id']): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3"><?php echo htmlspecialchars($user['user_id']) ?></td>
                <td class="px-4 py-3"><?php echo htmlspecialchars($user['department']) ?></td>
                <td class="px-4 py-3"><?php echo htmlspecialchars($user['created_at']) ?></td>
                <td class="px-4 py-3">
                  <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                    <?php
                      $state = strtolower($user['state']);
                      echo $state === 'active' ? 'bg-green-100 text-green-800' :
                           ($state === 'blocked' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800');
                    ?>
                  ">
                    ● <?php echo htmlspecialchars($user['state']) ?>
                  </span>
                </td>
                <td class="px-4 py-3">
                  <a href="<?php echo ROOT ?>/videoCall/call/<?php echo htmlspecialchars($user['user_id']) ?>">
                    <button class="bg-blue-600 text-white px-4 py-1.5 rounded hover:bg-blue-700 transition">
                      Start Video Call
                    </button>
                  </a>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="<?php echo ROOT ?>/assets/js/employee_list.js"></script>
</body>
</html>
