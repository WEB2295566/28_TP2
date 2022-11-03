<?php 

while ($rangee = mysqli_fetch_assoc($donnees["article"])) {
?>
<h1>Formulaire de modification de l'article</h1>
<form method="GET" action="index.php">
    Titre : <input type="text" name="titre" value="<?= $rangee["titre"] ?>"/><br>
    texte : <textarea name="texte" id="" cols="30" rows="10"><?= $rangee["texte"] ?>"</textarea> <br>
    <input type="hidden" name="id" value="<?= $rangee["id"] ?>"/>
    <input type="hidden" name="idAuteur" value="<?php $_SESSION['usager'];?>">
    <input type="hidden" name="commande" value="ModificationArticle"/>
    <input type="submit" value="Modifier"/>




    
</form>
<?php 
}
    if(isset($donnees["messageErreur"]))
        echo "<p>" . $donnees["messageErreur"] . "</p>";
?>