<?php

if (isset($_POST['Valider'])) {

    // Si le login et le mdp est entré
    if (!empty($_POST['login'] && !empty($_POST['mdp']))) {

        $login_co = $_POST['login'];
        $password_co = sha1($_POST['mdp']);

        require 'bdd.php';
        

        // Requête SELECT avec un WHERE du login égal au login inséré et password égal au password insérer pour afficher la l'entrée qui correspond a l'utilisateur 
        // Renvoie un array vide si l'utilisateur n'existe pas 
        $requete = ' SELECT * FROM utilisateurs WHERE login = "' . $login_co . '" AND password = "' . $password_co . '" ';
        $exec_requete = mysqli_query($bdd, $requete);
        $rep = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);

        // Si l'array n'est pas vide donc si l'utilisateur est présent dans la BDD 
        if (!empty($rep)) {
            session_start();

            $_SESSION['data'] = $rep;

        //si connexion alors je redirige vers la page de profile 
            header('Location: profil.php');

            exit;
        }

        // SI array vide alors aucun utilisateur 

        else {

            $erreur = "Aucun utilisateur";
        }
    }
}

ob_start();
?>

    <div class="main2_connex">
        <div class="box_titre_connex">
            <h1>Connexion</h1>
            <h2>Entrez vos identifiants :</h2>
            <p>Pour réserver une salle veuillez vous connecter</p>
        </div>
        <div class="big_box_form_connex">
            <div class="box_form_connex">
                <div class="box2_form_connex">

                    <form method="POST" action="">

                        <div>
                            <label for="Login : "></label>
                            <input type="text" name="login" placeholder="Votre login" size="25" />
                        </div>

                        <div>
                            <label for="Mot de passe : "></label>
                            <input type="password" name="mdp" placeholder="Votre mot de passe" size="25" />
                        </div>

                        <input type="submit" name="Valider" value="Connexion" class="bouton_valider" />

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="box_erreur">
        <?php
        if (isset($erreur)) {
            echo '<p>' . $erreur = "Aucun utilisateur" . '</p>';
        }
        ?>
    </div>

    <?php
    $content = ob_get_clean();
    require_once 'template.php';
    ?>