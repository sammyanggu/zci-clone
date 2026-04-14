<?php
$logoPath = '../assets/images-zconnect/logo/z-connect-circle-logo.png';
if (file_exists($logoPath)) {
    $imageData = file_get_contents($logoPath);
    $base64 = base64_encode($imageData);
    echo $base64;
} else {
    echo "Logo file not found at: " . realpath($logoPath);
}
?>
