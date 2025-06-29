<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Assign Task</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/assign_task.css" />
</head>
<header>
<a href="<?php echo ROOT?>/admin"><button class="go-back">Go Back</button></a>
</header>
<body>
<script src="<?php echo ROOT ?>/assets/js/flashmessage.js"></script>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert <?php echo $_SESSION['message_type'] ?>">
        <?php echo htmlspecialchars($_SESSION['message']) ?>
    </div>
    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>

    <main class="container">
        <h1 class="page-title">Assign Task</h1>
        <form id="taskForm" class="task-form" method="post" action="<?php echo ROOT?>/task" novalidate>
            
            <div class="form-group">
                <label for="assigned_to">Assign To</label>
                <input type="text" id="assigned_to" name="assigned_to"
                    value="<?php echo isset($assigned_to) ? htmlspecialchars($assigned_to) : ''; ?>"
                    readonly required />

                <small class="error-message"></small>
            </div>

            <div class="form-group">
                <label for="title">Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" placeholder="Enter task title" required />
                <small class="error-message"></small>
            </div>

            <div class="form-group">
                <label for="description">Description <span class="required">*</span></label>
                <textarea id="description" name="description" rows="4" placeholder="Describe the task" required></textarea>
                <small class="error-message"></small>
            </div>

            <div class="form-group">
                <label for="duration">Duration (hours) <span class="required">*</span></label>
                <input type="number" id="duration" name="duration" min="0.1" step="0.1" placeholder="e.g. 2.5" required />
                <small class="error-message"></small>
            </div>

           

            <button type="submit" class="btn-submit">Assign Task</button>
        </form>

        <section id="result" class="result" aria-live="polite"></section>
    </main>

    <script src="<?php echo ROOT?>/assets/css/assign_task.js"></script>
</body>
</html>
