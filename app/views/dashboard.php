
<main>
        <div class="container pt-4 me-5">
        <div class="welcome-page">
        <h2 class="welcome-message">Analytics</h2>
        <p>All the Numbers</p>
    </div>
    <main>

    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> Auteurs:</td>
                        <td><?= $totalUser->totalAuteur?></td>
                    </tr>
                    <tr>
                        <td>Wikis:</td>
                        <td><?=$totalWiki->totalWikis?></td>
                    </tr>
                    <tr>
                        <td> Categories:</td>
                        <td><?= $totalCategory->totalCategories?></td>
                    </tr>
                    <tr>
                        <td> Tags:</td>
                        <td><?= $totalTag->totalTag;?></td>
                    </tr>
            </tbody>
        </table>
    </main>

        </div>
    </main>
    
