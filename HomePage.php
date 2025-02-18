<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page with Emergency Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
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
</head>
<body>

<!-- Navbar Section -->
<nav class="header navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./Images/Logo-removebg-preview.png" alt="Savior Logo" height="40"> 
            <span class="fs-3 px-3">SAVIOR</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./Hospital.php">Hospital</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./userpstation.php">Police Station</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./userfservice.php">Fire Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Emergency Contact.html">E.Contact</a>
                </li>
            </ul>
            <form class="d-flex ms-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            
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

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Main Section -->
        <div class="col-lg-8">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1>Welcome to <span class="text-primary">SAVIOR</span></h1>
                <p>Reliable way to contact emergency services such as fire departments, police stations, and hospitals.</p>
                <img src="./Images/Photo.png" alt="Emergency Services" class="img-fluid mt-4">
            </section>

            <!-- About Us Section -->
            <section class="about-section mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="./Images/35106399_8281348 1.png" alt="About Us Image">
                    </div>
                    <div class="col-md-8">
                        <h2><span class="text-primary">About</span> Us</h2>
                        <p>
                            <strong>The 'Savior'</strong> is a newly developed standalone web application designed for both Android and iOS platforms. It integrates with emergency services and GPS technology to improve response capabilities.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar Section -->
        <div class="col-lg-4">
            <div class="contact-list">
                <h5>Emergency Contact List</h5>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel:+880123456789">Fire Service: +880 123-456-789</a>
                </div>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel:+880987654321">Police Station: +880 987-654-321</a>
                </div>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel:+880456789123">Ambulance: +880 456-789-123</a>
                </div>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel:+880789123456">Disaster Hotline: +880 789-123-456</a>
                </div>
                <div class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel:999">Emergency: 999</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="footer mt-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h6>Contact Information</h6>
                <p>Phone: +880 95668656, +880 95653658</p>
                <p>Email: info@bdpolice.com</p>
            </div>
            <div class="col-md-4">
                <h6>Useful Links</h6>
                <p>Bangladesh Police, Fire Service</p>
            </div>
            <div class="col-md-4 social">
                <h6>Follow Us</h6>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>© Copyright Savior | Design by <a href="#">Musfiq</a></p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-slide every 3 seconds
    const alertsCarousel = document.querySelector('#alertsCarousel');
    if (alertsCarousel) {
        new bootstrap.Carousel(alertsCarousel, { interval: 3000 });
    }
</script>
</body>
</html>
