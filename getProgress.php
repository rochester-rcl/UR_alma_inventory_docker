<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$progress_id = isset($_GET['id']) ? preg_replace('/[^a-zA-Z0-9_.]/', '', $_GET['id']) : '';

if (!$progress_id) {
    echo json_encode(["percentage" => 0, "job" => "Invalid request"]);
    exit;
}

// Use LOCAL cache directory (matches process_barcodes.php)
$progress_dir = __DIR__ . '/cache/progress';
if (!is_dir($progress_dir)) mkdir($progress_dir, 0755, true);

$progress_file = $progress_dir . '/progress_' . $progress_id . '.json';

if (file_exists($progress_file)) {
    if (filemtime($progress_file) < time() - 3600) {
        @unlink($progress_file);
        echo json_encode(["percentage" => 0, "job" => "Stale progress cleared"]);
        exit;
    }
    
    $content = @file_get_contents($progress_file);
    $data = json_decode($content, true);
    
    if (is_array($data) && isset($data['job'])) {
        $job = $data['job'];
        $percentage = isset($data['percentage']) ? (int)$data['percentage'] : 0;
    } else {
        $job = 'Waiting...';
        $percentage = 0;
    }
} else {
    $job = 'Process starting...';
    $percentage = 0;
}

echo json_encode(["job" => $job, "percentage" => $percentage]);
exit;
?>