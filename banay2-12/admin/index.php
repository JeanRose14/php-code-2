<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adlog.css">
</head>
<body>
    <h1> Login Page for Admin </h1>

    <form action="adminprocess.php" method="post">
        <label Email </label><br>
        <input type="email" name="email"  required placeholder="Email here..."> </p>
 

        <label Password </label> <br> 
        <input type="password" name="pass"  required  placeholder="Password here..."> </p>

        <input type="submit" name="admin_login" value="LOGIN">
    </form>
</body>
</html>