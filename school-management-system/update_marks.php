<?php
// update_marks.php

include 'db_connect.php'; // Ensure the connection is established correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($action == 'Update') {
        // Sanitize and validate inputs
        $id = $conn->real_escape_string($_POST['id']);
        $roll_no = $conn->real_escape_string($_POST['roll_no']);
        $maths = filter_var($_POST['maths'], FILTER_VALIDATE_INT);
        $science = filter_var($_POST['science'], FILTER_VALIDATE_INT);
        $social_science = filter_var($_POST['social_science'], FILTER_VALIDATE_INT);
        $english = filter_var($_POST['english'], FILTER_VALIDATE_INT);
        $hindi = filter_var($_POST['hindi'], FILTER_VALIDATE_INT);
        $percent = $conn->real_escape_string($_POST['percent']);

        if ($maths !== false && $science !== false && $social_science !== false && $english !== false && $hindi !== false) {
            $sql = "UPDATE marks 
                    SET roll_no='$roll_no', maths='$maths', science='$science', social_science='$social_science', english='$english', hindi='$hindi', percent='$percent' 
                    WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Invalid input detected. Please enter valid integer values for marks.";
        }
    } elseif ($action == 'Delete') {
        $id = $conn->real_escape_string($_POST['id']);

        $sql = "DELETE FROM marks WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    
    $conn->close();
}
?>
