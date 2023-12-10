<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include.php'; ?> 
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <div class="login-box">
        <h2>Signup</h2>
        <form method="POST" action="login.php">
          <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="text" name="first_name" required="">
            <label>Voornaam</label>
          </div>
          <div class="user-box">
            <input type="text" name="last_name" required="">
            <label>Achternaam</label>
          </div>
          <div class="user-box">
            <input type="tel" name="phone_number" required="">
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
        <br>
        <a href="login.php" class="signup-link">Al een account? Login!</a>
      </div>
    
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goldenbulls";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


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
    echo "Invalid email format";
    exit();
  }

  // Controleer of het wachtwoord lang genoeg is
  if (strlen($password) < 6) {
    echo "Password should be at least 6 characters";
    exit();
  }

  // Maak de SQL-query
  $sql = "INSERT INTO users (email, password, first_name, last_name, phone_number, birthdate, address)
  VALUES ('$email', '$password', '$first_name', '$last_name', '$phone_number', '$birthdate', '$address')";

  // Voer de query uit
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Sluit de verbinding
$conn->close();
?>


