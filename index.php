<?php //partially done , verify done with email
session_start();
include 'database.php'; // Ensure this correctly connects to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password with password_verify()
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['email'] = $user['email'];
            
            header("Location: home.php"); // Redirect to home page
            exit();
        } else {
            echo "";
        }
    } else {
        echo "";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="logstylenew.css">
</head>
<body>
  <div class="login-container">
    <form class="login-form" method="POST" action="">
      <h2>Login</h2>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
      </div>

      <button type="submit">Login</button>
        
      <div class="extra-links">
        <a href="#">Forgot Password?</a>
        <a href="createacnt.php">Create an Account</a>
      </div>
    </form>
  </div>
</body>
</html>
