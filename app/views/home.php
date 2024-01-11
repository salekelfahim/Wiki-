<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }

        .welcome-page {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 80vh;
        }

        .welcome-message {
            font-size: 24px;
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
        
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .cart {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
        }

        .cart a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Wiki</h1>
        <nav>
            <a href="home.php">Accueil</a>
            <a href="login">Connexion</a>
            <a href="registre">Inscription</a>
        </nav>
    </header>

    <div class="welcome-page">
        <h2 class="welcome-message">Bienvenue sur notre plateforme de Wiki !</h2>
        <p>Découvrez les prochains événements passionnants.</p>
    </div>
    <!-- <main>
        
        <?php foreach ($getWikis as $wikis): ?>
            <div class="cart">
                <h3>
                    <?php echo  $wikis->id ?>
                </h3>
                <p>
                    <?php echo $wikis->title ?>
                </p>
                <p>
                    <?php echo $wikis->content ?>
                </p>
                <a href="detai?id=<?php echo $row->id; ?>">Voir plus</a>
            </div>
        <?php endforeach; ?>
    </main> -->

    <footer>
        <p>&copy; 2023 Présentation des Événements. Tous droits réservés.</p>
    </footer>
</body>

</html>
