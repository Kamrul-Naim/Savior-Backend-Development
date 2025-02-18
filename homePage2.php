<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .header {
            background-color: #16C2CC;
            color: white;
            padding: 10px 0;
            position: relative;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .welcome-section {
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(to bottom, #e3fdfd, #ffffff);
        }
        .welcome-section h1 {
            font-weight: bold;
        }
        .about-section {
            padding: 50px 20px;
        }
        .about-section img {
            width: 100%;
            border-radius: 15px;
        }
        .footer {
            background-color: #121152;
            color: #ccc;
            padding: 40px 0;
            font-size: 14px;
        }
        .footer a {
            color: #00aced;
            text-decoration: none;
        }
        .footer a:hover {
            color: #ccc;
        }
        .social a {
            margin: 0 8px;
            color: #ccc;
            font-size: 18px;
        }
        .social a:hover {
            color: #00aced;
        }
        .contact-list {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .contact-list h5 {
            color: #16C2CC;
            font-weight: bold;
        }
        .contact-item {
            margin-bottom: 10px;
        }
        .contact-item a {
            text-decoration: none;
            color: #16C2CC;
            font-weight: bold;
        }
        .contact-item a:hover {
            text-decoration: underline;
        }
        .contact-item i {
            color: #16C2CC;
            margin-right: 8px;
        }
        .alert-carousel {
            background: #005f63;
            color: white;
            padding: 10px;
            font-size: 16px;
            text-align: center;
        }
    </style>
    <style>
        .mus{
            height: 30px
        }
    </style>
</head>
<body>


<!-- Navbar Section -->
<nav class=" header navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./Images/Logo-removebg-preview.png" alt="Savior Logo" height="40"> <span class="text-primary fs-3 px-3">SAVIOR</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./dashboard.php">Hospital</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./policestation.php">Police Station</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./fireservice.php">Fire Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Emergency COntact.html">E.Contact</a>
                </li>
            </ul>
            <form class="d-flex ms-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <a href="#" class="ms-3"><i class="fa fa-bell text-black"></i></a>
            <a href="#" class="ms-3 text-black"> <img class="mus d-block m-auto border rounded-circle img-fluid" src="./Images/login-security.png" alt="" srcset=""> <span>Musfiq</span></a>
        </div>
    </div>
</nav>

<!-- Alert Carousel Section -->
<div class="alert-carousel">
    <div id="alertsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                🚨 <strong>Alert:</strong> Flood in cumilla  – Stay safe and avoid affected regions.
            </div>
            <div class="carousel-item">
                🚨 <strong>Alert:</strong> Earthquake in Sylhet – Emergency services are operational.
            </div>
            <div class="carousel-item">
                🚨 <strong>Alert:</strong> Severe storms predicted in Dhaka – Take necessary precautions.
            </div>
        </div>
    </div>
</div>

<!-- Welcome Section -->
<section class="welcome-section">
    <div class="container">
        <h1>Welcome to <span class="text-primary ">SAVIOR</span></h1>
        <p>Reliable way to contact emergency services such as fire departments, police stations, and hospitals.</p>
        <img src="./Images/Photo.png" alt="Emergency Services" class="img-fluid mt-4">
    </div>
</section>

<!-- About Us Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="./Images/35106399_8281348 1.png" alt="About Us">
            </div>
            <div class="col-md-8">
                <h2><span class="text-primary">About</span> Us</h2>
                <p>
                    <strong>The 'Savior'</strong> is a newly developed standalone web application designed for both Android and iOS platforms. It seamlessly integrates with current emergency services and utilizes GPS technology to improve emergency response capabilities. The web application is designed to function autonomously, yet it can also connect with external systems, including emergency service databases and location tracking services.
                </p>
            </div>
        </div>
    </div>
</section>





<!-- footer style-->

<style>
    .footer {
        background-color: #121152;
        color: #ccc;
        padding: 40px 0;
        font-size: 14px;
    }
    .footer .contact-info, .footer .social, .footer .address {
        color: #ccc;
    }
    .footer a {
        color: #00aced;
        text-decoration: none;
    }
    .footer a:hover {
        color: #ccc;
    }
    .footer .social a {
        margin: 0 8px;
        color: #ccc;
    }
    .footer .social a:hover {
        color: #00aced;
    }
</style>

<!-- Footer Section -->
<footer class="footer">
    <div class="container">
        <div class="row text-center">
            <!-- Contact Information -->
            <div class="col-md-4">
                <h6>Phone</h6>
                <p class="contact-info">
                    +880 95668656, +880 95653658<br>
                    +880 1586858563, +880 1474585555
                </p>
                <h6>Email</h6>
                <p class="contact-info">
                    info@bdpolice.com<br>
                    info@Bdfireservice.com <br>
                    info@bdbm&dc.com
                </p>
            </div>

            <!-- Usefull links -->
            <div class="col-md-4">
                <h6>USEFUL LINKS</h6>
                <p class="link">
                   Banladesh Police, Ministry of Home Affairs <br>
                   Immigration police, RAB, Ansar VDP, PBI <br>
                   Desco, BTCL, Fire Service, Bangladesh Betar
                </p>
            </div>
            <div class="col-md-4">
                <h6>USEFUL LINKS</h6>
                <p>
                    -Fire Code<br>
                    -Brush<br>
                    -Central Bureau<br>
                    -south Bureau <br>
                    -North Bureau
                </p>
            </div>
            <div class="col-md-12">
                <h6>USEFUL LINKS</h6>
                <p>
                    Centre for Medecal Education, Bangladesh<br>
                    FAIMER<br>
                    AMEE<br>
                    
                </p>
            </div>
        </div>

        <div class="row text-center mt-4">
            <!-- Social Links -->
            <div class="col">
                <div class="social">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-pinterest"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="row text-center mt-4">
            <div class="col">
                <p>© Copyright by <a href="#">Savior</a> | Design by <a href="https://www.facebook.com/talha.rejuanrafi">musfiq611891</a></p>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"></script>
</body>
</html>