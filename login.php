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
			if($_SESSION['good_attempt'])
			{
				$_SESSION['zalogowany'] = "Udało się poprawnie zalogować";
			}
			$db = null;
			$userQuery = null;
		} else {
			$_SESSION['bad_attempt'] = "Niepoprawny Login lub Hasło";
			header('Location: index.php');
			exit();
			$db = null;
			$userQuery = null;
		}
			
	} else {
		
		header('Location: index.php');
		exit();
	}
}
$_SESSION['Volume']=$_POST['Volume']??'';
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
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

</head>

<body>
<section>
    <div class="container">

        <header>
			<div class="header">
        	    <h1>Calculate the Volume of a Sphere</h1>
			</div>
        </header>

        <main>
            <article>
			<div id="container">
				<form method="post" action="insert.php" id="theForm">
					<?php
					if(isset($_SESSION["zalogowany"]))
					{
						echo'<div id="greentxt">'.$_SESSION['zalogowany'].'</div>';
						unset($_SESSION['zalogowany']);
					}
					?>
						<label class="topic">Radius:<input type="text" name="radius" id="radius" required></label>
						<label class="topic">Volume:<input type="text" name="volume" id="volume"></label>
						<input type="submit" value="Calculate" id="Oblicz">	
  						<button name="move" type="submit" target="_blank" formaction="insert.php">Zapisz</button>
						<p  id="result"></p>
   				</form>
			</div>
            </article>
        </main>

    </div>
	<div>
	<label ><a href="logout.php"><button name="logout"><p>Wyloguj się!</p></button></a></label>
	</div>
</body>
</html>