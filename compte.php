<?php
    session_start();
    include "fonction.php";
    include "Objetuser.php";

    if(check()){
        header("Location: index.php");
    }else{
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
                <form enctype="multipart/form-data" class="form1" action="" method="post">
                    <p>
                        <?php
                            $utilisateurs = $MaBase->query("SELECT * FROM `User` WHERE `id`='".$_SESSION["idUser"]."'");
                            //séléction des données de l'utilisateur via son id
                            $utilisateurs = $utilisateurs->fetch();
                            //affiche le pseudo de l'utilisateur
                            echo '<h2>'.$utilisateurs['pseudo'].'</h2>';
                        ?>
                    </p>
                    <?php
                        //création d'un objet user
                        $user = new User($MaBase, $_SESSION["idUser"]);
                        //fonction pour l'image de profil
                        $user->PDP();
                        //fonction pour la sécurité
                        $user->sécu();

                    ?>
                    <script type="text/javascript" src="Js/js1.js"></script>
                        <style>
                            .espace{
                                height: 3%;
                            }
                            .espace2{
                                height: 10%;
                                width: 100%;
                            }   
                            .center{
                                text-aling:center;
                                position: revert;
                                margin: auto;
                            }
                            .popup {
                                position: fixed;
                                top: 230px;
                                left: 27%;
                                height: 180px;
                                width: 50%;
                                display: flex;
    
                                justify-content: center;
                                text-align: center;
                                flex-direction: column;
                                transition: all .35s;
                                border: 3.3px solid #000000;
                                display: none;
                                background-color: #888484;
                            }
                            #newe {
                                position: sticky;
                                background-color: white;
                                text-align: left;
                                width: 60%;
                                padding: 50px;
                                transition: all .35s;
                            }
                        </style>
                        <?php
                            if ( $utilisateurs['pdp'] == "default.png") { 
                                ?>  
                                    <div class="popup">
                                        <h3><p>Tu sais, tu peux changer de photo de profil, tu seras vraiment unique ! </p></h3>
                                        <input class="poster" type="button" value="OK !" id="ModalRemove">
                                    </div>
                                <?php 
                            } 
                        ?>
                        <script>
                            const modalRemove = document.getElementById("ModalRemove")
                            const modal = document.querySelector(".popup")
                    
                            setTimeout(() => {
                                modal.style.display = "flex"
                            }, 3000);

                            modalRemove.addEventListener("click", () => {
                            modal.style.opacity = "0";
                            setTimeout(() => modal.style.display = "none ", 350)
                            })
                        </script>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</body>