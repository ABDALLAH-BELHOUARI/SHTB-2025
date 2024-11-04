<?php


$Title = $Description = 'Accès non autorisé !';
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>

    <div class="text-center mt-5">
        <img src="assets/img/noaccess.png" alt="Accès non autorisé">
        <h5 class="my-5">Vous n'êtes pas autorisé à consulter à cette page !</h5>
        <a href="?slug=index<?= $_SESSION['Logged']['level']; ?>" onclick="Processing();" class="btn btn-primary">Retour</a>
    </div>
</div>

<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>