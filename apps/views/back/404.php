<?php



$Title = $Description = 'Page introuvable';
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div id="content" class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <h1>Oops !</h1>
    <hr>
    La page que vous rechercher n'existe pas...
</div>



<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>