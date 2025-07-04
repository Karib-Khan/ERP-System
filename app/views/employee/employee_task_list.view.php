<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task List</title>
  <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/employee_list.css" />
</head>
<body>
<header style="margin-bottom: 24px; display: flex; justify-content: flex-start; width: 100%;">
  <a href="<?php echo ROOT?>/employee" style="text-decoration: none;">
    <button style="
      background: linear-gradient(90deg, #d7263d 60%, #a50021 100%);
      border: none;
      border-radius: 30px;
      padding: 10px 28px;
      font-size: 1rem;
      font-weight: 700;
      color: #fff;
      cursor: pointer;
      box-shadow: 0 6px 20px rgba(215, 38, 61, 0.4);
      transition: background 0.3s ease, transform 0.2s ease;
      letter-spacing: 1px;
    "
    onmouseover="this.style.background='linear-gradient(90deg, #a50021 60%, #d7263d 100%)'; this.style.transform='translateY(-3px) scale(1.05)';"
    onmouseout="this.style.background='linear-gradient(90deg, #d7263d 60%, #a50021 100%)'; this.style.transform='none';"
    >
      Go Back
    </button>
  </a>
</header>
  <div class="employee-container">
    <h1>All Tasks</h1>

    <!-- Filter Bar -->
    <div class="filter-bar">
      <input type="text" id="searchInput" placeholder="Search by name or email...">
      <select id="statusFilter">
        <option value="">All Status</option>
        <option value="active">Active</option>
        <option value="blocked">Blocked</option>
      </select>
    </div>

    <!-- Table -->
    <table class="employee-table">
      <thead>
        <tr>
          <th>Task ID</th>
          <th>Assigned TO</th>
          <th>Assigned By</th>
          <th>Title</th>
          <th>Description</th>
          <th>Due date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
         <?php foreach($tasks as $task):?>
        <tr>
          <td><?php echo htmlspecialchars($task['task_id']) ?></td>
          <td><?php echo htmlspecialchars($task['assigned_to']) ?></td>
          <td><?php echo htmlspecialchars($task['assigned_by']) ?></td>
          <td><?php echo htmlspecialchars($task['task_title']) ?></td>
          <td><?php echo htmlspecialchars($task['description']) ?></td>
          <td><?php echo htmlspecialchars($task['due_date']) ?></td>
          <td><a href="<?php echo ROOT ?>/task/delete/<?php echo ($task['task_id']) ?>">
                <button class="block-btn">Delete Task</button>
          </a></td>
          
        </tr>
        <?php endforeach;?>
        
      </tbody>
    </table>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/employee_list.js"></script>
</body>
</html>
