<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform the database connection
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "project";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, check password
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            // Password is correct, you can redirect or perform other actions here
            echo echo <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <link rel="stylesheet" href="Parking.css">
            
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #EFDE53;
                        margin: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                    }
            
                    
                    
            
                    .login-container h2 {
                        margin-bottom: 20px;
                    }
            
                    .form-group {
                        margin-bottom: 20px;
                    }
            
                    .form-group label {
                        display: block;
                        margin-bottom: 8px;
                    }
            
                    .form-group input {
                        width: 100%;
                        padding: 8px;
                        box-sizing: border-box;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                    }
            
                    .form-group button {
                        background-color: #419F9A;
                        color: #fff;
                        padding: 10px 15px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                    }
            
                    .form-group button:hover {
                        background-color:#EFDE53;
                    }
            
                    
                </style>
                
            </head>
            <body>
                <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black;">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <a class="navbar-brand" href="index.html"><img src="p loogo3.png" style="height: 40px; margin-top: -8px;"></a>
                      </div>
                      <ul class="nav navbar-nav navbar-right" >
                        <li><a href="index.html">Home</a></li>
                        <li class="active" ><a href="login.html">Log In</a></li>
                        <li><a href="parking.html">Reservation</a></li>
                        <li><a href="subscription.html">Subscription Plans</a></li>
                        <li><a href="FunPage.html">Fun Game</a></li>
                        <li><a href="AboutUs.html">About us</a></li>
                        <li><a href="ContactUs.html">Contact</a></li>
                      </ul>
                    </div>
                  </nav>
            
            <h2 style="color: #BD4D3B;">Welcome, LogIn completed!</h2>
            
            
            <footer class="footer" style="position: absolute; top: 700px; width: 100%;">
                  <div class="container-fluid,jumbotron text-center," style="background-color: black; color: white;">
                    <table class="table">
                      <tr>
                        <td><h5>Park Smarter</h5>   
                          <a href="aboutUS.html">About Us</a>  
                        </td>
                        <td>
                        <h5>Get Help</h5>
                          <a href="contactUS.html">Contact Us</a>
                        </td>
                        <td>
                          <h5>Follow Us</h5>
                        <div class="social-links">
                          <a href="https://chat.whatsapp.com/IR9qKmmcRpd1b3s1UGNqvG">Whatsapp</a></br>
                          <a href="https://www.instagram.com/3lmoyd/">Instagram</a></br>
                          <a href="https://github.com/3lmoyd/Park-Smarter.git">Github</a>
                        </div>
                      </td>
                      </tr>
                    </table>  
                  </div>
                </footer>
            
             </body>
            </html>
    HTML;        
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    } else {
        // User not found
        echo "User not found!";
    }

    // Close the database connection
    $conn->close();
}
?>