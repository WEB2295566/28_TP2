    <form method="POST">
        Nom d'usager : <input type="text" name="user"/><br>
        Mot de passe : <input type="password" name="pass"/><br>
        <input type="hidden" name="commande" value="Login">
        <input type="submit" name="btnSubmit" value="Login"/>
    </form>
    <a href="index.php?commande=ListeTousArticles">Page d'affichage des articles</a>
    <?php 
    if(isset($message))
        echo "<p>$message</p>";
    ?>
