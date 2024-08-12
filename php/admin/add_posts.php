<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $category = $_POST["category"];
    $date = $_POST["date"];
    $read_time = $_POST["read_time"];
    $content = $_POST["content"];
    
    // Validate and process data
    if (!empty($title) && !empty($category) && !empty($date) && !empty($read_time) && !empty($content)) {
        // Connect to your database (replace with your actual database connection code)
        $conn = new mysqli("hostname", "username", "password", "database_name");
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and execute an SQL insert query
        $sql = "INSERT INTO blog_posts (title, category, date, read_time, content) VALUES ('$title', '$category', '$date', '$read_time', '$content')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New blog post created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        echo "All fields are required.";
    }
}
?>
