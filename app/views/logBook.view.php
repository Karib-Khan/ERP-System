<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Log Book Notifications</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-6">

<header class="mb-6 flex justify-start w-full max-w-6xl mx-auto">
    <a href="<?php echo ROOT ?>/employee">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
        ← Go Back
      </button>
    </a>
  </header>

  <main class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">

    <h1 class="text-2xl font-semibold mb-6 text-gray-700">Log Book Notifications</h1>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
        <thead class="bg-gray-100 text-gray-600 uppercase">
          <tr>
            <th class="px-6 py-3">Caller</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3">Created At</th>
            <th class="px-6 py-3">Room</th>
            <th class="px-6 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach($logbook as $log): ?>
            <?php
              $status = strtolower($log->status);
              $badgeClass = "inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold ";
              if ($status === "pending") $badgeClass .= "bg-yellow-100 text-yellow-800";
              elseif ($status === "joined") $badgeClass .= "bg-green-100 text-green-800";
              elseif ($status === "ended") $badgeClass .= "bg-gray-200 text-gray-700";
              else $badgeClass .= "bg-gray-100 text-gray-700";
              $createdAt = date('M d, Y H:i', strtotime($log->created_at));
            ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4"><?php echo htmlspecialchars($log->caller_id) ?></td>
              <td class="px-6 py-4"><span class="<?= $badgeClass ?>"><?= ucfirst($status) ?></span></td>
              <td class="px-6 py-4"><?php echo $createdAt ?></td>
              <td class="px-6 py-4"><?php echo htmlspecialchars($log->room_name ?? '-') ?></td>
              <td class="px-6 py-4 space-x-2">
                <?php if($status === 'pending'): ?>
                  <a href="<?php echo ROOT ?>/videoCall/call/<?php echo htmlspecialchars($log->caller_id) ?>">
                    <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Join Call</button>
                  </a>
                  <a href="<?php echo ROOT ?>/Notification/join/<?php echo htmlspecialchars($log->room_name) ?>">
                    <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Mark as Joined</button>
                  </a>
                <?php else: ?>
                  <span class="text-gray-500 italic">No Actions</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </main>

</body>
</html>
