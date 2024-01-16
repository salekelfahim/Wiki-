<?php
if ($_SESSION['id_role'] != 2) {
    header('Location: /');
}
?>

    <div class="welcome-page">
        <h2 class="welcome-message">Add New Wiki</h2>
        <p>Your Wiki Will be Publiched After We Check it! Thank You.</p>
    </div>
    <main>
    <form method="post" class="mx-auto" style="width: 55%;">

    <div class="mb-3">
        <label for="form4Example1" class="form-label">Title</label>
        <input type="text" id="form4Example1" name="title" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="form4Example3" class="form-label">Content</label>
        <textarea name="content" class="form-control" id="form4Example3" rows="4"></textarea>
    </div>

    <div class="border p-5 mb-4">
        <label class="form-label">Categorie:(You can choose only one Categorie)</label>
        <?php foreach ($categories as $categorie) { ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?= $categorie->id; ?>" name="categorie" id="categorie<?= $categorie->id; ?>">
                <label class="form-check-label" for="categorie<?= $categorie->id; ?>">
                    <?= $categorie->categoryName; ?>
                </label>
            </div>
        <?php } ?>
    </div>

    <div class="border p-5 mb-4">
        <label for="form4Example3" class="form-label">Tags:(You can choose more than one tag)</label>
        <?php foreach ($tags as $tag) { ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $tag->id; ?>" name="tag[]" id="tag<?= $tag->id; ?>">
                <label class="form-check-label" for="tag<?= $tag->id; ?>">
                    <?= $tag->tagName; ?>
                </label>
            </div>
        <?php } ?>
    </div>

    <button name="submit" type="submit" class="btn btn-dark float-end">Add Wiki</button>
</form>

    </main>
