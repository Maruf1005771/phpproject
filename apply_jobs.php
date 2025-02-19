<?php
include 'database.php';

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    // Handle Resume Upload
    $target_dir = "resumes/";
    $resume_file = $target_dir . basename($_FILES["resume"]["name"]);
   
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_file)) {
        // Insert into Database
        $sql = "INSERT INTO job_applications (full_name, email, phone, position, resume)
                VALUES ('$full_name', '$email', '$phone', '$position', '$resume_file')";

     if ($conn->query($sql) === TRUE) {
    // Redirect to thank-you page
    header("Location: thank.html");
    exit();
    } else {
    echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
    }
    } else {
     echo "<script>alert('Failed to upload resume. Try again.'); window.history.back();</script>";
   }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs in Finland </title>

    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background: url('images/job_page.jpg') no-repeat center center/cover;
    }

    form {
        max-width: 500px;
        margin: auto;
        background: rgba(0, 0, 0, 0.4);
        padding: 20px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(8px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    label {
        color: #fff;
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input, select, textarea {
        width: calc(100% - 20px);
        padding: 12px;
        margin: 8px 0;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1);
        display: block;
    }

    input[type="file"] {
        padding: 8px;
        background: rgba(255, 255, 255, 0.9);
        cursor: pointer;
    }

    input:focus, select:focus, textarea:focus {
        outline: none;
        border: 2px solid #4CAF50;
    }

    button {
        display: block;
        width: 50%;
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin: 10px auto;
    }

    button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    button:active {
        background-color: #3e8e41;
        transform: scale(0.98);
    }
    </style>
</head>
<body>

    <h1 style="text-align: center; color: rgb(8, 168, 254);">Jobs at <b>TRIP MASTER</b></h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Full Name:</label>
        <input type="text" name="full_name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <label>Position Applying For:</label>
        <select name="position" required>
            <option value="Tour Guide">Tour Guide</option>
            <option value="Driver">Driver</option>
            <option value="Cleaner">Cleaner</option>
            <option value="Chef">Chef</option>
            <option value="Office Staff">Office Staff</option>
            <option value="Marketing Specialist">Marketing Specialist</option>
        </select>

        <label>Resume (PDF only):</label>
        <input type="file" name="resume" accept=".pdf" required>

        <button type="submit" name="submit">Submit Application</button>
    </form>

</body>
</html>
