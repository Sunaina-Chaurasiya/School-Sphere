<?php
include 'header.php';  
include 'db_connect.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_student'])) {
        $roll_no = $_POST['roll_no'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $father_name = $_POST['father_name'];
        $age = $_POST['age'];
        $guardian_details = $_POST['guardian_details'];
        $emergency_contacts = $_POST['emergency_contacts'];
        $class = $_POST['class'];
        $section = $_POST['section'];

        // File upload handling
        $target_dir = "uploads/";
        $government_id_photo = $target_dir . basename($_FILES["government_id_photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($government_id_photo, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["government_id_photo"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($government_id_photo)) {
            // Rename the file to ensure uniqueness
            $unique_id = time();
            $government_id_photo = $target_dir . $unique_id . '_' . basename($_FILES["government_id_photo"]["name"]);
        }

        // Check file size (limit to 5MB)
        if ($_FILES["government_id_photo"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["government_id_photo"]["tmp_name"], $government_id_photo)) {
                echo "The file ". htmlspecialchars(basename($_FILES["government_id_photo"]["name"])) . " has been uploaded.";

                // Proceed with database insertion only if the file is successfully uploaded
                $sql = "INSERT INTO students (roll_no, first_name, last_name, dob, gender, address, contact_number, email, father_name, government_id_photo, age, guardian_details, emergency_contacts, class, section)
                        VALUES ('$roll_no', '$first_name', '$last_name', '$dob', '$gender', '$address', '$contact_number', '$email', '$father_name', '$government_id_photo', '$age', '$guardian_details', '$emergency_contacts', '$class', '$section')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>New student added successfully</p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Other operations (edit_student and delete_student)...
}

$conn->close();
?>
<style>
    /* General Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    padding: 20px;
    margin: 0;
    line-height: 1.6;
}

h2 {
    color: #007bff;
    text-align: center;
    margin-bottom: 20px;
}

/* Form Styling */
form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto;
}

form label {
    font-weight: bold;
    margin-top: 10px;
    color: #495057;
    display: inline-block;
}

form input[type="text"], form input[type="number"], form input[type="date"], form input[type="email"], form input[type="file"], form select, form textarea {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 5px 0 15px 0;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

form input[type="text"]:focus, form input[type="number"]:focus, form input[type="date"]:focus, form input[type="email"]:focus, form input[type="file"]:focus, form select:focus, form textarea:focus {
    border-color: #80bdff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
}

form input[type="file"] {
    padding: 4px;
}

form textarea {
    height: 100px;
    resize: vertical;
}

/* Button Styling */
form input[type="submit"], button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: inline-block;
}

form input[type="submit"]:hover, button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

form input[type="submit"]:active, button:active {
    transform: scale(0.95);
}

/* Optional Fields */
.optional {
    color: #6c757d;
    font-style: italic;
    font-size: 14px;
}

</style>
<form method="POST" enctype="multipart/form-data">
    <label>Roll Number:</label><br>
    <input type="number" name="roll_no" required><br>
    <label>First Name:</label><br>
    <input type="text" name="first_name" required><br>
    <label>Last Name:</label><br>
    <input type="text" name="last_name" required><br>
    <label>Date of Birth:</label><br>
    <input type="date" name="dob" required><br>
    <label>Gender:</label><br>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br>
    <label>Father's Name:</label><br>
    <input type="text" name="father_name" required><br>
    <label>Photo:</label><br>
    <input type="file" name="government_id_photo" accept="image/*" required><br>
    <label>Age:</label><br>
    <input type="number" name="age" required><br>
    <label>Address:</label><br>
    <input type="text" name="address" required><br>
    <label>Contact Number:</label><br>
    <input type="text" name="contact_number" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    
    <label>Class:</label><br>
    <input type="text" name="class" required><br>
    <label>Section:</label><br>
    <input type="text" name="section" required><br>
    
    <label>Guardian Details (Optional):</label><br>
    <input type="text" name="guardian_details"><br>
    <label>Emergency Contacts (Optional):</label><br>
    <input type="text" name="emergency_contacts"><br><br>
    <input type="submit" name="add_student" value="Add Student">
</form>
