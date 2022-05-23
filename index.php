<?php
// On démarre la session voir si l'utilisateur est connecté
session_start();
// On défini notre titre sachant qu'il est sur la doctype
$title = 'THE ROOM';
// On utilise la fonction ob_start pour mettre en mémoire la doctype et l'appeler dans nos fichiers.qq
ob_start();
?>

<div class="box1_index">
    <div class="box_img1"></div>
    <div class="box_titre2_index">
        <p>Meeting ROOM SOLUTION</p>
    </div>
</div>

<div class="box1_txt_index">
    <div class="titre3_index">
        <h2>OPTIMISER L’UTILISATION DE VOS SALLES DE REUNION</h2>
    </div>
    <div class="small_box_txt1">
        <div class="txt1_index">
            <p>ROOM est la réponse à toutes vos questions en ce qui concerne l’utilisation et la gestion efficaces de vos salles de réunion.
                Grâce à nos solutions, vous éliminez les problèmes de réservation et augmentez la satisfaction des employés.
                Nos outils d’analyses vous aideront à interpréter et à optimiser l’utilisation de vos espaces de collaboration.</p>
        </div>
    </div>
</div>

<div class="box2_index">
    <div class="box_img2"><img src="../reservationsalles/image/img2_index.jpg" alt="pc working" height=400px width=500px></div>

    <div class="txt2_index">
        <h2>La bonne information au bon moment</h2>
        <p>La recherche d’une salle de réunion adéquate peut être la source d’une perte considérable de temps et de productivité.
            Notre solution innovante ROOM met un terme aux doutes et fournit des informations claires. Au bon endroit, au bon moment.</p>
    </div>
</div>
</div>

<div class="box3_index">
    <div class="txt3_index">
        <h2>Réservation instantanée</h2>
        <p>Le taux d’occupation moyen des salles de réunion est de moins de 40%.
            Utilisez la capacité disponible pour des séances ad hoc en permettant à vos employés de réserver une salle disponible directement sur place.</p>
    </div>

    <div class="box_img3"><img src="../reservationsalles/image/img3_index.jpg" alt="pc working" height=400px width=500px></div>

</div>

<?php
$content = ob_get_clean();
require_once 'template.php';
?>