<?php
    session_start();
    include "fonction.php";
    include "Objetuser.php";

    if(check()){
        header("Location: index.php");
    }else{
        if($_SESSION['admin'] == 'true'){
            ?>
                <!DOCTYPE html>
                    <html lang="fr">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <link rel="stylesheet" href="CSS/class.css">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="icon" type="image/png" href="" /><!--icone de l'onglet-->
                            <title>Connexion</title>
                        </head>
                        <body>
                            <div class="space">
                                <?php
                                    include "menu.php"
                                ?>
                                <div class="arti3">
                                    <div class="form">
                                        <form class="form1" method="post">   
                                            <h2>
                                                <u>Commentaires :</u>
                                            </h2>
                                            <h3 class="gris">
                                                <u>Supprimé un commentaire :</u>
                                            </h3>

                                            <input class="input" type="text" placeholder="Id du commentaire" name="id">
        
                                            <div class="espace20"></div>
        
                                            <input class="input" type="submit" name='commdestroy' value="Supprimé le commentaire">
       
                                            <?php
                                                if (isset($_POST['commdestroy'])){
                                                    //si le boutton "Supprimé le compte" est cliqué, alors le compte est supprimé de la base
                                                    $rep = $MaBase->query("DELETE FROM commentaires WHERE id= ".$_POST['id']."");

                                                    if($rep){
                                                        echo "commentaire supprimé";
                                                    }else{
                                                        echo "une erreur est survenue";
                                                    }
                                                }
                                                
                                                
                                                if (isset($_POST['commdestroy'])){
                                                    //si le boutton "Supprimé le compte" est cliqué, alors le compte est supprimé de la base
                                                    $rep = $MaBase->query("DELETE FROM commentaires WHERE id= ".$_POST['id']."");
                                                        
                                                    if($rep){
                                                        echo "commentaire supprimé";
                                                    }else{
                                                        echo "une erreur est survenue";
                                                    }
                                                }
                                                //joiture pour séléctionné le pseudo de l'user son commentaire et la page ou il a été poster
                                                $rule = $MaBase->query("SELECT User.pseudo, commentaires.commentaire, commentaires.id, Game.nom FROM User, commentaires, Game WHERE User.id = commentaires.iduser
                                                                        AND
                                                                            commentaires.idjeux = Game.id
                                                                        ORDER BY commentaires.id DESC");
                                                While($gens = $rule->fetch()){;
                                                    ?>
                                                        <div class="commbloc">
                                                            <?php
                                                                //affichage de l'id du commentaire
                                                                echo '<h3 class="id"><u class="noir"> Id :</u> '.$gens['id'].'</h3>';
                                                                //affichage de le commentaire
                                                                echo '<h3 class="Nom"><u class="noir"> Commentaire :</u> '.$gens['commentaire'].'</h3>';
                                                                //affichage de la page ou il a été poster
                                                                echo '<h3 class="MDP"><u class="noir"> Page :</u> '.$gens['nom'].'</h3>';
                                                                //affichage du nom de l'utilisateur qui l'a poster
                                                                echo '<h3 class="Admin"><u class="noir"> Utilisateur :</u> '.$gens['pseudo'].'</h3>';
                                                            ?>
                                                        </div>
                                                        <div class="esp"></div>
                                                    <?php
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </body>
            <?php       
        }
    }
    ?>
</html>