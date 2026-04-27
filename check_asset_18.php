<?php
require_once 'config/constants.php';
require_once 'config/functions.php';
$db = getDB();
$stmt = $db->prepare('SELECT qr_code FROM assets WHERE asset_id = 18');
$stmt->execute();
$asset = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Asset #18 QR Code: " . $asset['qr_code'];
?>
