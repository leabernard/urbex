<?php
    //connection a la base
    $MaBase = new PDO('mysql:host=192.168.64.113; dbname=monique; charset=utf8','lea', 'lea');

    //fonction pour vérifier si l'utilisateur est bien connecter
    function check() {
        if($_SESSION && ( $_SESSION["Logged"] == true )) {
            return false;
        } else {
            return true;
        }
    }
    
    //formulaire pour la connexion de l'utilisateur
    function form(){
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
                return true;
            }else{
                //sinon affiche un msg d'erreur
                echo `<h3>Le Pseudo ou le mot de passe est incorrect...</h3>`;
            }
        }
    }
    //fonction de déconnection
    function deco(){
        //deconection
        ?>
            <form class="deco" action="" method="post">
                <input class="deco" type="submit" name="deco" value="Déconnexion">
            </form>
        <?php
        //déconnection
        if(isset($_POST["deco"])){
            $_SESSION["Logged"] = false;
            session_destroy();
            header("Location: index.php");
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
//fonction de session  pour les utilisateur admin
    function admin(){
        if($_SESSION && ( $_SESSION["admin"] == true )) {
            return false;
        } else {
            return true;
        }
    }
?>

