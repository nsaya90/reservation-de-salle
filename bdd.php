<?php

$bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd, 'utf8');
?>