<?php
session_start();

if (isset($_REQUEST["commande"])) {
    $commande = $_REQUEST["commande"];
} else {
    $commande = "Accueil";
}

require_once("modele.php");
switch ($commande) {
    case "Accueil":
        $donnees["titre"] = "Page d'accueil";
        //afficher les vues
        require_once("vues/header.php");
        require("vues/accueil.php");
        require_once("vues/footer.php");
        break;

    case "ListeTousArticles":

        $donnees["titre"] = "Liste des articles";
        $donnees["articles"] = obtenir_articles();
        require_once("vues/header.php");
        require("vues/Listes_des_articles.php");
        require_once("vues/footer.php");
        break;
        
    case "Logout":
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        header("Location: index.php?=Accueil");
        break;
    case "recherche_article":
        if (isset($_REQUEST["texteRecherche"]) && !empty($_REQUEST["texteRecherche"])) {
            //faire la recherche 
            $donnees["articles"] = recherche_article($_REQUEST["texteRecherche"]);
            //afficher les résultats de la recherche
            require("vues/resultats_recherche.php");
        }
        break;

    case "RechercheArticle":
        $donnees["titre"] = "Formulaire de recherche d'un article";
        require_once("vues/header.php");
        require_once("vues/form_recherche_article.php");
        require_once("vues/footer.php");
        break;

    case "FormulaireCreationArticle":
        $donnees["titre"] = "Liste des articles";
        require_once("vues/header.php");
        require("vues/Pages_creation_articles.php");
        require_once("vues/footer.php");
        break;


    case "AjoutArticle":
        if (isset($_REQUEST["titre"], $_REQUEST["texte"])) {

            $insertion = creation_article($_SESSION["usager"], $_REQUEST["titre"], $_REQUEST["texte"]);
            if ($insertion) {
                header("Location: index.php?commande=ListeTousArticles");
            } else {
                $donnees["messageErreur"] = "Veuillez remplir les champs correctement.";
            }
        }

        break;

    case "formulaireLogin":
        require_once("vues/header.php");
        require("vues/formulaireLogin.php");
        require_once("vues/footer.php");
        break;

    case "Login":

        if (isset($_POST["user"], $_POST["pass"])) {
            $nomUsager = loginEncrypte($_POST["user"], $_POST["pass"]);
            if ($nomUsager) {
                $_SESSION["usager"] = $nomUsager;
                header("Location: index.php");
                die();
            } else {
                $message = "Mauvaise combinaison username / password.";
            }
        }

        break;
    case "Supprimer":

        if (isset($_REQUEST["id"], $_REQUEST["idAuteur"]) && $_REQUEST["idAuteur"] == $_SESSION['usager']) {
            Supprimer_article($_REQUEST["id"]);
            header("Location: index.php?commande=ListeTousArticles");
        }

        break;



    case "FormulaireModifArticle":

        if (isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])) {
            $donnees["article"] = obtenir_articles_par_id($_REQUEST["id"]);

            //le joueur existe dans la BD

            $donnees["titre"] = "Formulaire de modification d'un joueur";

            // $donnees["equipes"] = recuperer_article();
            require_once("vues/header.php");
            require_once("vues/page_modification_articles.php");
            require_once("vues/footer.php");
        } else {
            header("Location: index.php");
        }
        break;


    case "ModificationArticle":

        if (isset($_REQUEST['titre']) && isset($_REQUEST['texte']) && isset($_REQUEST["idAuteur"]) && $_REQUEST["idAuteur"] == $_SESSION['usager'])

            modifie_article($_REQUEST['titre'], $_REQUEST['texte'], $_REQUEST["id"]);
        header("Location: index.php?commande=ListeTousArticles");
        //afficher les vues
        break;
}
