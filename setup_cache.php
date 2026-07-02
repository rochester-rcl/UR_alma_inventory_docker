<?php
$dirs = ['cache', 'cache/upload', 'cache/output', 'cache/barcodes', 'cache/progress'];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "Created: $dir<br>";
    } else {
        echo "Exists: $dir (perms: " . substr(sprintf('%o', fileperms($dir)), -4) . ")<br>";
    }
}
echo "<hr>Current dir: " . __DIR__ . "<br>";
echo "Is writable: " . (is_writable('./cache') ? 'YES' : 'NO');
?>