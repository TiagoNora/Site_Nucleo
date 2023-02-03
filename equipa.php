<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="style.css">
    <title>NEETI - Equipa</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">



    <link rel="icon" href="assets/img/gostei.png" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="assets/css/w3css.css">
    <link rel="stylesheet" href="assets/css/neeti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php include 'header.php'; // <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
?>

<?php

include "db_conn.php";
$sql = "SELECT COUNT(id) as nu FROM departments";
$result = mysqli_query($conn, $sql);
$row =mysqli_fetch_assoc($result);
$n=$row['nu'];
$n=$n-1;//para nao aparecer alunos
if($n!=0){

}
else{
    header("Location: index.php?error=departamentos nao encontrados");
    exit();
}

echo '
<div class="container site-section" id="welcome">
<section id="team" class="bg-light-gray">
    <div class="container">';

for ($i=1;$i<$n+1;$i++){
    $sql = "SELECT name FROM departments WHERE id=".$i;
    $result = mysqli_query($conn, $sql);

    $row =mysqli_fetch_assoc($result);
    $depert=$row['name'];

    echo '<div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">'.$depert.'</h2>
                <h3 class="section-subheading text-muted">&#10240</h3>
            </div>
        </div>
        <div class="row">';

    $sql = "SELECT user.id, user.name as name, roles.name as cargo, user.foto  FROM user INNER JOIN roles on user.roles_id=roles.id where roles.department_id=".$i;
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_array()){
        $name=$row['name'];
        $cargo=$row['cargo'];
        $foto=$row['foto'];

        $linkedin="#";
        $insta="#";
        $fb="#";

        $i2=$row['id'];



        echo '
            
                <div class="col-sm-4">
                    <div class="team-member"><img class="img-circle img-responsive" src="img/'.$foto.'">
                        <h4>'.$name.'</h4>
                        <p class="text-muted">'.$cargo.'</p>
                        <ul class="list-inline social-buttons">';
        $sql1 = "SELECT url as li from user_has_redessociais where user_has_redessociais.userId=".$i2." and user_has_redessociais.redesSociaisId=1";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1)==1){
            $row1 =mysqli_fetch_assoc($result1);
            $insta=$row1['li'];
            if ($insta!="")echo '<li> <a href="'.$insta.'"><i class="fa fa-instagram"></i></a></li>';
        }


        $sql1 = "SELECT url as li from user_has_redessociais where user_has_redessociais.userId=".$i2." and user_has_redessociais.redesSociaisId=3";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1)==1){
            $row1 =mysqli_fetch_assoc($result1);
            $fb=$row1['li'];
            if ($fb!="")echo '<li> <a href="'.$fb.'"><i class="fa fa-facebook"></i></a></li>';
        }


        $sql1 = "SELECT url as li from user_has_redessociais where user_has_redessociais.userId=".$i2." and user_has_redessociais.redesSociaisId=2";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1)==1){

            $row1 =mysqli_fetch_assoc($result1);
            $linkedin=$row1['li'];
            if ($linkedin!="")echo '<li> <a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
        }



         echo '              </ul>
                    </div>
                </div>
            
        ';
    }
    echo '</div>';
}
echo '</div>
</section>
</div>';

?>


<?php include 'footer.php';?>

</body>
</html>