<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet - School Sphere</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-bar input[type="text"]:focus {
            border-color: #3e8e41;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.5);
        }

        .search-bar input[type="submit"] {
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e6f7ff;
        }

        /* Button Styles */
        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color: #0277bd;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #01579b;
            transform: scale(1.05);
        }

        /* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 0; /* Remove default padding */
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    z-index: 1000;
    border-radius: 10px;
    max-width: 400px;
    width: 100%;
    max-height: 80vh; /* Limit the height */
    overflow: scroll; /* Hide overflowing content */
}

.modal-content {
    display: flex;
    flex-direction: column;
    height: 100%;
}

/* Modal Header */
.modal-header {
    background-color: #f5f5f5;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

.modal-header h3 {
    margin: 0;
    color: #333;
}

/* Modal Body */
.modal-body {
    padding: 15px;
    overflow-y: auto; /* Enable vertical scrolling */
    flex: 1; /* Take up available space */
}

/* Modal Footer */
.modal-footer {
    background-color: #f5f5f5;
    padding: 15px;
    border-top: 1px solid #ddd;
    text-align: center;
}

.modal-footer button {
    margin: 0 5px;
}


        /* Modal Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        /* Form Styles */
        form label {
            display: block;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #333;
        }

        form input[type="text"],
        form input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 2px solid #4CAF50;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus {
            border-color: #45a049;
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.3);
        }

        form input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0277bd;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #01579b;
            transform: scale(1.05);
        }


    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Search Bar -->
    <div class="search-bar">
        <form method="GET" action="">
            <label for="search">Search Student:</label>
            <input type="text" id="search" name="search" placeholder="Enter roll number or name">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="content">
        <h2>Marksheet</h2>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Roll Number</th>
                <th>Student Name</th>
                <th>Maths</th>
                <th>Science</th>
                <th>Social Science</th>
                <th>English</th>
                <th>Hindi</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
            <style>
                th {
    background-color: #333;
    color: white;
    padding: 12px;
    text-align: left;
    font-weight: bold;
}
            </style>
            <?php
            // Include the database connection
            include 'db_connect.php';

            // Handle delete action
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
                if ($_POST['action'] == 'Delete') {
                    $id = $_POST['id'];
                    $sql = "DELETE FROM marks WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Mark deleted successfully');</script>";
                    } else {
                        echo "<script>alert('Error: " . $conn->error . "');</script>";
                    }
                }
            }

            // Search functionality
            $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
            $sql = "SELECT marks.id, marks.roll_no, students.first_name, students.last_name, marks.maths , marks.science , marks.social_science, marks.english , marks.hindi, marks.grade 
                    FROM marks 
                    JOIN students ON marks.roll_no = students.roll_no
                    WHERE students.roll_no LIKE '%$search%' OR CONCAT(students.first_name, ' ', students.last_name) LIKE '%$search%'";
            $result = $conn->query($sql);

            
if ($result === FALSE) {
    echo "<tr><td colspan='6'>Error: " . $conn->error . "</td></tr>";
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["roll_no"]) . "</td>
                <td>" . htmlspecialchars($row["first_name"]) . " " . htmlspecialchars($row["last_name"]) . "</td>
                <td>" . htmlspecialchars($row["maths"]) . "</td>
                <td>" . htmlspecialchars($row["science"]) . "</td>
                <td>" . htmlspecialchars($row["social_science"]) . "</td>
                <td>" . htmlspecialchars($row["english"]) . "</td>
                <td>" . htmlspecialchars($row["hindi"]) . "</td>
                <td>" . htmlspecialchars($row["grade"]) . "</td>
                <td>
                    <button type='button' onclick='openModal(\"editModal\", {
                        id: \"" . htmlspecialchars($row["id"]) . "\",
                        roll_no: \"" . htmlspecialchars($row["roll_no"]) . "\",
                        maths: \"" . htmlspecialchars($row["maths"]) . "\",
                        science: \"" . htmlspecialchars($row["science"]) . "\",
                        social_science: \"" . htmlspecialchars($row["social_science"]) . "\",
                        english: \"" . htmlspecialchars($row["english"]) . "\",
                        hindi: \"" . htmlspecialchars($row["hindi"]) . "\",
                        grade: \"" . htmlspecialchars($row["grade"]) . "\"
                    })'>Edit</button>
                    <button type='button' onclick='openModal(\"viewModal\", {
                        roll_no: \"" . htmlspecialchars($row["roll_no"]) . "\",
                        name: \"" . htmlspecialchars($row["first_name"]) . " " . htmlspecialchars($row["last_name"]) . "\",
                        maths: \"" . htmlspecialchars($row["maths"]) . "\",
                        science: \"" . htmlspecialchars($row["science"]) . "\",
                        social_science: \"" . htmlspecialchars($row["social_science"]) . "\",
                        english: \"" . htmlspecialchars($row["english"]) . "\",
                        hindi: \"" . htmlspecialchars($row["hindi"]) . "\",
                        grade: \"" . htmlspecialchars($row["grade"]) . "\"
                    })'>View</button>
                    <button type='button' onclick='deleteRecord(\"" . htmlspecialchars($row["id"]) . "\")'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No marks found</td></tr>";
}

            // Close the database connection
            $conn->close();
            ?>
        </table>
    </div>

    <!-- Modal Overlay -->
    <div id="modalOverlay" class="modal-overlay" onclick="closeAllModals()"></div>

    <!-- View Modal -->
<div id="viewModal" class="modal">
    <h3>View Marks Details</h3>
    <p id="view_roll_no"></p>
    <p id="view_name"></p>
    <p id="view_maths"></p>
    <p id="view_science"></p>
    <p id="view_social_science"></p>
    <p id="view_english"></p>
    <p id="view_hindi"></p>
    <p id="view_grade"></p>
    <label for="print_template">Select Template:</label><br>
    <select id="print_template">
        <option value="default">Default</option>
        <option value="template1">Template 1</option>
        <option value="template2">Template 2</option>
    </select><br><br>
    <button onclick="printMarks()">Print</button>
    <button onclick="closeModal('viewModal')">Close</button>
</div>


    <!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Marks Details</h3>
        </div>
        <div class="modal-body">
            <form id="editForm" method="POST" onsubmit="return updateMarks();">
                <input type="hidden" id="edit_id" name="id">
                <label>Roll Number:</label><br>
                <input type="text" id="edit_roll_no" name="roll_no" required><br>
                <label>Maths:</label><br>
                <input type="text" id="edit_maths" name="maths" required><br>
                <label>Science:</label><br>
                <input type="text" id="edit_science" name="science" required><br>
                <label>Social Science:</label><br>
                <input type="text" id="edit_social_science" name="social_science" required><br>
                <label>English:</label><br>
                <input type="text" id="edit_english" name="english" required><br>
                <label>Hindi:</label><br>
                <input type="text" id="edit_hindi" name="hindi" required><br>
                <label>Grade:</label><br>
                <input type="text" id="edit_grade" name="grade" required><br><br>
                <input type="hidden" name="action" value="Update">
                <input type="submit" value="Update Marks">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" onclick="closeModal('editModal')">Close</button>
        </div>
    </div>
</div>


    <script>
        function openModal(modalId, data) {
            var modal = document.getElementById(modalId);
            var overlay = document.getElementById('modalOverlay');
            if (modalId === 'viewModal') {
                document.getElementById('view_roll_no').innerText = 'Roll Number: ' + data.roll_no;
                document.getElementById('view_name').innerText = 'Student Name: ' + data.name;
                document.getElementById('view_maths').innerText = 'maths: ' + data.maths;
                document.getElementById('view_science').innerText = 'science: ' + data.science;
                document.getElementById('view_social_science').innerText = 'social_science: ' + data.social_science;
                document.getElementById('view_english').innerText = 'english: ' + data.english;
                document.getElementById('view_hindi').innerText = 'hindi: ' + data.hindi;
                document.getElementById('view_grade').innerText = 'Grade: ' + data.grade;
            } else if (modalId === 'editModal') {
                document.getElementById('edit_id').value = data.id;
                document.getElementById('edit_roll_no').value = data.roll_no;
                document.getElementById('edit_maths').value = data.maths;
                document.getElementById('edit_science').value = data.science;
                document.getElementById('edit_social_science').value = data.social_science;
                document.getElementById('edit_english').value = data.english;
                document.getElementById('edit_hindi').value = data.hindi;
                document.getElementById('edit_grade').value = data.grade;
            }
            modal.style.display = 'block';
            overlay.style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.getElementById('modalOverlay').style.display = 'none';
        }

        function closeAllModals() {
            document.getElementById('viewModal').style.display = 'none';
            document.getElementById('editModal').style.display = 'none';
            document.getElementById('modalOverlay').style.display = 'none';
        }
        function updateMarks() {
            var form = document.getElementById('editForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_marks.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('Marks updated successfully');
                    closeModal('editModal');
                    location.reload(); // Reload the page to see the updated data
                } else {
                    alert('An error occurred while updating marks');
                }
            };
            xhr.send(formData);

            return false; // Prevent form submission
        }
        function deleteRecord(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '', true); // Same page for AJAX request
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload();
                    }
                };
                xhr.send('action=Delete&id=' + encodeURIComponent(id));
            }
        }

        function updateMarks() {
            var form = document.getElementById('editForm');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Same page for AJAX request
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    closeModal('editModal');
                    location.reload();
                }
            };
            xhr.send(new URLSearchParams(new FormData(form)).toString());
            return false; // Prevent the form from submitting normally
        }

        function printMarks() {
    var template = document.getElementById('print_template').value;
    var rollNo = document.getElementById('view_roll_no').innerText.replace('Roll Number: ', '');
    var name = document.getElementById('view_name').innerText.replace('Student Name: ', '');
    var subject = document.getElementById('view_maths').innerText.replace('maths: ', '');
    var subject = document.getElementById('view_science').innerText.replace('science: ', '');
    var subject = document.getElementById('view_social_science').innerText.replace('social_science: ', '');
    var subject = document.getElementById('view_english').innerText.replace('english: ', '');
    var subject = document.getElementById('view_hindi').innerText.replace('hindi: ', '');
    var marks = document.getElementById('view_marks').innerText.replace('Marks: ', '');
    var grade = document.getElementById('view_grade').innerText.replace('Grade: ', '');

    // Create a new window for printing
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Marksheet</title>');

    // Apply the selected template CSS
    if (template === 'template1') {
        printWindow.document.write('<link rel="stylesheet" href="template1.css">');
    } else if (template === 'template2') {
        printWindow.document.write('<link rel="stylesheet" href="template2.css">');
    } else {
        printWindow.document.write('<link rel="stylesheet" href="default.css">');
    }

    printWindow.document.write('</head><body>');
    printWindow.document.write('<div class="container">');
    printWindow.document.write('<div class="content">');
    printWindow.document.write('<h1>Marksheet</h1>');
    printWindow.document.write('<p>Roll Number: ' + rollNo + '</p>');
    printWindow.document.write('<p>Student Name: ' + name + '</p>');
    printWindow.document.write('<p>Maths: ' + maths + '</p>');
    printWindow.document.write('<p>Science: ' + science + '</p>');
    printWindow.document.write('<p>Social Science: ' + SocialScience + '</p>');
    printWindow.document.write('<p>English: ' + english + '</p>');
    printWindow.document.write('<p>Hindi: ' + hindi + '</p>');
    printWindow.document.write('<p>Grade: ' + grade + '</p>');
    printWindow.document.write('</div>');
    printWindow.document.write('<div class="photo"><img src="path_to_government_photo_id.jpg" alt="Government Photo ID"></div>');
    printWindow.document.write('</div>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}


    </script>
</body>
</html>

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == 'Update') {
        $id = $_POST['id'];
        $roll_no = $_POST['roll_no'];
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $social_science = $_POST['social_science'];
        $english = $_POST['english'];
        $hindi = $_POST['hindi'];
        $grade = $_POST['grade'];

        $sql = "UPDATE marks SET roll_no='$roll_no', maths='$maths', science='$science', social_science='$social_science', english='$english', hindi='$hindi', marks='$marks', grade='$grade' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Marks updated successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}

$conn->close();
?>
