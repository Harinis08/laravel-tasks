<?php

include('func.php');
$con = mysqli_connect("localhost", "root", "Hari0808!", "hms");

if (!isset($_SESSION['pid'])) {
    header("Location: login.php"); // Redirect to login page if user is not logged in
    exit;
}

$pid = $_SESSION['pid'];

// Fetch user details
$query = "SELECT * FROM patreg WHERE pid = $pid";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin-top: 20px;
        }
        .navbar {
            background-color: #007BFF;
            padding: 10px 15px;
        }
        .navbar a {
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .detail-box {
            background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            color: white;
            margin-top: 20px;
        }
        .detail-label {
            font-weight: bold;
            margin-right: 10px;
        }
        .detail-text {
            margin-bottom: 10px;
        }
    </style>
    <title>View Details</title>
</head>
<body>
    <div class="navbar">
        
        <!-- Add other navigation links as needed -->
    </div>

    <div class="container">
        <h2 class="text-center">View Details</h2>
        <div class="detail-box">
            <div class="detail-text">
                <span class="detail-label">First Name:</span>
                <span><?php echo $user['fname']; ?></span>
            </div>
            <div class="detail-text">
                <span class="detail-label">Last Name:</span>
                <span><?php echo $user['lname']; ?></span>
            </div>
            <div class="detail-text">
                <span class="detail-label">Gender:</span>
                <span><?php echo $user['gender']; ?></span>
            </div>
            <div class="detail-text">
                <span class="detail-label">Contact:</span>
                <span><?php echo $user['contact']; ?></span>
            </div>
            <div class="detail-text">
                <span class="detail-label">Email:</span>
                <span><?php echo $user['email']; ?></span>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
