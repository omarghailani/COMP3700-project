<?php
    
    // Retrieve form data
    $username = $_POST["name"];
    $comment = $_POST["comment"];
    

    // Validate data if needed

    // Perform the database connection
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "project";


    // Create connection
    $conn = new mysqli($servername, $username_db ,$password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    // Insert data into the "project" table
    $sql = "INSERT INTO comments (Name, Comment) VALUES ('$username', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();
        // Redirect to a success page
        //header("url: /Users/omar/Desktop/squ/COMP3700/project/signIn_success.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

?>
