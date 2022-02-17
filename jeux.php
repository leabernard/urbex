<?php
    session_start();
    include "fonction.php";
    include "Objetjeu.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/class.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            $gameName = $MaBase->query("SELECT nom FROM Game WHERE id = ".$_GET['GameName'])->fetch();
            //séléction du non du jeu via son id
            echo $gameName["nom"]
            //Affiche le nom du jeu
        ?>
    </title>
</head>
<body>
    <?php
        //inclusion du menu
        include "menu.php";

    ?>
    <div class="arti1">
        <div class="biojeu">
            <?php
                //création d"un objet jeu avec l'id du jeu
                $game = new Jeu($MaBase, $_GET['GameName']);
                //Fonction qui affiche les information du jeu
                $game->showData();
                //Fonction qui affiche la description du jeu
                $game->description();

                //si l'utilisateur n'est pas connecter
                if(check()){

                    ?>
                        <h2 class="gris">
                            <a class="bouton" href="connexion.php">Partage ton avis, connecte toi !</a>
                        </h2>
                    <?php

                }else{
                    //Fonction Bouton pour like le jeu
                    $game->Like();
                    //fonction pour mettre un commentaire
                    $game->talk();

                }
                
                //fonction pour afficher les commentaires
                $game->commentaires();

            ?>
        </div>
    </div>
    </body>
</html> 