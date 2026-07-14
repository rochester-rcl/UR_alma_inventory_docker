<!DOCTYPE html>
<html lang="en">
<head>
<style>
:root {
    --color-bg: #f0f2f5;
    --color-card: #ffffff;
    --color-header: #1e293b;
    --color-header-accent: #334155;
    --color-primary: #3b82f6;
    --color-primary-hover: #2563eb;
    --color-text: #1e293b;
    --color-text-secondary: #64748b;
    --color-border: #e2e8f0;
    --color-danger: #ef4444;
    --color-danger-light: #fef2f2;
    --color-success: #22c55e;
    --color-warning: #f59e0b;
    --color-warning-light: #fffbeb;
    --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
    --shadow-lg: 0 10px 25px -3px rgba(0,0,0,0.08), 0 4px 6px -4px rgba(0,0,0,0.04);
    --radius-sm: 6px;
    --radius-md: 10px;
    --radius-lg: 16px;
    --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    --transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

body {
    font-family: var(--font);
    background: var(--color-bg);
    color: var(--color-text);
    min-height: 100vh;
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
}
.header {
    background: linear-gradient(135deg, var(--color-header) 0%, var(--color-header-accent) 100%);
    padding: 1.75rem 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.header::before {
    content: '';
    position: absolute;
    top: -50%; left: -50%; width: 200%; height: 200%;
    background: radial-gradient(circle at 30% 50%, rgba(59,130,246,0.08) 0%, transparent 50%);
    pointer-events: none;
}
.header h1 { color: #fff; font-size: 1.5rem; font-weight: 700; position: relative; letter-spacing: -0.02em; }
.header h1 small { font-weight: 400; font-size: 0.8rem; opacity: 0.6; display: block; margin-top: 0.25rem; }
.header p { color: rgba(255,255,255,0.6); font-size: 0.8125rem; margin-top: 0.25rem; position: relative; }

.container { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }

/* Action bar */
.action-bar {
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem;
    margin: -1rem auto 1.25rem; max-width: 1200px; padding: 0 1rem; position: relative; z-index: 1;
}
.action-bar .barcode-count {
    background: var(--color-card); padding: 0.625rem 1rem; border-radius: var(--radius-md);
    box-shadow: var(--shadow-md); font-size: 0.8125rem; font-weight: 500;
}
.action-bar .barcode-count strong { color: var(--color-primary); }
.action-btn {
    display: inline-flex; align-items: center; gap: 0.375rem;
    padding: 0.5rem 1rem; border-radius: var(--radius-sm); font-family: var(--font);
    font-size: 0.8125rem; font-weight: 500; text-decoration: none; transition: all var(--transition); border: none; cursor: pointer;
}
.action-btn-primary { background: var(--color-primary); color: #fff; }
.action-btn-primary:hover { background: var(--color-primary-hover); transform: translateY(-1px); box-shadow: 0 2px 8px rgba(59,130,246,0.3); }
.action-btn-outline { background: var(--color-card); color: var(--color-text); border: 1.5px solid var(--color-border); }
.action-btn-outline:hover { border-color: var(--color-primary); color: var(--color-primary); }

/* Stat cards */
.stats-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 0.75rem;
    margin-bottom: 1.25rem;
}
.stat-card {
    background: var(--color-card); border-radius: var(--radius-md); padding: 1rem 1.125rem;
    box-shadow: var(--shadow-sm); border-left: 3px solid var(--color-border); transition: all var(--transition);
}
.stat-card:hover { box-shadow: var(--shadow-md); }
.stat-card.stat-danger { border-left-color: var(--color-danger); }
.stat-card.stat-warning { border-left-color: var(--color-warning); }
.stat-card.stat-primary { border-left-color: var(--color-primary); }
.stat-card .stat-value { font-size: 1.5rem; font-weight: 700; color: var(--color-text); line-height: 1.2; }
.stat-card .stat-label { font-size: 0.7rem; font-weight: 500; color: var(--color-text-secondary); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.125rem; }

.range-bar {
    background: var(--color-card); border-radius: var(--radius-md); padding: 0.75rem 1.125rem;
    box-shadow: var(--shadow-sm); margin-bottom: 1.25rem;
    display: flex; align-items: center; gap: 1.5rem; font-size: 0.8125rem; flex-wrap: wrap;
}
.range-bar .range-item { display: flex; align-items: center; gap: 0.375rem; }
.range-bar .range-label { color: var(--color-text-secondary); font-weight: 500; }
.range-bar .range-value { font-weight: 600; font-family: 'SF Mono', 'Fira Code', monospace; font-size: 0.75rem; background: var(--color-bg); padding: 0.2rem 0.5rem; border-radius: var(--radius-sm); }

/* Results table */
.table-card {
    background: var(--color-card); border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);
    overflow: hidden; margin-bottom: 2rem;
}
.results-table {
    width: 100%; border-collapse: collapse; font-size: 0.8125rem;
}
.results-table thead th {
    background: #f8fafc; padding: 0.75rem 0.875rem; text-align: left;
    font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;
    color: var(--color-text-secondary); border-bottom: 2px solid var(--color-border);
    cursor: pointer; user-select: none; white-space: nowrap; position: sticky; top: 0; z-index: 2;
}
.results-table thead th:hover { color: var(--color-primary); }
.results-table tbody td { padding: 0.625rem 0.875rem; border-bottom: 1px solid #f1f5f9; vertical-align: top; }
.results-table tbody tr { transition: background var(--transition); }
.results-table tbody tr:hover { background: #f8fafc; }
.results-table tbody tr:last-child td { border-bottom: none; }

/* Problem row */
.results-table tbody tr.row-problem { background: var(--color-danger-light); }
.results-table tbody tr.row-problem:hover { background: #fde8e8; }
.results-table tbody tr.row-problem td { font-weight: 500; }

.problem-badge {
    display: inline-block; padding: 0.15rem 0.5rem; border-radius: var(--radius-sm);
    font-size: 0.6875rem; font-weight: 600; line-height: 1.4; margin-bottom: 0.2rem;
}
.badge-order { background: #fef2f2; color: #dc2626; }
.badge-cn-type { background: #fff7ed; color: #ea580c; }
.badge-nip { background: #fefce8; color: #ca8a04; }
.badge-temp { background: #f0fdf4; color: #16a34a; }
.badge-library { background: #eff6ff; color: #2563eb; }
.badge-location { background: #faf5ff; color: #9333ea; }
.badge-policy { background: #fdf2f8; color: #db2777; }
.badge-type { background: #f0f9ff; color: #0284c7; }
.problem-detail { font-size: 0.75rem; color: var(--color-text-secondary); margin-top: 0.125rem; }
.problem-detail em { font-style: normal; font-weight: 600; color: var(--color-text); }

.col-order, .col-scanned { text-align: center; width: 60px; }
.col-cn { min-width: 140px; font-family: 'SF Mono', 'Fira Code', monospace; font-size: 0.75rem; }
.col-title { max-width: 200px; }
.col-barcode { font-family: 'SF Mono', 'Fira Code', monospace; font-size: 0.75rem; color: var(--color-text-secondary); }

.footer { text-align: center; padding: 1rem; font-size: 0.75rem; color: var(--color-text-secondary); }

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .action-bar { flex-direction: column; align-items: stretch; }
    .results-table { font-size: 0.75rem; }
    .results-table thead th, .results-table tbody td { padding: 0.5rem; }
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Report Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="reformed/js/jquery.tablesorter.js"></script>
<script type="text/javascript">
    $(document).ready(function(){ $("#CNTable").tablesorter(); });
</script>

</head>
<body>


<?php
$progress_id = isset($_POST['progress_id']) ? preg_replace('/[^a-zA-Z0-9_.]/', '', $_POST['progress_id']) : '';
$progress_dir = __DIR__ . '/cache/progress';
if (!is_dir($progress_dir)) mkdir($progress_dir, 0755, true);

// Initialize progress tracking immediately
if ($progress_id) {
    $write_result = @file_put_contents(
        $progress_dir . '/progress_' . $progress_id . '.json',
        json_encode(['percentage' => 0, 'job' => 'Preparing upload...'])
    );
    
    error_log("Progress init result: " . ($write_result === false ? 'FAILED' : 'SUCCESS'));
}
?>

<?php
// ============================================================
// DESKTOP COMPATIBILITY FIXES
// ============================================================
set_time_limit(1200);
ini_set('memory_limit', '1G');
ini_set('max_execution_time', 1200);
ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
error_reporting(E_ALL & ~E_DEPRECATED); // Suppress deprecation warnings on newer PHP

// Include XLSX Reader
include 'simplexlsx/simplexlsx.class.php';

//Require necessary files
require("SortCallNumber.php");
require("almaBarcodeAPI.php");

$shelflist = [];
$output_array = [];
$problem = false;
$orderProblem = '';
$cnTypeProblem = '';
$nipProblem = '';
$tempProblem = '';
$libraryProblem = '';
$locationProblem = '';
$policyProblem = '';
$typeProblem = '';
$orderProblemCount = 0;
$cnTypeProblemCount = 0;
$tempProblemCount = 0;
$requestProblemCount = 0;
$locationProblemCount = 0;
$libraryProblemCount = 0;
$policyProblemCount = 0;
$typeProblemCount = 0;

// Only run code below if form submitted
if (isset($_POST['submit'])) {
    
    // ==========================================
    // CLEAR CACHE FUNCTIONALITY (ENHANCED VERSION)
    // ==========================================
    if (isset($_POST['clearCache']) && $_POST['clearCache'] === 'true') {
        error_log("===========================================================");
        error_log("DEBUG: ClearCache flag DETECTED - initiating full cleanup");
        error_log("Timestamp: " . date('Y-m-d H:i:s'));
        
        // Debug info if debug mode is also enabled
        if (isset($_POST['debugMode']) && $_POST['debugMode'] === 'true') {
            error_log("DEVMODE: POST keys received: " . implode(', ', array_keys($_POST)));
            error_log("DEVMODE: clearCache value = '" . $_POST['clearCache'] . "'");
        }
        
        $cache_dirs = [
            'barcodes',
            'upload', 
            'output',
            'progress'
        ];
        
        foreach ($cache_dirs as $dir) {
            $path = __DIR__ . '/cache/' . $dir;
            
            // STEP 1: Verify directory exists
            if (!is_dir($path)) {
                error_log("SKIP [$dir]: Directory does not exist");
                continue;
            }
            
            // STEP 2: Check readability
            if (!is_readable($path)) {
                error_log("ERROR [$dir]: Cannot READ directory - Permission denied");
                echo "<!-- CLEAR_ERROR:$dir:not-readable -->";
                continue;
            }
            
            // STEP 3: Check writability
            if (!is_writable($path)) {
                error_log("WARNING [$dir]: Not writable, attempting chmod 755...");
                @chmod($path, 0755);
                
                if (!is_writable($path)) {
                    error_log("ERROR [$dir]: Still cannot WRITE after chmod - www-data permissions issue");
                    echo "<!-- CLEAR_ERROR:$dir:permissions -->";
                    
                    // Provide actionable debug info
                    $perms = substr(sprintf('%o', fileperms($path)), -4);
                    error_log("CURRENT_PERMS [$dir]: $perms");
                    error_log("RECOMMENDATION: docker compose exec app chown -R www-data:www-data /srv/app/cache/$dir");
                    continue;
                }
                
                error_log("SUCCESS [$dir]: chmod applied, continuing...");
            }
            
            $cleared = 0;
            $failed = 0;
            $start_count = 0;
            
            // Count items before deletion
            $items_before = glob($path . '/*');
            if ($items_before !== false) {
                $start_count = count($items_before);
            }
            
            error_log("BEGIN [$dir]: Items before clear = $start_count");
            
            // STEP 4: Perform actual deletion
            if ($dir !== 'progress') {
                // Full cleanup for barcodes, upload, output directories
                // Use find command for reliability with nested structures
                
                $escaped_path = escapeshellarg($path);
                error_log("EXECUTE [$dir]: find {$escaped_path} -mindepth 1 -delete");
                
                // Find all files/directories and delete them (preserves the main dir itself)
                $shell_result = shell_exec("find {$escaped_path} -mindepth 1 -delete 2>&1");
                
                if (!empty($shell_result)) {
                    error_log("SHELL_OUTPUT [$dir]: $shell_result");
                }
                
                // Verify deletion worked
                $remaining = glob($path . '/*');
                $cleared = ($remaining !== false) ? count($remaining) : 'unknown';
                
                error_log("VERIFY [$dir]: Remaining items after find -delete = $cleared");
                
                if ($cleared > 0) {
                    error_log("WARN [$dir]: Some items remain after shell delete - may need manual intervention");
                }
                
            } else {
                // Progress directory - ONLY clear old files (>2 hours old), keep active ones
                
                // Clear progress JSON files older than 2 hours
                $progress_files = glob($path . '/progress_*.json');
                if ($progress_files !== false) {
                    foreach ($progress_files as $pf) {
                        $file_age_hours = (time() - filemtime($pf)) / 3600;
                        
                        if ($file_age_hours > 2) {
                            if (@unlink($pf)) {
                                $cleared++;
                                error_log("PROGRESS [$dir]: Cleared stale file: " . basename($pf) . " (age: {$file_age_hours}h)");
                            } else {
                                $failed++;
                                error_log("PROGRESS [$dir]: FAILED to delete: " . basename($pf));
                            }
                        } else {
                            // Keep this file - it's likely active
                            error_log("PROGRESS [$dir]: SKIPPED active file: " . basename($pf) . " (age: {$file_age_hours}h)");
                        }
                    }
                }
                
                // Also clear done marker files older than 2 hours
                $marker_files = glob($path . '/done_*.marker');
                if ($marker_files !== false) {
                    foreach ($marker_files as $mf) {
                        $file_age_hours = (time() - filemtime($mf)) / 3600;
                        if ($file_age_hours > 2) {
                            @unlink($mf);
                        }
                    }
                }
                
                error_log("PROGRESS [$dir]: Total cleared=$cleared, failed=$failed");
            }
            
            error_log("COMPLETE [$dir]: Original={$start_count}, Cleared, Failed=$failed");
        }
        
        // Final status marker for debugging
        error_log("===========================================================");
        error_log("CACHE CLEAR OPERATION COMPLETED SUCCESSFULLY");
        error_log("===========================================================");
        
        // Echo markers visible in page source for verification
        echo "<!-- CACHE_CLEARED:true -->";
        echo "<!-- CLEAR_COMPLETE:true -->";
    }
    
    // ======================================================
    // FILE UPLOAD PROCESSING
    // ======================================================
    if (isset($_FILES["file"])) {

        // Check for upload errors
        if ($_FILES["file"]["error"] > 0) {
            $error_messages = [
                1 => 'EXCEEDED_UPLIMIT_PHP',
                2 => 'EXCEEDED_UPLIMIT_HTML',
                3 => 'PARTIAL_UPLOAD',
                4 => 'NO_FILE_SELECTED',
                6 => 'MISSING_TEMP_FOLDER',
                7 => 'FILE_WRITE_FAILED',
                8 => 'EXTENSION_STOPPED'
            ];
            $error_msg = $error_messages[$_FILES["file"]["error"]] ?? 'UNKNOWN_ERROR';
            echo "UPLOAD ERROR: $error_msg (Code: {$_FILES["file"]["error"]})<br />";
            echo '<a href="index.php">Run New File</a><BR>';
            exit();
        }

        // Construct storage filename with sanitization
        $sanitized_lib = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['library']);
        $sanitized_loc = preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['location']);
        $storagename = 'uploaded_file_' . $sanitized_lib . '_' . $sanitized_loc . '_' . date('Ymd_His') . '.xlsx';
        $upload_path = __DIR__ . '/cache/upload/' . $storagename;
        
        // Create upload directory if needed
        if (!is_dir(__DIR__ . '/cache/upload')) {
            mkdir(__DIR__ . '/cache/upload', 0755, true);
        }
        
        // Move uploaded file
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
            echo "FAIL_MOVING_FILE<br />";
            echo "From: {$_FILES["file"]["tmp_name"]}<br />";
            echo "To: $upload_path<br />";
            echo "Permissions check: " . (is_writable(dirname($upload_path)) ? 'WRITABLE' : 'NOT WRITABLE') . "<br />";
            echo '<a href="index.php">Run New File</a><BR>';
            exit();
        }
        
        error_log("File uploaded successfully: $storagename");

    } else {
        echo '<H1>No barcode file selected.</H1><BR>';
        echo '<a href="index.php">Run New File</a><BR>';
        exit();
    }

    // Validate call number type selection
    if (isset($_POST['cnType']) && $_POST['cnType'] == 'other') {
        echo '<H1>Currently only Dewey and LC callnumber types are supported.</H1><BR>';
        echo '<a href="index.php">Run New File</a><BR>';
        exit();
    }

    // Process Excel file
    if (file_exists($upload_path)) {
      $filelocation = $upload_path;
      $xlsx = new SimpleXLSX($filelocation);
      
      // Parse validation
      if (!$xlsx->success()) {
          echo '<H1>Error parsing Excel file:</H1><BR>';
          echo 'Errors: ' . implode(', ', $xlsx->errors()) . '<BR>';
          echo '<a href="index.php">Run New File</a><BR>';
          exit();
      }
      
      list($num_cols, $num_rows) = $xlsx->dimension();
      
      if ($num_rows <= 1) {
          echo '<H1>Excel file appears empty (only header row).</H1><BR>';
          echo '<a href="index.php">Run New File</a><BR>';
          exit();
      }

        // --- Pass 1: Read all barcodes from spreadsheet in scan order ---
        $barcodes_by_row = [];
        $row_num = 1;
        foreach ($xlsx->rows() as $k => $r) {
            if ($k == 0) {
                // Skip or validate header row
                if (!isset($r[0]) || strtolower(trim($r[0])) != 'barcodes') {
                    echo "Upload file must have header row labeled 'barcodes'<br />";
                    echo "Found: " . htmlspecialchars($r[0] ?? '(empty)') . "<br />";
                    echo '<a href="index.php">Run New File</a><BR>';
                    exit();
                }
                continue;
            }
            
            $barcode_value = $r[0] ?? '';
            if (!empty(trim($barcode_value))) {
                $barcodes_by_row[$row_num] = trim($barcode_value);
            }
            $row_num++;
        }
        
        $total_barcodes = count($barcodes_by_row);
        error_log("Total barcodes to process: $total_barcodes");
        
        if ($total_barcodes == 0) {
            echo '<H1>No valid barcodes found in file.</H1><BR>';
            echo '<a href="index.php">Run New File</a><BR>';
            exit();
        }

        // --- Pass 2: Fetch all barcodes in parallel batches of 10 ---
        $batch_size = 10;
        $all_item_data = [];
        $batch_keys = array_keys($barcodes_by_row);
        $processed = 0;

        foreach (array_chunk($batch_keys, $batch_size) as $chunk_row_nums) {
            $chunk = [];
            foreach ($chunk_row_nums as $r) {
                $chunk[$r] = $barcodes_by_row[$r];
            }

            // Fetch batch results with caching
            $batch_results = retrieveBarcodesInBatch($chunk);
            $all_item_data += $batch_results;

            $processed += count($chunk);
            $percentage = round($processed * 100 / $total_barcodes);

            // Write progress safely
            if ($progress_id) {
                $progress_data = [
                    'percentage' => $percentage, 
                    'job' => 'Retrieving Barcodes From API: ' . $processed . '/' . $total_barcodes
                ];
                if ($percentage >= 100) {
                    $progress_data['percentage'] = 100;
                    $progress_data['job'] = 'Generating report...';
                }
                
                $target_path = $progress_dir . '/progress_' . $progress_id . '.json';
                
                if (is_writable(dirname($target_path))) {
                    if (file_put_contents($target_path, json_encode($progress_data)) !== false) {
                        // Flush output for live progress updates
                        echo str_repeat(' ', 4096);
                        @ob_flush();
                        @flush();
                    } else {
                        error_log("WARN: Could not write progress file at percentage $percentage");
                    }
                }
            }
        }

        // --- Pass 3: Normalize call numbers and build $unsorted array ---
        foreach ($all_item_data as $scan_row => $itemData) {
            // Handle barcode not found cases
            if (!isset($itemData->item_barcode) || empty(trim($itemData->item_barcode))) {
                $itemData->item_barcode = $barcodes_by_row[$scan_row];
                $itemData->title = 'NOT FOUND IN ALMA';
                $itemData->call_sort = '!';
                $itemData->call_number = '???';
            } else {
                // Barcode was found - normalize call number for sorting
                if(isset($itemData->call_number_type) && $itemData->call_number_type == 1) {
                    $itemData->call_sort = normalizeDewey($itemData->call_number);
                } else {
                    $itemData->call_sort = normalizeLC($itemData->call_number);
                }
            }
            // Store keyed by original scan row to preserve order mapping
            $unsorted[$scan_row] = $itemData;
            $unsorted[$scan_row]->scan_loc = $scan_row;
        }

        // Convert stdClass objects to multidimensional array for usort compatibility
        $unsortedArray = json_decode(json_encode($unsorted), true);
        
        // Calculate range for display
        $first_record = reset($unsortedArray);
        $last_record = end($unsortedArray);
        $first_call = $first_record['call_number'] ?? '';
        $first_call_clean = preg_replace('/[\.\s]+/', '', strtoupper($first_call));
        $last_call = $last_record['call_number'] ?? '';
        $last_call_clean = preg_replace('/[\.\s]+/', '', strtoupper($last_call));

        // Sort alphabetically by normalized call number
        $sortednk = $unsortedArray;

        if ($_POST['cnType'] == 'dewey') {
            $sortednk_success = usort($sortednk, "SortDeweyObject");
        } else {
            $sortednk_success = usort($sortednk, "SortLCObject");
        }
        
        if (!$sortednk_success) {
            error_log("WARN: Array sorting encountered issues, proceeding anyway");
        }

        // Start loop of processing records and writing to output array
        foreach ($sortednk as $key => $number) {
            $problem = false;
          
            // Get current item data safely
            $curr_scan_loc = $number['scan_loc'] ?? null;
            $prev_key = $key - 1;
            $next_key = $key + 1;

            // Don't flag order issues if only Other problems are requested
            if ($_POST['onlyorder'] == 'false') {
                // SAFETY: Check neighbor existence before accessing
                if (!isset($sortednk[$prev_key]) || !is_array($sortednk[$prev_key])) {
                    $sortednk[$prev_key] = ['scan_loc' => null];
                }
                if (!isset($sortednk[$next_key]) || !is_array($sortednk[$next_key])) {
                    $sortednk[$next_key] = ['scan_loc' => null];
                }
                
                $prevScan_loc_raw = $sortednk[$prev_key]['scan_loc'] ?? null;
                $scan_loc_raw = $sortednk[$key]['scan_loc'] ?? null;
                $nextScan_loc_raw = $sortednk[$next_key]['scan_loc'] ?? null;
                
                // Adjust for 1-based positioning
                $prevScan_loc = $prevScan_loc_raw !== null ? $prevScan_loc_raw + 1 : null;
                $scan_loc_val = $scan_loc_raw !== null ? $scan_loc_raw + 1 : null;
                $nextScan_loc = $nextScan_loc_raw !== null ? $nextScan_loc_raw + 1 : null;
                
                // Handle null values gracefully for calculations
                $prevScan_loc_for_calc = $prevScan_loc ?: 1;
                $nextScan_loc_for_calc = $nextScan_loc ?: PHP_INT_MAX;
                
                $nextdiff = $nextScan_loc_for_calc - $scan_loc_val;
                $prevdiff = $scan_loc_val - $prevScan_loc_for_calc;

                // Flag out-of-order items
                if ($prevdiff != 1 && $nextdiff != 1) {
                    // Safely get neighboring call numbers
                    $prev_cn = $unsortedArray[$curr_scan_loc - 1]['call_number'] ?? 'N/A';
                    $next_cn = $unsortedArray[$curr_scan_loc + 1]['call_number'] ?? 'N/A';
                    
                    $move_offset = (($prevScan_loc_raw ?? 0) - ($curr_scan_loc ?? 0));
                    
                    if ($move_offset < 0){
                        $move_text = 'Move item back ' . (abs($move_offset) - 1) . ' spaces';
                    } else {
                        $move_text = 'Move item forward ' . $move_offset . ' spaces';
                    }

                    $orderProblem = "**OUT OF ORDER**<BR>Item Currently Between:<BR><em>" 
                        . htmlspecialchars((string)$prev_cn) 
                        . "</em> & <em>" 
                        . htmlspecialchars((string)$next_cn) 
                        . "</em><BR>" . $move_text . "<BR>";
                    $orderProblemCount++;
                    $problem = true;
                } else {
                    $orderProblem = '';
                }
            }

            // Don't flag other issues if only order problems are requested
            if ($_POST['onlyorder'] == 'false') {
                // Determine expected call number type code
                $expected_cn_type = ($_POST['cnType'] == 'dewey') ? 1 : 0;
              
                // Check call number type mismatch
                if (($number['call_number_type'] ?? null) != $expected_cn_type) {
                    $cnTypeProblem = "**WRONG CN TYPE**<BR>";
                    $cnTypeProblemCount++;
                    $problem = true;
                } else {
                    $cnTypeProblem = '';
                }

                // Check NIP (Not In Place) status
                if (($number['status'] ?? null) != 1) {
                    $process_type = $number['process_type'] ?? 'Unknown';
                    $nipProblem = "**NIP: " . htmlspecialchars($process_type) . "**<BR>";
                    $problem = true;
                } else {
                    $nipProblem = '';
                }

                // Check temporary location flag
                if (($number['in_temp_location'] ?? 'false') != 'false') {
                    $tempProblem = "**IN TEMP LOC**<BR>";
                    $tempProblemCount++;
                    $problem = true;
                } else {
                    $tempProblem = '';
                }

                // Check for requests on item
                if (($number['requested'] ?? 'false') != 'false') {
                    $requestProblem = "**ITEM HAS REQUEST**<BR>";
                    $requestProblemCount++;
                    $problem = true;
                } else {
                    $requestProblem = '';
                }

                // Check location matches form selection
                $selected_location = $_POST['location'] ?? '';
                if (($number['location'] ?? '') != $selected_location) {
                    $actual_location = $number['location'] ?? 'Unknown';
                    $locationProblem = "**WRONG LOCATION: " . htmlspecialchars($actual_location) . "**<BR>";
                    $locationProblemCount++;
                    $problem = true;
                } else {
                    $locationProblem = '';
                }
              
                // Check library matches form selection
                $selected_library = $_POST['library'] ?? '';
                if (($number['library'] ?? '') != $selected_library) {
                    $actual_library = $number['library'] ?? 'Unknown';
                    $libraryProblem = "**WRONG LIBRARY: " . htmlspecialchars($actual_library) . "**<BR>";
                    $libraryProblemCount++;
                    $problem = true;
                } else {
                    $libraryProblem = '';
                }
/*
                // Check policy matches form selection
                $selected_policy = $_POST['policy'] ?? '';
                $item_policy = $number['policy'] ?? '';
                if ($item_policy != $selected_policy) {
                    if ($item_policy != '') {
                        $policyProblem = "**WRONG ITEM POLICY: " . htmlspecialchars($item_policy) . "**<BR>";
                    } else {
                        $policyProblem = "**BLANK ITEM POLICY**<BR>";
                    }
                    $policyProblemCount++;
                    $problem = true;
                } else {
                    $policyProblem = '';
                }

                // Check physical material type matches form selection
                $selected_type = $_POST['itemType'] ?? '';
                $item_material_type = $number['physical_material_type'] ?? '';
                if ($item_material_type != $selected_type) {
                    if ($item_material_type != '') {
                        $typeProblem = "**WRONG TYPE: " . htmlspecialchars($item_material_type) . "**<BR>";
                    } else {
                        $typeProblem = "**BLANK ITEM TYPE**<BR>";
                    }
                    $typeProblemCount++;
                    $problem = true;
                } else {
                    $typeProblem = '';
                }
                */
            }

            $scanned_location = $number['scan_loc'] ?? 0;
            $correct_position = $key + 1;

            // Build shelflist entry object
            $shelflist_obj = new stdClass();
            $shelflist_obj->correct_location = $correct_position;
            $shelflist_obj->call_number = $number['call_number'] ?? '';
            $shelflist_obj->norm_call_number = $number['call_sort'] ?? '';
          
            // UTF-8 encoding fix for title field
            $title_raw = mb_substr($number['title'], 0, 20, 'UTF-8') . '...';
            if (function_exists('mb_convert_encoding')) {
                $shelflist_obj->title = mb_convert_encoding($title_raw, 'UTF-8', 'auto');
            } else if (function_exists('iconv')) {
                $shelflist_obj->title = @iconv('ISO-8859-1', 'UTF-8//IGNORE', $title_raw) ?: $title_raw;
            } else {
                $shelflist_obj->title = utf8_encode($title_raw);
            }
            
            $shelflist_obj->scanned_location = $scanned_location;
            $shelflist_obj->problem_list = $orderProblem . $cnTypeProblem . $nipProblem . $tempProblem . $libraryProblem . $locationProblem . $policyProblem . $typeProblem;
            $shelflist_obj->barcode = $number['item_barcode'] ?? '';
            $shelflist_obj->problem = $problem;
          
            $shelflist[trim($key)] = json_decode(json_encode($shelflist_obj), true);
        }
        
        // Generate CSV filename for download
        $csv_output_filename = 'ShelfList_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['library']) . '_' . 
                               preg_replace('/[^a-zA-Z0-9_-]/', '_', $_POST['location']) . '_' . 
                               substr(strtoupper($first_call_clean), 0, 4) . '_' . 
                               substr(strtoupper($last_call_clean), 0, 4) . '_' . date('Ymd') . '.csv';
        
        $total_problems = $orderProblemCount + $cnTypeProblemCount + $tempProblemCount + 
                         $requestProblemCount + $locationProblemCount + $libraryProblemCount + 
                         $policyProblemCount + $typeProblemCount;
        $barcode_count = $total_barcodes;

        // Render HTML Output
        echo '<header class="header">';
        echo '  <h1>📋 Inventory Report';
        echo '    <small>' . htmlspecialchars($_POST['library']) . ':' . htmlspecialchars($_POST['location']) . 
             ' &middot; Range ' . substr(strtoupper($first_call_clean), 0, 4) . '–' . 
             substr(strtoupper($last_call_clean), 0, 4) . ' &middot; ' . date('M j, Y') . '</small>';
        echo '  </h1>';
        echo '</header>';

        echo '<div class="container">';

        // Action bar
        echo '<div class="action-bar">';
        echo '  <div class="barcode-count">Processed <strong>' . $barcode_count . '</strong> barcodes &middot; <strong>' . $total_problems . '</strong> issues found</div>';
        echo '  <div style="display:flex;gap:0.5rem;">';
        echo '    <a href="index.php" class="action-btn action-btn-outline">← Run New File</a>';
        echo '    <a href="download_csv.php?filename=' . urlencode($csv_output_filename) . '" class="action-btn action-btn-primary">↓ Download CSV</a>';
        echo '  </div>';
        echo '</div>';
        
        echo '</div>'; // close container

        // Statistics grid
        echo '<div class="stats-grid">';
        echo '  <div class="stat-card stat-danger"><div class="stat-value">' . $orderProblemCount . '</div><div class="stat-label">Order Problems</div></div>';
        echo '  <div class="stat-card stat-warning"><div class="stat-value">' . $cnTypeProblemCount . '</div><div class="stat-label">CN Type Issues</div></div>';
        echo '  <div class="stat-card stat-primary"><div class="stat-value">' . $tempProblemCount . '</div><div class="stat-label">Temp Location</div></div>';
        echo '  <div class="stat-card"><div class="stat-value">' . $requestProblemCount . '</div><div class="stat-label">On Request</div></div>';
        echo '  <div class="stat-card stat-danger"><div class="stat-value">' . $locationProblemCount . '</div><div class="stat-label">Wrong Location</div></div>';
        echo '  <div class="stat-card stat-danger"><div class="stat-value">' . $libraryProblemCount . '</div><div class="stat-label">Wrong Library</div></div>';
    //    echo '  <div class="stat-card stat-warning"><div class="stat-value">' . $policyProblemCount . '</div><div class="stat-label">Policy Issues</div></div>';
    //    echo '  <div class="stat-card"><div class="stat-value">' . $typeProblemCount . '</div><div class="stat-label">Type Issues</div></div>';
        echo '</div>';

        // Call number range bar
        echo '<div class="range-bar">';
        echo '  <div class="range-item"><span class="range-label">First CN:</span><span class="range-value">' . htmlspecialchars(substr(strtoupper($first_call_clean), 0, 8)) . '</span></div>';
        echo '  <div class="range-item"><span class="range-label">Last CN:</span><span class="range-value">' . htmlspecialchars(substr(strtoupper($last_call_clean), 0, 8)) . '</span></div>';
        echo '</div>';

        // Output record table and generate CSV
        outputRecords($shelflist);
        echo '</div>'; // close container
        
    } else {
        echo '<H1>Uploaded file not found after transfer.</H1><BR>';
        echo '<a href="index.php">Run New File</a><BR>';
        exit();
    }

} else {
    // No POST submission detected
    echo '<header class="header"><h1>📋 Inventory Report</h1></header>';
    echo '<div class="container" style="margin-top:2rem;text-align:center;">';
    echo '<div class="stat-card" style="display:inline-block;padding:2rem;"><div class="stat-value">No data received.</div><div class="stat-label">Please submit a barcode file first.</div></div>';
    echo '</div>';
}

// End-buffer flush for large outputs
echo str_repeat(' ', 4096);
@ob_flush();
@flush();


/**
 * Helper function for debugging (disabled by default)
 */
function pre_debug($data) {
    print '<pre>' . print_r($data, true) . '</pre>';
}


/**
 * Main output function - generates both HTML table and CSV file
 */
function outputRecords($output){
    global $csv_output_filename, $progress_id, $progress_dir;
  
    // Ensure output directory exists with proper permissions
    $output_dir = __DIR__ . '/cache/output';
    if (!is_dir($output_dir)) {
        if (!mkdir($output_dir, 0755, true)) {
            error_log("ERROR: Cannot create output directory: $output_dir");
        }
    }
  
    // Delete existing CSV if present
    if (file_exists("$output_dir/" . $csv_output_filename)) {
        unlink("$output_dir/" . $csv_output_filename);
        error_log("Deleted existing CSV: " . $csv_output_filename);
    }

    // Open CSV file for writing
    $csv_file = fopen("$output_dir/" . $csv_output_filename, 'w');
    
    if (!$csv_file) {
        error_log("ERROR: Cannot open CSV file for writing: $output_dir/" . $csv_output_filename);
    }

    // Write CSV headers
    fputcsv($csv_file, array('Correct_Position', 'Call_Number', 'Norm_Call_Number','Title', 'Position Scanned', 'Problems', 'Barcode'));

    // Begin HTML table
    echo '<div class="table-card">';
    echo '<table id="CNTable" class="results-table tablesorter">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="col-order">#</th>';
    echo '<th class="col-cn">Call Number</th>';
    echo '<th class="col-title">Title</th>';
    echo '<th class="col-scanned">Scanned</th>';
    echo '<th>Problems</th>';
    echo '<th class="col-barcode">Barcode</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Mid-output flush for long lists
    echo str_repeat(' ', 4096);
    @ob_flush();
    @flush();

    foreach ($output as $key => $record) {
        // Skip non-problem rows if only showing problems
        if ((isset($_POST['onlyproblems']) && $_POST['onlyproblems'] == 'true') && 
            (int)($record['problem'] ?? 0) != 1) {
            continue;
        }
        
        $row_class = ((int)($record['problem'] ?? 0) == 1) ? 'row-problem' : '';
        echo '<tr class="' . htmlspecialchars($row_class) . '">';

        echo '<td class="col-order">' . (int)($record['correct_location'] ?? 0) . '</td>';
        echo '<td class="col-cn">' . htmlspecialchars($record['call_number'] ?? '') . '</td>';
        echo '<td class="col-title">' . htmlspecialchars($record['title'] ?? '') . '</td>';
        echo '<td class="col-scanned">' . (int)($record['scanned_location'] ?? 0) . '</td>';

        // Transform problem text into styled badges
        $prob_html = $record['problem_list'] ?? '';
        $prob_html = str_replace('**OUT OF ORDER**', '<span class="problem-badge badge-order">OUT OF ORDER</span>', $prob_html);
        $prob_html = preg_replace('/\*\*WRONG CN TYPE\*\*/', '<span class="problem-badge badge-cn-type">WRONG CN TYPE</span>', $prob_html);
        $prob_html = preg_replace('/\*\*NIP: (.*?)\*\*/', '<span class="problem-badge badge-nip">NIP: $1</span>', $prob_html);
        $prob_html = preg_replace('/\*\*IN TEMP LOC\*\*/', '<span class="problem-badge badge-temp">TEMP LOC</span>', $prob_html);
        $prob_html = preg_replace('/\*\*WRONG LIBRARY: (.*?)\*\*/', '<span class="problem-badge badge-library">WRONG LIB: $1</span>', $prob_html);
        $prob_html = preg_replace('/\*\*WRONG LOCATION: (.*?)\*\*/', '<span class="problem-badge badge-location">WRONG LOC: $1</span>', $prob_html);
        $prob_html = preg_replace('/\*\*WRONG ITEM POLICY: (.*?)\*\*/', '<span class="problem-badge badge-policy">POLICY: $1</span>', $prob_html);
        $prob_html = preg_replace('/\*\*WRONG TYPE: (.*?)\*\*/', '<span class="problem-badge badge-type">TYPE: $1</span>', $prob_html);
        $prob_html = preg_replace('/\*\*BLANK ITEM POLICY\*\*/', '<span class="problem-badge badge-policy">BLANK POLICY</span>', $prob_html);
        $prob_html = preg_replace('/\*\*BLANK ITEM TYPE\*\*/', '<span class="problem-badge badge-type">BLANK TYPE</span>', $prob_html);
        $prob_html = preg_replace('/\*\*ITEM HAS REQUEST\*\*/', '<span class="problem-badge badge-nip">REQUESTED</span>', $prob_html);
        $prob_html = str_replace('Item Currently Between:', '<span class="problem-detail">Between: ', $prob_html);
        $prob_html = preg_replace('/Move item (back|forward) (\d+) spaces/', '</span><span class="problem-detail">Move $1 $2 spaces</span>', $prob_html);
        echo '<td>' . $prob_html . '</td>';

        echo '<td class="col-barcode">' . htmlspecialchars($record['barcode'] ?? '') . '</td>';
        echo '</tr>';

        // Output corresponding CSV row (strip HTML tags)
        $clean_problems = strip_tags($record['problem_list'] ?? '');
        $clean_problems = preg_replace('/\s+/', ' ', trim($clean_problems));
        fputcsv($csv_file, array(
            (int)($record['correct_location'] ?? 0), 
            $record['call_number'] ?? '', 
            $record['norm_call_number'] ?? '',
            $record['title'] ?? '', 
            (int)($record['scanned_location'] ?? 0), 
            $clean_problems, 
            '="' . ($record['barcode'] ?? '') . '"'
        ));
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>'; // Close table-card
    
    fclose($csv_file);
    error_log("CSV written: " . $output_dir . "/" . $csv_output_filename);
    
    // Final buffer flush
    echo str_repeat(' ', 4096);
    @ob_flush();
    @flush();
}
?>

<?php
// Mark processing as COMPLETE only AFTER full output rendered
if ($progress_id && $total_barcodes > 0) {
    $final_progress = array('percentage' => 100, 'job' => 'complete');
    $progress_file = $progress_dir . '/progress_' . $progress_id . '.json';
    
    if (is_writable($progress_dir)) {
        if (file_put_contents($progress_file, json_encode($final_progress)) !== false) {
            // Create done marker as additional signal for JavaScript polling
            touch($progress_dir . '/done_' . $progress_id . '.marker');
            error_log("✅ Processing complete marker written for progress_id: $progress_id");
            
            // Additional flush for progress endpoint visibility
            echo str_repeat(' ', 4096);
            @ob_flush();
            @flush();
        } else {
            error_log("❌ FAILED to write final progress marker: " . print_r(error_get_last(), true));
        }
    } else {
        error_log("ERROR: Progress directory not writable: $progress_dir");
    }
}
?>
<footer class="footer">Alma Inventory Scanner &middot; Powered by Alma API</footer>
</body>
</html>