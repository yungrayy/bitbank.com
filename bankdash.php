<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = 'info.txt';
    $handle = fopen($file, 'r');
    $login_success = false;

    while (($line = fgets($handle)) !== false) {
        list($account_type, $fullname, $stored_email, $phone, $stored_password) = explode(':', trim($line));
        if ($stored_email === $email && $stored_password === $password) {
            $_SESSION['fullname'] = $fullname; // Store the fullname in the session
            $login_success = true;
            break;
        }
    }
    fclose($handle);

    if ($login_success) {
        header("Location: bankdash.php");
        exit();
    } else {
        $_SESSION['error'] = "Email or Password do not match"; 
        header("Location: banksign.php");
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bit Bank Dashboard</title>
    <link rel="stylesheet" href="bankdash.css">
    <link rel="icon" href="./bimages.png=" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo"><img src="./bimages.png" alt="">Bit Bank</div>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?></span>
            <button class="logout"><a href="banksign.php">Logout</a></button>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Account Summary</a></li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Transfer Funds</a></li>
            <li><a href="#">Pay Bills</a></li>
            <li><a href="#">Customer Support</a></li>
        </ul>
    </nav>

    <main>
        <section class="account-balance card">
            <h2>Account Balance</h2>
            <p class="balance-amount">$100,000.89</p>
        </section>

        <section class="account-summary card">
            <h2>Account Summary</h2>
            <p><strong>Last Transaction:</strong> $X,XXX.XX on [Date]</p>
            <p><strong>Account Number:</strong> **** **** **** [Last 4 digits]</p>
        </section>

        <section class="quick-actions card">
            <h2>Quick Actions</h2>
            <div class="button-group">
                <button>Transfer Funds</button>
                <button>Pay Bills</button>
                <button>View Transactions</button>
            </div>
        </section>

        <section class="recent-transactions card">
            <h2>Recent Transactions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/10/2024</td>
                        <td>Grocery Store</td>
                        <td>-$150.00</td>
                        <td>Debit</td>
                    </tr>
                    <tr>
                        <td>30/09/2024</td>
                        <td>Salary Deposit</td>
                        <td>+$3,000.00</td>
                        <td>Credit</td>
                    </tr>
                    <tr>
                        <td>28/09/2024</td>
                        <td>Online Subscription</td>
                        <td>-$12.99</td>
                        <td>Debit</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="important-notices">
            <h2>Important Notices</h2>
            <p><strong>Security Alert:</strong> Your account was accessed from a new device on [Date]. If this was not you, please change your password.</p>
            <p><strong>Fee Notification:</strong> Reminder: Monthly maintenance fee of $9.99 will be deducted on [Date].</p>
        </section>
    </main>

    <footer>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a> | <a href="#">Contact Us</a></p>
    </footer>
</body>
</html>



