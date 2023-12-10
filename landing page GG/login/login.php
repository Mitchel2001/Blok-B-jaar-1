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
        </form>
        <br>
        <a href="signup.php" class="signup-link">Geen account klik hier</a>
        
      </div>
    
</body>
</html>



