<?php

session_start();

$bdd = mysqli_connect('localhost', 'root', '', 'reservationsalles') or die("Impossible de se connecter : " . mysqli_connect_error());
mysqli_set_charset($bdd, "utf8");
$req = "SELECT * FROM reservations";
$exec_req = mysqli_query($bdd, $req);
$reservations = mysqli_fetch_all($exec_req, MYSQLI_ASSOC);

ob_start()
?>

<form method="GET" action="">
    
        <select name="id" id="select-reservation">
            <option value="">Veuillez Choisir une réservation </option>

            <?php foreach ($reservations as $reservation) : ?>
                <option value="<?= $reservation['id'] ?>"><?= $reservation['titre'] . ' ' . $reservation['id'] ?></option>
            <?php endforeach ?>

        </select>

        <button type="submit" class=bouton_valider >Valider</button>
    
</form>


<?php if (isset($_GET['id'])) {

    $id = $_GET['id'];

    //          Requête pour sélectionner la table réservations
    $requete = "SELECT * FROM reservations WHERE id = $id";
    $exec_requete = mysqli_query($bdd, $requete);
    $results = mysqli_fetch_all($exec_requete, MYSQLI_ASSOC);

    //          Boucle pour afficher les résultats
    foreach ($results as $result) {

        echo '<ul>';
        echo '<li>Nom événement : ' . $result['titre'] . '</li>';
        echo '<li>Sujet : ' . $result['description'] . '</li>';
        echo '<li>Date de début : ' . $result['debut'] . '</li>';
        echo '<li>Date de fin : ' . $result['fin'] . '</li>';
        echo '</ul>';
    }
}
?>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>