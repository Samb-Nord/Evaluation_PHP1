<?php

if (isset($_POST['annuler'])) {
    if (isset($_POST['idAnnonce'])) {
        $id_annonce = $_POST['idAnnonce'];
    }
    include_once "connexion_bdd.php";
    $requete_message = "UPDATE advert SET reservation_message=:mess WHERE id=:id";
    $requete_message_prep = $bdd->prepare($requete_message);
    $requete_message_prep->bindValue(":mess", null, PDO::PARAM_STR);
    $requete_message_prep->bindValue(":id", $id_annonce, PDO::PARAM_INT);
    if ($requete_message_prep->execute()) {
        echo "Réservation annulée";
?>
        <SCRIPT LANGUAGE="JavaScript">
            setTimeout("document.location.href = 'home.php'", 2000);
        </SCRIPT>
<?php
        //header('Refresh: 0.8; url=home.php');
    } else {
        $erreur = $bdd->errorInfo();
        echo "Erreur d'envoie : " . $erreur[0] . " - Code : " . $bdd->errorCode();
    }

    $bdd = null;
}
