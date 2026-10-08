<?php
    include "conn.php"; // Imports the database connection so we can query MySQL
    session_start(); // Starts the session to get the current logged-in user

    $e=$_SESSION['email']; // Gets the email of the logged-in user from the session

    $getname=mysqli_query($conn, "SELECT * FROM users WHERE email='$e'"); // Searches the users table using the user's email
    while($row=mysqli_fetch_object($getname)){ // Loops through each row found by the query

       $name=$row-> name;  // Gets the user's name and stores it in $name
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $name;?></title> <!-- Displays the user's name as the page title -->
  <link rel="stylesheet" href="home.css">

   
</head>
<body>

  <a href="userhome.php"> HOME </a>
  <a href="gallery.php"> GALLERY </a>  
  <a href="groupproject.php"> GROUP PROJECT </a>
  <a href="createpost.php"> CREATE POST </a>
  <a href="update_profile.php"> UPDATE PROFILE </a>
  <a href="index.php"> LOGOUT </a>

  <hr> </hr>

  <h1> This is your post</h1>

  <?php
    $getpost = mysqli_query($conn, "SELECT * FROM post WHERE posted_by='$name'"); // Gets all posts in the post table made by this user
    while($row = mysqli_fetch_array($getpost)){ // Loops through each post found
       
      ?>
      <div class="post-box">
      <h2>Title: <?php echo $row['title']; ?> </h2> <!-- Displays the title of the post -->
      <h3>Date: <?php echo $row['mydate']; ?> </h3> <!-- Displays the date of the post -->
      <h3>Description: <?php echo $row['description']; ?> </h3> <!-- Displays the description of the post -->
      </div>
      <hr> </hr>
      <?php
    }
  ?>

</body>
</html>