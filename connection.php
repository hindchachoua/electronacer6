<!-- connection database with php -->
<?php   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "electronacer";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    $mysqli = new mysqli("localhost", "root", "", "electronacer");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>







    