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
        <form action="form_register.php" method="post" name="form" enctype="multipart/form-data">

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

            <button type="submit" class="btn btn-success" id="bouton" name="ajouter">Ajouter</button>
        </form>
    </div>
</div>
<?php
include_once "footer.html";

?>