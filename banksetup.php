<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="banksetup.css">
    <title>Bank Registration</title>
    <link rel="icon" href="./bimages.png=" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1>Bit Bank Registration</h1>

        <div id="message">
            <?php
                if (isset($_SESSION['error'])) {
                    echo '<p style="color:red;">' . htmlspecialchars($_SESSION['error']) . '</p>';
                    unset($_SESSION['error']);
                }
            ?>
        </div>

        <form action="banksign.php" method="post">
            <label for="account_type">Type of Account:</label>
            <select id="account_type" name="account_type" required>
                <option value="" disabled selected>Select an account type</option>
                <option value="savings">Savings Account</option>
                <option value="checking">Checking Account</option>
                <option value="business">Business Account</option>
            </select>
                
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            Confirm Password: <input type="password" name="confirm_password"><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <button type="submit">Register</button>
            <div class="already-account">
    <p>Already have an account? <a href="./banksign.php">Login here</a></p>
</div>

        </form>
        
    </div>
</body>
</html>
