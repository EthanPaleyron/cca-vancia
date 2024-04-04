<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/tarifs/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un tarif</h2>
        <form action="/updateTarif/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_tarif" value="<?= $tarifSelectionner->getid_tarif() ?>">
            <input type="text" name="nom_tarif" id="nom_tarif" placeholder="Nom du tarif" autocomplete="off"
                value="<?= $tarifSelectionner->getnom_tarif() ?>">
            <label for="nom_tarif" class="error">
                <?= error("nom_tarif") ?>
            </label>
            <input type="number" name="premier_chien" id="premier_chien" placeholder="Tarif du premier chien"
                value="<?= $tarifSelectionner->gettarif_premier_chien() ?>">
            <label for="premier_chien" class="error">
                <?= error("premier_chien") ?>
            </label>
            <input type="number" name="deuxieme_chien" id="deuxieme_chien" placeholder="Tarif du deuxieme chien"
                value="<?= $tarifSelectionner->gettarif_deuxieme_chien() ?>">
            <label for="deuxieme_chien" class="error">
                <?= error("deuxieme_chien") ?>
            </label>
            <input type="number" name="par_chien" id="par_chien" placeholder="Tarif par chien"
                value="<?= $tarifSelectionner->gettarif_par_chien() ?>">
            <label for="par_chien" class="error">
                <?= error("par_chien") ?>
            </label>
            <div>
                <label for="ordre_tarif">Position du tarif : </label>
                <select name="ordre_tarif" id="ordre_tarif">
                    <option value="0">En premier</option>
                    <?php foreach ($tarifs as $key => $tarif) {
                        if ($tarif->getordre_tarif() !== $tarifSelectionner->getordre_tarif()) { // Si il n'est pas egale au tarif qu'on modifie on l'affiche
                            if ($tarif->getordre_tarif() + 1 == $tarifSelectionner->getordre_tarif()) { ?>
                                <option selected value="<?= $tarif->getordre_tarif() + 1 ?>">
                                <?php } else { ?>
                                <option value="<?= $tarif->getordre_tarif() + 1 ?>">
                                <?php } ?>
                                Après
                                <?= $tarif->getnom_tarif() ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <button>Créer</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>