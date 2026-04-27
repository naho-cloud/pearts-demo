<?php
require_once 'config/constants.php';
require_once 'config/functions.php';
$db = getDB();
$stmt = $db->prepare('SELECT * FROM assets WHERE asset_id = 17');
$stmt->execute();
$asset = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($asset);
?>
