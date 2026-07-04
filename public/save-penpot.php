<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$input = json_decode(file_get_contents('php://input'), true);
$type = $input['type'] ?? '';
$content = $input['content'] ?? '';

if ($type === 'css') {
    file_put_contents(__DIR__.'/css/dashboard-penpot.css', $content);
} elseif ($type === 'html') {
    file_put_contents(__DIR__.'/dashboard-penpot.html', $content);
}
echo json_encode(['ok' => true, 'size' => strlen($content)]);
