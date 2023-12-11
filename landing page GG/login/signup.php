<?php
include 'include.php';  

$message = '';
$msg_type = 'success';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Haal de gegevens uit het formulier
  $email = $_POST['email'];
  $password = $_POST['password'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone_number = $_POST['phone_number'];
  $birthdate = $_POST['birthdate'];
  $address = $_POST['address'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email format";
    $msg_type = 'error';
  }

  // Controleer of het wachtwoord lang genoeg is
  if (strlen($password) < 6) {
    $message = "Password should be at least 6 characters";
    $msg_type = 'error';
  }
  $email_check = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($email_check);

if ($result->num_rows > 0) {
  // Als de e-mail al bestaat, toon een foutmelding
  $message = "Email already exists";
  $msg_type = 'error';

  // Maak de SQL-query
  $sql = "INSERT INTO users (email, password, first_name, last_name, phone_number, birthdate, address)
  VALUES ('$email', '$password', '$first_name', '$last_name', '$phone_number', '$birthdate', '$address')";

  // Voer de query uit
  if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
    $msg_type = 'success';
    header('Location: login.php'); 
    exit(); 
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
    $msg_type = 'error';
  }

  // Sluit de verbinding
  $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <div class="login-box">
        <h2>Signup</h2>
        <form method="POST" action="signup.php">
      <!-- Form fields -->
      <div class="user-box">
        <input type="text" name="email" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <div class="user-box">
        <input type="text" name="first_name" required="">
        <label>First Name</label>
      </div>
      <div class="user-box">
        <input type="text" name="last_name" required="">
        <label>Last Name</label>
      </div>
      <div class="user-box">
        <input type="text" name="phone_number" required="">
        <label>Telefoonnummer</label>
      </div>
      <div class="user-box">
        <input type="date" name="birthdate" required="">
        <label></label>
      </div>
      <div class="user-box">
        <input type="text" name="address" required="">
        <label>Adres</label>
      </div>
      <input type="submit" value="Submit">
    </form>
    <p class="<?php echo $msg_type; ?>"><?php echo $message; ?></p>
    <br>
    <a href="login.php" class="signup-link">Al een account? Login!</a>
  </div>
</body>
</html>
                        