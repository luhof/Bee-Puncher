
<?php

require_once('classes/game.php');

//this will store their information as they refresh the page
session_start();

//if they haven't started a game yet let's load one
if (!isset($_SESSION['game']))
	$_SESSION['game'] = new Game();
?>

<html>
	<head>
		<title>Bees !</title>
		<link rel="stylesheet" href="style/main.css"/>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h1>BEE PUNCHER</h1>
		<?php
			$_SESSION['game']->playGame($_POST);
		?>
		</form>
	</body>
</html>
