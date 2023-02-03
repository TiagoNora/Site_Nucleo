<!DOCTYPE html>
<html>
<head>
    <title>cena</title>
</head>
<body>
    <form action="login.php" method="post">

        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])){?>
            <p><?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label> User Email</label>
        <input type="email" name="userName" placeholder="email"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
    </form>

    <form action="signup.php" method="post">

        <h2>Sign Up</h2>
        <?php if(isset($_GET['error'])){?>
            <p><?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label> User Name</label>
        <input type="text" name="name" placeholder="Name">
        <label> User Email</label>
        <input type="email" name="userName" placeholder="User email"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <label>Repeat Password</label>
        <input type="password" name="password2" placeholder="Repeat Password"><br>

        <button type="submit">Sign Up</button>
    </form>
    <?php
    include "encrypt.php";
    //echo clean("Álvaro Torcato");
    ?>

</body>
</html>