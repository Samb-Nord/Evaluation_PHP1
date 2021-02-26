<?php session_start();
include_once "header.php";
include "connexion_bdd.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

$requete = "SELECT * FROM advert WHERE id=:id";
$req_prep = $bdd->prepare($requete);
$req_prep->bindValue(":id", $id, PDO::PARAM_INT);
if ($req_prep->execute()) {
    $result = $req_prep->fetch();

?>
    <div class="row mt-4 text-center">
        <div class="col">
            <h2>Détail de l'annonce</h2>
        </div>
    </div>
    <div class="row mt-4 justify-content-center text-center">
        <div class="col col-lg-7">
            <div class="card">
                <h5 class="card-header"><?php echo strtoupper($result['title']); ?></h5>
                <div class="card-body text-left">
                    <h5 class="card-title"><?php echo "Type : " . $result['type_annonce']; ?></h5>
                    <p class="card-text"><?php echo "Description : " . $result['description_annonce']; ?></p>
                    <p class="card-text"><?php echo "Ville : " . $result['city']; ?></p>
                    <p class="card-text"><?php echo "Code postal : " . $result['postal_code']; ?></p>
                    <p class="card-text"><?php echo "Prix : " . $result['price'] . " €"; ?></p>

                    <?php
                    if ($result['reservation_message'] == null) {
                    ?>
                        <form action="reserver.php" method="POST">
                            <input type="hidden" value="<?php echo $result['id']; ?>" name="idAnnonce">
                            <label for="contenu">Message</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                            <input type="submit" type="button" class="btn btn-warning" value="Réserver" name="reservation">
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="card-text">Déjà réservé</p>
                        <p class="card-text"><?php echo "Message de réservation : " . $result['reservation_message']; ?></p>
                        <form action="annuler_reservation.php" method="POST">
                            <input type="hidden" value="<?php echo $result['id']; ?>" name="idAnnonce">
                            <input type="submit" type="button" class="btn btn-danger" value="Annuler la réservation" name="annuler">
                        </form>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php

}
$bdd =null;
include_once "footer.html";
?>