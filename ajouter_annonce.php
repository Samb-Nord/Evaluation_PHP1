<?php
include_once "header.php";

?>

<div class="row mt-3 justify-content-center">
    <div class="col col-lg-5">
        <div class="row">
            <div class="col">
                <h1>Ajouter une annonce</h1>
            </div>
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" name="form">

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Titre de l'annonce" name="titre">
            </div>
            <div class="form-group mb-3">
                <label for="contenu">Description de l'annonce</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="ville" placeholder="Ville">
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="codePostal" placeholder="Code postal">
            </div>

            <div class="mb-3">
                <label for="type">Type d'annonce</label>
                <select class="form-control" name="type">
                    <option value="location">Location</option>
                    <option value="vente">Vente</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="number" class="form-control" name="prix" placeholder="Prix de l'annonce">
            </div>

            <input type="submit" class="btn btn-success" value="Ajouter" name="ajouter" />
        </form>
    </div>
</div>
<?php
//Traitement du formulaire
if (isset($_POST['ajouter'])) {
    if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['ville']) && isset($_POST['codePostal']) && isset($_POST['type']) && isset($_POST['prix'])) {

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['codePostal'];
        $type = $_POST['type'];
        $prix = $_POST['prix'];

        include "connexion_bdd.php";
        $requete = "INSERT INTO advert (title, description_annonce, postal_code, city, type_annonce, price, reservation_message) VALUES (:titre, :description_annonce, :code_postal, :ville, :type_annonce, :prix, null)";

        $requete_preparee = $bdd->prepare($requete);
        $requete_preparee->bindValue(":titre", $titre, PDO::PARAM_STR);
        $requete_preparee->bindValue(":description_annonce", $description, PDO::PARAM_STR);
        $requete_preparee->bindValue(":code_postal", $code_postal, PDO::PARAM_STR);
        $requete_preparee->bindValue(":ville", $ville, PDO::PARAM_STR);
        $requete_preparee->bindValue(":type_annonce", $type, PDO::PARAM_STR);
        $requete_preparee->bindValue(":prix", $prix, PDO::PARAM_INT);

        if ($requete_preparee->execute()) {
            echo "<div class='row mt-3 justify-content-center'><div class='col'><p>Annonce ajoutée !</p></div></div>";
        } else {
            $erreur = $bdd->errorInfo();
            echo "Erreur d'insertion : " . $erreur[0] . " - Code : " . $bdd->errorCode();
        }
        $bdd = null;
    } else {
        echo "Veuillez remplir tous les champs";
    }
}

//footer
include_once "footer.html";

?>