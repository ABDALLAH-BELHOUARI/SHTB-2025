<?php
ControlAccess([1, 4]);


$Title = $Description = 'Interface membre';
require '../views/header.php';
?>


<?php require 'sidebar4.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>





</div>


<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>