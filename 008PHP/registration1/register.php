<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration system using PHP and MYSQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post" action="register.php" >
        <div class="header">
            <h2>Register</h2>
        </div>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="text" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="text" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>
    </form>
</body>
</html>