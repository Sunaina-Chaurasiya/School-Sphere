<?php include 'header.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_count = $conn->query("SELECT COUNT(*) as count FROM students")->fetch_assoc()['count'];
$total_fees = $conn->query("SELECT SUM(amount) as total FROM fees WHERE status='Paid'")->fetch_assoc()['total'];

$conn->close();
?>

<div class="dashboard-content">
    <h2>Dashboard Overview</h2>
    <div class="card">
        <h3>Total Enrollment</h3>
        <p><?php echo $student_count; ?></p>
        <a href="student_list.php"><button>View Student List</button></a>
    </div>
    <div class="card">
        <h3>Student Performance</h3>
        <a href="marksheet_list.php"><button>Marksheet</button></a>
    </div>
    <div class="card">
        <h3>Fee collection</h3>
        <p><?php echo $total_fees; ?> Rs</p>
    </div>
</div>



<?php include 'footer.php'; ?>
