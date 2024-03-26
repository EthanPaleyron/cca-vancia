<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/equipe/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un equipier</h2>
        <form action="/updateEquipier/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_equipier" value="<?= $equipierSelectionner->getid_equipier() ?>">
            <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom de l'equipier"
                value="<?= $equipierSelectionner->getnom_equipier() ?>" autocomplete="off">
            <label for="nom_equipier" class="error">
                <?= error("nom_equipier") ?>
            </label>
            <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
                placeholder="Description de l'equipier"><?= $equipierSelectionner->getdescription_equipier() ?></textarea>
            <label for="description_equipier" class="error">
                <?= error("description_equipier") ?>
            </label>
            <div>
                <label for="ordre">Position de l'equipier : </label>
                <select name="ordre" id="ordre">
                    <option value="0">En premier</option>
                    <?php foreach ($equipe as $key => $equipier) {
                        if ($equipier->getordre_equipier() + 1 === $equipierSelectionner->getordre_equipier()) { ?>
                            <option selected value="<?= $equipier->getordre_equipier() + 1 ?>">
                                Après
                                <?= $equipier->getnom_equipier() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $equipier->getordre_equipier() + 1 ?>">
                                Après
                                <?= $equipier->getnom_equipier() ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <input type="file" name="photo_equipier" id="photo_equipier">
            <img src="/../assets/images/equipe/<?= $equipierSelectionner->getphoto_equipier() ?>"
                alt="<?= $equipierSelectionner->getphoto_equipier() ?>">
            <button>Modifier l'equipier</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>