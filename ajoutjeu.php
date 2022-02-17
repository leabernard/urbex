<?php
    session_start();
    include "fonction.php"; //appel de la page de fonction 
    include "Objetuser.php"; //appel des objets user

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
                                            <h2 class="gris">Ajouté d'un spot :</h2>
                                            <!--rentrer le nom du jeu-->
                                            <p>
                                                <input class="input" type="text" placeholder="Nom du spot " name="nom" required>
    
                                                <input class="input" type="text" placeholder="departement " name="type" required>
    
                                                <input class="input" type="text" placeholder="decription du spot" name="dudule" required>
    
                                                <h2 class="gris">Image du lieux :</h2>
                                                <!--ajout d'une image-->
                                                <input class="input" type="file" name='Affi' required/>
    
                                                <h2 class="gris">image de fond d'ecran</h2>
                                                <!--ajout d'une image-->
                                                <input class="input" type="file" name='back' required/>
            
                                                <input class="input" type="submit" name='subModif' value="Enregistrer un nouveau spot">
                                            </p>
                                            <?php
                                                if (isset($_POST["subModif"])){
                                                    $note = $MaBase->query("INSERT INTO Game (`nom`,`texte`,`type`) VALUES (\"".$_POST['nom']."\",\"".$_POST['dudule']."\",\"".$_POST['type']."\")");
                                                    //insertion dans la base Game du nom de la bio et du type
                                                    if($note){
                                                        //si le jeu est bien ajouté message positif
                                                        echo"spot ajouté";
                                                    }else{
                                                        //si le jeu n'est pas ajouté message négatif
                                                        echo"une erreur est survenu";
                                                    }
                                                    //type d'imge valide/autorisé 
                                                    $valideType = array('.jpg');
                                                    if ($_FILES['Affi'] == 0) {
                                                        //si il n'y a pas d'image, message d'erreur
                                                        echo "aucun dossier selectionné";
                                                        die;
                                                    }

                                                    $fileType = ".".strtolower(substr(strrchr($_FILES['Affi']["name"], '.'), 1));
                                                    //selection de l'id du dernier jeu ajouté
                                                    $req = $MaBase->query("SELECT id FROM Game ORDER BY id DESC LIMIT 1")->fetch();
                                                    //récupération du nom de l'image et modification avec l'id du dernier jeu pour l'affiche
                                                    $_FILES['Affi']["name"] = $req["id"]."_Affiche";
                                                    if (!in_array($fileType, $valideType)) {
                                                        // si l'image ne respécte pas le fileType et le valideType message d'erreur
                                                        echo "le fichier sélectionné n'est pas une image";
                                                        die;
                                                    }
                                                    //récupération du nouveau nom de l'image
                                                    $tmpName = $_FILES['Affi']['tmp_name'];
                                                    $Name = $_FILES['Affi']['name'];
                                                    //séléction du fichier ou l'image sera insérer 
                                                    $fileName = "IMG/Games/" . $Name.".jpg";
                                                    //déplacement de l'image dans le dossier
                                                    $résultUplod = move_uploaded_file($tmpName, $fileName);
                                                    if ($résultUplod) {
                                                        //si l'image est déplacer message positif 
                                                        echo "Affiche enregister ";
                                                    }
                                                    //Background
                                                    if ($_FILES['back'] == 0) {
                                                        echo "aucun dossier selectionné";
                                                        die;
                                                    }
                                                    $fileType = ".".strtolower(substr(strrchr($_FILES['back']["name"], '.'), 1));
                                                    //récupération du nom de l'image et modification avec l'id du dernier jeu pour le background
                                                    $_FILES['back']["name"] = $req["id"]."_background";
                                                    if (!in_array($fileType, $valideType)) {
                                                        // si l'image ne respécte pas le fileType et le valideType message d'erreur
                                                        echo "le fichier sélectionné n'est pas une image";
                                                        die;
                                                    }
                                                    //récupération du nouveau nom de l'image
                                                    $tmpName = $_FILES['back']['tmp_name'];
                                                    $Name = $_FILES['back']['name'];
                                                    //séléction du fichier ou l'image sera insérer 
                                                    $fileName = "IMG/Games/" . $Name.".jpg";
                                                    //déplacement de l'image dans le dossier
                                                    $résultUplod = move_uploaded_file($tmpName, $fileName);
                                                    if ($résultUplod) {
                                                        //si l'image est déplacer message positif
                                                        echo "Background enregister";
                                                    }
                                                
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                                <div class="arti3">
                                    <div class="form">
                                        <form class="form1" enctype="multipart/form-data" method="post">
                                            <h2 class="gris">Modifier/supprimer un jeu :</h2>
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
                                
                                                    <p>departement du lieux abandonner  :</p>
                                                    <!--rentrer le type du jeu-->
                                                    <p><input class="input" type="text" placeholder="Entrer le departement du lieux" name="type" value="<?= $gameData["type"]; ?>" required></p>
                                
                                
                                                    <p>décription du lieux  :</p>
                                                    <!--rentrer la bio du jeu-->
                                                    <p><textarea type="text" placeholder="Entrer la decription du lieux" name="dudule" rows="5" cols="33" required><?= $gameData["texte"]; ?></textarea>
                                
                                                    <p>
                                                        Affiche du lieux :
                                                        <!--ajout d'une image-->
                                                        <input class="input" type="file" name='Affi'/>
                                                        <p>
                                                            <!--Affiche du jeu séléctionné-->
                                                            <a href="<?= "IMG/Games/".$_POST["remove"]."_Affiche.jpg"?>">
                                                                <img src="<?= "IMG/Games/".$_POST["remove"]."_Affiche.jpg"?>" alt="" width="160px">
                                                            </a>
                                                        </p>
                                
                                                    </p>
                                                    
                                                    <p>
                                                        Background du jeu :
                                                        <!--ajout d'une image-->
                                                        <input class="input" type="file" name='back'/>
                                                        <p>
                                                            <!--Background du jeu séléctionné-->
                                                            <a href="<?= "IMG/Games/".$_POST["remove"]."_background.jpg"?>">
                                                                <img src="<?= "IMG/Games/".$_POST["remove"]."_background.jpg"?>" alt="" width="300px">
                                                            </a>
                                                        </p>
                                                    </p>
                                                    <p>
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
                            </div>
                        </body>
                    <?php
        }
    }
    ?>
</html>