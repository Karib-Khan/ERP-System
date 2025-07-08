<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Assign Task</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center p-6">

  <!-- Header -->
  <header class="w-full max-w-3xl mb-6">
        <a href="<?php echo ROOT ?>/admin">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
          ← Go Back
        </button>
      </a>
  </header>

  <main class="bg-white w-full max-w-3xl rounded-lg shadow p-8">
    <?php if (isset($_SESSION['message'])): ?>
      <div
        class="mb-6 p-4 rounded text-white <?php echo $_SESSION['message_type'] === 'error' ? 'bg-red-600' : 'bg-green-600' ?>"
        role="alert"
      >
        <?php echo htmlspecialchars($_SESSION['message']) ?>
      </div>
      <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <h1 class="text-2xl font-semibold mb-6 text-gray-700">Assign Task</h1>

    <form id="taskForm" method="post" action="<?php echo ROOT ?>/task" novalidate class="space-y-6">

      <div class="form-group">
        <label for="assigned_to" class="block text-gray-700 font-medium mb-1">Assign To</label>
        <input
          type="text"
          id="assigned_to"
          name="assigned_to"
          value="<?php echo isset($assigned_to) ? htmlspecialchars($assigned_to) : ''; ?>"
          readonly
          required
          class="w-full rounded border border-gray-300 px-4 py-2 bg-gray-100 cursor-not-allowed"
        />
        <small class="error-message text-red-700 text-sm mt-1 block"></small>
      </div>

      <div class="form-group">
        <label for="title" class="block text-gray-700 font-medium mb-1">Title <span class="text-red-700">*</span></label>
        <input
          type="text"
          id="title"
          name="title"
          placeholder="Enter task title"
          required
          class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#d7263d]"
        />
        <small class="error-message text-red-700 text-sm mt-1 block"></small>
      </div>

      <div class="form-group">
        <label for="description" class="block text-gray-700 font-medium mb-1">Description <span class="text-red-700">*</span></label>
        <textarea
          id="description"
          name="description"
          rows="4"
          placeholder="Describe the task"
          required
          class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#d7263d] resize-none"
        ></textarea>
        <small class="error-message text-red-700 text-sm mt-1 block"></small>
      </div>

      <div class="form-group">
        <label for="duration" class="block text-gray-700 font-medium mb-1">Duration (hours) <span class="text-red-700">*</span></label>
        <input
          type="number"
          id="duration"
          name="duration"
          min="0.1"
          step="0.1"
          placeholder="e.g. 2.5"
          required
          class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#d7263d]"
        />
        <small class="error-message text-red-700 text-sm mt-1 block"></small>
      </div>

      <button
        type="submit"
        class="w-full bg-[#d7263d] hover:bg-[#a50021] text-white font-semibold py-3 rounded shadow transition"
      >
        Assign Task
      </button>
    </form>

    <section id="result" aria-live="polite" class="mt-6 text-center text-gray-700"></section>
  </main>

  <script src="<?php echo ROOT ?>/assets/js/flashmessage.js"></script>
  <script src="<?php echo ROOT ?>/assets/css/assign_task.js"></script>
</body>
</html>
