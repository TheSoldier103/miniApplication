<?php
include ("/opt/lampp/htdocs/miniApplication/connection.php");
?>

<div class="container">
 
 <form method='post' action='export.php'>
  <input type='submit' value='Export' name='Export'>
 
  <table border='1' style='border-collapse:collapse;'>
    <tr>
     <th>Email</th>
     <th>Full Name</th>
     <th>Administrator</th>
     <th>Image</th>
    </tr>
    <?php
$query = "SELECT * FROM tbl_user ORDER BY id asc";
$result = mysqli_query($dbConnection, $query);
$user_arr = array();
while ($row = mysqli_fetch_array($result))
{
    $email = $row['email'];
    $name = $row['name'];
    $admin = $row['isAdmin'];
    $image = $row['image'];
    $user_arr[] = array(
        $email,
        $name,
        $admin,
        $image
    );
?>
      <tr>
       <td align="center"><?php echo $email; ?></td>
       <td align="center"><?php echo $name; ?></td>
       <td align="center"><?php echo $admin; ?></td>
       <td align="center"><?php echo "<img src=" . "../images/" . $row['image'] . " />"; ?></td>
       </tr>
   <?php
}
?>
   </table>
   
   <?php
$serialize_user_arr = serialize($user_arr);
?>
  <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
 </form>
</div>
