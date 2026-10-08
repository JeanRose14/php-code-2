<?php
  include "conn.php"; // Imports the database connection file so we can query MySQL
  session_start(); // Starts the session to keep track of who is logged in

   if(isset($_POST['reg_button'])){ // Checks if the REGISTER button from reg.php was pressed

      $name=$_POST['nm']; // Gets the name typed in the Name field
      $email=$_POST['email']; // Gets the email typed in the Email field
      $pass=$_POST['pass']; // Gets the password typed in the Password field
      $pn=$_POST['pn']; // Gets the phone number typed in the Phone Number field

      $insertusers=mysqli_query($conn, "INSERT INTO users VALUES('0','$name','$email','$pass','$pn')"); // Inserts the new user into the users table

      if($insertusers==true){ // If the insert into the database was successful
         ?>
         <script>
            alert("Your Registration was Succesful!"); // Pops up a message that registration was successful
            window.location.href='userhome.php'; // Redirects the user to the userhome.php page
         </script>
         <?php
         //echo "Your Registration was Succesful!"; // Alternative echo (disabled)
      }else{ // If there was an error while inserting
         ?>
         <script>
            alert("Error Registration\nTry Again!"); // Pops up the error message
            window.location.href='index.php'; // Redirects back to the login page
         </script>
         <?php
         //echo "Error Registration\nTry Again!"; // Alternative echo (disabled)
      }
  } //closing of registration // End of the registration process


       // login!
   if(isset($_POST['login'])){ // Checks if the LOGIN button from index.php was pressed
        
      $email=$_POST['login_email']; // Gets the email from the login form
      $pass=$_POST['login_pass']; // Gets the password from the login form

      $check=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'"); // Searches the users table for a user with this email and password

      $num=mysqli_num_rows($check); // Counts how many rows were found (to see if a user exists)

      if($num >=1){ // If at least one user was found

         $_SESSION['email']=$email; // Stores the email in the session to identify that they are logged in
         ?>
         <script>
            alert("Account Accepted! Welcome Users!"); // Pops up the welcome message
            window.location.href='userhome.php'; // Redirects to userhome.php
         </script>
         <?php
         //echo "Account Accepted! Welcome Users!"; // Alternative echo (disabled)
      }else{ // If no email/password matched
         //echo "Email or Password not Found!"; // Alternative echo (disabled)
         ?>
         <script>
            alert("Email or Password not Found!"); // Pops up the error message
            window.location.href='index.php'; // Redirects back to the login page
         </script>
         <?php
      }
   }

   
   // this program is for update users and account
   if(isset($_POST['update_account'])){ // Checks if the UPDATE button from update_profile.php was pressed

      $id = $_GET['id']; // Gets the user ID from the URL (?id=...)

      $upname = $_POST['up_name']; // Gets the new name to be updated
      $upemail = $_POST['up_email']; // Gets the new email to be updated
      $uppass = $_POST['up_pass']; // Gets the new password to be updated
      $upn = $_POST['up_pn']; // Gets the new phone number to be updated

      $updateaccount = mysqli_query($conn, "UPDATE users SET name='$upname', email='$upemail', password='$uppass', phone_number='$upn' WHERE id='$id'"); // Updates the record in the users table based on the ID

      if($updateaccount==true){ // If the update was successful
         ?>
         <script>
             alert("Data was changes successfully!"); // Pops up a message that the changes were successful
             window.location.href='userhome.php'; // Redirects to userhome.php
         </script>
         <?php

      }else{ // If there was an error during the update
          ?>
         <script>
             alert("Data was not changes !"); // Pops up the error message
             window.location.href='update_profile.php'; // Redirects back to the update profile page
         </script>
         <?php
      }
   }    

     //this code is for create post
   if(isset($_POST["create_post"])){ // Checks if the POST button from createpost.php was pressed

     $title =$_POST["title"]; // Gets the title of the post
     $date =$_POST["mydate"]; // Gets the date selected for the post
     $desc =$_POST["desc"]; // Gets the description/content of the post
     $posted_by =$_POST["posted_by"]; // Gets who posted it (the user's name)

     $insertpost=mysqli_query($conn, "INSERT INTO post VALUES('0','$title','$date','$desc','$posted_by')"); // Inserts the new post into the post table


     if($insertpost==true){ // If the post was inserted successfully

      ?>
         <script>
             alert("Post was inserted in the DB!"); // Pops up a message that it was saved to the database
             window.location.href='userhome.php'; // Redirects to userhome.php
         </script>
         <?php

     }else{ // If there was an error while inserting
      ?>
         <script>
             alert("Error in Posting!"); // Pops up the error message
             window.location.href='createpost.php'; // Redirects back to the create post page
         </script>
         <?php
      }
   }     
?>