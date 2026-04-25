<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

// Fetch doctors
$doctors = mysqli_query($conn,"SELECT * FROM users WHERE role='doctor'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e3a8a,#0ea5e9);
    background-size:400% 400%;
    animation:bg 10s infinite;
}

@keyframes bg{
    0%{background-position:0%}
    50%{background-position:100%}
    100%{background-position:0%}
}

.container{
    width:90%;
    max-width:900px;
    margin:50px auto;
    background:rgba(255,255,255,0.1);
    padding:30px;
    border-radius:15px;
    backdrop-filter:blur(10px);
    color:white;
}

h2{
    text-align:center;
}

/* Input */
input, select, textarea{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:8px;
}

/* Button */
.btn{
    width:100%;
    padding:15px;
    background:#22c55e;
    border:none;
    color:white;
    font-size:16px;
    border-radius:10px;
    cursor:pointer;
}

.btn:hover{
    background:#16a34a;
}

/* Slots */
.slots{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}

.slot{
    padding:10px 15px;
    background:#3b82f6;
    border-radius:8px;
    cursor:pointer;
}

.slot:hover{
    background:#2563eb;
}

</style>
</head>

<body>

<div class="container">

<h2>📅 Book Appointment</h2>

<form action="save_appointments.php" method="POST">

<!-- Patient Info -->
<h3>Patient Details</h3>
<input type="text" name="name" placeholder="Full Name" required>
<input type="text" name="phone" placeholder="Mobile Number" required>
<input type="number" name="age" placeholder="Age" required>

<select name="doctur" required>
    <option value="">Select Doctor</option>
    <option>Dr. Subhash Rajput</option>
    <option>Dr. Pratik Rajput</option>
    <option>Dr. Kailash Rajput</option>
    <option>Dr. Sagar Rajput</option>
    <option>Dr. Yogesh Rajput</option>
    <option>Dr. Rootik Rajput</option>
</select>

<textarea name="status" placeholder="status"></textarea>

<!-- Doctor -->
<h3>Select Doctor</h3>
<select name="doctor_id" required>
<option value="">Select Doctor</option>
<?php while($doc = mysqli_fetch_assoc($doctors)){ ?>
<option value="<?php echo $doc['id']; ?>">
<?php echo $doc['name']; ?>
</option>
<?php } ?>
</select>

<!-- Date -->
<h3>Select Date</h3>
<input type="date" name="appointment_date" required>

<!-- Time Slots -->
<h3>Select Time Slot</h3>
<div class="slots">
<?php
$times = ["10:00 AM","10:30 AM","11:00 AM","11:30 AM","12:00 PM"];
foreach($times as $t){
    echo "<div class='slot' onclick=\"selectSlot('$t')\">$t</div>";
}
?>
</div>

<input type="hidden" name="appointment_time" id="appointment_time">

<!-- Symptoms -->
<h3>Symptoms</h3>
<textarea name="disease" placeholder="Enter problem"></textarea>

<button class="btn">Book Appointment</button>

</form>

</div>

<script>
function selectSlot(t){
    document.getElementById('time_slot').value = t;
    alert("Selected: " + t);
}
</script>

</body>
</html>