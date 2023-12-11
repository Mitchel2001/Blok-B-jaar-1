<?php
include 'include.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    // Password is correct, save the user's data in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role']; // Assuming the role is stored in 'role' column

    // Redirect based on role
    if ($user['role'] == 'guest') {
        header('Location: index.php');
    } else if ($user['role'] == 'employee' || $user['role'] == 'owner') {
        header('Location: ../../adminpanel');
    }
    exit;
} else {
    // Invalid credentials
    $error_message = 'Invalid email or password.';
}
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
        <h2>Login</h2>
        <form method="POST" action="login.php">
          <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
          </div>
          <input type="submit" value="Submit">
          <?php if (isset($error_message)): ?>
           <p><?php echo $error_message; ?></p>
           <?php endif; ?>
        </form>
        <br>
        <a href="signup.php" class="signup-link">Geen account klik hier</a>
        
      </div>
    
</body>
</html>



