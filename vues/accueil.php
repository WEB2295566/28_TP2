<p>Menu D'accueil</p>
<nav>
    <a href="index.php?commande=ListeTousArticles">Page d'affichage des articles</a>
    <a href="index.php?commande=RechercheArticle">Formulaire de recherche des articles</a>
 <?php if (isset($_SESSION['usager'])) {?> 
    <a href="index.php?commande=FormulaireCreationArticle">Page ajout d'un article</a>
    <a href="index.php?commande=Logout">logout</a>
    
    <?php }?> 


    <a href="index.php?commande=formulaireLogin">Login</a>
   
</nav>