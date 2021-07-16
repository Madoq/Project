<?php
session_start();
if(isset($_SESSION['logged_id']))
{
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Calc</title>
    <meta name="description" content="Używanie PDO - odczyt z bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">

        <header>
            <h1>Calc</h1>
        </header>

        <main>
            <article>
                <form method="post" action="login.php">
                    <label>login <input type="text" name="login"></label>
                    <label>Hasło <input type="password" name="pass"></label>
                    <input type="submit" value="Zaloguj się!">
                    <?php 
                        if (isset($_SESSION['bad_attempt']))
                        {
                            echo '<p>Niepoprawny login lub hasło</p>';
                            unset($_SESSION['bad_attempt']);
                        }
                    ?>
                </form>
            </article>
        </main>

    </div>
</body>
</html>