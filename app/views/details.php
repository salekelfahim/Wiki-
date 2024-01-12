<!DOCTYPE html>
<html lang="en">

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

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Wiki</h1>
        <nav>
            <a href="/">Home</a>
            <a href="login">Login</a>
            <a href="registre">Sign Up</a>
        </nav>
    </header>

    <div class="event-details">
        <img id="img" src="images/Wikipedia_Logo_1.0.png" alt="Wiki">
        <?php
        if (!empty($wiki)) {
            ?>
            <h1>Title:
                <?php echo $wiki->title; ?>
            </h1>
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

    <footer>
        <p>&copy;2024 Wiki. All Rights Reserved</p>
    </footer>
</body>

</html>
