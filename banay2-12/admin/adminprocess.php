<?php
    include "../conn.php"; // Imports the database connection (one folder up from admin/)
    session_start(); // Starts the session for the admin login

    if(isset($_POST["admin_login"])){ // Checks if the LOGIN button from admin/index.php was pressed

        $email = $_POST["email"]; // Gets the email from the admin login form
        $pass = $_POST["pass"]; // Gets the password from the admin login form
        
        $checkadmin=mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$pass'"); // Searches the admin table for an admin with this email and password
        $num = mysqli_num_rows($checkadmin); // Counts how many matching admins were found
        
        if($num >=1){ // If an admin was found
            $_SESSION["email"]=$email; // Stores the email in the session to identify them as a logged-in admin
            ?>
            <script>
                alert("Welcome Admin!"); // Pops up the welcome message
                window.location.href="adminhome.php"; // Redirects to adminhome.php
             </script>
            <?php
        }else{ // If no email/password matched
            ?>
            <script>
                alert("Erorr in Email or Password!"); // Pops up the error message
                window.location.href="index.php"; // Redirects back to the admin login page
            </script>
            <?php
        }
    }
?>