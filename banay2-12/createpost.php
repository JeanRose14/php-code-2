<?php
    include "conn.php"; // Imports the database connection file so we can query MySQL
    session_start(); // Starts the session to keep track of who is logged in

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name;?> - Create Post</title> <!-- Displays the user's name in the page title -->
    <link rel="stylesheet" href="cp.css">
</head>
<body>

    <nav>
        <a href="userhome.php"> HOME </a>
        <a href="gallery.php"> GALLERY </a>  
        <a href="groupproject.php"> GROUP PROJECT </a>
        <a href="createpost.php"> CREATE POST </a>
        <a href="update_profile.php"> UPDATE PROFILE </a>
        <a href="index.php"> LOGOUT </a>
    </nav>

    <div class="form-container">

        <h1>Create Post</h1>

        <form action="process.php" method="POST">

            <label>Title of your Post</label>
            <input type="text" name="title" required placeholder="Add Title here..">

            <label>Select Date</label>
            <input type="date" name="mydate" required>

            <label>Add Description</label>
            <textarea name="desc" rows="6" placeholder="Write something..."></textarea>

            <input type="hidden" name="posted_by" value="<?php echo $name; ?>"> <!-- Hidden field: automatically sends the user's name to process.php -->

            <input type="submit" name="create_post" value="POST">
            
        </form>
    </div>

</body>
</html>