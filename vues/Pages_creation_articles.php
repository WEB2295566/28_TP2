<h1>Ajout d'un article </h1>
<form method="get" action="index.php">

    Titre : <input type="text" name="titre" /><br><br>
    texte : <textarea name="texte"></textarea><br><br>

    </input><br>

    <input type="hidden" name="commande" value="AjoutArticle" />
    <input type="submit" value="Ajouter" />
</form>
<?php
if (isset($donnees["messageErreur"]))
    echo "<p>" . $donnees["messageErreur"] . "</p>";
?>
<br>
<a href="index.php?commande=FormulaireModifArticle">Modifier Article</a>