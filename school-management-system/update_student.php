<?php
include 'header.php';  
include 'db_connect.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and escape input
    $id = $conn->real_escape_string($_POST['id']);
    $roll_no = $conn->real_escape_string($_POST['roll_no']);
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $father_name = $conn->real_escape_string($_POST['father_name']);
    $government_id_photo = $conn->real_escape_string($_POST['government_id_photo']);
    $age = $conn->real_escape_string($_POST['age']);
    $guardian_details = $conn->real_escape_string($_POST['guardian_details']);
    $emergency_contacts = $conn->real_escape_string($_POST['emergency_contacts']);
    $address = $conn->real_escape_string($_POST['address']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $email = $conn->real_escape_string($_POST['email']);
    $class = $conn->real_escape_string($_POST['class']);
    $section = $conn->real_escape_string($_POST['section']);

    // Complete SQL query with all columns
    $sql = "UPDATE students SET 
                roll_no='$roll_no', 
                full_name='$full_name', 
                dob='$dob', 
                gender='$gender', 
                father_name='$father_name', 
                government_id_photo='$government_id_photo', 
                age='$age', 
                guardian_details='$guardian_details', 
                emergency_contacts='$emergency_contacts', 
                address='$address', 
                contact_number='$contact_number', 
                email='$email', 
                class='$class', 
                section='$section' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Student details updated successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<?php include 'footer.php'; ?>
