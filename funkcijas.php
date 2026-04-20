<?php
    $sadala = "PHP - Funkcijas";
    require "assets/header.php";
?>

    <main>
        <?php
            function zinojums(){
                echo "<p>Hello World!</p>";
            }

            zinojums();
            zinojums();
            zinojums();

            ?>

            <h3>Funkcija ar parametriem</h3>
            <?php
                function skoleni($vards, $uzvards, $kurss){ // parametri
                    echo "<p>$vards $uzvards mācās $kurss grupā.</p>";
                }

            skoleni("Gustavs", "Lācis", "1PT"); // argumenti
             skoleni("Emīls", "Voitkevičs", "2PT"); // argumenti
              skoleni("Viktors", "Lūks", "2PV"); // argumenti
        ?>

        <h3>Funkcija, kas atgriež vērtību:</h3>
        <?php
            function vid_aritm($masivs){
                $summa = array_sum($masivs);
                $skaits = count($masivs);
                return round(($summa / $skaits), 2);
            }
        ?>
        <P>Ievadi skaitļus savstarpēji tos atdalot ar komatu:</P>
        <form method="POST">
            <input type="text" name="skaitli">
            <button type="submit" name="aprekinat">Aprēķināt</button>
            <?php
                if(isset($_POST["aprekinat"])){
                    $skaitli = $_POST["skaitli"];
                    $masivs = explode(',', $skaitli);
                    $rezultats = vid_aritm($masivs);
                    echo "<p>Vidējais aritmētiskais ir <b>$rezultats<b></p>";
                }
            ?>
        </form>
        <?php

        ?>
        
    </main>
</body>
</html>