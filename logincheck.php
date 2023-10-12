<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli('localhost', 'root', '', 'login_data');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT password FROM users WHERE email = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $email);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Bind the result to a variable
            $stmt->bind_result($hashedPassword);

            // Fetch the result
            if ($stmt->fetch()) {
                // Verify the password
                if (password_verify($password, $hashedPassword)) {
                    header("location: userpanel.php");
                    
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "User not found.";
            }
        } else {
            echo "Error executing the query.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement.";
    }

    $conn->close();

    
}
?>
