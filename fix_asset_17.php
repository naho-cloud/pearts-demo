<?php
require_once 'config/constants.php';
require_once 'config/functions.php';
$db = getDB();
$qr_data_url = SITE_URL . 'uploads/qrcodes/asset_17_details_1776672932.html';
$qr_path = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($qr_data_url);
$stmt = $db->prepare('UPDATE assets SET qr_code = :qr_code WHERE asset_id = 17');
$stmt->execute([':qr_code' => $qr_path]);
echo "Updated Asset #17 with: " . $qr_path;
?>
