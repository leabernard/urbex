<?php
/*
include "fonction.php";

if (isset($_POST['pdpModif'])) {

    $valideType = array('.jpg', '.jpeg', '.gif', '.png');
    
    if ($_FILES['imgprof'] == 0) {
        echo "aucun dossier selectionné";
        die;
    }

    $fileType = ".".strtolower(substr(strrchr($_FILES['imgprof']["name"], '.'), 1));

    $_FILES['imgprof']["name"] = $_SESSION['idUser']."_".$_FILES['imgprof']["name"];
    
    if (!in_array($fileType, $valideType)) {
        echo "le fichier sélectionné n'est pas une image";
        die;
    }
    $tmpName = $_FILES['imgprof']['tmp_name'];
    $Name = $_FILES['imgprof']['name'];
    $fileName = "IMG/Users/" . $Name;
    $résultUplod = move_uploaded_file($tmpName, $fileName);
    if ($résultUplod) {
        echo "transfere terminer";
    }
    $update = $MaBase->query("UPDATE `User` SET `pdp`='".$_FILES['imgprof']['name']."' WHERE id=".$_SESSION['idUser']." ");
        if($update){
            echo "votre image a bien été changé";
        }else{
            echo 'une erreur est survenue';
        }
    header("Location: compte.php");
    }
    */
?>