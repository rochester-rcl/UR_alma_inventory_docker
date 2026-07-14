<?php
$csv_output_filename = isset($_GET['filename']) ? preg_replace('/[^a-zA-Z0-9_.-]/', '', $_GET['filename']) : '';

if (empty($csv_output_filename)) {
    http_response_code(400);
    exit('No filename provided');
}

$output_dir = __DIR__ . '/cache/output';
$file_path = $output_dir . '/' . $csv_output_filename;

if (!file_exists($file_path)) {
    http_response_code(404);
    exit('File not found');
}

// Force download headers
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($csv_output_filename) . '"');
header('Content-Length: ' . filesize($file_path));
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Clear any previous output
if (ob_get_length()) ob_end_clean();

readfile($file_path);
exit;
?>