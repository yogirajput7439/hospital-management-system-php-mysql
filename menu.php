<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aditya Hospital | Advanced Healthcare</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f5f9ff;
    color: #333;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 50px;
    background: #0a2540;
    color: white;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.logo {
    font-size: 22px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

nav a {
    color: white;
    margin: 0 15px;
    text-decoration: none;
    font-size: 15px;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #00d4ff;
}

.btn {
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    margin-left: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.appointment { background: #00a8ff; color: white; }
.emergency { background: #ff3b3b; color: white; }

/* HERO */
.hero {
    height: 90vh;
    background: linear-gradient(rgba(10,37,64,0.75), rgba(10,37,64,0.75)),
    url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    padding: 0 20px;
}

.hero h1 {
    font-size: 55px;
    margin-bottom: 15px;
    font-weight: 600;
}

.hero p {
    font-size: 20px;
    margin-bottom: 30px;
    font-weight: 300;
    max-width: 600px;
}

.book_ap {
    padding: 15px 35px;
    border: none;
    border-radius: 30px;
    background: #00d4ff;
    color: #0a2540;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.hero button:hover {
    background: #00b8e6;
    transform: translateY(-3px);
}

/* SECTION */
.section {
    padding: 80px 50px;
    text-align: center;
}

.title {
    font-size: 32px;
    margin-bottom: 50px;
    color: #0a2540;
    font-weight: 600;
}

/* CARDS */
.cards {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.card {
    width: 250px;
    padding: 30px 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: transform 0.3s, box-shadow 0.3s;
    font-size: 18px;
    font-weight: 600;
    color: #0a2540;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

/* CTA */
.cta {
    background: linear-gradient(135deg, #0072ff, #00c6ff);
    color: white;
    padding: 80px 20px;
    text-align: center;
}

.cta h2 {
    font-size: 36px;
    margin-bottom: 15px;
}

.cta p {
    font-size: 18px;
    opacity: 0.9;
}

/* CONTACT */
.contact {
    background: #e9f4ff;
}

.contact p {
    font-size: 18px;
    margin: 15px 0;
    color: #333;
}

/* FOOTER */
footer {
    background: #0a2540;
    color: #a0b2c6;
    text-align: center;
    padding: 25px;
    font-size: 14px;
}

footer span {
    color: white;
    font-weight: 600;
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

<header class="navbar">
    <div class="logo">A+ Aditya Hospital</div>

    <nav>
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div>
        <a href="add_patient.php" class="btn appointment">Book</a>
        <a href="#" class="btn emergency">Emergency</a>
    </div>
</header>

<section class="hero">
    <h1>Advanced Healthcare for Everyone</h1>
    <p>24/7 Emergency Care • State-of-the-Art Facilities • Modern Technology</p>
    <a href="add_patient.php" class="book_ap">Book Appointment</a>
</section>

<section id="services" class="section">
    <h2 class="title">Our Specialized Services</h2>
    <div class="cards">
        <div class="card">🚑 Emergency Care</div>
        <div class="card">❤️ Cardiology</div>
        <div class="card">🧠 Neurology</div>
        <div class="card">🦴 Orthopedics</div>
        <div class="card">👶 Pediatrics</div>
        <div class="card">🧪 Diagnostics</div>
    </div>
</section>

<section class="cta">
    <h2>Ready to get the best care?</h2>
    <p>Fast & Easy Consultation for you and your family.</p>
</section>

<section id="contact" class="section contact">
    <h2 class="title">Get in Touch</h2>
    <p>📍 Chatrapati Sambhajinagar, Maharashtra, India</p>
    <p>📞 +91 9876543210</p>
    <p>📧 contact@adityahospital.com</p>
</section>

<footer>
    <p>© 2026 <span>Aditya Hospital</span> | All Rights Reserved</p>
</footer>

</body>
</html>
