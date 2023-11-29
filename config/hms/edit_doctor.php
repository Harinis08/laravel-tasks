<?php
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $con = mysqli_connect("localhost", "root", "Hari0808!", "hms");
  $query = "SELECT * FROM doctb WHERE id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  ?>
  <form action="update_doctor.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Doctor Name:</label>
    <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
    <label>Specialization:</label>
    <input type="text" name="spec" value="<?php echo $row['spec']; ?>"><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <label>Password:</label>
    <input type="text" name="password" value="<?php echo $row['password']; ?>"><br>
    <label>Fees:</label>
    <input type="text" name="docFees" value="<?php echo $row['docFees']; ?>"><br>
    <button type="submit">Update</button>
  </form>
  <?php
}
?>
