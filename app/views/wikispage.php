<div class="welcome-page">
    <h2 class="welcome-message">Welcome to Your Wikis</h2>
    <p>Here you can Edit or Delete your Wikis</p>
</div>
<main>

    <?php foreach ($wikis as $wiki) : ?>
        <div class="cart">
            <img id="img" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
            <h3>
                <?php echo $wiki->title ?>
            </h3>
            <p>
                <?php echo $wiki->content ?>
            </p>
            <!-- <a class="btn btn-light" href="details?id=<?= $wiki->id; ?>">Voir plus</a> -->
            <a href="" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $wiki->id; ?>">Edit</a>
            <a href="delete?id=<?= $wiki->id; ?>" type="button" class="btn btn-secondary float-end">Delete</a>

            <!-- Modal -->
            <form method="post">
                <div class="modal fade" id="exampleModal<?= $wiki->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <input type="hidden" name="id" value="<?php echo $wiki->id; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Wiki</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="form4Example1" class="form-label">Title</label>
                                    <input type="text" id="form4Example1" name="title" class="form-control" value="<?php echo $wiki->title ?>" />
                                </div>

                                <div class="mb-3">
                                    <label for="form4Example3" class="form-label">Content</label>
                                    <textarea name="content" class="form-control" id="form4Example3" rows="4"><?php echo $wiki->content ?></textarea>
                                </div>

                                <div class="border p-5 mb-4">
                                    <label class="form-label">Categorie:</label>
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
                                    <label for="form4Example3" class="form-label">Tags:</label>
                                    <?php foreach ($tags as $tag) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?= $tag->id; ?>" name="tag[]" id="tag<?= $tag->id; ?>">
                                            <label class="form-check-label" for="tag<?= $tag->id; ?>">
                                                <?= $tag->tagName; ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button name="submit" type="submit" class="btn btn-dark float-end">Edit Wiki</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</main>