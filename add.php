<?php
$servername = "localhost";
$database = "student";
$username = "root";
$password = "root";
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $studentname = $_POST['studentname'];
    $studentscore = $_POST['studentscore'];

    $sql = "INSERT INTO score(name, score) VALUES ('$studentname', '$studentscore' )";

    if (mysqli_query($con, $sql)) {
        echo "<br>" ."Student Marks Added.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
