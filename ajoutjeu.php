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
                            <title>Ajout d'un lieux</title>
                        </head>
                        <body>
                            <div class="space">
                                <?php
                                    include "menu.php"
                                ?>
                                <div class="arti3">
                                    <div class="form">
                                        <form class="form1" enctype="multipart/form-data" method="post">
                                            <h2 class="gris">Ajouté un spot d'urbex :</h2>
                                            <!--rentrer le nom du jeu-->
                                            <p>
                                                <input class="input" type="text" placeholder="Nom du lieux" name="nom" required>
    
                                                <input class="input" type="text" placeholder="Département" name="type" required>
    
                                                <input class="input" type="text" placeholder="Déscription du lieux" name="dudule" required>
    
                                                <h2 class="gris">Affiche du lieux abandonnée :</h2>
                                                <!--ajout d'une image-->
                                                <input class="input" type="file" name='Affi' required/>
            
                                                <input class="input" type="submit" name='subModif' value="Enregistrer un nouveau lieux abandonnée">
                                            </p>
                                            <?php
                                                if (isset($_POST["subModif"])){
                                                    $note = $MaBase->query("INSERT INTO Game (`nom`,`texte`,`type`) VALUES (\"".$_POST['nom']."\",\"".$_POST['dudule']."\",\"".$_POST['type']."\")");
                                                    //insertion dans la base Game du nom de la bio et du type
                                                    if($note){
                                                        //si le jeu est bien ajouté message positif
                                                        echo"un lieux est ajouté";
                                                    }else{
                                                        //si le jeu n'est pas ajouté message négatif
                                                        echo"une erreur est survenu";
                                                    }
                                                    //type d'imge valide/autorisé 
                                                    $valideType = array('.jpg', '.jpeg', '.gif', '.png');
                                                    if ($_FILES['Affi'] == 0) {
                                                        //si il n'y a pas d'image, message d'erreur
                                                        echo "aucune affiche selectionné";
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