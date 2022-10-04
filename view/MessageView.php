<?php
require 'header.php';
?>

<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-9">
            <p>Mes derniers billets du blog :</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-9">

            <?php

            echo $data['title'] . ' : ' . $data['message'];

            ?>

        </div>
    </div>
</section>



<?php
require 'footer.php';
?>
