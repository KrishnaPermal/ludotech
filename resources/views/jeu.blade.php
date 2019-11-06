<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link src="css/style.css" rel="stylesheet">
    <title>Jeux vidéo</title>
</head>
<body>


<form onsubmit="envoie()" id="formAjout">

    <label for="titre">Titre :</label>
    <input name="titre" type="text" id="titre">

    <label for="editeur">Éditeur :</label>
    <input name="editeur" type="text" id="editeur">

    <label for="prix">Prix :</label>
    <input name="prix" type="text" id="prix">

    <label for="resume">Résumé :</label>
    <input name="resume" type="text" id="resume">

    <input type="submit" id="btn_form" value="Ajouter">
</form>


<p id="temporaire"></p>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/script.js"></script> <!-- Attention chargement dans l'orde d'apparition / de Haut en Bas-->
</body>
</html>