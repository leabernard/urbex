<?php
    session_start();
    include "fonction.php";
    include "Objetuser.php";

    if(check()){
        header("Location: index.php");
    }else{
        //si l'utilisateur est connecter et admin
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
                                                <u>Utilisateurs :</u>
                                            </h2>
                                            <h3 class="gris">
                                                <u>Supprimé un utilisateur :</u>
                                            </h3>
                                            
                                            <select name="remove">
                                                <?php 
                                                    //séléction des données des utilisateurs
                                                    $users = $MaBase->query("SELECT * FROM User ORDER BY User.pseudo ASC"); 
                                                    //boucle qui affiche les données
                                                    while ($user = $users->fetch())
                                                        echo "<option value=".$user["id"].">".$user["pseudo"]."</option>";
                                                ?>
                                                <input class="input" type="submit" name="supuser" value="Supprimer l'utilisateur">
                                                <?php
                                                    if (isset($_POST["supuser"])){
                                    
                                                        $id = $_POST["remove"]; 
                                                        //supression des commentaire de l'user
                                                        $MaBase->query("DELETE FROM commentaires WHERE iduser = ".$id);
                                                        //suppression de l'user
                                                        $MaBase->query("DELETE FROM User WHERE id = ".$id);
                                                    }
                                                    
                                                ?>
                                            </select>
                                                
                                            <h2 class="gris">
                                                <u>Liste des utilisateurs :</u>
                                            </h2>
                                            <?php
                                                $nb = $MaBase->query("SELECT COUNT(*) FROM User");
                                                $gens = $nb->fetch();
                    
                                                echo '<h1>'.$gens['COUNT(*)'].' utilisateurs</h1>';

                                                $rule = $MaBase->query("SELECT * FROM User ORDER BY User.pseudo ASC");
                                                //séléction des données par pseudo des utilisateurs 
                                                While($gens = $rule->fetch()){
                                                    ?>
                                                        <div class="barregens">
                                                            <?php
                                                                //affiche l'id
                                                                echo '<h3 class="id"><u class="noir"> Id :</u> '.$gens['id'].'</h3>';
                                                                //affiche le pseudo
                                                                echo '<h3 class="Nom"><u class="noir"> Pseudo :</u> '.$gens['pseudo'].'</h3>';
                                                                //affiche le mdp
                                                                echo '<h3 class="MDP"><u class="noir"> Mot de passe :</u> '.$gens['MDP'].'</h3>';
                                                                //affiche le statue
                                                                echo '<h3 class="Admin"><u class="noir"> Admin :</u> '.$gens['admin'].'</h3>';
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