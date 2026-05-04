<?php
include 'connect.php';

$result = mysqli_query($conn,"SELECT * FROM patients");
?>
<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patients List | ADITYA HOSPITAL</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:#f4f7fb;
}

/* NAVBAR */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 40px;
    background:#111;
    color:white;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin:0 10px;
}

.navbar a:hover{
    color:#00c6ff;
}

.logo{
    font-weight:bold;
}

.emergency{
    background:red;
    padding:8px 15px;
    border-radius:20px;
}

/* CONTAINER */
.container{
    width:90%;
    margin:40px auto;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.header h2{
    margin:0;
}

/* SEARCH */
.search-box input{
    padding:10px;
    width:250px;
    border-radius:20px;
    border:1px solid #ccc;
    outline:none;
}

/* TABLE */
.table-box{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    overflow-x:auto;
}

.patient-table{
    width:100%;
    border-collapse:collapse;
}

.patient-table th{
    background:#0072ff;
    color:white;
    padding:12px;
}

.patient-table td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #eee;
}

.patient-table tr:hover{
    background:#f9fbff;
}

/* BUTTONS */
.action-btn{
    padding:6px 12px;
    border-radius:20px;
    text-decoration:none;
    color:white;
    margin:2px;
    font-size:14px;
}

.delete-btn{
    background:#dc3545;
}

.delete-btn:hover{
    background:#b02a37;
}

.edit-btn{
    background:#28a745;
}

.edit-btn:hover{
    background:#1e7e34;
}

/* ADD BUTTON */
.add-btn{
    background:#0072ff;
    color:white;
    padding:10px 15px;
    border-radius:20px;
    text-decoration:none;
}

/* FOOTER */
footer{
    text-align:center;
    padding:20px;
    margin-top:20px;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo">🏥 ADITYA HOSPITAL</div>

    <nav>
        <a href="home.php">Home</a>
        <a href="add_patient.php">Add Patient</a>
        <a href="doctors.php">Doctors</a>
        <a href="contact.php">Contact</a>
    </nav>

    <a href="#" class="emergency">🚑 Emergency</a>
</header>

<!-- MAIN -->
<div class="container">

<div class="header">
    <h2>Patients List</h2>

    <div>
        <a href="add_patient.php" class="add-btn">➕ Add Patient</a>
    </div>
</div>

<!-- SEARCH -->
<div class="search-box">
    <input type="text" placeholder="Search patient...">
</div>

<br>

<!-- TABLE -->
<div class="table-box">

<table class="patient-table">

<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Disease</th>
<th>Doctor</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['disease']; ?></td>
<td><?php echo $row['doctor']; ?></td>

<td>
<a class="action-btn edit-btn" href="#">Edit</a>
<a class="action-btn delete-btn" href="delete_patient.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<!-- FOOTER -->
<footer>
    <h3>Get Well Soon ❤️</h3>
    <p>With Love from ADITYA HOSPITAL</p>
</footer>

</body>
</html>