<?php
// update_marks.php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($action == 'Update') {
        $id = $conn->real_escape_string($_POST['id']);
        $roll_no = $conn->real_escape_string($_POST['roll_no']);
        $maths = $conn->real_escape_string($_POST['maths']);
        $science = $conn->real_escape_string($_POST['science']);
        $social_science = $conn->real_escape_string($_POST['social_science']);
        $english = $conn->real_escape_string($_POST['english']);
        $hindi = $conn->real_escape_string($_POST['hindi']);
        $grade = $conn->real_escape_string($_POST['grade']);

        $sql = "UPDATE marks 
                SET roll_no='$roll_no', maths='$maths', science='$science', social_science='$social_science', english='$english', hindi='$hindi', grade='$grade' 
                WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
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
