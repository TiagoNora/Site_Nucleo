<?php
echo '
<script>
  // Used to toggle the menu on small screens when clicking on the menu button
  function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }
</script>

<div class="w3-top">
  <div class="w3-bar w3-white w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-white" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-medium w3-white"><img id="logo" src="assets/img/gostei.png"><strong>NEETI</strong></a>

    <a href="repositorio.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Repositório</a>
    <a href="eventos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Eventos</a>
    <a href="equipa.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Equipa</a>
    <a href="contactos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contactos</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="repositorio.php" class="w3-bar-item w3-button w3-padding-large">Repositório</a>
    <a href="eventos.php" class="w3-bar-item w3-button w3-padding-large">Eventos</a>
    <a href="equipa.php" class="w3-bar-item w3-button w3-padding-large">Equipa</a>
    <a href="contactos.php" class="w3-bar-item w3-button w3-padding-large">Contactos</a>
  </div>
</div>
<br><br><br>'

?>