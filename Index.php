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
<section>
        <header>
            <div class="header">
                <h1>Sphere Volume Calculator</h1>
            </div>
        </header>

        <main>
            <article>
                <div id="container">
                    <form method="post" action="login.php">
                        <label class="topic">Login: <input type="text" name="login" ></label>
                        <label class="topic">Hasło: <input type="password" name="pass" ></label>
                        <input type="submit" id="login_site" value="Zaloguj się!">
                        <?php 
                            $_SESSION['good_attempt'] = true;
                            if (isset($_SESSION['bad_attempt']))
                            {
                                echo'<div id="redtxt">'.$_SESSION['bad_attempt'].'</div>';
                                unset($_SESSION['bad_attempt']);
                            }
                        ?>
                    </form>
                </div>
            </article>
        </main>
</section>
</body>
</html>