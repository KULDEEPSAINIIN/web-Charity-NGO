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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $amount =$_POST['amount'];

    $sql= "INSERT INTO donate (first_name, last_name, email, amount) 
    VALUES ('$first_name', '$last_name', '$email', '$amount')";

    if($conn->query($sql) === TRUE){
         echo "<script>
         alert('Donation successfully complete');
          window.location.href= 'donate.php';</script>";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
?>

