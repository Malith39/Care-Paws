<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
       
    </style>
</head>
<body>
    <?php
        $conn = new mysqli('localhost', 'root', '', 'malith');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM student");

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>Mobile</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['regno'] . "</td>";
                echo "<td>" . $row['st_name'] . "</td>";
                echo "<td>" . $row['st_age'] . "</td>";
                echo "<td>" . $row['st_address'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }

        $conn->close();
    ?>
</body>
</html>
