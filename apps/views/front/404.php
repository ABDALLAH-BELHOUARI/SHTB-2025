<?php

$Titre = $Description = "Page introuvable";

require '../views/header.php';
?>

<div class="container-fluid text-center">
    <div class="mt-5 w-50 mx-auto">
        <h2>Oops !</h2>
        <hr>
        <h5 class="my-5">
            La page que vous recherché est introuvable...
        </h5>
        <a href="?" class="btn btn-warning">Retour</a>
    </div>
</div>

<?php
require '../views/footer.php';
?>