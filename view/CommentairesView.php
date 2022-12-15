<?php
require 'header.php';
?>

<section class="container-fluid">
        <div class="row justify-content-center">
        <h1>Mon blog !</h1>
            <div class="col-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <em>Le <?php echo $billet['date_creation_fr']; ?></em>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($billet['titre']); ?></h5>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($billet['contenu'])); ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-9 bg-light border p-3">
                <div class="row">
                    <div class="col-6">
                        <h3>Commentaires</h3>
                    </div>
                    <div class="col-6">
                        <a type="button" href="index.php?controller=commentaires&action=create&billet=<?php echo $billet['id'];?>" class="btn btn-dark float-end">Ajouter un commentaire</a>
                    </div>
                </div>
                <div class="offset-md-2 col-10">
                    <div class="list-group">
                            <?php
                            foreach ( $listCommentaires as $commentaire ){
                                ?>
                                <div class="mt-4 bg-dark text-white rounded-1 list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo htmlspecialchars($commentaire->getAuteur()); ?></h5>
                                        <small></strong> le <?php echo $commentaire->getDateCommentaireFr(); ?></small>
                                    </div>
                                    <p class="mb-1"><?php echo nl2br(htmlspecialchars($commentaire->getContenu())); ?></p>
                                </div> 
                                <?php
                            }
                            ?>
                    </div>
                </div>
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Ajouter un commentaire
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion-body">
                                    <form action="">
                                        <?php $currentDate= date('mm "/" dd "/" y');?>
                                        <input type="hidden" class="form-control" value="<?=$currentDate?>" name="date_commentaire" id="">
                                        <input type="hidden" class="form-control" value="<?=$billet['id'];?>" name="id_billet" id="idBillet">

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
                    </div>
            </div>
        </div>
    </section>

<?php
require 'footer.php';
?>
