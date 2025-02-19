<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    //SQL statement
    $sql = "INSERT INTO bookings (name, email, destination, date, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
   
    if ($stmt) {
        $stmt->bind_param("sssss", $name, $email, $destination, $date, $message);
        if ($stmt->execute()) {
            echo "Booking successful!";
            header("Location: thank.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error in preparing statement: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency Form</title>
  <link rel="stylesheet" href="booking.css">
</head>
<body>
  <div class="form-container">
    <form class="travel-form" method="POST" >
      <h1>Plan Your Dream Trip</h1>
      <p>Fill out the form below and let us take care of the rest!</p>

      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="input-group">
        <label for="destination">Destination</label>
        <select id="destination" name="destination" required>
          <option value="" disabled selected>Select a destination</option>
          <option value="Bangladesh">Cox's Bazar, Bangladesh</option>
          <option value="Finland">Helsinki, Finland</option>
          <option value="Pakistan">Karachi, Pakistan</option>
          <option value="China">Beijing, China</option>
        </select>
      </div>

      <div class="input-group">
        <label for="dates">Travel Dates</label>
        <input type="date" id="date" name="date" required>
      </div>

      <div class="input-group">
        <label for="message">Special Requests</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter any special requests or details"></textarea>
      </div>

      <button type="submit" class="btn" >Submit</button>

    </form>
  </div>
</body>
</html>