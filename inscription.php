<?php
    session_start();// ouverture de la session
    include "fonction.php"; //appel de la page de fonction 
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
            include "menu.php"  // appel le menu
        ?>
        <div class="arti3">
            <div class="form"> <!--classe css "form-->
                <form class="form1" action="" method="post">
                    <p>
                        <?php
                            //sélection du nombre d'utilisateur
                            $nb = $MaBase->query("SELECT COUNT(*) FROM User");
                            $gens = $nb->fetch();

                            echo '<h1>Déjà '.$gens['COUNT(*)'].' membres !</h1>';
                        ?>
                    </p>
                    <u>
                        <h2 class="gris">Inscription :</h2>
                    </u>
                    <input class="input" type="text" placeholder="Entrez votre Pseudo" name="nom" maxlength="10" required> <!--champ texte pour entrer sont pseudo-->

                    <input class="input" type="password" placeholder="Entrez votre mot de passe" name="MDP" required>

                    <input class="input" type="password" placeholder="Confirmer le mot de passe" name="password" id="confirmpassword" required>

                    <input class="input" type="submit" name='submit' value="S'inscrire">  <!-- bouton d'inscription-->
                    <u>
                        <h2 class="gris">
                            <p>Tu a déjà un compte ?<p>
                            <a class="bouton" href="connexion.php">Retour a la connexion</a> <!--retour vers la page de connexion-->
                        </h2>
                    </u>
                    <?php
                        if (isset($_POST["submit"])) {

                            $exist = $MaBase->query("SELECT COUNT(*) FROM User WHERE pseudo ='".$_POST['nom']."'");
                            $exist = $exist->fetch(); //selection le nom d'utilisateur

                            if ($exist["COUNT(*)"] > 0) { // on verifier que l'utilisateur n'existe pas

                                echo '<h3 class="desct">Cet utilisateur existe déjà...</h3>';
                                return;
                            
                            }else{

                                if($_POST['MDP'] == $_POST['password']) { //si les mot de passe corespondent 
                                    $insert = $MaBase->query("INSERT INTO User(pseudo, MDP,pdp,admin) VALUES('".$_POST['nom']."','".$_POST['MDP']."','default.png','false')");
                                                //insertion dans la base des utilisateur du pseudo et du mot de passe
                                        if($insert->rowCount()>=1){

                                            $Result = $MaBase->query("SELECT * FROM `User` WHERE `pseudo`='".$_POST['nom']."' AND `MDP` = '".$_POST['MDP']."'");
                                                if($Result->rowCount()>0){ //selection des utilisateurs pour la connection

                                                    $tab = $Result->fetch();
                                                    //si il existe et que le mot de passe correspond -> connection
                                                    $_SESSION["Logged"] = true;
                                                    $_SESSION["idUser"] = $tab['id'];
                                                    $_SESSION["admin"] = $tab['admin'];

                                                    echo '<meta http-equiv="refresh" content="0">';
                                                }
                                        }
                    
                                }else{
                                    //message d'erreur si les mots de passes ne correspondes pas
                                    echo '<h3 class="desct">Les mots de passe ne corespondes pas...</h3>';
                                }
                            }
                        }
                    ?>
                    <div class="gif">
                        <!--image en dessous du formulaire-->
                        <img class="gif" src="IMG/Backgrounds/HoNo.png">
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