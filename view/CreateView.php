<?php
    require 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-md-3">
            <form class="box mt-5" action="?controller=commentaires&action=create&billet=<?=$idBillet?>" method="post" name="create">
                <h1 class="box-title text-center">Entrer votre commentaire</h1>
                <input type="hidden" class="form-control" name="date_commentaire">

                <div class="mb-3">
                    <label class="form-label">Auteur</label>
                    <input type="text" class="form-control" name="auteur" id="exampleFormControlInput1" placeholder="Auteur">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contenu</label>
                    <textarea class="form-control" name="contenu" placeholder="Contenu" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="submit">Envoyer</button>
                </div>
            </form>
        </div> 
    </div> 
</div>

<?php
require 'footer.php';
?>