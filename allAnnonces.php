<?php
session_start();
include_once "header.php";
?>
<!-- Liste des annonces -->

<div class="row mt-4">
    <div class="col">
        <h2>Toutes les annonces</h2>
    </div>
</div>
<div class="row mt-4">
    <?php
    include "connexion_bdd.php";
    $requete = "SELECT * FROM advert";
    $req_prep = $bdd->prepare($requete);
    if ($req_prep->execute()) {
        while ($donnees = $req_prep->fetch()) {
            if ($donnees['reservation_message'] == null) {
                $color = "white";
            } else {
                $color = "gray";
            }
    ?>

            <div class="col">
                <div class="list-group-item list-group-item-action" style="background: <?php echo $color; ?>;height:250px">
                    <div class="row justify-content-center text-center" style="background:green;color:white">
                        <h5 class="col mb-1"><?php echo strtoupper($donnees['title']); ?></h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <p class="mb-1"><?php echo "Type : " . $donnees['type_annonce']; ?></p>
                            <?php
                            if ($donnees['reservation_message'] == null) {
                            ?>
                                <p class="mb-1">Disponible</p>
                            <?php
                            } else {
                                ?>
                                <p class="mb-1">Réservé</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row mt-3 text-right">
                        <div class="col">
                            <form action="detail_annonce.php" method="POST">
                                <input type="hidden" value="<?php echo $donnees['id'];
                                                            $id = $donnees['id']; ?>" name="id">

                                <input type="submit" type="button" class="btn btn-info" value="Consulter" name="consulter">
                            </form>
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
        echo "Problème lors de la récupération des annonces : " . $erreur[0] . " - Code : " . $bdd->errorCode();
    }

    $bdd = null;

    include_once "footer.html";



?>