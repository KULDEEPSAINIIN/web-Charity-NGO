<?php
$host = "localhost";
$user = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "ngo"; // data base name

$conn = new mysqli($host, $user, $password, $dbname);
// check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];

//check if email already exists
$check_email ="SELECT*FROM subscribe WHERE email='$email'";
$result = $conn->query($check_email);

if($result->num_rows > 0){
    echo "Email already registered!";
    echo "<script>
         alert('Email already registered!');
          window.location.href= 'home.php';</script>";
 }else{
    $sql= "INSERT INTO subscribe (email) VALUES ('$email')";

    if($conn->query($sql) === TRUE){
         echo "<script>
         alert('Subscribtion successfully complete');
          window.location.href= 'home.php';</script>";
    } else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
 }
}

$conn->close();
?>