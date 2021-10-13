<?php
function resize_image($file, $width, $height)
{
    list($w, $h) = getimagesize($file);
    
    // Calculate new image size with ratio
    $ratio = max($width / $w, $height / $h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    
    // Read binary data from image file 
    $imgString = file_get_contents($file);
    
    // create image from string 
    $image = imagecreatefromstring($imgString);
    $tmp = imagecreatetruecolor($width, $height);
    imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
    imagejpeg($tmp, $file, 100);
    return $file;
    
    // cleanup memory */
    imagedestroy($image);
    imagedestroy($tmp);
}

