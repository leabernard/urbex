<?php
    session_start();   // ouverture de la session
    include "fonction.php"; //appel de la page de fonction 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/class.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="" /><!--icone de l'onglet-->
    <title>Accueil</title>
</head>
<body>
    <div class="space">
        <?php
            include "menu.php" //appel le menu
        ?>
        <div class="arti1">

            <img src='IMG/bg/1.jpg' id="bg" style="display: block;">  <!-- image 1-->
            <img src='IMG/bg/2.jpg' id="bg" style="display: none;" >  <!-- image 2-->
            <img src='IMG/bg/3.jpg' id="bg" style="display: none;" > <!-- image 3-->
            <img src='IMG/bg/4.jpg' id="bg" style="display: none;" > <!-- image 4-->
            <img src='IMG/bg/5.jpg' id="bg" style="display: none;" > <!-- image 5-->
            <img src='IMG/bg/6.png' id="bg" style="display: none;" > <!-- image 6-->
            <img src='IMG/bg/7.jpg' id="bg" style="display: none;" > <!-- image 6-->
            
            <script type="text/javascript">
            // image deffilante 
                I = 0 ;
                Imax = document.images.length - 1 ;  
                setTimeout(suivante, 3000) ;   // definition du temps de passage des images         
    
                function suivante(){
                    document.images[I].style.display = "none" ; 
                    if ( I < Imax )  //boucle defilante 
                        I++;
                    else
                        I=0;    
                    document.images[I].style.display = "block";
                    setTimeout(suivante, 3000) ;
                }
            </script>
        </div>
        <div class="arti3">
            <div>
                <u>
                    <h1 class="gris">Tendances du moment :</h1>  <!--titre en gris-->
                </u>
                <div class="esp"></div>
                <div class="box">
                    <?php
                        
                        $CommResult = $MaBase->query("SELECT COUNT(*), IDJeu, nom FROM `ArticleLike` INNER JOIN Game ON ArticleLike.IDJeu = Game.id GROUP BY IDJeu ORDER BY `COUNT(*)` DESC LIMIT 3");
                        // selectionne le id du jeux le nom et sa fait une jointure avec articlelike et game
                        While($don = $CommResult->fetch()){   // boucle while qui affiche les 3 meuilleur jeux
                            ?>        
                                <div class="center">
                                    <a class="zone1" href="jeux.php?GameName=<?= $don['IDJeu']; ?>"> 
                                        <div class="">
                                        <!--met l'affiche du jeu selectioné dans la base-->
                                            <img class="Affiche2" src="IMG/Games/<?= $don['IDJeu']; ?>_Affiche.jpg" alt="Affiche"> <!--affiche l'image du jeu-->
                                        </div>
                                        <div class="nom">
                                            <?php
                                            //affiche les commentaires et le pseudo de la persone qui a posté un commentaire
                                                echo '<h1 class="">'.$don['nom'].'</h1>'; //affiche le nom du jeu
                                                echo '<h1 class="">'.$don['COUNT(*)'].'❤️</h1>'; //affiche le mombre de coeur
                                            ?>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                        
                    ?>
                </div>
                <u>
                    <h1 class="gris">A découvrir :</h1>
                </u>
                <div class="esp"></div>
                <?php

                    $CommResult = $MaBase->query("SELECT * FROM `Game` ORDER BY Game.nom ASC "); // classe les jeux par nom
                    While($don = $CommResult->fetch()){
                        ?>
                            <div class="center">
                                <a  class="zone" href="jeux.php?GameName=<?php echo $_POST['GameName']= $don['id']; ?>">
                                    <div class="img1">
                                    <!--met l'affiche du jeu selectioné dans la base-->
                                        <img class="Affiche" src="IMG/Games/<?php echo $don['id']; ?>_Affiche.jpg" alt="Affiche">
                                    </div>
                                    <div class="center nom">
                                        <?php
                                            //affiche le nom du jeu
                                            echo '<h1>'.$don['nom'].'</h1>';
                                        ?>
                                    </div>
                                </a>
                                <div class="esp"></div>
                            </div>
                        <?php
                    }   
                ?>
            </div>
        </div>
    </div>
</body>
</html>