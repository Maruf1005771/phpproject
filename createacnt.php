<?php //Done
include 'database.php'; // Ensure this file correctly initializes $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs and trim spaces
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit(); // Stop script execution
    }

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare SQL statement (Ensure $conn is correctly initialized)
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);


    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            header("Location: home.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error in preparing SQL statement: " . $conn->error;
    }
    // Close the database connection
    $conn->close();
}
?>


<style>
    body {
        background: url('images/createaccount.jpg') no-repeat center center fixed; 
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    .register-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        width: 350px;
        text-align: center;
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
    }

    .register-box h2 {
        color: white;
        margin-bottom: 20px;
        font-size: 30px;
    }

    .register-box input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        outline: none;
        border-radius: 5px;
    }

    .register-box button {
        width: 40%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: #007bff;
        color: white;
        cursor: pointer;
        transition: 0.3s;
    }

    .register-box button:hover {
        background: #0056b3;
    }

    .message {
        color: white;
        margin-bottom: 15px;
    }
</style>

<div class="register-box">
    <h2>Create Account</h2>
    <?php if (isset($message)) echo "<div class='message'>$message</div>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>

        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Sign Up</button>
    </form>
    <p style="color: white;" >Already have an account? <a style="color:rgb(66, 209, 222);" href="index.php">Log in</a></p>
</div>
