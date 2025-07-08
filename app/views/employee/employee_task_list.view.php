<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Task List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-6">

  <!-- Go Back -->
  <header class="mb-6 flex justify-start w-full max-w-6xl mx-auto">
    <a href="<?php echo ROOT ?>/employee">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
        ← Go Back
      </button>
    </a>
  </header>

  <!-- Main Container -->
  <main class="max-w-6xl mx-auto bg-white rounded-lg shadow p-6 space-y-6">

    <h1 class="text-2xl md:text-3xl font-semibold text-gray-800">All Tasks</h1>

    <!-- Filter Bar -->
    <div class="flex flex-col md:flex-row gap-4">
      <input
        type="text"
        id="searchInput"
        placeholder="Search by name or email..."
        class="w-full md:flex-1 px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-indigo-600 focus:outline-none"
      />
     
    </div>

    <!-- Task Table -->
    <div class="overflow-x-auto rounded border border-gray-200">
      <table class="min-w-full text-sm divide-y divide-gray-200">
        <thead class="bg-indigo-100 text-indigo-800 font-semibold text-left">
          <tr>
            <th class="px-4 py-3">Task ID</th>
            <th class="px-4 py-3">Assigned To</th>
            <th class="px-4 py-3">Assigned By</th>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Description</th>
            <th class="px-4 py-3">Due Date</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach($tasks as $task): ?>
          <tr class="hover:bg-indigo-50 transition">
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['task_id']) ?></td>
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['assigned_to']) ?></td>
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['assigned_by']) ?></td>
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['task_title']) ?></td>
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['description']) ?></td>
            <td class="px-4 py-3"><?php echo htmlspecialchars($task['due_date']) ?></td>
            <td class="px-4 py-3">
              <a href="<?php echo ROOT ?>/task/delete/<?php echo htmlspecialchars($task['task_id']) ?>">
                <button
                  type="button"
                  class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                  onclick="return confirm('Are you sure you want to delete this task?');"
                >
                  Delete
                </button>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </main>

  <script src="<?php echo ROOT ?>/assets/js/employee_list.js"></script>
</body>
</html>
