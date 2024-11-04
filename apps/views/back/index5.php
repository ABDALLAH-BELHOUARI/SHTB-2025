<?php
ControlAccess([1, 5]);


$Title = $Description = 'Interface membre';
require '../views/header.php';
?>


<?php require 'sidebar5.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>


</div>



<?php require '../views/scripts.php'; ?>
<?php require '../views/footer.php'; ?>