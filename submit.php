<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    $conn = new mysqli("localhost", "root", "", "login_data");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email already exists
    $checkSql = "SELECT email FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);

    if ($checkStmt) {
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo "Email address is already registered. Please use a different email.";
            $checkStmt->close();
        } else {
            // Continue with registration if the email is not in use
            $checkStmt->close();

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the table
            $sql = "INSERT INTO users (username, email, e_verified, password) VALUES (?, ?, 'yes', ?)";

            // Create a prepared statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("sss", $name, $email, $hashedPassword);

                // Execute the prepared statement
                if ($stmt->execute()) {
                    echo "Data inserted successfully.";
                } else {
                    echo "Error executing statement: " . $stmt->error;
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        }
        $conn->close();
    }
}
?>
