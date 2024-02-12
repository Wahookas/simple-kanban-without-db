<?php
$dataFile = 'kanban_data.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    error_log("Data received: " . $data);

    if (!empty($data)) {
        file_put_contents($dataFile, $data);
        echo "Data saved.";
    } else {
        http_response_code(400);
        echo "No data received.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($dataFile)) {
        echo file_get_contents($dataFile);
    } else {
        echo "";
    }
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>