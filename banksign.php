<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_type = $_POST['account_type'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        // Store username and password in a text file
        $file = 'info.txt';
        $data = $account_type . ':' . $fullname . ':' . $email . ':' . $phone . ':' . $password . "\n";
        file_put_contents($file, $data, FILE_APPEND);
        
        header("Location: banksign.php");
        exit();
    } else {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: banksetup.php");
        exit();
    }
}
?>





<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Login Form</title>
  <link rel="stylesheet" href="banksign.css">
  <link rel="icon" href="./bimages.png=" type="image/x-icon">
</head>
<body>
  <div class="wrapper">
    <form action="bankdash.php" method="post">
      <h2>Bit Bank Login</h2>
      <input type="hidden" name="action" value="login">
      
      <div id="message">
            <?php
                if (isset($_SESSION['error'])) {
                    echo '<p style="color:red;">' . htmlspecialchars($_SESSION['error']) . '</p>';
                    unset($_SESSION['error']);
                }
            ?>
        </div>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="./banksetup.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>