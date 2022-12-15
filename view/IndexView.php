<?php
    require 'header.php';
?>

<section class="row justify-content-center">
    <div class="col-12">
        <h1>Mon blog !</h1>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-9">
                    <p>Derniers billets du blog :</p>
                </div>
            </div>
            <div class="row justify-content-center" id="result">
                <div class="col-9">
                    <?php
                    foreach( $listBillets as $billet ) {
                        ?>
                        <div class="card mt-5">
                            <div class="card-header">
                                <em>publié le <?php echo $billet['date_creation_fr']; ?></em>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($billet['titre']); ?></h5>
                                <p class="card-text"><?php echo nl2br(htmlspecialchars($billet['contenu'])); ?></p>
                                <!--<a href="controller/CommentairesController.php?billet=<?php echo $billet['id']; ?>" class="btn btn-primary">Commentaires</a>-->
                                <a href="index.php?controller=commentaires&billet=<?php echo $billet['id']; ?>" class="btn btn-primary">Commentaires</a>
                            </div>
                        </div>
    
                    <?php
                    }

                    ?>

                </div>
                <div class="col-9" id="result">

                </div>
            </div>

   
           
            <div class="row justify-content-center">
                <div class="col-9">
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Ajouter un commentaire
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion-body">
                                    <form action="">
                                        <input type="hidden" class="form-control" name="date_commentaire" id="">
                                        <input type="hidden" class="form-control" name="idBillet" id="idBillet">

                                        <div class="mb-3">
                                            <label class="form-label">Titre</label>
                                            <input type="text" id="auteur" class="form-control" name="auteur" placeholder="Titre">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contenu</label>
                                            <textarea class="form-control" id="contenu" name="contenu" placeholder="Contenu" rows="3"></textarea>
                                        </div>
                                        <input type="button" name="ok" id="ok" value="Envoyer">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require 'footer.php';
?>