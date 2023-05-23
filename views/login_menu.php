<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
            
    // Include the database connection file
    require_once 'db/db_connect.php';
            
    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
            
    // Check if a row is returned
    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $level = $row['level'];
              
      if ($level == 1) {
        header("Location: administrator/admin_page.php"); // Redirect to admin page
        exit();
      } elseif ($level == 0) {
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
      }
    } else {
      $message = "Username and/or Password incorrect.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>RENTAL MOBIL</title>
</head>
<body>
  <div class="container">
    <a href="../index.php">
      <div class="arrow"></div>
    </a>
    <h1>Login</h1>
    <form method="POST" action="">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your Username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password" required>
      </div>
      <button type="submit" value="Login">Login</button>
      <div class="regis">
        <a href="#">Create an Account</a>
      </div>
    </form>
  </div>
</body>
</html>