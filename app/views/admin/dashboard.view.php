<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/dashboard.css">
</head>
<body>

    
    <div class="dashboard">
        <nav class="sidebar">
            <div class="logo">Admin</div>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="<?php echo ROOT?>/admin/profile">Profile</a></li>
                <li><a href="<?php echo ROOT?>/admin/showAllemployes">Employee List</a></li>
                <li><a href="<?php echo ROOT?>/register">Add User</a></li>
                <li><a href="#">Post Announcement</a></li>
                <li><a href="<?php echo ROOT?>/task/showTasks">Task List</a></li>
                <li><a href="#">Video Call</a></li>
                <li><a href="<?php echo ROOT?>/logout">Logout</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <header>
                <div class="user-info">
                    <img src="https://via.placeholder.com/40" alt="User">
                    <span>John Doe <span class="status">Online</span></span>
                </div>
                <div class="header-icons">
                    <span class="icon">🔔</span>
                    <span class="icon">💬</span>
                    <span class="icon">?</span>
                </div>
            </header>
            <section class="cards">
                <div class="card">Welcome <span>2500</span></div>
                <div class="card">Avg Time <span>123.50</span></div>
                <div class="card">Collections <span>1805</span></div>
                <div class="card">Comments <span>54</span></div>
            </section>
            <section class="social-stats">
                <div class="stat-card">Friends <span>35k</span></div>
                <div class="stat-card">Feeds <span>128</span></div>
                <div class="stat-card">Followers <span>584k</span></div>
                <div class="stat-card">Tweets <span>978</span></div>
                <div class="stat-card">Contacts <span>783+</span></div>
                <div class="stat-card">Feeds <span>365</span></div>
                <div class="stat-card">Followers <span>450</span></div>
                <div class="stat-card">Circles <span>57</span></div>
            </section>
            <section class="chart">
                <canvas id="myChart"></canvas>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo ROOT?>/assets/js/dashboard.js"></script>
</body>
</html>