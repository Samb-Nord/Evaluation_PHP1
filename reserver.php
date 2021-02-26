<?php

    if (isset($_POST['reservation']) && isset($_POST['message'])) {
        $message = $_POST['message'];
        if(isset($_POST['idAnnonce'])) {
           // echo $_POST['idAnnonce'];
           $id_annonce = $_POST['idAnnonce'];
        }
       include_once "connexion_bdd.php";
        $requete_message = "UPDATE advert SET reservation_message=:mess WHERE id=:id";
        $requete_message_prep = $bdd->prepare($requete_message);
        $requete_message_prep->bindValue(":mess", $message, PDO::PARAM_STR);
        $requete_message_prep->bindValue(":id", $id_annonce, PDO::PARAM_INT);
        if ($requete_message_prep->execute()) {
            echo "Votre message a été envoyé. Annonce réservée";
            header('Refresh: 0.8; url=home.php');
        } else {
            $erreur = $bdd->errorInfo();
            echo "Erreur d'envoie : " . $erreur[0] . " - Code : " . $bdd->errorCode();
        }
    }
