<?php
header('Content-Type: text/html');
?>
<!DOCTYPE html><html><body style="font-family:monospace">
<h2>Environment Diagnostics</h2>
<table border="1" cellpadding="5">
<tr><th>Check</th><th>Status</th><th>Details</th></tr>

<?php
$checks = [
    '__DIR__' => __DIR__,
    'getcwd()' => getcwd(),
    'Document Root' => $_SERVER['DOCUMENT_ROOT'] ?? 'N/A',
    'Cache dir exists' => is_dir('cache') ? '✓' : '✗ CREATE IT',
    'Cache writable' => is_writable('cache') ? '✓' : '✗ PERMISSIONS',
    'Progress dir exists' => is_dir('cache/progress') ? '✓' : '✗ RUN setup_cache.php',
    'PHP version' => phpversion(),
    'cURL enabled' => function_exists('curl_init') ? '✓' : '✗ ENABLE cURL',
    'SimpleXML enabled' => class_exists('SimpleXMLElement') ? '✓' : '✗ ENABLE SimpleXML',
];

foreach ($checks as $name => $status) {
    echo "<tr><td>$name</td><td>$status</td><td></td></tr>\n";
}
?>
</table>
<hr>
<p>If cache/progress doesn't exist, visit <code>setup_cache.php</code> first.</p>
</body></html>