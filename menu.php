<nav>
    <div class="menu">
        <div class="esp"></div>
        <?php
            if(check()){
                ?>
                    <h5>
                        <a class="text" href="connexion.php">Connexion</a>
                    </h5>
                <?php
            }else{
                //selection dans ma base de l'utilisateur
                $utilisateurs = $MaBase->query("SELECT * FROM `User` WHERE `id`='".$_SESSION["idUser"]."'");
                $utilisateurs = $utilisateurs->fetch();
                //Affiche l'image de profil de l'utilisateur via son id
                ?>
                    <a href="compte.php">
                        <?php
                            //Affiche le nom de l'utilisateur a la place du bouton
                            echo '<h2 class="text">'.$utilisateurs['pseudo'].'</h2>';
                        ?>
                    </a>
                <?php
            }
            ?>
                <h6>
                    <!--bouton pour aller sur la page d'acceuil-->
                    <a class="text" href="index.php">Accueil</a>
                </h6>
            <?php

            if(check()){
            
            }else{
                //si l'utilisateur est connecter
                if($_SESSION['admin'] == 'true'){
                    //si l'utilisateur est Admin
                    ?>
                        <h5>
                            <!--Bouton vers la page ajoutjeu.php-->
                            <a class="admin" href="ajoutjeu.php">ajout d'un spot</a>
                            <div class="esp"></div>
                            <div class="esp"></div>
                            <!--Bouton vers la page users.php-->
                            <a class="admin" href="users.php">Utilisateurs</a>
                            <div class="esp"></div>
                            <div class="esp"></div>
                            <!--Bouton vers la page comm.php-->
                            <a class="admin" href="comm.php">Commentaires</a>
                        </h5>
                    <?php
                }
            }
            //séléction dans la base Game des types de jeux
            $gameType = $MaBase->query("SELECT type FROM `Game` GROUP BY type");
            //affiche tout les types de jeu
            foreach ($gameType as $type => $data){ 
            ?>
                <h5>    
                    <div class="esp"></div>
                    <!--affiche le type dans un bontono vers la page liste.php-->
                    <a class="text" href="liste.php?TypeName=<?= $data['type']; ?>"><?= $data['type']; ?></a>
                    <div class="esp"></div>
                </h5>
            <?php 
            } 

            if(check()){
                //Affiche U ω U
                echo '<h5 class="text3"> U ω U </h5>';
            }else{
                //finction de déconnexion
                deco();
                ?>
                    <div class="esp"></div>
                <?php
            }

        ?>
    </div>
</nav>