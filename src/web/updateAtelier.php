<?php
include_once "connexion.php";

if(isset($_GET['id'])) {
    $req = $db->prepare('SELECT a.* FROM ateliers a WHERE a.id = ?');
    $req->execute(array($_GET['id']));
    $donnees = $req->fetch();
    if($donnees == null || !isset($donnees))
        header('Location: listAtelier.php');

    extract($donnees);
    $action = "updateAtelier.php";
    include_once("header.template.php");
    include_once("form.template.php");
    include_once("footer.template.php");

} elseif (isset($_POST)) {
    extract($_POST);

    $req = $db->prepare("UPDATE ateliers SET titre = :titre, theme = :theme, type = :type, lieu = :lieu, duree = :duree, capacite = :capacite, resume = :resume, animateur = :animateur  WHERE id = :id");
    $req->bindParam(":titre", $titre);
    $req->bindParam(":theme", $theme);
    $req->bindParam(":type", $type);
    $req->bindParam(":lieu", $lieu);
    $req->bindParam(":duree", $duree);
    $req->bindParam(":capacite", $capacite);
    $req->bindParam(":resume", $resume);
    $req->bindParam(":animateur", $animateur);
    $req->bindParam(":id", $id);
    $req->execute();
    header('Location: listAtelier.php');
} else {
    header('Location: listAtelier.php');
}



?>
