<style>
    .event-details {
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        max-width: 600px;
        margin: 20px auto;
    }

    .event-details h1 {
        font-size: 32px;
        color: #333;
        margin-bottom: 10px;
    }

    .event-details p {
        font-size: 18px;
        color: #555;
        margin-bottom: 15px;
    }

    .event-details img {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 20px;
    }

    .event-details a {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        display: inline-block;
        margin-top: 20px;
    }

    #imgd {
        width: 60%;
    }
</style>

<div class="event-details">
    <img id="imgd" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
    <?php
    if (!empty($wiki)) {
    ?>
        <h1>Title:
            <?php echo $wiki->title; ?>
        </h1>
        <h5>Category: <?= $wiki->categoryName; ?> </h5>
        <?php if (!empty($tags)) {
            foreach ($tags as $tag) : ?>
                <span><i class="fa-solid fa-hashtag" style="color: #3c6cbe;"><?= $tag->tagName ?></i></span>
        <?php endforeach;
        } ?>
        <h6>Auteur : <?php echo $wiki->Fname . " " . $wiki->Lname; ?></h6>
        <p>Content:
            <?php echo $wiki->content; ?>
        </p>

        <a href="/">Back</a>
    <?php
    } else {
        echo "No Wikis to Show.";
    }
    ?>
</div>