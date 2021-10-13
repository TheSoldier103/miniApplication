<?php
include ("connection.php");
include ("functions.php");

function upload_image($image)
{
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array(
        "jpg",
        "jpeg",
        "png",
        "gif"
    );

    // Check extension
    if (in_array($imageFileType, $extensions_arr))
    {
        // Upload file
        move_uploaded_file(resize_image($tmp_name, 500, 500) , $target_dir . $name);
    }

}

