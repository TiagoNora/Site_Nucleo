<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['userName'])){
    ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
    <title>NEETI - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    <?php include 'header.php';

    include "db_conn.php";
    $sql = "SELECT * FROM user WHERE id=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql);

    $row =mysqli_fetch_assoc($result);
    $nome=$row['name'];
    $email=$row['uEmail'];

    $sql = "SELECT * FROM user_has_redessociais WHERE  user_has_redessociais.userId=".$_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $insta="#";
    $fb="#";
    $linkedin="#";

    while($row = $result->fetch_array()) {
        $aux = $row['redesSociaisId'];
        if ($aux==1) $insta=$row['url'];
        elseif ($aux==2) $linkedin=$row['url'];
        elseif ($aux==3) $fb=$row['url'];
    }

    ?>

    <h1> HEllo,<?php echo $_SESSION['name']; ?> </h1>
    <a href="logout.php">logout</a>



        <h2>UPDATE</h2>
        <?php if(isset($_GET['error'])){?>
            <p><?php echo $_GET['error']; ?> </p>
        <?php }
        echo '
        <form action="updateProfile.php" method="post">
        
        <form action="updateProfile.php" method="post">
        <label>Nome</label>
        <input name="nome" placeholder="'.$nome.'"><br>
        <button type="submit">Update</button>
        </form>
        
        <form action="updateProfile.php" method="post">
        <label>Insta</label>
        <input name="insta" placeholder="'.$insta.'"><br>
        <button type="submit">Update</button>
        </form>
        
        <form action="updateProfile.php" method="post">
        <label>FB</label>
        <input name="fb" placeholder="'.$fb.'"><br>
        <button type="submit">Update</button>
        </form>
        
        <form action="updateProfile.php" method="post">
        <label>Linkedin</label>
        <input name="linkedin" placeholder="'.$linkedin.'"><br>
        <button type="submit">Update</button>
        </form>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Foto (tem de ser quadrada)</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>'
        ;

   include 'footer.php';?></body>
</html>
    <?php
}
else {
    header("Location: index2teste.php?error=home.php");
    exit();
}
?>