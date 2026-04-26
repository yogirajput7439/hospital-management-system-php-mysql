<?php
include 'connect.php';

$name = $_POST['name'];
$mobile = $_POST['phone'];
$age = $_POST['age'];
$doctor = $_POST['doctor'];
$status = $_POST['status'];

$doctor_id = $_POST['doctor_id'];
$date = $_POST['appointment_date'];
$time = $_POST['appointment_time'];
$status = $_POST['status'];

// Insert patient
mysqli_query($conn,"INSERT INTO patients(id,name,phone,age,doctor,status)
VALUES('$id','$name','$phone','$age','$doctor', '$status')");

$patient_id = mysqli_insert_id($conn);

// Insert appointment
mysqli_query($conn,"INSERT INTO appointments(patient_id,doctor_id,appointment_date,appointment_time,status)
VALUES('$patient_id','$doctor_id','$date','$time','$symptoms')");

header("Location: appointments_list.php");
?>