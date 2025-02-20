<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/mesback.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: white;
            text-align: center;
        }
        
        h2, h3 {
            background: rgba(0, 0, 0, 0.6);
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.3);
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #ff6600;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #cc5200;
        }

        #messages {
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        .message-box {
            background: rgba(0, 0, 0, 0.6);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: left;
        }

        small {
            display: block;
            color: #ccc;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h2>Leave a Message</h2>

    <!-- Message Form -->
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
    
    <h3>Messages</h3>

    <?php
    include 'Database.php'; // Include database connection

    // If the form is submitted, insert the message into the database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = htmlspecialchars($_POST['name']); // Prevent XSS
        $message = htmlspecialchars($_POST['message']);

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $message);
        $stmt->execute();
        $stmt->close();

        // Refresh the page to display the new message
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Fetch messages from the database
    $sql = "SELECT name, message, created_at FROM messages ORDER BY created_at DESC";
    $result = $conn->query($sql);
    ?>

    <!-- Display Messages -->
    <div id="messages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message-box'><strong>{$row['name']}:</strong> {$row['message']} <small>({$row['created_at']})</small></div>";
            }
        } else {
            echo "<div class='message-box'>No messages yet.</div>";
        }
        ?>
    </div>

    <?php
    // Close database connection
    $conn->close();
    ?>

</body>
</html>


