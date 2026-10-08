<?php
    include "conn.php"; // Imports the database connection so we can query MySQL
    session_start(); // Starts the session to get the current logged-in user

    $e=$_SESSION['email']; // Gets the email of the logged-in user from the session

    $getname=mysqli_query($conn, "SELECT * FROM users WHERE email='$e'"); // Searches the users table using the user's email
    while($row=mysqli_fetch_object($getname)){ // Loops through each row found by the query

        $id = $row -> id; // Gets the user ID (used in the URL for updating)
        $name= $row-> name; // Gets the user's name
        $email = $row -> email; // Gets the user's email
        $pass = $row -> password; // Gets the user's password
        $pn = $row -> phone_number; // Gets the user's phone number
            
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name;?></title> <!-- Displays the user's name as the page title -->
    <link rel="stylesheet" href="upprofile.css">
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
        <h1>UPDATE PROFILE</h1>
        <form action="process.php?id=<?php echo $id;?>" method="POST"> <!-- Sends the user ID to process.php so it knows which account to update -->
            <label>Name:</label>
            <input type="text" name="up_name"  required placeholder="Name here..."> </p>

            <label>Email:</label>
            <input type="email" name="up_email"  required placeholder="Email here..."> </p>
            
            <label>Password:</label>
            <input type="password" name="up_pass"  required placeholder="Password here..."> </p>


            <label>Phone Number:</label>
            <input type="text" name="up_pn"  required placeholder="Phone number..."> </p>

            <input type="submit" value="UPDATE" name="update_account">
        </form>
    </div>

</body>
</html>