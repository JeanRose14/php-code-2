<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="log_in.css">
    
</head>
<body>

<h1> Welcome to My Login Page! </h1>

  <form action="process.php"method="POST">

    <label>Email:</label></br>
    <input type="email" name="login_email" required placeholder="Enter Email Here!..">
    </br></br>
    <label>Password:</label></br>
    <input type="password" name="login_pass"required placeholder="Enter Password Here!..">
    </br></br>

    <input type="submit" name="login" value="LOGIN">

   <p><a a href="reg.php"> Click Here To Register! </a></p>

   
</body>
</html>