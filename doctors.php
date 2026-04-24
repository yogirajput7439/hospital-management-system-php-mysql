<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Doctors - ADITYA HOSPITAL</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background: #f4f7fb;
}

/* Navbar */
.navbar{
    display:flex;
    justify-content: space-between;
    align-items:center;
    overflow-x: auto;
    padding:15px 40px;
    background: rgba(0,0,0,0.8);
    color:white;
    /* gap: 20px; */
    position: sticky;
    top:0;
}

.logo{
    font-size:22px;
    font-weight:bold;
    color:#00c6ff;
}

.nav-links a{
    color:white;
    text-decoration:none;
    margin:0 15px;
    transition:0.3s;
}

.nav-links a:hover{
    color:#00c6ff;
}

/* Heading */
.heading{
    text-align:center;
    margin:40px 0;
}

.heading h1{
    font-size:36px;
}

.heading p{
    color:gray;
}

/* Doctor Cards */
.doctor-container{
    display:flex;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap:25px;
    overflow-x: auto;
    padding:20px 40px;
}

.card{
    background:white;
    border-radius:15px;
    min-width: 250px;
    flex-shrink: 0;
    overflow:hidden;
    text-align:center;
    transition:0.3s;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.card:hover{
    transform: translateY(-10px) scale(1.03);
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

/* Doctor Image */
.card img{
    width:100%;
    height:300px;
    object-fit:cover;
}

/* Card Content */
.card h3{
    margin:15px 0 5px;
}

.speciality{
    color:#00c6ff;
    font-weight:bold;
}

.rating{
    color:gold;
    margin:5px 0;
}

/* Button */
.btn{
    display:inline-block;
    margin:10px 0 20px;
    padding:8px 15px;
    background:#00c6ff;
    color:white;
    border-radius:20px;
    text-decoration:none;
    transition:0.3s;
}

.btn:hover{
    background:#0072ff;
}
.bottom-section{
    margin-top:50px;
    background: linear-gradient(to right, #00c6ff, #0072ff);
    color:white;
    text-align:center;
    padding:40px 20px;
}

.bottom-section h2{
    font-size:30px;
}

    /* Footer */
.footer{
    text-align:center;
    padding:15px;
    background:#111;
    color:white;
}
</style>

</head>

<body>

    <?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: index.php");
        exit();
    }
    ?>

<!-- Navbar -->
<div class="navbar">
    <div class="logo">A+ ADITYA HOSPITAL</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="services.php">Services</a>
        <a href="doctors.php">Doctors</a>
        <a href="contact.php">Contact</a>
    </div>
</div>

<!-- Heading -->
<div class="heading">
    <h1>Meet Our Expert Doctors</h1>
    <p>Highly qualified specialists dedicated to your health</p>
</div>

<!-- Doctor Section -->
<div class="doctor-container">

    <!-- Doctor 1 -->
    <div class="card">
        <img src="images/subhash.png" alt="Doctor">
        <h3>Dr. Subhash Rajput</h3>
        <p class="speciality">Cardiologist</p>
        <p class="rating">★★★★★</p>
        <a href="https://www.instagram.com/subhash_rajput_12345/" class="btn">View Profile</a>
    </div>

    <!-- Doctor 2 -->
    <div class="card">
        <img src="pratik.png" alt="Doctor">
        <h3>Dr. Pratik Rajput</h3>
        <p class="speciality">Gynecologist</p>
        <p class="rating">★★★★☆</p>
        <a href="yogi/https://www.instagram.com/crazy__monu__45/" class="btn">View Profile</a>
    </div>

    <!-- Doctor 3 -->
    <div class="card">
        <img src="images/sagar.png" alt="Doctor">
        <h3>Dr. Sagar Rajput</h3>
        <p class="speciality">Orthopedic</p>
        <p class="rating">★★★★★</p>
        <a href="yogi/https://www.instagram.com/rajput_sagar__9011/" class="btn">View Profile</a>
    </div>

    <!-- Doctor 4 -->
    <div class="card">
        <img src="images/kailash.png" alt="Doctor">
        <h3>Dr. Kailash Rajput</h3>
        <p class="speciality">Pediatrician</p>
        <p class="Rating">★★★★☆</p>
        <a href="yogi/https://www.instagram.com/kailasmandavat/" class="btn">View Profile</a>
    </div>

     <!-- Doctor 4 -->
    <div class="card">
        <img src="images/rutik.png" alt="Doctor">
        <h3>Dr. Rootik Rajput</h3>
        <p class="speciality">Pediatrician</p>
        <p class="rating">★★★★☆</p>
        <a href="yogi/https://www.instagram.com/rk._rajput_45/" class="btn">View Profile</a>
    </div>

     <!-- Doctor 4 -->
    <div class="card">
        <img src="images/yogesh.png" alt="Doctor">
        <h3>Dr. Yogesh Rajput</h3>
        <p class="speciality">Pediatrician</p>
        <p class="rating">★★★★☆</p>
        <a href="https://www.instagram.com/yogi_rajput__7439/?hl=en" class="btn">View Profile</a>
    </div>

</div>
<!-- Bottom Section -->
<section class="bottom-section">
    <h2>Get Well Soon ❤️</h2>
    <p>We care for your health and happiness</p>
    <p><strong>With Love from ADITYA HOSPITAL</strong></p>
</section>

<!-- Footer -->
<footer class="footer">
    © 2026 ADITYA HOSPITAL | All Rights Reserved
</footer>

</body>
</html>