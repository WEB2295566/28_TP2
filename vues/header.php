<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $donnees["titre"] ?></title>
    <link rel="stylesheet" href="style.css">
    
    <h3><?php if (isset($_SESSION['usager'])) echo' Bonjour '.  $_SESSION["usager"] ; else  echo ' Bonjour ';?></h3>
</head>
<body>