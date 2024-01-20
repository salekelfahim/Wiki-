<main style="margin-right: 30%;">
    <div class="container pt-2">
        <div class="welcome-page">
            <h2 class="welcome-message">All Wikis</h2>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getWikis as $wikis) : ?>
                    <tr>
                        <td><?php echo $wikis->id ?></td>
                        <td><?php echo $wikis->title ?></td>
                        <td> <?php echo $wikis->content ?></td>
                        <td><?php
                            if ($wikis->status == 0) {
                                echo 'Archived';
                            }
                            if ($wikis->status == 1) {
                                echo 'Non Archiver';
                            }
                            ?> </td>
                            <td>
                            <a href="UnArchive?id=<?= $wikis->id; ?>" class="btn btn-light">UnArchive</a>
                            <a href="Archive?id=<?= $wikis->id; ?>" class="btn btn-dark">Archive</a>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
</main>