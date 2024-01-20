
<div  class="row hidden-md-up mt-4">
<?php foreach ($search_wikis as $wikis) : ?>
            <div class="cart">
                <img id="img" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
                <h3>
                    <?php echo $wikis->title ?>
                </h3>
                <p>
                    <?php echo $wikis->content ?>
                </p>
                <a href="details?id=<?= $wikis->id; ?>">Voir plus</a>
            </div>
        <?php endforeach; ?>
</div>