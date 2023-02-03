<?php
include "db_conn.php";

include "encrypt.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['userName'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $target_dir = "img/user/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
*/
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = $_SESSION['id'] . '.' . end($temp);
        //$newfilename = round(microtime(true)) . '.' . end($temp);
        //move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
        //old move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/user/" . $newfilename)) {
            //echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";



            $sql="UPDATE user SET foto = '"."user/" . $newfilename."' WHERE id=".$_SESSION['id'];



            if (mysqli_query($conn, $sql)) {
                header("Location: home.php?error=  user updated ");
                exit();
            } else {
                header("Location: home.php?error=  user not updated");
                exit();

            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>