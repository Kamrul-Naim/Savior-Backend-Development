<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    $conn = new mysqli("localhost", "root", "", "savior");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($stored_password);
                $stmt->fetch();

                if (password_verify($password, $stored_password)) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_email'] = $email;
                    header("Location: homePage.php");
                    exit();
                } else {
                    $message = "Invalid email or password!";
                }
            } else {
                $message = "Invalid email or password!";
            }

            $stmt->close();
        } else {
            $message = "Invalid email format!";
        }
    } else {
        $message = "Both email and password are required!";
    }

    $conn->close();
}
?>

<?php if (isset($message)): ?>
    <div style="color: red; text-align: center;"><?php echo htmlspecialchars($message); ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
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
</head>
<body>

  <!-- Header -->
  <div class="header">
    <div class="align-items-center">
      <a href="./Home Page.html"><img src="./Images/Logo-removebg-preview.png" alt="Logo" class="logoImage">
        <span class="ms-3 fs-1">SAVIOR</span></a>
    </div>
  </div>

  <!-- Login Form -->
  <div class="login-container">
    <img src="./Images/login-security.png" alt="Login Image" class="img-fluid mb-3"> <!-- Replace with actual image path -->
    <h2>Log In</h2>
    <form method="POST" action="">
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
      </div>
      <div class="mb-3 position-relative py-3">
        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
        <!-- <a href="#" class="position-absolute py-1">Forgot Password?</a> -->
      </div>
      
    </form>

    <!-- Admin Button -->
    <form method="POST" action="./adminLogin.php"><button href="./adminLogin.php" class="btn admin-btn" >Log In As Admin</button></form>

    <!-- Sign Up Link -->
    <p class="sign-up">Don’t You Have Any Account? <a href="./SignUp.php">Sign Up</a></p>

    <!-- Display Message -->
    <?php if (isset($message)): ?>
      <div class="alert alert-danger mt-3"><?php echo $message; ?></div>
    <?php endif; ?>
  </div>

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

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row text-center">
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
          <div class="col-md-4">
              <h6>USEFUL LINKS</h6>
              <p>
                 Bangladesh Police, Ministry of Home Affairs <br>
                 Immigration police, RAB, Ansar VDP, PBI <br>
                 Desco, BTCL, Fire Service, Bangladesh Betar
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
