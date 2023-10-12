<?php
$conn = mysqli_connect('localhost', 'root', '', 'login_data') or die("Connection Failed: " . mysqli_connect_error());

$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error Occurred: " . mysqli_error($conn);
} else {
    echo "<table>";
    echo "<tr><th>Username</th><th>email</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

mysqli_close($conn);
?>