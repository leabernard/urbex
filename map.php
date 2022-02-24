<?php
    session_start();   // ouverture de la session
    include "fonction.php"
?>

// Affichage des pouints GPS
<?php public function MapBateau(){
                ?>
                    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCt2uRYNXxp4nsBJRWaya8zqjf4amL8OYo" type="text/javascript"></script>
                    <script async type="text/javascript">
                        // On initialise la latitude et la longitude de Paris (centre de la carte)
                        var map = null;
                        // Fonction d'initialisation de la carte
                        function initMap() {
                            <?php
                                $this->_req = "SELECT * FROM `bateau` WHERE `User_ID` = $this->_id";
                                $Result = $this->_bdd->query($this->_req);
                                $Numbers = $Result -> rowCount();
                                if($Numbers === 0){
                                    $CenterLat = 50.503887;
                                    $CenterLng = 4.469936;
                                }
                                else{
                                    $Check = 0;
                                    while($tab = $Result->fetch()){
                                        $Check + 1;
                                        if($Check <= 1){
                                            $CenterLat = $tab["Latitude"];
                                            $CenterLng = $tab["Longitude"];
                                        }
                                    }
                                }
                            ?>
                            var Clat = <?= $CenterLat ?>;
                            var Clon = <?= $CenterLng ?>;
                            // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
                            map = new google.maps.Map(document.getElementById("map"), {
                                // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
                                center: new google.maps.LatLng(Clat, Clon), 
                                // Nous définissons le zoom par défaut
                                zoom: 11, 
                                // Nous définissons le type de carte (ici carte routière)
                                mapTypeId: google.maps.MapTypeId.ROADMAP, 
                                // Nous activons les options de contrôle de la carte (plan, satellite...)
                                mapTypeControl: true,
                                // Nous désactivons la roulette de souris
                                scrollwheel: false, 
                                mapTypeControlOptions: {
                                    // Cette option sert à définir comment les options se placent
                                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 
                                },
                                // Activation des options de navigation dans la carte (zoom...)
                                navigationControl: true, 
                                navigationControlOptions: {
                                    // Comment ces options doivent-elles s'afficher
                                    style: google.maps.NavigationControlStyle.ZOOM_PAN 
                                }
                            });
                            <?php
                                $this->_req = "SELECT * FROM `bateau` WHERE `User_ID` = $this->_id";
                                $Result = $this->_bdd->query($this->_req);
                                while($tab = $Result->fetch()){
                                    ?>
                                        var Vlat = <?= $tab["Latitude"] ?>;
                                        var Vlon = <?= $tab["Longitude"] ?>;
                                        var marker = new google.maps.Marker({
                                            title: "Bateau N°<?= $tab["Bateau_ID"] ?>",
                                            position: {lat: Vlat, lng: Vlon},
                                            map: map
                                        });
                                    <?php
                                }
                            ?>
                            // Nous ajoutons un marqueur Centre
                            var marker = new google.maps.Marker({
                                // Définition Centre de la Map
                                title: "Map Center",
                                // Icons
                                //icon: new google.maps.MarkerImage('/src/img/icon.png'),
                                // Nous définissons sa position (syntaxe json)
                                position: {lat: Clat, lng: Clon},
                                // Nous définissons à quelle carte il est ajouté
                                map: map
                            });
                        }
                        window.onload = function(){
                            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                            initMap(); 
                        };
                    </script>
                    <style type="text/css">
                        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                            height:650px;
                        }
                    </style>
                <?php
            }
        
        // Ajout de Bateau
            public function addBateau(){
                if(isset($_POST["ID_Bateau"]) && isset($_POST["Latitude"]) && isset($_POST["Longitude"])){
                    $ID_Bateau = $_POST['ID_Bateau'];
                    $Latitude = $_POST['Latitude'];
                    $Longitude = $_POST['Longitude'];
                    $User = $_SESSION['userID'];
                    $this->_req = "INSERT INTO `bateau` (`Bateau_ID`, `User_ID`, `Latitude`, `Longitude`) VALUES('$ID_Bateau', '$User', '$Latitude', '$Longitude')";
                    $this->_bdd->query($this->_req);
                    ?>
                        <div>
                            <p>Bateau ajouté.</p>
                        </div> 
                    <?php
                }
                ?>
                    <div class="account">
                        <form method="post">
                            <div class="ID_Bateau">
                                <input class="form-input" type="number" min="0" max="1000" step="1" id="ID_Bateau" name="ID_Bateau" placeholder="Identifiant du Bateau" required></input>
                            </div>
                            <div class="Latitude">
                                <input class="form-input" type="number" min="0" max="256" step="0.000001" id="Latitude" name="Latitude" placeholder="Latitude" required></input>
                            </div>
                            <div class="Longitude">
                                <input class="form-input" type="number" min="0" max="256" step="0.000001" id="Longitude" name="Longitude" placeholder="Longitude" required></input>
                            </div>
                            <div class="submit-button">
                                <input class="button" type="submit" class="button" value="Ajouter Bateau"></input>
                            </div>
                        </form>
                    </div>
                <?php
            }