<?php
// JSON file path
$jsonFile = __DIR__ . '/contact-messages.json';

// check if file exists
if (!file_exists($jsonFile)) {
    die('No messages yet.');
}

// read the JSON file
$data = file_get_contents($jsonFile);
$messages = json_decode($data, true);

// simple HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Contact Messages</h1>
    <?php if (empty($messages)): ?>
        <p>No messages yet.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $msg): ?>
                    <tr>
                        <td><?= htmlspecialchars($msg['name']) ?></td>
                        <td><?= htmlspecialchars($msg['email']) ?></td>
                        <td><?= htmlspecialchars($msg['message']) ?></td>
                        <td><?= htmlspecialchars($msg['ip']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
