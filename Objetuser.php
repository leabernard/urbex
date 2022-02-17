<?php
    class User
    {
        private $_id;
        private $_MDP;
        private $_nom;
        private $_admin;
        private $_pdp;

        public function __construct($bdd, $id) {
            //séléction des données de l'utilisateur via son id
            $query = $bdd->query("SELECT * FROM User WHERE id = $id")->fetch();

            $this->_id = $query["id"];
            $this->_MDP = $query["MDP"];
            $this->_nom = $query["pseudo"];
            $this->_admin = $query["admin"];
            $this->_pdp = $query["pdp"];
            $this->_BDD = $bdd;
        }

        public function PDP(){
            ?>
                <h2>Mon compte :</h2>
                    <img class="imgusers" src="IMG/Users/<?php echo $this->_pdp?>">
                <p>
                    <input type="file" name='imgprof' />
                </p>
                <p>
                    <input class="input" type="submit" name='pdpModif' value="Sauvegarder l'image">
                </p>
                <p>
                    <input class="input" type="submit" name='pdpreset' value="Réinitialisé l'image">
                </p>
            <?php

                if (isset($_POST['pdpModif'])) {
                    //type valide de fichier
                    $valideType = array('.jpg', '.jpeg', '.gif', '.png');
                    
                    if ($_FILES['imgprof'] == 0) {
                        echo "aucun dossier selectionné";
                        die;
                    }
                
                    $fileType = ".".strtolower(substr(strrchr($_FILES['imgprof']["name"], '.'), 1));
                    //modification de l'image avec l'id de l'utilisateur
                    $_FILES['imgprof']["name"] = $_SESSION['idUser']."_".$_FILES['imgprof']["name"];
                    
                    if (!in_array($fileType, $valideType)) {
                        echo "le fichier sélectionné n'est pas une image";
                        die;
                    }
                    //récupération du nom de l'image
                    $tmpName = $_FILES['imgprof']['tmp_name'];
                    $Name = $_FILES['imgprof']['name'];
                    //séléction du dossier
                    $fileName = "IMG/Users/" . $Name;
                    //déplacement de l'image dans le dossier
                    $résultUplod = move_uploaded_file($tmpName, $fileName);
                    if ($résultUplod) {
                        echo "transfere terminer";
                    }
                    //insertion en base du nom de l'image a séléctionné pour l'utilisateur
                    $update = $this->_BDD->query("UPDATE `User` SET `pdp`='".$_FILES['imgprof']['name']."' WHERE id=".$_SESSION['idUser']." ");
                        if($update){
                            echo '<meta http-equiv="refresh" content="0">';
                        }else{
                            echo 'une erreur est survenue';
                        }
                    }

                if (isset($_POST["pdpreset"])){
                    //réinitialisation de l'image de l'utilisateur par celle de défault en base
                    $rep = $this->_BDD->query("UPDATE `User` SET `pdp`= 'default.png' WHERE id=".$this->_id);
                    if($rep){
                        echo 'image réinitialisé';
                        echo '<meta http-equiv="refresh" content="0">';
                    }else{
                        echo 'une erreur est survenue';
                    }
                }       
        }
        //fonction pour la sécurité du compte
        public function sécu(){
            ?>
                <p>
                    <h2 class="gris">Sécurité :</h2>

                    <input class="input" type="password" placeholder="Entrez votre ancien mot de passe" name="MDP" >

                    <input class="input" type="password" placeholder="Entrez votre nouveau mot de passe" name="NEWMDP">

                    <input class="input" type="password" placeholder="Confirmer le nouveau mot de passe" name="password" id="confirmpassword"/>
                    
                    <input class="input" type="submit" name='subModif' value="Modifier le mot de passe">
                    
                    <input class="input" action="index.php"  type="submit" name='destroy' value="Supprimé le compte">
                </p>
                <?php
                    //séléction des donnés de l'utilisateur via son id
                    $filePath = $this->_BDD->query("SELECT * FROM User WHERE id=".$this->_id."")->fetch();
                    if (isset($_POST["subModif"])) {
                        //comparaison du mot de passe avec l'ancien
                        if($_POST['NEWMDP'] == $_POST['password']) {
                            //mise a jour dans la base du nouveau mot de passe
                            $rep = $this->_BDD->query("UPDATE `User` SET `MDP`='".$_POST['NEWMDP']."' WHERE id=".$this->_id." ");
                            if($rep){
                                echo "Mot de passe changé";
                            }
                        } else {
                                echo "les mots de passe ne correspondent pas...";
                        }
                    }

                    if (isset($_POST['destroy'])){
                        //si le boutton "Supprimé le compte" est cliqué, alors le compte est supprimé de la base
                        $rep = $this->_BDD->query("DELETE FROM commentaires WHERE iduser= ".$this->_id." ");
                        //suppression des commentaires
                        $rep = $this->_BDD->query("DELETE FROM User WHERE id= ".$this->_id." ");

                        if($rep){
                            session_destroy ();
                            echo '<meta http-equiv="refresh" content="0">';
                            header("Location: index.php");
                        }else{
                            echo "une erreur est survenue";
                        }
                    }
        }
        
    }
?>