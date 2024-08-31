<?php
include 'db_connect.php';

if (isset($_POST['payment_id'])) {
    $payment_id = $conn->real_escape_string($_POST['payment_id']);

    $stmt = $conn->prepare("SELECT students.first_name, students.last_name, students.contact_number, fees.paid_date, fees.amount, fees.status 
                            FROM fees 
                            JOIN students ON fees.roll_no = students.roll_no 
                            WHERE fees.id = ?");
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(null);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(null);
}
?>
