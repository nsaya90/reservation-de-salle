<?php

session_start();


//Stockage des variable de Session

$dataUser = $_SESSION['data'][0];
$id_user = $dataUser['id'];

//Conditions pour valider le Post
if (isset($_POST['Modifier'])) {


    if (!empty($_POST['login']) && !empty($_POST['password'])) {


        $login = $_POST['login'];
        $password = $_POST['password'];
        //      Connexion à la BDD
        $bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
        //      Requête de M.A.J de la table utilisateurs pr le login et password
        $requete = "UPDATE utilisateurs SET login = '$login', password='$password' WHERE id = '$id_user'";
        $exec_requete = mysqli_query($bdd, $requete);

        header("Location: connexion.php");
    }
}
ob_start();
?>

<div class="box_text">

    <h1>Bienvenue sur votre profil</h1>
    <ul>
        <li>
            <p>Login : <?= $dataUser['login'] ?></p>
        </li>
        
    </ul>
</div>

<div class="big_box_form_profil">

    <form method="POST" action="">
        <div class="txt1_profil">
            <p>Pour modifier vos informations veuillez remplire les champs suivant : </p>
        </div>

        <label for="Login : "></label>
        <input type="text" name="login" placeholder="<?= $dataUser['login'] ?>" size="25" />

        <label for="Mot de passe : "></label>
        <input type="password" name="password" placeholder="" size="25" />

        <input type="submit" name="Modifier" value="Modifier" class="btn_valider" />
    </form>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>