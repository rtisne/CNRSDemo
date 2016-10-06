<?php

if(isset($_POST) && !empty($_POST)) {
	include("connexion.php");
	$req = $db->prepare('INSERT INTO ateliers(titre,theme,type,lieu,duree,capacite,animateur,resume) VALUES(:titre, :theme, :type, :lieu, :duree, :capacite, :animateur, :resume)');

	$req->execute(array(
		'titre' => $_POST['titre'],
		'theme' => $_POST['theme'],
		'type' => $_POST['type'],
		'lieu' => $_POST['lieu'],
		'duree' => $_POST['duree'],
		'capacite' => $_POST['capacite'],
		'animateur' => $_POST['animateur'],
		'resume' => $_POST['resume']
		));
		header("location: listAtelier.php");
} else {
	include("header.template.php");
	include("form.template.php");
	include("footer.template.php");

}
?>
