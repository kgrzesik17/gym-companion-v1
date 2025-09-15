<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $link = mysqli_connect('localhost', 'root', '', 'gymcompanionv0');

        if(!$link) {
            echo "Nie mozna polaczyc z baza danych: " . mysqli_connect_error();
        }
    ?>

    <header>
        <div class="header__container">
            <div class="header__brand">
                <p>Gym Companion</p>
            </div>

            <div class="header__links">
                <ul>
                    <li><a href="#">Trening</a></li>
                    <li><a href="./workout">Ćwiczenia</a></li>
                    <li><a href="./measurements">Pomiary</a></li>
                    <li><a href="./register">Rejestracja</a></li>
                    <li><a href="./login">Login</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="intro">
            <h1>Trening</h1>
        </div>
    </div>
</body>
</html>