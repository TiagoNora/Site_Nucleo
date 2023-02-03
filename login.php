<?php
session_start();
include "db_conn.php";
include "encrypt.php";

if(isset($_POST['userName']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

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

$sql = "SELECT name, create_time FROM user WHERE uEmail='$userName'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)==1){
    $row =mysqli_fetch_assoc($result);
    $name=$row['name'];
    $date=$row['create_time'];
   // $pass=en($pass,$name.$date);
    //$pass=en1($pass);
    $pass=en($pass,$name);
}
else{
    header("Location: index2teste.php?error=User not found 1");
    exit();
}







$sql = "SELECT * FROM user WHERE uEmail='$userName' AND pass='$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)==1){
    $row =mysqli_fetch_assoc($result);
    $userName1=$row['uEmail'];
    $pass1=$row['pass'];
    if ($row['uEmail']===$userName && $row['pass']===$pass){
        echo "logged in";
        $_SESSION['userName']=$row['uEmail'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        header("Location: home.php");
        exit();
    }
    else{
        echo $userName;
        echo $pass;
        header("Location: index2teste.php?error=Incorrect User or Passord");
        //header("Location: index2teste.php?error=".$pass);
        exit();
    }
}
else{
    //header("Location: index2teste.php?error=".$pass   . $row['pass'] );
    header("Location: index2teste.php?error=User not found 2 ");
    //header("Location: index2teste.php?error=Incorrect User or Passord");
    exit();
}

