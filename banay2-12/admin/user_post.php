<?php
    include "../conn.php"; // Imports the database connection (one folder up from admin/)
    session_start(); // Starts the session to get the logged-in admin
   
    $email= $_SESSION['email']; // Gets the admin's email from the session
   
    $getadminname = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'"); // Searches the admin table using the admin's email

    while ($row = mysqli_fetch_object($getadminname)){ // Loops through each row found by the query
        $admin_name = $row->admin_name; // Gets the admin's name
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $admin_name;?></title> <!-- Displays the admin's name as the page title -->
    <link rel="stylesheet" href="adup.css">
</head>
<body>
    <h1> Welcome Admin <?php echo $admin_name;?></h1> <!-- Displays the admin's name on the page -->
    <hr> </hr>

    <a href="adminhome.php"> HOME </a> |
    <a href="user_post.php"> USER'S POST</a> |
    <a href=" index.php"> LOGOUT </a> |

   <h1> All Post By the Users</h1>
   <hr> </hr>
    <?php
    $getuserspost=mysqli_query($conn, "SELECT * FROM post"); // Gets all posts in the post table (from all users)
    while($row1=mysqli_fetch_array($getuserspost)){ // Loops through each post found
        ?>
        <h2>Title: <?php echo $row1['title'];?> </h2> <!-- Displays the title of the post -->
        <h2>Date: <?php echo $row1['mydate'];?> </h2> <!-- Displays the date of the post -->
        <h2>Description: <?php echo $row1['description'];?> </h2> <!-- Displays the description of the post -->
        <h2>Posted By: <?php echo $row1['posted_by'];?> </h2> <!-- Displays who made the post -->
        <hr> </hr>
    <?php
    }
    ?>
    
</body>
</html>