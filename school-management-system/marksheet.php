<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet - School Sphere</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            margin: 0;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        form label {
            font-weight: bold;
            margin-top: 10px;
            color: #495057;
            display: inline-block;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"],
        form input[type="email"],
        form select,
        form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus,
        form input[type="date"]:focus,
        form input[type="email"]:focus,
        form select:focus,
        form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        form textarea {
            height: 100px;
            resize: vertical;
        }

        /* Button Styling */
        form input[type="submit"] {
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

        form input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        table th,
        table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Marksheet Styling */
        .marksheet {
            background-color: #fdfdfd;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .marksheet .header h1 {
            margin: 0;
            color: #007bff;
            text-align: center;
        }

        .marksheet .student-info,
        .marksheet .footer {
            margin-top: 20px;
        }

        .marksheet .student-info p,
        .marksheet .footer p {
            margin: 5px 0;
            color: #495057;
            font-size: 16px;
        }

        .marksheet .marks-table table {
            width: 100%;
            margin-top: 20px;
        }

        .marksheet .marks-table th,
        .marksheet .marks-table td {
            padding: 10px;
            text-align: center;
        }

        .marksheet .marks-table th {
            background-color: #007bff;
            color: white;
        }

        .marksheet .total,
        .marksheet .percentage {
            text-align: right;
            margin-top: 10px;
            font-weight: bold;
            color: #495057;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="content">
        <h2>Marksheet</h2>
        <form method="POST" action="marksheet.php">
            <label>Roll Number:</label><br>
            <input type="text" name="roll_no" required><br>
            <label>Maths:</label><br>
            <input type="text" name="maths" required><br>
            <label>Science:</label><br>
            <input type="number" name="science" required><br>
            <label>Social Science:</label><br>
            <input type="number" name="social_science" required><br>
            <label>English:</label><br>
            <input type="number" name="english" required><br>
            <label>Hindi:</label><br>
            <input type="number" name="hindi" required><br>
            <label>Grade:</label><br>
            <input type="text" name="grade" required><br><br>
            <input type="submit" value="Add Marks">
        </form>
    </div>

    <?php
    include 'db_connect.php';

    // Handle form submission for adding marks
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['action']) && isset($_POST['roll_no'])) {
        $roll_no = $_POST['roll_no'];
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $social_science = $_POST['social_science'];
        $english = $_POST['english'];
        $hindi = $_POST['hindi'];
        $grade = $_POST['grade'];

        // Insert the marks into the database
        $sql = "INSERT INTO marks (roll_no, maths, science, social_science, english, hindi, grade) VALUES ('$roll_no', '$maths','$science', '$social_science', '$english', '$hindi', '$grade')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>New marks added successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }


    $conn->close();
    ?>

    <?php include 'footer.php'; ?>
</body>
</html>
