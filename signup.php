<?php
include "db_conn.php";
include "encrypt.php";


if(isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['name'])){

    function validate($data){
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$name=validate($_POST['name']);
$userName=validate($_POST['userName']);
$pass =validate($_POST['password']);

if(empty($userName)){
    header("Location: index2teste.php?error=User is required");
    exit();
}
elseif (empty($pass)){
    header("Location: index2teste.php?error=Passord is required");
    exit();
}
$date = date('y-m-d h:i:s');

//$name=en($name,$date);
//$pass=en($pass,$name.$date); dave erro nao sei pq
//$pass=en1($pass);
$pass=en($pass,$name);


$sql = "INSERT INTO user VALUES ( NULL,'$name', '$userName', '$pass', NULL,'$date', 'foto.png')";


if (mysqli_query($conn, $sql)){
    //header("Location: index2teste.php?error=  user added ".$pass);
    header("Location: index2teste.php?error=  user added ");
    exit();
}
else{
    header("Location: index2teste.php?error=  user not added");
    exit();
}
