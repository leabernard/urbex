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
                                <form class="form1" enctype="multipart/form-data" method="post">
                                    <h2 class="gris">Modifier/supprimer un spot:</h2>
                                    <select name="remove">
                                        <?php $jeux = $MaBase->query("SELECT nom, id FROM Game"); 
                                            //séléction du non et de l'id dans la base Game
                                            while ($jeu = $jeux->fetch())
                                                //boucle qui affiche l'id et le nom du jeu
                                                echo "<option value=".$jeu["id"].">".$jeu["nom"]."</option>";
                                        ?>

                                        <input class="input" type="submit" name="update" value="Modifier le spot">

                                        <input class="input" type="submit" name="send" value="Supprimer le spot">

                                    </select>
                                </form>
                                <form enctype="multipart/form-data" method="post" class="form1">
                                    <?php
                                        if (isset($_POST["update"])){ 
                                            //si le bouton "update" est cliqué
                                            $gameData = $MaBase->query("SELECT * FROM Game WHERE id = ".$_POST["remove"])->fetch();
                                            //séléction dans jeu via l'id du jeu choisi
                                        ?> 
                                            <!--Affichage du nom choisie-->
                                            <h2>Modification de <?= $gameData["nom"]; ?></h2>
                        
                                            <p>ID du jeu :</p>
                                            <!--rentrer le nom du jeu-->
                                            <p><input class="input" type="text" name="id" value="<?= $_POST["remove"] ?>" readonly></p>
                        
                                            <p>Nom du jeu :</p>
                                            <!--rentrer le nom du jeu-->
                                            <p><input class="input" type="text" placeholder="Entrer le nom du jeu" name="nom" value="<?= $gameData["nom"]; ?>" required></p>
                        
                                            <p>Type du jeu :</p>
                                            <!--rentrer le type du jeu-->
                                            <p><input class="input" type="text" placeholder="Entrer le type du jeu" name="type" value="<?= $gameData["type"]; ?>" required></p>
                        
                        
                                            <p>Bio du jeu :</p>
                                            <!--rentrer la bio du jeu-->
                                            <p><textarea type="text" placeholder="Entrer la bio du jeu" name="dudule" rows="5" cols="33" required><?= $gameData["texte"]; ?></textarea>
                        
                                            <p>
                                                Affiche du jeu :
                                                <!--ajout d'une image-->
                                                <input class="input" type="file" name='Affi'/>
                                                <p>
                                                    <!--Affiche du jeu séléctionné-->
                                                    <a href="<?= "IMG/Games/".$_POST["remove"]."_Affiche.jpg"?>">
                                                        <img src="<?= "IMG/Games/".$_POST["remove"]."_Affiche.jpg"?>" alt="" width="160px">
                                                    </a>
                                                </p>
                        
                                            </p>
                                            
                                            
                                                <!--Bouton pour enregistrer les modifications-->
                                                <input class="input" type="submit" name='sendEdit' value="Enregistrer les modifications">
                                            </p>
                                        <?php 
                                        }
                                        //si le bouton "sendedit" est clické
                                        if (isset($_POST["sendEdit"])) {
                                            //Upadate dans la base game du nom, du type, de la bio du jeu modifier
                                            $stm = $MaBase->prepare("UPDATE Game SET `nom` = ?, `type` = ?, `texte` = ? WHERE id = ".$_POST["id"]);
                                            $stm->execute(array(
                                                $_POST["nom"],
                                                $_POST["type"],
                                                $_POST["dudule"],
                                            ));
                                            //type d'image valide
                                            $valideType = array('.jpg');
                                            
                                            if (!$_FILES['Affi']["name"]) die;
                            
                                            echo "pass";
                            
                                            $fileType = ".".strtolower(substr(strrchr($_FILES['Affi']["name"], '.'), 1));
                                            //séléctionne le nom de l'image et le modifie avec l'id du jeu pour l'image
                                            $_FILES['Affi']["name"] = $_POST["id"]."_Affiche";
                                            
                                            if (!in_array($fileType, $valideType)) {
                                                echo "le fichier sélectionné n'est pas une image";
                                                die;
                                            }
                            
                                            $tmpName = $_FILES['Affi']['tmp_name'];
                                            $Name = $_FILES['Affi']['name'];
                                            //séléction du dossier dans lequel mettre l'image
                                            $fileName = "IMG/Games/" . $Name.".jpg";
                                            //déplacement de l'image
                                            $résultUplod = move_uploaded_file($tmpName, $fileName);
                                            if ($résultUplod) {
                                                echo "Affiche enregister ";
                                            }
                                            //si il y a aucun fichier séléctionné 
                                            if ($_FILES['back'] == 0) {
                                                echo "aucun dossier selectionné";
                                                die;
                                            }
                                            $fileType = ".".strtolower(substr(strrchr($_FILES['back']["name"], '.'), 1));
                                            //séléctionne le nom de l'image et le modifie avec l'id du jeu pour le background
                                            $_FILES['back']["name"] = $_POST["id"]."_background";
                                            
                                            if (!in_array($fileType, $valideType)) {
                                                echo "le fichier sélectionné n'est pas une image";
                                                die;
                                            }
                                            $tmpName = $_FILES['back']['tmp_name'];
                                            $Name = $_FILES['back']['name'];
                                            //séléction du dossier dans lequel mettre l'image
                                            $fileName = "IMG/Games/" . $Name.".jpg";
                                            //déplacement de l'image
                                            $résultUplod = move_uploaded_file($tmpName, $fileName);
                                            if ($résultUplod) {
                                                echo "Background enregister";
                                            }
                            
                                        }
                                        //si le bouton "send" est cliqué
                                        if (isset($_POST["send"])){
                                            
                                            $id = $_POST["remove"]; 
                                            //suppression des commentaires de ce jeu
                                            $MaBase->query("DELETE FROM commentaires WHERE idjeux = ".$id);
                                            //supression des LIKES de ce jeu
                                            $MaBase->query("DELETE FROM ArticleLike WHERE IDJeu = ".$id);
                                            //supression du jeu
                                            $MaBase->query("DELETE FROM Game WHERE id = ".$id);
                                            
                                            $affiche    = "IMG/Games/".$id."_Affiche.jpg";
                                            
                                            $background = "IMG/Games/".$id."_background.jpg";
                                            //suppression de l'affiche du jeu
                                            if (file_exists($affiche)) {
                                                unlink($affiche);
                                                echo "L'affiche a bien été supprimée";
                                            } else echo "L'affiche n'a pas été supprimée";
                                            //suppression du background de ce jeu
                                            if (file_exists($background)) {
                                                unlink($background);
                                                echo "Le background a bien été supprimée";
                                            } else echo "Le background n'a pas été supprimée";
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </body>
        <?php
        }
    }
    ?>
                </html>