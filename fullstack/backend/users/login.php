<?php 

include_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT name, id FROM users WHERE email = '$email' AND password = '$password'";
    
    // execution of the SQL statement
    $result = $con->query($sql);


    // this just means if there sre no results fom DB
    // Meaning the user could not be found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // echo "Successfully logged in";
        

        header("Location: ../../index.php");
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }

    $con->close();
}
?>
