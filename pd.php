<?php
    $sadala = "PHP - Parbaudijums";
    require "assets/header.php";
?>

    <main>

        <!--  Kalkulators: -->
        <h3>Kalkulators</h3>
        <?php
            function saskaitit($skaitlis1, $skaitlis2){
                return $skaitlis1 + $skaitlis2;
            }
        ?>
        <P>Veic matemātisko aprēķinu atkarībā no atlasītās darbības:</P>
        <form method="POST">
            <input type="text" name="skaitlis1" placeholder="Skaitlis 1">
            <select name="merv">
                <?php
                            for($m = 1; $m <= 4; $m++){
                                switch ($m) {
                                case 1:
                                    $pamatdarbiba = "+";
                                    break;
                                case 2:
                                    $pamatdarbiba = "-";
                                    break;
                                case 3:
                                    $pamatdarbiba = "*";
                                    break;
                                case 4:
                                    $pamatdarbiba = "/";
                                    break;
                                default:
                                    $pamatdarbiba = "+";
                                }
                                echo "<option value='$pamatdarbiba'>$pamatdarbiba</option>";
                            }
                ?>
            </select>
            <input type="text" name="skaitlis2" placeholder="Skaitlis 2">
            <input name="rezultats" placeholder="Rezultāts" type="output"></input>
            <button type="submit" name="aprekinat">Aprēķināt</button>
            <?php
                if(isset($_POST["aprekinat"])){
                    $skaitlis1 = $_POST["skaitlis1"];
                    $skaitlis2 = $_POST["skaitlis2"];

                    if(empty($skaitlis1) || empty($skaitlis2)){
                        echo "<p style='color:red;'>Ievadi abus skaitļus!</p>";
                    }
                    elseif(!is_numeric($skaitlis1) || !is_numeric($skaitlis2)){
                        echo "<p style='color:red;'>Drīkst ievadīt tikai skaitļus!</p>";
                    }
                    elseif($skaitlis1 <= 0 || $skaitlis2 <= 0){
                        echo "<p style='color:red;'>Skaitļiem jābūt lielākiem par 0!</p>";
                    }
                    else{
                        $rezultats = saskaitit($skaitlis1, $skaitlis2);
                        echo "<p>Rezultāts <b>$rezultats</b></p>";
                    }
                }
            ?>
        </form>

        <!-- Skaitlis intervālā: -->
        <h3>Pārbaude "Skaitlis intervālā":</h3>
        <P>Noskaidro vai skaitlis atrodas intervālā:</P>
        <form method="POST">
            <input type="text" name="sakumpunkts" placeholder="Sākumpunkts" required>
            <input type="text" name="skaitlis" placeholder="Skaitlis" required>
            <input type="text" name="beigupunkts" placeholder="Beigupunkts" required>
            <button type="submit" name="parbaudit">Pārbaudīt</button>
            <?php
                if(isset($_POST["parbaudit"])){
                    $sakumpunkts = $_POST["sakumpunkts"];
                    $skaitlis = $_POST["skaitlis"];
                    $beigupunkts = $_POST["beigupunkts"];

                    if(empty($sakumpunkts) || empty($skaitlis) || empty($beigupunkts)){
                        echo "<p style='color:red;'>Ievadi skaitļus visos laukos!</p>";
                    }
                    elseif(!is_numeric($sakumpunkts) || !is_numeric($skaitlis) || !is_numeric($beigupunkts)){
                        echo "<p style='color:red;'>Drīkst ievadīt tikai skaitļus!</p>";
                    }
                    // elseif($sakumpunkts <= 0 || $skaitlis <= 0 || $beigupunkts <= 0){
                    //     echo "<p style='color:red;'>Skaitļiem jābūt lielākiem par 0!</p>";
                    // }
                    elseif($sakumpunkts >= $beigupunkts){
                        echo "<p style='color:red;'>Sākumpunkts nedrīkst but vienāds/lielāks par beigupunktu</p>";
                    }
                    elseif($skaitlis < $sakumpunkts || $skaitlis > $beigupunkts){
                        echo "<p style='color:red;'>Skaitlis $skaitlis neatrodas intervālā no $sakumpunkts līdz $beigupunkts !</p>";
                    }
                    else{
                        echo "<p style='color:green;'>Skaitlis $skaitlis atrodas intervālā no $sakumpunkts līdz $beigupunkts!</p>";
                    }
                }
            ?>
        </form>

        <!-- Temperatūras pārveidotājs: -->
        <h3>Temperatūras pārveidotājs:</h3>
        <?php
            // Celsius to Fahrenreit
            function CelsiusToF($C){
                return $C*1.8+32;
            }
            // Fahrenreit to Celsius
            function FahrenreitToC($F){
                return $F-32/1.8;
            }

            function switchTemp(){
                $current = 1;
                $current++;
                if ($current == 2) {
                    echo 'Temperatūra °C';
                    $current--;
                } else {
                    echo 'Temperatūra °F';
                    $current++;
                }
            }
        ?>
        <P>Pārkonvertē temperatūru no °C uz °F vai otrādi:</P>
        <form method="POST">
            <input type="text" name="temp" placeholder="<?php switchTemp(); ?>">
            <button type="submit" name="switch"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
            <button type="submit" name="convert">Pārveidot</button>
            <?php
                if(isset($_POST["convert"])){
                    $input = $_POST["temp"];

                    if(empty($input)){
                        echo "<p style='color:red;'>Ievadiet temperatūru!</p>";
                    }
                    elseif(!is_numeric($input)){
                        echo "<p style='color:red;'>Drīkst ievadīt tikai skaitļu vertību!</p>";
                    }
                    else{
                        $rezultats = CelsiusToF($input);
                        $rezultats = round($rezultats, 0);
                        echo "<p>Konvertējot no $input °C iegūst: $rezultats °F</p>";
                    }
                }

                if(isset($_POST["switch"])){
                    
                }
            ?>
        </form>
        
    </main>
</body>
</html>