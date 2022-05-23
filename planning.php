<?php

session_start();


//Connexion à la BDD et relier les 2 table et afficher le tableau du résultat
require 'bdd.php';

$query2 = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur";
$query2 = mysqli_query($bdd, $query2);
$resultats = mysqli_fetch_all($query2, MYSQLI_ASSOC);

// Mettre les dates en format FR
setlocale(LC_TIME, 'fr_FR.utf8', 'Fra');

//Stockage des date de la semaine dans les variables 

$lundi = date('Y-m-d', strtotime('Monday'));
$mardi = date('Y-m-d', strtotime('Tuesday'));
$mercredi = date('Y-m-d', strtotime('Wednesday'));
$jeudi = date('Y-m-d', strtotime('Thursday'));
$vendredi = date('Y-m-d', strtotime('Friday'));


$week = [$lundi, $mardi, $mercredi, $jeudi, $vendredi];

ob_start()

?>

<div class="box_titre_planning">

    <h1>Planning</h1>
</div>

<p>Pour reserver veuillez suivre ce lien <a href="reservation-form.php">RESERVER</a></p>

<div class="box_plan">
    
    <table>
        <thead>
            <tr>
                <th>
                    <?php for ($i = 0; $i < 5; $i++) : ?>

                <th>
                    <?=  utf8_encode(strftime("%A %d %B %G", strtotime('Monday this week +' . $i . 'days'))); ?>
                </th>

            <?php endfor; ?>
            </th>
            </tr>
        </thead>
        <tbody>
            <?php for ($j = 8; $j <= 19; $j++) : ?>

                <tr>
                    <td><?= $j ?>:00-<?= $j + 1 ?>:00 </td>

                    <?php for ($i=0; isset($week[$i]); $i++) : ?> 

                        <td>
                            <?php foreach ($resultats as $resultat) : ?>

                               <?php $jour = date('Y-m-d', strtotime($resultat['debut']));
                                   $h = date("H", strtotime($resultat['fin'])); ?>

                                <?php if ($h== $j && $jour == $week[$i]) : ?>

                                    <p><?= $resultat['login'] ?></p>

                                    <a href="./reservation.php?id= <?= $resultat['id'] ?>">

                                        <p><?= $resultat['titre'] ?></p>

                                    </a>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        </td>

                     <?php endfor; ?>

                </tr>

            <?php endfor; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>