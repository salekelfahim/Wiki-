
    <div class="welcome-page">
        <h2 class="welcome-message">Welcome to Wiki</h2>
        <p>Enjoy latest Wikis</p>
        <div style="width :30%" class="input-group rounded">
  <input type="search" id="search_title" class="form-control rounded" placeholder="Search" name="titel_s" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
    </div>
    <main>
    <div id="search_result"  class="row hidden-md-up ms-5">
        <?php 
         if(isset($search_wikis)){
        foreach ($search_wikis as $wikis) { ?>
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
            <?php 
          }}else{  
        foreach ($getWikis as $wikis) {?>
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
        <?php 
        }}?>
        <div class="welcome-page">
        <h2 class="welcome-message">Categories</h2>
        <div class="row hidden-md-up mt-4">
        <?php foreach ($allcategories as $categorie) {?>

          <div class="col-md-4 mb-2">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"><?= $categorie->categoryName ;?></h5>

              </div>
          </div>
        </div>



          <?php }?>
          </div>
    </div>
    </main>
