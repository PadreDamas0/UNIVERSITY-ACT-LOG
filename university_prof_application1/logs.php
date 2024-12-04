


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
</head>
<body>
    <h1>Activity Logs</h1>
    <table border="1">
        <tr>
            <th>User</th>
            <th>Action</th>
            <th>Details</th>
            <th>Timestamp</th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= htmlspecialchars($log['username']) ?></td>
                <td><?= htmlspecialchars($log['action_type']) ?></td>
                <td><?= htmlspecialchars($log['action_details']) ?></td>
                <td><?= htmlspecialchars($log['timestamp']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
