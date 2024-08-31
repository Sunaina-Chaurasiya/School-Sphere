<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees - School Sphere</title>
    <style>
    /* Global Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
    color: #333;
}

.content {
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    margin: 20px auto;
    max-width: 1200px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
    color: #e74c3c;
    text-align: center;
}

/* Form Styles */
form {
    background-color: #f9f7f7;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

form label {
    font-weight: bold;
    color: #d35400;
    margin-bottom: 8px;
    display: block;
}

input[type="number"],
input[type="date"],
select {
    width: 100%;
    padding: 12px;
    margin: 10px 0 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input[type="number"]:focus,
input[type="date"]:focus,
select:focus {
    border-color: #e67e22;
    box-shadow: 0 0 8px rgba(230, 126, 34, 0.5);
    outline: none;
}

input[type="submit"] {
    background-color: #e67e22;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
    margin-right: 10px;
}

input[type="submit"]:hover {
    background-color: #d35400;
    transform: scale(1.05);
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
}

table, th, td {
    border: 1px solid #ddd;
}

th {
    background-color: #f39c12;
    color: #fff;
    padding: 15px;
    text-align: left;
}

td {
    background-color: #fcf3cf;
    padding: 15px;
}

table tr:hover td {
    background-color: #f8c471;
}

/* Card Styles */
.card {
    background-color: #f39c12;
    color: #fff;
    padding: 20px;
    margin: 15px 0;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.card h3 {
    margin: 0 0 10px 0;
}

.card p {
    font-size: 1.2em;
    margin: 0;
}

.card button {
    background-color: #fff;
    color: #e74c3c;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

.card button:hover {
    background-color: #c0392b;
    color: #fff;
    transform: scale(1.05);
}

/* Header Styles */
header {
    background-color: #e74c3c;
    padding: 15px 20px;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
    font-size: 26px;
}

header nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

header nav ul li {
    margin-right: 20px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #c0392b;
    transition: background-color 0.3s, transform 0.3s;
}

header nav ul li a:hover {
    background-color: #a93226;
    transform: scale(1.05);
}

/* Footer Styles */
footer {
    background-color: #e74c3c;
    color: #fff;
    text-align: center;
    padding: 20px 20px;
    margin-top: 30px;
    border-top: 5px solid #c0392b;
}

.footer-container {
    margin: 0 auto;
    max-width: 1000px;
}

footer a {
    color: #fff;
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline;
    color: #f1c40f;
}

/* Dashboard Content Styles */
.dashboard-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 20px;
}

.dashboard-content .card {
    flex-basis: 30%;
    margin-bottom: 20px;
}

    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content">
        <h2>Fee Payment</h2>
        <form method="POST" action="">
            <label>Roll Number:</label><br>
            <input type="number" name="roll_no" required><br>
            <label>Amount:</label><br>
            <input type="number" name="amount" required><br>
            <label>Paid Date:</label><br>
            <input type="date" name="paid_date" required><br>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select><br><br>
            <input type="submit" name="record_payment" value="Record Payment">
            <input type="submit" name="update_payment" value="Update Payment">
        </form>

        <h3>Payment Records</h3>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Roll Number</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
            include 'db_connect.php';

            // Recording payment
            if (isset($_POST['record_payment'])) {
                $roll_no = $conn->real_escape_string($_POST['roll_no']);
                $amount = $conn->real_escape_string($_POST['amount']);
                $paid_date = $conn->real_escape_string($_POST['paid_date']);
                $status = $conn->real_escape_string($_POST['status']);

                $stmt = $conn->prepare("INSERT INTO fees (roll_no, amount, paid_date, status) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $roll_no, $amount, $paid_date, $status);

                if ($stmt->execute()) {
                    echo "<p>Payment recorded successfully</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
                $stmt->close();
            }

            // Updating payment
            if (isset($_POST['update_payment'])) {
                $roll_no = $conn->real_escape_string($_POST['roll_no']);
                $amount = $conn->real_escape_string($_POST['amount']);
                $paid_date = $conn->real_escape_string($_POST['paid_date']);
                $status = $conn->real_escape_string($_POST['status']);

                $stmt = $conn->prepare("UPDATE fees SET amount=?, paid_date=?, status=? WHERE roll_no=?");
                $stmt->bind_param("ssss", $amount, $paid_date, $status, $roll_no);

                if ($stmt->execute()) {
                    echo "<p>Payment updated successfully</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
                $stmt->close();
            }

            // Deleting payment
            if (isset($_POST['delete_payment'])) {
                $payment_id = $conn->real_escape_string($_POST['payment_id']);

                $stmt = $conn->prepare("DELETE FROM fees WHERE id=?");
                $stmt->bind_param("i", $payment_id);

                if ($stmt->execute()) {
                    echo "<p>Payment deleted successfully</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }
                $stmt->close();
            }

            // Retrieving payment records
            $sql = "SELECT fees.id, students.first_name, students.last_name, students.roll_no, fees.amount, fees.paid_date, fees.status 
                    FROM fees 
                    JOIN students ON fees.roll_no = students.roll_no";
            $result = $conn->query($sql);

            if (!$result) {
                die("Error executing query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["id"]) . "</td>
                            <td>" . htmlspecialchars($row["first_name"]) . " " . htmlspecialchars($row["last_name"]) . "</td>
                            <td>" . htmlspecialchars($row["roll_no"]) . "</td>
                            <td>" . htmlspecialchars($row["amount"]) . "</td>
                            <td>" . htmlspecialchars($row["paid_date"]) . "</td>
                            <td>" . htmlspecialchars($row["status"]) . "</td>
                            <td>
                                <form method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='payment_id' value='" . htmlspecialchars($row["id"]) . "'>
                                    <input type='submit' name='delete_payment' value='Delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                    <button type='button' onclick=\"viewPaymentDetails('" . htmlspecialchars($row["id"]) . "')\">View</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No payment records found</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <?php include 'footer.php'; ?>
        <script>
        function viewPaymentDetails(paymentId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "get_payment_details.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    if (data) {
                        var popup = window.open("", "Payment Details", "width=600,height=400");
                        popup.document.write("<html><head><title>Payment details</title></head><body>");
                        popup.document.write("<h1>SCHOOL SPHERE</h1>");
                        popup.document.write("<p><strong>Full Name:</strong> " + data.first_name + " " + data.last_name + "</p>");
                        popup.document.write("<p><strong>Contact Number:</strong> " + data.contact_number + "</p>");
                        popup.document.write("<p><strong>Paid Date:</strong> " + data.paid_date + "</p>");
                        popup.document.write("<p><strong>Amount:</strong> " + data.amount + "</p>");
                        popup.document.write("<p><strong>Status:</strong> " + data.status + "</p>");
                        popup.document.write("<button onclick=\"window.print();\">Print</button>");
                        popup.document.write("</body></html>");
                        popup.document.close();
                    } else {
                        alert("Error fetching payment details.");
                    }
                }
            };
            xhr.send("payment_id=" + paymentId);
        }
        </script>

    </div>
</body>
</html>
