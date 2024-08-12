<?php
// Database connection settings
$host = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "your_database_name"; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNumber = $_POST["number"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (first_name, last_name, gender, email, password, phone_number)
            VALUES ('$firstName', '$lastName', '$gender', '$email', '$password', '$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
