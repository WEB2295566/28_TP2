<h1>Liste des articles</h1>

<?php

while ($rangee = mysqli_fetch_assoc($donnees["articles"])) {
  $articles="<div><h3>" . $rangee["titre"] . "</h3><p>" . $rangee["texte"] . "</p><p>" .  $rangee["nom"] . ".</div>";
    if(isset($_SESSION['usager'])){
        if ($rangee['idAuteur'] == $_SESSION['usager']){
            echo "<div><h3>" . $rangee["titre"] . "</h3><p>" . $rangee["texte"] . "</p><p>" .  $rangee["nom"] . "<a href='index.php?commande=FormulaireModifArticle&id=" . $rangee['id'] . "&idAuteur=" . $rangee['idAuteur'] . "'>Modifier </a>  <a href='index.php?commande=Supprimer&id=" . $rangee['id'] . "&idAuteur=" . $rangee['idAuteur'] . "'>supprimer</a></div>";

        }else{
            echo $articles ;

        }
            }
    
        else echo $articles;

        }
?>