<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Tableau</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="icon" type="image/png" href="favicon.png">
</head>

<body class="is-loading">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">

		<!-- Intro -->
		<div id="intro">
			<?php
			$cnx = mysqli_connect("", "", "", "");
			if (mysqli_connect_errno()) // on vérifie si la connection a reussi
			{
				echo 'impossible de se connecter a mysql';
			}
			$tableau = strip_tags($_GET['tab']);
			echo '<h1>';
			$titre = substr_replace($tableau, ' ', 7, 0);
			echo $titre;
			echo '</h1>';

			?>
			<ul class="actions">
				<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Voir les tableaux</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="tableaux.php" class="logo">Retournez aux tableaux</a>
		</header>

		<!-- Main -->
		<div id="main">
			<?php
			$req = "SELECT `prenom`, `nom`, `nombrePoints`, `club` FROM $tableau ORDER BY `nombrePoints` DESC";
			$res = $cnx->query($req);
			echo "<table>";
			echo "<tr><th>Nom</th><th>Prénom</th><th>Nombre de Points</th><th>Club</th>";
			while ($data = mysqli_fetch_array($res)) {
				echo '<tr><td>' . $data['nom'] . '</td><td>' . $data['prenom'] . '</td><td>' . $data['nombrePoints'] . '</td><td>' . $data['club'] . '</td></tr>';
			}
			echo "</table>";
			mysqli_close($cnx);
			?>
		</div>

		<!-- Footer -->
		<div id="copyright">
			<ul>
				<li>
					<h3>Si vous avez un problème avec votre inscription, veuillez me contacter par mail (theo.laperrouse@laposte.net) ou par Messenger(<a href="https://www.facebook.com/messages/t/theo.laperrouse"> Théo Laperrouse</a>)</h3>
				</li>
			</ul>
			<ul>
				<li>&copy; Thorigné Fouillard Tennis de Table</li>
				<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
			</ul>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>