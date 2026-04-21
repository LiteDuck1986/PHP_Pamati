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
        
        <!-- 1. Piemērs: -->
        <h3>Funkcija, speciālā vietā apmaina vārdus:</h3>
        <?php
            function apmainaVardu($vards, $vieta){
                $text = "VARDS Gāja uz VIETA, patusēt ar saviem draugiem.";
                $output = str_replace(["VARDS", "VIETA"], [$vards, $vieta], $text);
                return $output;
            }
        ?>
        <P><b>VARDS</b> Gāja uz <b>VIETA</b>, patusēt ar saviem draugiem.</P>
        <form method="POST">
            <input type="text" name="vards" placeholder="Vards">
            <input type="text" name="vieta" placeholder="Vieta">
            <button type="submit" name="apmainit">Apmainīt</button>
            <?php
                if(isset($_POST["apmainit"])){
                    $vards = $_POST["vards"];
                    $vieta = $_POST["vieta"];

                    if(empty($vards) || empty($vieta)){
                        echo "<p style='color:red;'>Lūdzu ievadi gan vārdu, gan vietu!</p>";
                    }
                    else{
                        $rezultats = apmainaVardu($vards, $vieta);
                        echo "<p>$rezultats</p>";
                    }
                }
            ?>
        </form>

        <!-- 2. Piemērs: -->
        <h3>Funkcija, kas aprēķina taisnstūra laukumu:</h3>
        <?php
            function laukums($garums, $platums){
                return $garums * $platums;
            }
        ?>
        <P>Mērvienība ir kvadrātmetros (m²) un drīkst ievadīt tikai skaitļus!</P>
        <form method="POST">
            <input type="text" name="garums" placeholder="Garums">
            <input type="text" name="platums" placeholder="Platums">
            <button type="submit" name="aprekinatLaukumu">Aprēķināt</button>
            <?php
                if(isset($_POST["aprekinatLaukumu"])){
                    $garums = $_POST["garums"];
                    $platums = $_POST["platums"];

                    if(empty($garums) || empty($platums)){ // pārbauda vai ir ievadītas abas vērtības
                        echo "<p style='color:red;'>Ievadi abus skaitļus!</p>";
                    }
                    elseif(!is_numeric($garums) || !is_numeric($platums)){ // pārbauda vai ievadītās vērtības ir skaitļi
                        echo "<p style='color:red;'>Drīkst ievadīt tikai skaitļus!</p>";
                    }
                    elseif($garums <= 0 || $platums <= 0){ // pārbauda vai skaitļi ir lielāki par 0
                        echo "<p style='color:red;'>Skaitļiem jābūt lielākiem par 0!</p>";
                    }
                    else{
                        $rezultats = laukums($garums, $platums);
                        echo "<p>Taisnstūra laukums ir <b>$rezultats m²</b></p>";
                    }
                }
            ?>
        </form>

        <!-- 3. Piemērs: -->
        <h3>Funkcija, kas salīdzina divus skaitļus, pēc vērtības lieluma:</h3>
        <?php
            function lielakais($sk1, $sk2){
                if($sk1 > $sk2){
                    return $sk1;
                }
                else{
                    return $sk2;
                }

            }
        ?>
        <P>Ievadi divus skaitļus:</P>
        <form method="POST">
            <input type="number" name="sk1" placeholder="Pirmais skaitlis" required>
            <input type="number" name="sk2" placeholder="Otrais skaitlis" required>
            <button type="submit" name="salidzinat">Salīdzināt</button>
            <?php
                if(isset($_POST["salidzinat"])){
                    $sk1 = $_POST["sk1"];
                    $sk2 = $_POST["sk2"];
                    $rezultats = lielakais($sk1, $sk2);
                    echo "<p>Lielākais skaitlis ir <b>$rezultats</b></p>";
                }
            ?>
        </form>
        
    </main>
</body>
</html>