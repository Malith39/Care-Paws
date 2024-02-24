<?php
    $conn = new mysqli('localhost', 'root', '', 'malith');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM student WHERE regno=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        echo "Record deleted successfully.";
    } else {
        echo "Invalid request.";
    }

    $conn->close();
?>
