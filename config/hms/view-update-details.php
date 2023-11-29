<?php

include('func.php');
$con = mysqli_connect("localhost", "root", "Hari0808!", "hms");

if (!isset($_SESSION['pid'])) {
    header("Location: login.php"); // Redirect to login page if user is not logged in
    exit;
}

$pid = $_SESSION['pid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update user details
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE patreg SET fname = '$fname', lname = '$lname', gender = '$gender', contact = '$contact', email = '$email' WHERE pid = $pid";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Details updated successfully!');</script>";
        // Update session variables
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['gender'] = $gender;
        $_SESSION['contact'] = $contact;
        $_SESSION['email'] = $email;
    } else {
        echo "<script>alert('Failed to update details. Please try again later.');</script>";
    }
}

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
        }
        .navbar {
            background-color: #007BFF;
            padding: 10px 15px;
            height:60px;
        }
        .navbar a {
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin-top: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007BFF;
            border: none;
        }
    </style>
    <title>View/Update Details</title>
</head>
<body>
    <div class="navbar">
        
    </div>

    <div class="container">
        <h2>Update Details</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname" required value="<?php echo $user['fname']; ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname" required value="<?php echo $user['lname']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" required value="<?php echo $user['contact']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $user['email']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Details</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
