<?php
require_once 'config/constants.php';
require_once 'config/functions.php';
require_once 'controllers/QRCodeController.php';

// Mock GD library not loaded (we know it's not in CLI)
echo "Testing QR Generation with fallback (GD should be missing)...\n";

$qr = new QRCodeController();

$asset_data = [
    'asset_id' => 19,
    'serial_number' => 'FALLBACK_TEST'
];

$user_data = [
    'full_name' => 'Test User'
];

$qr_result = $qr->generateSecurityQR($asset_data, $user_data, '', '');

echo "QR Result:\n";
print_r($qr_result);

$qr_path = '';
if ($qr_result['success']) {
    $qr_path = $qr_result['filepath'];
    echo "Success path: $qr_path\n";
} elseif (!empty($qr_result['html_file'])) {
    echo "Fallback triggered! HTML file: " . $qr_result['html_file'] . "\n";
    $qr_data_url = SITE_URL . $qr_result['html_file'];
    $qr_path = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data_url);
    echo "Generated QR Path: $qr_path\n";
} else {
    echo "Total failure!\n";
}

if (!empty($qr_path)) {
    echo "FINAL QR PATH: $qr_path\n";
} else {
    echo "QR PATH IS EMPTY!\n";
}
?>
