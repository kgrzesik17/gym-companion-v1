<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login.css">
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
                    <li><a href="../workout">Ćwiczenia</a></li>
                    <li><a href="../measurements">Pomiary</a></li>
                    <li><a href="#">Rejestracja</a></li>
                    <li><a href="../login">Login</a></li>
                </ul>
            </div>
        </div>
    </header>

    <?php
        if($_POST['login'] && $_POST['password']) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $check_password_sql = "SELECT user_password FROM users WHERE user_login = '$login'";
            $check_password_query = mysqli_query($link, $check_password_sql);
            $check_password = mysqli_fetch_array($check_password_query);

            if(mysqli_num_rows($check_password_query) == 1) {
                if(password_verify($password, $check_password[0])) {
                    $_SESSION['user_id'] = mysqli_query($link, "SELECT id FROM users WHERE user_login = '$login'");
                    header('Location: ../');
                    die();
                }
                else {
                    $error_message = 'login lub hasło niepoprawne';
                }
            }
            else {
                $error_message = 'login lub hasło niepoprawne';
            }

           
        }
        else {
            $error_message = 'wszystkie rubryki muszą zostać wypełnione';
        }
    ?>
    <div class="intro">
        <h1>Logowanie</h1>
     </div>
        
    <div class="main">
        <form action="" method="POST">
            <div>
                <input type="text" placeholder="login" name="login" id="login">
            </div>

            <div>
                <input type="password" placeholder="haslo" name="password" id="password">
            </div>

            <div>
                <input type="submit" value="zaloguj">
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