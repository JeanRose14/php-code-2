<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>

    <h1> Registration Form </h1>

    <form action="process.php" method="POST">

       <label>Name: </label> </br>
       <input type="text" name="nm" required></p>

       <label>Email: </label> </br>
       <input type="email" name="email" required></p>

       <label>Password: </label> </br>
       <input type="password" name="pass" required></p>

       <label>Phone Number: </label> </br>
       <input type="text" name="pn" required></p>

       <input type="submit" name="reg_button" value="REGISTER">
    </form
    <p><a a href="index.php"> Click Here To Login! </a></p>
</body>
</html>