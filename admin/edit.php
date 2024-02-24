<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    //connection
    $conn = new mysqli('localhost', 'root', '', 'malith');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("UPDATE student SET st_name=?, st_age=?, st_address=?, mobile=? WHERE regno=?");
        $stmt->bind_param("sisii", $name, $age, $address, $mobile, $id);
        $execval = $stmt->execute();
        echo $execval;

        if ($execval) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
