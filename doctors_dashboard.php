<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'doctor'){
    header("Location: index.php");
    exit();
}

// Fetch doctor appointments
$result = mysqli_query($conn, "
SELECT 
    appointments.id,
    patients.name,
    patients.age,
    patients.disease,
    appointments.appointment_date,
    appointments.appointment_time,
    appointments.status
FROM appointments
JOIN patients ON patients.id = appointments.patient_id
WHERE appointments.doctor_id = ".$_SESSION['user_id']."
ORDER BY appointments.appointment_date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Doctor Dashboard</title>

<style>

/* ===== GLOBAL STYLES ===== */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f7fb;
}

h1, h2, h3 {
    margin: 0;
}

/* ===== SIDEBAR ===== */
.sidebar {
    width: 250px;
    height: 100vh;
    background: #1e293b;
    color: white;
    position: fixed;
    padding-top: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 15px;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #334155;
}

/* ===== MAIN CONTENT ===== */
.main {
    margin-left: 250px;
    padding: 20px;
}

/* ===== HEADER ===== */
.header {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* ===== CARDS ===== */
.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.card {
    flex: 1;
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

.card h3 {
    color: gray;
}

.card p {
    font-size: 24px;
    font-weight: bold;
}

/* ===== TABLE ===== */
.table-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

table th {
    background: #f1f5f9;
}

/* ===== BUTTONS ===== */
.btn {
    padding: 6px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.view {
    background: #3b82f6;
    color: white;
}

.complete {
    background: #10b981;
    color: white;
}

/* ===== MODAL ===== */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
}

.modal-content {
    background: white;
    padding: 20px;
    width: 400px;
    margin: 100px auto;
    border-radius: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
}

</style>

<script>
function openModal(id) {
    document.getElementById('modal').style.display = 'block';
    document.getElementById('patient_id').value = id;
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>

</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h2>Doctor Panel</h2>
    <a href="#">Dashboard</a>
    <a href="#">Appointments</a>
    <a href="#">Patients</a>
    <a href="#">Reports</a>
    <a href="logout.php">Logout</a>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main">

    <!-- HEADER -->
    <div class="header">
        <h1>Welcome Doctor </h1>
    </div>

    <!-- CARDS -->
    <div class="cards">
        <div class="card">
            <h3>Total Patients</h3>
            <p><?php echo mysqli_num_rows($result); ?></p>
        </div>
        <div class="card">
            <h3>Appointments</h3>
            <p>12</p>
        </div>
        <div class="card">
            <h3>Pending</h3>
            <p>5</p>
        </div>
    </div>

    <!-- APPOINTMENTS TABLE -->
    <div class="table-container">
        <h2>Appointments</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Problem</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['disease']; ?></td>
                <td>
                    <button class="btn view" onclick="openModal(<?php echo $row['id']; ?>)">View</button>
                    <button class="btn complete">Complete</button>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>

<!-- ===== MODAL (PATIENT DETAILS + PRESCRIPTION) ===== -->
<div id="modal" class="modal">
    <div class="modal-content">
        <h2>Patient Details</h2>

        <form method="POST" action="save_prescription.php">
            <input type="hidden" name="patient_id" id="patient_id">

            <label>Medicine</label>
            <input type="text" name="medicine" required>

            <label>Dosage</label>
            <input type="text" name="dosage" required>

            <label>Notes</label>
            <textarea name="notes"></textarea>

            <br><br>
            <button class="btn complete">Save</button>
            <button type="button" class="btn" onclick="closeModal()">Close</button>
        </form>

    </div>
</div>

</body>
</html>