<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> 
    
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="logincheck.php"> 
        

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>

    
</body>
</html>
