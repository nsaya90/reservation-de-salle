<?php
session_start();
//Connexion à la base de donné.

require 'bdd.php';
mysqli_set_charset($bdd, 'utf8');

//Conditions de validation post
if (isset($_POST['Valider'])) {

    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

        //  Conditions de vérife si différent de vide les login et password


        //      Stockage des variables Post
        $login = htmlspecialchars($_POST['login']);
        $password = sha1($_POST['password']);
        $password2 = sha1($_POST['password2']);

        //      Condition pour les password et insertion en BDD du login et password
        if ($password == $password2) {

            $ajoututilisateur = "INSERT INTO utilisateurs (login , password) VALUES ('$login','$password')";

            if (mysqli_query($bdd, $ajoututilisateur)) {

                header('Location: connexion.php');
                exit;
            }
        }
    } else {

        $erreur = "<p>Veuillez rentrer tout les champs</p>";
    }
}

ob_start();
?>

<div class="main2_inscription">
    <div class="box_titre_inscription">
        <h1>Inscrivez-vous !</h1>
        <h2>Entrez les données demandées :</h2>
        <p>Pour réserver une salle veuillez vous inscrire</p>
    </div>
    <div class="big_box_form">
        <div class="box_form">
            <div class="box2_form">

                <form method="POST" action="">

                    <div>
                        <label for="Login : "></label>
                        <input type="text" name="login" placeholder="Votre login" size="25" />
                    </div>

                    <div>
                        <label for="Mot de passe : "></label>
                        <input type="password" name="password" placeholder="Votre mot de passe" size="25" />
                    </div>

                    <div>
                        <label for="Confirmation mot de passe : "></label>
                        <input type="password" name="password2" placeholder="Confirmation mot de passe" size="25" />
                    </div>


                    <input type="submit" name="Valider" value="Valider" class="bouton_valider" />

                </form>

            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once 'template.php';
?>