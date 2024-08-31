<?php
include 'header.php';  
include 'db_connect.php';  
?>
<style>
/* General Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    padding-top: 80px; /* Space for fixed header */
    padding-bottom: 60px; /* Space for fixed footer */
}

h2 {
    color: #007bff;
    text-align: center;
    margin-bottom: 20px;
}

/* Fixed Header Styling */
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #4CAF50;
    padding: 20px;
    color: white;
    text-align: center;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Footer Styling */
footer {
    
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    z-index: 1000;
    box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
}

.footer-container {
    margin: 0 auto;
    max-width: 1200px;
}

/* Form and Input Styling */
form {
    margin-bottom: 20px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

input[type="text"], input[type="date"], input[type="number"], input[type="email"], textarea, select {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: calc(100% - 22px);
    box-sizing: border-box;
    font-size: 14px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus, input[type="date"]:focus, input[type="number"]:focus, input[type="email"]:focus, textarea:focus, select:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
}

textarea {
    resize: vertical;
    height: 100px;
}

button, input[type="submit"] {
    padding: 10px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

button:hover, input[type="submit"]:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table, th, td {
    border: 1px solid #ddd;
}

th {
    background-color: #333;
    color: white;
    padding: 12px;
    text-align: left;
    font-weight: bold;
}

td {
    padding: 12px;
    background-color: #f9f9f9;
}

tr:nth-child(even) td {
    background-color: #f2f2f2;
}

tr:hover td {
    background-color: #e6f7ff;
}

img {
    max-width: 100px;
    height: auto;
    border-radius: 4px;
}

/* Modal Styling */
#editModal, #viewModal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    z-index: 1000;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    display: none;
    border-radius: 8px;
    box-sizing: border-box;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.modal-header h3 {
    margin: 0;
    color: #007bff;
}

.modal-header button {
    background-color: #dc3545;
    border: none;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.modal-header button:hover {
    background-color: #c82333;
}

/* Close button for modals */
button.close-modal {
    background-color: #dc3545;
    border: none;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

button.close-modal:hover {
    background-color: #c82333;
}

.modal-content {
    margin-bottom: 10px;
}

#searchForm{
    width: 100%;
    padding-left: 160px;
    padding-top: 80px;
}
#searchInput{
    width:50%;
}

</style>

<!-- Back Button to Dashboard -->
<button onclick="location.href='dashboard.php';" style="margin-bottom: 20px;">Back to Dashboard</button>

<h2>Existing Students</h2>

<!-- Search Bar and Button -->
<form id="searchForm" method="GET" action="">
    <input type="text" id="searchInput" name="search" placeholder="Search for students...">
    <button type="submit" id="searchButton"><i class="fas fa-search"></i>Search</button>
        <button type="button" onclick="location.href='dashboard.php';"><i class="fas fa-arrow-left"></i>Back to Dashboard</button>
</form>

<table border="1" id="studentsTable">
    <!-- Table Headings -->
    <tr>
        <th>ID</th>
        <th>Roll No</th>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Father's Name</th>
        <th>Photo</th>
        <th>Age</th>
        <th>Guardian Details</th>
        <th>Emergency Contacts</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Class</th>
        <th>Section</th>
        <th>Action</th>
    </tr>

    <?php
    // Fetch and display student records
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
    $sql = "SELECT * FROM students WHERE
            id LIKE '%$search%' OR
            roll_no LIKE '%$search%' OR
            full_name LIKE '%$search%' OR
            dob LIKE '%$search%' OR
            gender LIKE '%$search%' OR
            father_name LIKE '%$search%' OR
            government_id_photo LIKE '%$search%' OR
            age LIKE '%$search%' OR
            guardian_details LIKE '%$search%' OR
            emergency_contacts LIKE '%$search%' OR
            address LIKE '%$search%' OR
            contact_number LIKE '%$search%' OR
            email LIKE '%$search%' OR
            class LIKE '%$search%' OR
            section LIKE '%$search%'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["roll_no"]) . "</td>
                    <td>" . htmlspecialchars($row["full_name"]) . "</td>
                    <td>" . htmlspecialchars($row["dob"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                    <td>" . htmlspecialchars($row["father_name"]) . "</td>
                    <td><img src='" . htmlspecialchars($row["government_id_photo"]) . "' alt='ID Photo' width='50'></td>
                    <td>" . htmlspecialchars($row["age"]) . "</td>
                    <td>" . htmlspecialchars($row["guardian_details"]) . "</td>
                    <td>" . htmlspecialchars($row["emergency_contacts"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["contact_number"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["class"]) . "</td>
                    <td>" . htmlspecialchars($row["section"]) . "</td>
                    <td>
                        <form method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>
                            <input type='submit' name='view_student' value='View'>
                        </form>
                        <button onclick=\"openEditModal('" . htmlspecialchars($row["id"]) . "', '" . htmlspecialchars($row["roll_no"]) . "', '" . htmlspecialchars($row["full_name"]) . "', '" . htmlspecialchars($row["dob"]) . "', '" . htmlspecialchars($row["gender"]) . "', '" . htmlspecialchars($row["father_name"]) . "', '" . htmlspecialchars($row["government_id_photo"]) . "', '" . htmlspecialchars($row["age"]) . "', '" . htmlspecialchars($row["guardian_details"]) . "', '" . htmlspecialchars($row["emergency_contacts"]) . "', '" . htmlspecialchars($row["address"]) . "', '" . htmlspecialchars($row["contact_number"]) . "', '" . htmlspecialchars($row["email"]) . "', '" . htmlspecialchars($row["class"]) . "', '" . htmlspecialchars($row["section"]) . "')\">Edit</button>
                        <form method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>
                            <input type='submit' name='delete_student' value='Delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No students found</td></tr>";
    }
    ?>
</table>

<!-- Edit Modal -->
<div id="editModal">
    <h3>Edit Student Details</h3>
    <form id="editForm" method="POST" action="update_student.php">
        <input type="hidden" id="edit_id" name="id">
        <!-- Edit Fields -->
        <label>Roll No:</label><br>
        <input type="text" id="edit_roll_no" name="roll_no" required><br>
        <label>Full Name:</label><br>
        <input type="text" id="edit_full_name" name="full_name" required><br>
        <label>Date of Birth:</label><br>
        <input type="date" id="edit_dob" name="dob" required><br>
        <label>Gender:</label><br>
        <select id="edit_gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label>Father's Name:</label><br>
        <input type="text" id="edit_father_name" name="father_name" required><br>
        <label>Photo:</label><br>
        <input type="text" id="edit_government_id_photo" name="government_id_photo" required><br>
        <label>Age:</label><br>
        <input type="number" id="edit_age" name="age" required><br>
        <label>Guardian Details:</label><br>
        <textarea id="edit_guardian_details" name="guardian_details" required></textarea><br>
        <label>Emergency Contacts:</label><br>
        <textarea id="edit_emergency_contacts" name="emergency_contacts" required></textarea><br>
        <label>Address:</label><br>
        <textarea id="edit_address" name="address" required></textarea><br>
        <label>Contact Number:</label><br>
        <input type="text" id="edit_contact_number" name="contact_number" required><br>
        <label>Email:</label><br>
        <input type="email" id="edit_email" name="email" required><br>
        <label>Class:</label><br>
        <input type="number" id="edit_class" name="class" required><br>
        <label>Section:</label><br>
        <input type="text" id="edit_section" name="section" required><br><br>
        <input type="submit" value="Update Details">
        <button type="button" onclick="closeEditModal()">Close</button>
    </form>
</div>

<script>
function openEditModal(id, rollNo, fullName, dob, gender, fatherName, Photo, age, guardianDetails, emergencyContacts, address, contactNumber, email, classValue, section) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_roll_no').value = rollNo;
    document.getElementById('edit_full_name').value = fullName;
    document.getElementById('edit_dob').value = dob;
    document.getElementById('edit_gender').value = gender;
    document.getElementById('edit_father_name').value = fatherName;
    document.getElementById('edit_government_id_photo').value = Photo;
    document.getElementById('edit_age').value = age;
    document.getElementById('edit_guardian_details').value = guardianDetails;
    document.getElementById('edit_emergency_contacts').value = emergencyContacts;
    document.getElementById('edit_address').value = address;
    document.getElementById('edit_contact_number').value = contactNumber;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_class').value = classValue;
    document.getElementById('edit_section').value = section;
    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}


</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_student'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $sql = "DELETE FROM students WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Student deleted successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    if (isset($_POST['view_student'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div id='viewModal' style='display:block; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color:#fff; padding:20px; box-shadow:0 0 10px rgba(0,0,0,0.5); z-index:1000;'>
                    <h3>Student Details</h3>
                    <p><strong>ID:</strong> " . htmlspecialchars($row['id']) . "</p>
                    <p><strong>Roll No:</strong> " . htmlspecialchars($row['roll_no']) . "</p>
                    <p><strong>Full Name:</strong> " . htmlspecialchars($row['full_name']) . "</p>
                    <p><strong>Date of Birth:</strong> " . htmlspecialchars($row['dob']) . "</p>
                    <p><strong>Gender:</strong> " . htmlspecialchars($row['gender']) . "</p>
                    <p><strong>Father's Name:</strong> " . htmlspecialchars($row['father_name']) . "</p>
                    <p><strong>Photo:</strong> <img src='" . htmlspecialchars($row['government_id_photo']) . "' alt='ID Photo' width='100'></p>
                    <p><strong>Age:</strong> " . htmlspecialchars($row['age']) . "</p>
                    <p><strong>Guardian Details:</strong> " . htmlspecialchars($row['guardian_details']) . "</p>
                    <p><strong>Emergency Contacts:</strong> " . htmlspecialchars($row['emergency_contacts']) . "</p>
                    <p><strong>Address:</strong> " . htmlspecialchars($row['address']) . "</p>
                    <p><strong>Contact Number:</strong> " . htmlspecialchars($row['contact_number']) . "</p>
                    <p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>
                    <button onclick=\"document.getElementById('viewModal').style.display='none';\">Close</button>
                  </div>";
        }
    }
}
?>

<?php
$conn->close();
?>
<footer>
    <?php include 'footer.php'; ?>
    
</footer>

