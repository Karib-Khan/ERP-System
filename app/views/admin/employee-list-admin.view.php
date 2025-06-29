<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employee List</title>
  <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/employee_list.css" />
</head>
<body>

  <div class="employee-container">
    <h1>All Employees</h1>

    <!-- Filter Bar -->
    <div class="filter-bar">
      <input type="text" id="searchInput" placeholder="Search by name or email...">
      <select id="statusFilter">
        <option value="">All Status</option>
        <option value="active">Active</option>
        <option value="blocked">Blocked</option>
      </select>
      <a href="<?php echo ROOT ?>/register">
                <button class="details-btn">Add New User</button>
      </a>
    </div>

    <!-- Table -->
    <table class="employee-table">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Department</th>
          <th>Status</th>
          <th>Joined</th>
        </tr>
      </thead>
      <tbody>
         <?php foreach($data as $user):?>
        <tr>
          <td><?php echo htmlspecialchars($user['user_id']) ?></td>
          <td><?php echo htmlspecialchars($user['department']) ?></td></td>
          <td><?php echo htmlspecialchars($user['created_at']) ?></td></td>
          <td class="status"><span class="badge <?php echo strtolower($user['state']) ?>"></span><?php echo htmlspecialchars($user['state']) ?></td>
          <td><a href="<?php echo ROOT ?>/admin/userProfile/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="details-btn">Show Details</button>
              </a>
              <a href="<?php echo ROOT ?>/task/assign/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="task-btn">Assign Task</button>
              </a>
              <a href="<?php echo ROOT ?>/admin/userProfile/<?php echo htmlspecialchars($user['user_id']) ?>">
                <button class="block-btn">Block User</button>
              </a>

        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/employee_list.js"></script>
</body>
</html>
