<?php
session_start();

require_once 'connectdb.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pass');
		
		//echo $login . " " .$password;
		
		$userQuery = $db->prepare('SELECT id, password FROM users WHERE UserName = :UserName');
		$userQuery->bindValue(':UserName', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		//echo $userQuery->rowCount();
		
		$user = $userQuery->fetch();
		
		//echo $user['id'] . " " . $user['password'];
		
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['logged_id'] = $user['id'];
			unset($_SESSION['bad_attempt']);
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: index.php');
			exit();
		}
			
	} else {
		
		header('Location: index.php');
		exit();
	}
}



?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Calculator</title>
    <meta name="description" content="Używanie PDO - odczyt z bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <script src="calc.js" type="text/javascript"></script>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>

    <div class="container">

        <header>
            <h1>Calculate the Volume of a Sphere</h1>
        </header>

        <main>
            <article>
				<p><a href="logout.php">Wyloguj się!</a></p>
                <label for="radius">Radius </label> 
                <input id="radius" name="radius"  required>
                <button id="calc" onclick="sphereVol()"> calculate </button>
                <button id="Save" onclick="Save()"> Save </button>
                <p id="result"></p>
            </article>
        </main>

    </div>

</body>
</html>