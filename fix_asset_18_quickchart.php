<?php
require_once 'config/constants.php';
require_once 'config/functions.php';
$db = getDB();
$qr_data_url = SITE_URL . 'uploads/qrcodes/asset_18_details_1777102165.html';
$qr_path = 'https://quickchart.io/qr?text=' . urlencode($qr_data_url) . '&size=300';
$stmt = $db->prepare('UPDATE assets SET qr_code = :qr_code WHERE asset_id = 18');
$stmt->execute([':qr_code' => $qr_path]);
echo "Updated Asset #18 with QuickChart: " . $qr_path;
?>
