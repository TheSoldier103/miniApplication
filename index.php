<?php

session_start();

include ("connection.php");
include ("uploadImage.php");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $imageURL = 'image';

    if (isset($_POST['isAdmin']) && !empty($_FILES[$imageURL]))
    {
        $isAdmin = 1;
        $image = $_FILES[$imageURL]['name'];

        $query = "insert into tbl_user (email,name,isAdmin,image) values ('$email','$name','$isAdmin','$image')";
        mysqli_query($dbConnection, $query);
        upload_image($imageURL);

        header("Location: index.php");
        die;
    }

    elseif (is_null($_POST['isAdmin']) && !empty($_FILES[$imageURL]['name']))
    {
        $error = "Bad request!";
        echo "<div class='alert alert-danger'>" . $error . "</div>";
    }
    elseif (isset($_POST['isAdmin']) && !empty($_FILES[$imageURL]['name']))
    {
        $isAdmin = 1;
        $query = "insert into tbl_user (email,name,isAdmin,image) values ('$email','$name','$isAdmin','$image')";
        mysqli_query($dbConnection, $query);
        header("Location: index.php");
        die;
    }
    else
    {
        $isAdmin = 0;
        $query = "insert into tbl_user (email,name,isAdmin,image) values ('$email','$name','$isAdmin','$image')";
        mysqli_query($dbConnection, $query);
        header("Location: index.php");
        die;

    }

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP Mini Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="post" action="" enctype='multipart/form-data'>

  <div class="container">
    <h1>User Form</h1>
    <p>Please fill in this form to add a new user.</p>
    <hr>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="text" required>

    <label for="full_name"><b>Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="name" id="text" required>

    <label for="isAdmin"><b>Administrator</b></label> 
    <input type="checkbox" id="isAdmin" name="isAdmin">
    
    <label for="image"><b>Select image:</b></label>
    <input type='file' name='image'>
   
    <button type="submit" class="registerbtn">Submit</button>
  </div>
 
</form>

</body>
</html>
