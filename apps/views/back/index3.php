<?php
ControlAccess([1, 2, 3]);


$Title = $Description = 'Interface Ustad';
require '../views/header.php';
?>

<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>


</div>

<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>