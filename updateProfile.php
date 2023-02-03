<?php
include "db_conn.php";

include "encrypt.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['userName'])) {
    function validate($data){
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if (isset($_POST['insta'])){
        $sql = "SELECT user_has_redessociais.url, id from user_has_redessociais where user_has_redessociais.userId=".$_SESSION['id']." and user_has_redessociais.redesSociaisId=1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==1){
            $row =mysqli_fetch_assoc($result);
            $id=$row['id'];
            $sql="UPDATE user_has_redessociais SET url = '".$_POST['insta']."' WHERE user_has_redessociais.id = ".$id;
        }
        else{
            $sql= "INSERT INTO user_has_redessociais (id, userId, redesSociaisId, url) VALUES (NULL, '".$_SESSION['id']."', 1, '".$_POST['insta']."')";
        }


        if (mysqli_query($conn, $sql)) {
            header("Location: home.php?error=  user updated ");
            exit();
        } else {
            header("Location: home.php?error=  user not updated");
            exit();

        }
    }

    if (isset($_POST['fb'])){
        $sql = "SELECT user_has_redessociais.url, id from user_has_redessociais where user_has_redessociais.userId=".$_SESSION['id']." and user_has_redessociais.redesSociaisId=3";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==1){
            $row =mysqli_fetch_assoc($result);
            $id=$row['id'];
            $sql="UPDATE user_has_redessociais SET url = '".$_POST['fb']."' WHERE user_has_redessociais.id = ".$id;
        }
        else{
            $sql= "INSERT INTO user_has_redessociais (id, userId, redesSociaisId, url) VALUES (NULL, '".$_SESSION['id']."', 3, '".$_POST['fb']."')";
        }


        if (mysqli_query($conn, $sql)) {
            header("Location: home.php?error=  user updated ");
            exit();
        } else {
            header("Location: home.php?error=  user not updated");
            exit();

        }
    }
    if (isset($_POST['linkedin'])){
        $sql = "SELECT user_has_redessociais.url , id from user_has_redessociais where user_has_redessociais.userId=".$_SESSION['id']." and user_has_redessociais.redesSociaisId=2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==1){
            $row =mysqli_fetch_assoc($result);
            $id=$row['id'];
            $sql="UPDATE user_has_redessociais SET url = '".$_POST['linkedin']."' WHERE user_has_redessociais.id = ". $id;
        }
        else{
            $sql= "INSERT INTO user_has_redessociais (id, userId, redesSociaisId, url) VALUES (NULL, '".$_SESSION['id']."', 2, '".$_POST['linkedin']."')";
        }


        if (mysqli_query($conn, $sql)) {
            header("Location: home.php?error=  user updated ");
            exit();
        } else {
            header("Location: home.php?error=  user not updated");
            exit();

        }
    }


   /* if (isset($_POST['nome'])) { E PRECISO ALTERAR A PASS TB POR CAUSA DA ENCRYPTACAO
        $name=validate($_POST['name']);
        $pass =validate($_POST['password']);
        $pass=en($pass,$name.$date);

        $sql = "UPDATE user SET name = '" . $_POST['nome'] . "' WHERE user.id = " . $_SESSION['id'];


        if (mysqli_query($conn, $sql)) {
            header("Location: home.php?error=  user updated ");
            exit();
        } else {
            header("Location: home.php?error=  user not updated");
            exit();

        }
    }

   */
}