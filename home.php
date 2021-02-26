<?php
include_once "header.php";
?>
<!-- Liste des annonces -->

<div class="row mt-4">
    <div class="col">
        <h2>Liste des annonces</h2>
    </div>
</div>
<div class="row mt-4">
    <?php
    include "connexion_bdd.php";
    $requete = "SELECT * FROM advert LIMIT 0, 15";
    $req_prep = $bdd->prepare($requete);
    if ($req_prep->execute()) {
        while ($donnees = $req_prep->fetch()) {

    ?>

            <div class="col col-lg-4">
                <div class="list-group-item list-group-item-action">
                    <div class="row justify-content-center text-center" style="background:green;color:white">
                        <h5 class="col mb-1"><?php echo strtoupper($donnees['title']); ?></h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <p class="mb-1"><?php echo "Type : " . $donnees['type_annonce']; ?></p>

                        </div>
                    </div>
                    <div class="row mt-3 text-right">
                        <div class="col">
                            <button class="btn btn-info">Consulter</button>
                        </div>
                    </div>

                </div>
            </div>



        <?php
        }

        ?>
</div>
<?php
    } else {
        $erreur = $bdd->errorInfo();
        echo "Problème lors de la récupération de l'identifiant niveau : " . $erreur[0] . " - Code : " . $bdd->errorCode();
    }

    $bdd = null;

    include_once "footer.html";



?>