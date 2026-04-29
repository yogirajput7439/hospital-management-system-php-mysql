<?php
include 'connect.php';

$message = "";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $disease = $_POST['disease'];
    $doctor = $_POST['doctor'];

    // SECURE QUERY (PREPARED STATEMENT)
    $stmt = $conn->prepare("INSERT INTO patients(name, age, disease, doctor) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $age, $disease, $doctor);

    if($stmt->execute()){
        $message = "✅ Patient Added Successfully!";
    } else {
        $message = "❌ Error adding patient";
    }
}
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
<title>Add Patient | ADITYA HOSPITAL</title>

<style>

body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#00c6ff,#0072ff);
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

/* FORM */
.form-container{
    width:380px;
    margin:60px auto;
    padding:30px;
    border-radius:15px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    color:white;
    box-shadow:0 8px 25px rgba(0,0,0,0.2);
}

.form-container h2{
    text-align:center;
    margin-bottom:20px;
}

/* INPUT */
.input-group{
    margin-bottom:15px;
}

.input-group label{
    font-size:14px;
}

.input-group input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:none;
    border-radius:8px;
    outline:none;
}

/* BUTTON */
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:25px;
    background:#00c6ff;
    color:white;
    font-size:16px;
    cursor:pointer;
}

.btn:hover{
    background:#0072ff;
}

/* MESSAGE */
.message{
    text-align:center;
    margin-bottom:15px;
    font-weight:bold;
}

footer{
    text-align:center;
    color:white;
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
        <a href="view_patients.php">Patients</a>
        <a href="doctors.php">Doctors</a>
        <a href="contact.php">Contact</a>
    </nav>

    <a href="#" class="emergency">🚑 Emergency</a>
</header>

<!-- FORM -->
<div class="form-container">

<h2>Add Patient</h2>

<?php if($message != ""){ ?>
    <div class="message"><?php echo $message; ?></div>
<?php } ?>

<form method="POST">

<div class="input-group">
<label>Patient Name</label>
<input type="text" name="name" placeholder="Enter full name" required>
</div>

<div class="input-group">
<label>Age</label>
<input type="number" name="age" placeholder="Enter age" required>
</div>

<div class="input-group">
<label>Disease</label>
<input type="text" name="disease" placeholder="Enter disease" required>
</div>

<div class="input-group">
<label>Doctor</label>
<input type="text" name="doctor" placeholder="Assigned doctor" required>
</div>

<div class="input-group">
<label>Phone No</label>
<input type="text" name="phone" placeholder="Phone No" required>
</div>


<button type="submit" name="submit" class="btn">➕ Add Patient</button>

</form>

</div>

<!-- FOOTER -->
<footer>
    <h3>Get Well Soon ❤️</h3>
    <p>With Love from ADITYA HOSPITAL</p>
</footer>

</body>
</html>