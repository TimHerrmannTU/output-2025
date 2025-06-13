<?php
// Step 0: Set headers for download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="projekte.csv"');

// Step 0.1: Open output and write UTF-8 BOM for Excel compatibility
$csvFile = fopen('php://output', 'w');
fwrite($csvFile, "\xEF\xBB\xBF"); // UTF-8 BOM

// Step 1: Fetch data
$endpoint = 'https://output-dd.de/wp-json/wp/v2/projekte?output-year=511&per_page=100';
$json = file_get_contents($endpoint);
$data = json_decode($json, true);

// Step 2: Clean up and extract ACF fields
$filteredData = [];
$keysToRemove = ['project-details-thumbnail', 'project-details-upload', 'project-details-start-time'];

foreach ($data as $post) {
    $post = $post["acf"] ?? [];
    foreach ($keysToRemove as $key) {
        unset($post[$key]);
    }

    // Sanitize values: remove delimiter & trim
    foreach ($post as $key => &$value) {
        if (is_array($value)) {
            $value = json_encode($value, JSON_UNESCAPED_UNICODE);
        }
        $value = str_replace('|', '', $value); // Remove delimiter
        $value = trim($value);
    }

    $filteredData[] = $post;
}

// Step 3: Extract unique dynamic headers
$headers = [];
foreach ($filteredData as $post) {
    $headers = array_merge($headers, array_keys($post));
}
$headers = array_unique($headers);

// Step 4: Write CSV
fputcsv($csvFile, $headers, '|');

foreach ($filteredData as $post) {
    $row = [];
    foreach ($headers as $header) {
        $value = $post[$header] ?? '';
        $row[] = str_replace('|', '', $value); // Remove accidental delimiters again just in case
    }
    fputcsv($csvFile, $row, '|');
}

fclose($csvFile);
echo "CSV generiert";
?>