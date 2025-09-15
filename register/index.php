<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php
        session_start();
        session_destroy();    
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

    <?php
        if($_POST['login'] && $_POST['password'] && $_POST['confirm']) {
            if($_POST['password'] == $_POST['confirm']) {
                $login = mysqli_real_escape_string($link, $_POST['login']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $check_login_sql = "SELECT * FROM users WHERE user_login = '$login'";
                $check_login_query = mysqli_query($link, $check_login_sql);
                
                if(mysqli_num_rows($check_login_query) > 0) {
                    $error_message = "taki użytkownik już istnieje";
                }
                else {
                    $register_sql = "INSERT INTO users (user_login, user_password) VALUES ('$login', '$password')";
                    mysqli_query($link, $register_sql);
                    header('Location: ../login');
                    die();
                }
            }
            else {
                $error_message = 'hasła nie są identyczne';
            }
        }
        else {
            $error_message = 'wszystkie rubryki muszą zostać wypełnione';
        }
    ?>


    <div class="intro">
        <h1>Rejestracja</h1>
     </div>
        
    <div class="main">
        <form action="" method="POST">
            <div>
                <input type="text" placeholder="login" name="login" id="login">
            </div>

            <div>
                <input type="password" placeholder="haslo" name="password" id="password">

            <div>
                <input type="password" placeholder="potwierdz" name="confirm" id="confirm">
            </div>

            <div>
                <input type="submit" value="rejestrajca">
            </div>

            <div class="register-error">
                <p>
                    <?php
                        echo $error_message;
                    ?>
                </p>
            </div>
        </form>
    </div>
</body>
</html>