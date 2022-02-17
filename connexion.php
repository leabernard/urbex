<?php
    session_start();
    include "fonction.php";
    if(check()){
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
                <form class="form1" action="" method="post">
                    <p>
                        <?php
                            //sélection du nombre d'utilisateur
                            $nb = $MaBase->query("SELECT COUNT(*) FROM User");
                            $gens = $nb->fetch();

                            echo '<h1>Déjà '.$gens['COUNT(*)'].' membres !</h1>';
                        ?>
                    </p>

                    <h2 class="gris">
                        <u>
                            <p>Connexion :</p>
                        </u>
                    </h2>

                    <input class="input" type="text" placeholder="Entrez votre pseudo" name="nom" required>
                    <input class="input" type="password" placeholder="Entrez votre mot de passe" name="MDP" required>

                    <h2>
                        <input class="input" type="submit" id='submit' value="Connection">
                    </h2>

                    <u>
                        <h2 class="gris">
                            <p>Pas de compte ?<p>
                            <a class="bouton" href="inscription.php">Crée en un maintenant</a>
                        </h2>
                    </u>
                    <?php
                        if(isset($_POST['nom'])){
                            //selection des users 
                            $Result = $MaBase->query("SELECT * FROM `User` WHERE `pseudo`='".$_POST['nom']."' AND `MDP` = '".$_POST['MDP']."'");
                            if($Result->rowCount()>0){
                                $tab = $Result->fetch();
                                //si il existe et que le mot de passe correspond -> connection
                                $_SESSION["Logged"] = true;
                                $_SESSION["idUser"] = $tab['id'];
                                $_SESSION["admin"] = $tab['admin'];
                                //réponse a la connection
                                echo '<meta http-equiv="refresh" content="0">';
                            
                                
                            }else{
                                //sinon affiche un msg d'erreur
                                echo `<h3 class="gris">Le Pseudo ou le mot de passe est incorrect...</h3>`;
                            }
                        }
                    ?>
                    <div class="gif">
                        <img class="gif" src="IMG/Backgrounds/gif02.gif">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }else{
        header("location: index.php");
    }
    ?>
</body>
</html>