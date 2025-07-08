<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employee List</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="bg-gray-50 min-h-screen">

  <!-- Header -->
  <header class="p-4 bg-white shadow flex justify-between items-center">
    <a href="<?php echo ROOT?>/admin">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
        ← Go Back
      </button>
    </a>
    <h1 class="text-xl font-semibold text-gray-700">All Employees</h1>
  </header>

  <div class="employee-container max-w-7xl mx-auto px-6">
    <h1 class="text-2xl font-bold text-gray-700 mb-4">All Employees</h1>

    <!-- Filter Bar -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
      <input
        type="text"
        id="searchInput"
        placeholder="Search by name or email..."
        class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500"
      />
      <select
        id="statusFilter"
        class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded focus:ring-indigo-500 focus:border-indigo-500"
      >
        <option value="">All Status</option>
        <option value="active">Active</option>
        <option value="blocked">Blocked</option>
      </select>
      <a href="<?php echo ROOT ?>/register">
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition w-full md:w-auto">
          + Add New User
        </button>
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-auto rounded-lg shadow bg-white">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-600">
          <tr>
            <th class="px-6 py-3 text-left font-medium">User ID</th>
            <th class="px-6 py-3 text-left font-medium">Department</th>
            <th class="px-6 py-3 text-left font-medium">Joined</th>
            <th class="px-6 py-3 text-left font-medium">Status</th>
            <th class="px-6 py-3 text-left font-medium">Details</th>
            <th class="px-6 py-3 text-left font-medium">Task</th>
            <th class="px-6 py-3 text-left font-medium">Toggle</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach($data as $user):?>
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4"><?php echo htmlspecialchars($user['user_id']) ?></td>
            <td class="px-6 py-4"><?php echo htmlspecialchars($user['department']) ?></td>
            <td class="px-6 py-4"><?php echo htmlspecialchars($user['created_at']) ?></td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center gap-1 text-sm font-medium px-2.5 py-0.5 rounded-full
                <?php echo strtolower($user['state']) === 'active'
                  ? 'bg-green-100 text-green-800'
                  : (strtolower($user['state']) === 'blocked'
                    ? 'bg-red-100 text-red-800'
                    : 'bg-gray-100 text-gray-800') ?>">
                ● <?php echo htmlspecialchars($user['state']) ?>
              </span>
            </td>
            <td class="px-6 py-4">
              <a href="<?php echo ROOT ?>/admin/userProfile/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="bg-blue-600 text-white px-4 py-1.5 rounded hover:bg-blue-700 transition">
                  Show Details
                </button>
              </a>
            </td>
            <td class="px-6 py-4">
              <a href="<?php echo ROOT ?>/task/assign/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="bg-purple-600 text-white px-4 py-1.5 rounded hover:bg-purple-700 transition">
                  Assign Task
                </button>
              </a>
            </td>
            <td class="px-6 py-4">
              <?php if ($user['state'] === 'Active'): ?>
              <a href="<?php echo ROOT ?>/admin/toggleUserStatus/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="bg-red-600 text-white px-4 py-1.5 rounded hover:bg-red-700 transition">
                  Block User
                </button>
              </a>
              <?php else: ?>
              <a href="<?php echo ROOT ?>/admin/toggleUserStatus/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="bg-green-600 text-white px-4 py-1.5 rounded hover:bg-green-700 transition">
                  Activate User
                </button>
              </a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/employee_list.js"></script>
</body>
</html>
