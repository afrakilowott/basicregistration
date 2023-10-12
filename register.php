<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> 

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;

            // Password validation criteria
            var lengthRegex = /.{8,}/;     // At least 8 characters long
            var uppercaseRegex = /[A-Z]/; // At least one uppercase letter
            var digitRegex = /\d/;        // At least one digit

            if (!lengthRegex.test(password)) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            if (!uppercaseRegex.test(password) || !digitRegex.test(password)) {
                alert("Password must contain at least one uppercase letter and one digit.");
                return false;
            }

            return true;
        }
    </script>
    
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form method="POST" action="submit.php"> 
        
        <label for="name">Username:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <input type="submit" name="submit" value="Register">
        
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
    
    
</body>
</html>
