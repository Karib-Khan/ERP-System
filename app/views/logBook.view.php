<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Log Book Notifications</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #111 60%, #ff6a00 100%);
            color: #fff;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            width: 100%;
            max-width: 900px;
            margin: 0 auto 24px auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 32px 32px 0 32px;
            box-sizing: border-box;
        }
        .go-back {
            background: linear-gradient(90deg, #d7263d 60%, #a50021 100%);
            border: none;
            border-radius: 30px;
            padding: 10px 28px;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(215, 38, 61, 0.4);
            transition: background 0.3s, transform 0.2s;
            letter-spacing: 1px;
        }
        .go-back:hover {
            background: linear-gradient(90deg, #a50021 60%, #d7263d 100%);
            transform: translateY(-3px) scale(1.05);
        }
        .logbook-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: rgba(20, 20, 20, 0.97);
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(255, 106, 0, 0.2);
            padding: 36px 32px 32px 32px;
            box-sizing: border-box;
        }
        .logbook-title {
            font-size: 2.2rem;
            color: #ff6a00;
            font-weight: 700;
            margin-bottom: 28px;
            letter-spacing: 1.1px;
            text-align: center;
        }
        .logbook-table {
            width: 100%;
            border-collapse: collapse;
            background: #222;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(255, 106, 0, 0.15);
            margin-bottom: 10px;
        }
        .logbook-table th,
        .logbook-table td {
            padding: 14px 18px;
            text-align: left;
            vertical-align: middle;
        }
        .logbook-table th {
            background: #ff6a00;
            color: #111;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .logbook-table tbody tr {
            border-bottom: 1px solid rgba(255, 106, 0, 0.13);
            transition: background 0.2s;
        }
        .logbook-table tbody tr:hover {
            background: rgba(255, 106, 0, 0.09);
        }
        .status-badge {
            display: inline-block;
            padding: 5px 16px;
            border-radius: 20px;
            font-size: 0.98rem;
            font-weight: 700;
            color: #fff;
            background: #21b573;
            letter-spacing: 0.5px;
        }
        .status-badge.pending {
            background: #ff6a00;
            color: #111;
        }
        .status-badge.missed {
            background: #d7263d;
        }
        .status-badge.ended {
            background: #555;
        }
        .logbook-table td:last-child {
            text-align: right;
            white-space: nowrap;
        }
        .join-btn {
            background: linear-gradient(90deg, #21b573 60%, #11998e 100%);
            border: none;
            border-radius: 30px;
            padding: 8px 22px;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(17, 153, 142, 0.3);
            transition: background 0.3s, transform 0.2s;
            letter-spacing: 1px;
        }
        .join-btn:hover {
            background: linear-gradient(90deg, #11998e 60%, #21b573 100%);
            transform: translateY(-2px) scale(1.05);
        }
        @media (max-width: 900px) {
            header, .logbook-container {
                max-width: 100%;
                padding-left: 8px;
                padding-right: 8px;
            }
        }
        @media (max-width: 600px) {
            .logbook-container {
                padding: 18px 2px 12px 2px;
            }
            .logbook-title {
                font-size: 1.3rem;
            }
            .logbook-table th, .logbook-table td {
                padding: 9px 5px;
                font-size: 0.95rem;
            }
            .join-btn {
                width: 100%;
                padding: 10px 0;
                font-size: 0.98rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="<?php echo ROOT?>/employee" style="text-decoration: none;">
            <button class="go-back">Go Back</button>
        </a>
    </header>
    <div class="logbook-container">
        <div class="logbook-title">Log Book Notifications</div>
        <table class="logbook-table">
            <thead>
                <tr>
                    <th>Caller</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($logbook as $log): ?>
                <tr>
                    <td><?php echo htmlspecialchars($log->caller_id) ?></td>
                    <td>
                        <?php
                            $status = strtolower($log->status);
                            $badgeClass = "status-badge";
                            if ($status === "pending") $badgeClass .= " pending";
                            elseif ($status === "joined") $badgeClass .= " missed";
                            elseif ($status === "ended") $badgeClass .= " ended";
                            else $badgeClass .= " pending";
                        ?>
                        <span class="<?= $badgeClass ?>">
                            <?= ucfirst($status) ?>
                        </span>
                    </td>
                    <td>
                        <?php
                            
                            $createdAt = date('M d, Y H:i', strtotime($log->created_at));
                            echo $createdAt;
                        ?>
                    </td>
                    <?php if($status==='pending'):?>
                    <td>
                        <a href="<?php echo ROOT ?>/videoCall/call/<?php echo htmlspecialchars($log->caller_id) ?>">
                            <button class="join-btn">Join Call</button>
                        </a>
                        
                        
                    </td>
                    
                        
                    
                    <td>
                    <a href="<?php echo ROOT ?>/Notification/join/<?php echo($log->room_name) ?>">
                            <button class="join-btn">Mark as Joined</button>
                    </a>
                    </td>
                    <?php endif;?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
