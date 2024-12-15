<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name = htmlspecialchars($_POST['last_name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'] ?? '');

    $conn = new mysqli("localhost", "root", "", "savior");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO admins (adf_name, adl_name, ad_email, ad_password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

            if ($stmt->execute()) {
                header("Location: adminLogin.php");
                exit();
            } else {
                $message = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $message = "Invalid email format!";
        }
    } else {
        $message = "All fields are required!";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .header {
      background-color: #33C6D9;
      padding: 10px 0;
      color: white;
      text-align: center;
      position: relative;
    }
    .header img {
      max-width: 50px;
    }
    .header p {
      margin: 0;
    }
    .login-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      text-align: center;
    }
    .login-container h2 {
      font-weight: bold;
      margin-bottom: 20px;
    }
    .login-btn {
      background-color: #7F4FEA;
      color: white;
      width: 100%;
    }
    .admin-btn {
      background-color: #7F4FEA;
      color: white;
      margin-top: 10px;
      width: 100%;
    }
    .sign-up {
      margin-top: 20px;
    }
  </style>
  <style>
    .image{
      height: 50px;
    }
  </style>
</head>
<body>

  <!-- Header Section -->
  <div class="text-center py-1">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <i class="bi bi-envelope"></i> info@savior.com | <i class="bi bi-telephone"></i> +8801581102302
            </div>
            <div>
                <button class="btn btn-primary btn-sm">English</button>
            </div>
        </div>
    </div>
  </div>

  <!-- Header -->
  <div class="header">
    <div class="align-items-center">
      <img src="./Images/Logo-removebg-preview.png" alt="Logo" class="image"> <!-- Replace with actual logo path -->
      <span class="ms-3 fs-1">SAVIOR</span>
    </div>
  </div>

  <!-- Login Form -->
  <div class="login-container">
    <img src="./Images/login-security.png" alt="Login Image" class="img-fluid mb-3"> <!-- Replace with actual image path -->
    <h2>Admin Sign Up</h2>
    <form method="POST" action="">
      <div class="">
        <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name" required>
      </div>
      <div class=" position-relative py-3">
        <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name" required>
      </div>

      <div class="">
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
      </div>
      <div class="position-relative py-3">
        <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
      </div>
      <button type="submit" class="btn login-btn p">Sign Up As Admin </button>
    </form>

    <!-- Sign Up Link -->
    <p class="sign-up">Already have an Account? <a href="./adminLogin.php">Log In</a></p>

    <!-- Display the message -->
    <?php if (isset($message)): ?>
      <div class="alert alert-info mt-3"><?php echo $message; ?></div>
    <?php endif; ?>
  </div>

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
          <!-- Useful Links -->
          <div class="col-md-4">
              <h6>USEFUL LINKS</h6>
              <p class="link">
                 Bangladesh Police, Ministry of Home Affairs <br>
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
                  -South Bureau<br>
                  -North Bureau
              </p>
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
</body>
</html>
