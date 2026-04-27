<?php

if($_SESSION['role'] != 'admin'){ // for security purpose 
    header("Location: index.php");
}

session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

body{display:flex;background:#f4f6f9;}

/* Sidebar */
.sidebar{
    width:250px;
    height:100vh;
    background:#1e3c72;
    color:white;
    padding:20px;
}

.sidebar h2{margin-bottom:30px;}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    transition:0.3s;
}

.sidebar a:hover{
    background:#2a5298;
}

/* Main */
.main{
    flex:1;
    padding:20px;
}

/* Topbar */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:white;
    padding:15px 20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

/* Cards */
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-top:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

.card h3{margin-bottom:10px;}
.card p{font-size:22px;font-weight:600;color:#2a5298;}

/* Table */
.table-container{
    margin-top:30px;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

table{width:100%;border-collapse:collapse;}
th,td{padding:12px;text-align:center;border-bottom:1px solid #ddd;}
th{background:#2a5298;color:white;}

.logout{
    color:red;
    text-decoration:none;
}
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Aditya Hospital</h2>

    <a href="home.php">Dashboard</a>
    <a href="patients.php">Patients</a>
    <a href="manage_doctors.php">Doctors</a>
    <a href="services.php">Services</a>
    <a href="contact.php">Contact</a>
    <a href="logout.php" class="logout">Logout</a>
</div>

<!-- Main -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">
        <h2>Admin Dashboard</h2>
        <p>Welcome Admin</p>
    </div>

    <!-- Cards -->
    <div class="cards">
        <div class="card">
            <h3>Total Patients</h3>
            <p>120</p>
        </div>
        <div class="card">
            <h3>Total Doctors</h3>
            <p>25</p>
        </div>
        <div class="card">
            <h3>Appointments</h3>
            <p>45</p>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <h3>Recent Patients</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Disease</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Rahul</td>
                <td>Fever</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Amit</td>
                <td>Cold</td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>
