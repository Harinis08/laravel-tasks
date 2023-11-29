<?php
if(isset($_POST['original_username'])) {
  $original_username = $_POST['original_username'];
  $username = $_POST['username'];
  $spec = $_POST['spec'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $docFees = $_POST['docFees'];

  $con = mysqli_connect("localhost", "root", "Hari0808!", "hms");
  $query = "UPDATE doctb SET username = '$username', spec = '$spec', email = '$email', password = '$password', docFees = '$docFees' WHERE username = '$original_username'";
  $result = mysqli_query($con, $query);
  if($result) {
    echo "Doctor details updated successfully!";
    // Redirect back to the doctor list or admin panel as needed
    header("Location: admin-panel1.php");
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
}
?>
