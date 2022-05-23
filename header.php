<?php if (!empty($_SESSION)) : ?>
        <a href="./index.php">Accueil</a>
        <a href="./profil.php">Profil</a>
        <a href="./reservation-form.php">Espace réservation</a>
        <a href="./planning.php">Planning</a>
        <a href="./reservation.php">Info réservation</a>
        <a href="./deconnexion.php">Déconnexion</a>

<?php else : ?>
        <a href="./index.php">Accueil</a>
        <a href="./inscription.php">Inscription</a>
        <a href="./connexion.php">Connexion</a>
        <a href="./planning.php">Planning</a>
<?php endif; ?>