<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'DatabaseConfig.php';

    $con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

    $Email = $_POST['email'];

    $CheckSQL = "SELECT * FROM user WHERE email='$Email'";

    $check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));

    if(isset($check)){

        echo 'Email Already Exist, Please Enter Another Email.';

    }

    else{
        $Sql_query = "INSERT INTO user (email) values ('$Email')";
    if(mysqli_query($con,$Sql_query)){
        echo 'User Registration Successfully';
    }
    else{
        echo 'Something went wrong';
    }
    }
}
mysqli_close($con);
?>