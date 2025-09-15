<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="exercises.css">
</head>
<body>
    <?php
        session_start();
        $error_message = '';    
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
                    <li><a href="../">Trening</a></li>
                    <li><a href="../exercises">Ćwiczenia</a></li>
                    <li><a href="../measurements">Pomiary</a></li>
                    <li><a href="#">Rejestracja</a></li>
                    <li><a href="../login">Login</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="intro">
        <h1>Dodaj ćwiczenie</h1>
     </div>
        
    <div class="main">
        <?php
            if(!isset($_SESSION['user_id'])) {
                echo 'funkcja dostępna tylko dla zalogowanych';
                die();
            }
            else {
                $user_id = $_SESSION['user_id'];
            }

            if($_POST['exercise_name'] && $_POST['set_count'] && $_POST['repeat_count'] && $_POST['weight_in_kg'] && $_POST['difficulty']) {
                $exercise_name = $_POST['exercise_name'];
                $set_count = $_POST['set_count'];
                $repeat_count = $_POST['repeat_count'];
                $weight_in_kg = $_POST['weight_in_kg'];
                $difficulty = $_POST['difficulty'];

                $query = "INSERT INTO exercises (exercise_name, user_id, weight_in_kg, set_count, repeat_count, difficulty) VALUES ('$exercise_name', '$user_id', '$weight_in_kg', '$set_count', '$repeat_count', '$difficulty')";
                mysqli_query($link, $query);

                $error_message = "dodano pomyślnie!";
            }
            else {
                $error_message = "wypełnij wszystkie pola";
            }
        ?>
    
        <form action="" method="POST">
            <label for="exercise_name">Nazwa ćwiczenia</label>
            <div>
                <input type="text" placeholder="wyciskanie ławka prosta" name="exercise_name" id="exercise_name">
            </div>

            <label for="exercise_name">Liczba setów</label>
            <div>
                <input type="number" placeholder="liczba setów" name="set_count" id="set_count">
            </div>

            <label for="exercise_name">Liczba powtórzeń</label>
            <div>
                <input type="number" placeholder="liczba powtórzeń" name="repeat_count" id="repeat_count">
            </div>

            <label for="exercise_name">Ciężar (kg)</label>
            <div>
                <input type="number" placeholder="ciężar" name="weight_in_kg" id="weight_in_kg">
            </div>

            <label for="exercise_name">Trudność</label>
            <div>
                <input type="range" name="difficulty" id="difficulty" min="1" max="5" value="3">
            </div>

            <input type="submit" value="dodaj ćwiczenie">

            <div class="error">
                <?php
                    echo $error_message;
                ?>
            </div>
        </form>
    </div>
</body>
</html>