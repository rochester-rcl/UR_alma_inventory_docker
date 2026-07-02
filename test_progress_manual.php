<?php
header('Content-Type: text/plain');

$progress_id = 'manual_test_123';
$progress_dir = __DIR__ . '/cache/progress';

echo "Step 1 - Creating dir\n";
if (!is_dir($progress_dir)) {
    mkdir($progress_dir, 0755, true);
    echo "Created: $progress_dir\n";
}

echo "Step 2 - Writing file\n";
$file = $progress_dir . '/progress_' . $progress_id . '.json';
$data = json_encode(['percentage' => 50, 'job' => 'Manual test']);
$result = file_put_contents($file, $data);
echo "File: $file\n";
echo "Result: " . ($result === false ? 'FAIL' : 'SUCCESS (' . $result . ' bytes)') . "\n";

echo "Step 3 - Reading file back\n";
echo "Exists: " . (file_exists($file) ? 'YES' : 'NO') . "\n";
echo "Readable: " . (is_readable($file) ? 'YES' : 'NO') . "\n";
if (file_exists($file)) {
    echo "Contents: " . file_get_contents($file) . "\n";
}

echo "\nStep 4 - Simulate getProgress.php\n";
$content = @file_get_contents($file);
$parsed = json_decode($content, true);
print_r($parsed);
?>