<?php
    $sadala = "Ievads PHP";
    require "assets/header.php";
?>

    <main>
        <?php
            echo "<p>Hello World!</p>";
            print "<p>Sveika Pasaule!</p>"; // print labāk neizmantot

            $zinojums = "Teksts mainīgajā";
        ?>

        <p>
            <?php echo $zinojums; ?> <!-- (1. variants) -->
        </p>

        <p>
            <?= $zinojums; ?> <!-- (2. variants) echo saisinājums -->
        </p>

        <?php
            // vienas rindiņas komentārs
            $lietotajvards = "Edijs";
            $dzim_gads = 2007;
            $esosais_gads = date("Y"); // arī var ("d.m.Y")

            echo '<p>Mans lietotājvārds: $lietotajvards</p>';
            echo "<p>Mans lietotājvārds: $lietotajvards</p>";
            echo '<p>Mans lietotājvārds: '.$lietotajvards.'</p>'; // konkatenācija

            $vecums = $esosais_gads - $dzim_gads;

            echo "<p>Šogad man ir/būs $vecums gadi.</p>";
            echo date("d.m.Y"); // šodienas datums

            define("Pi", 3.14159); // konstantes definēšana
            echo "<p>Definēta konstante ".Pi."</p>";
            echo "<p>Definēta konstante ".round(Pi, 2)."</p>"; // divi cipari aiz komata

            $teksts = "Es tagad mācos PHP valodu!";
            echo var_dump($teksts); // noskaidro datu tipu

            // echo strlen($teksts);

            $skaitlis = 33.786556;
            echo var_dump($skaitlis);

            echo "<p>Nejaušs skaitlis: ".rand(10, 100)."</p>";
        ?>


        <br>

        
        <h3>Ievadlauka pārbaude:</h3>
        <form method="POST"> <!-- method (POST vai GET); action (fails, kurš, veiks formas apstrādi) -->
            <input type="text" maxlength="10" name="ievade">
            <button type="submit" name="parbaudit">Pārbaudīt</button>
            <p>
                <?php
                    if(isset($_POST["parbaudit"])){ // pārbauda vai poga ir nospiesta
                        $ievadlauks = $_POST["ievade"];
                        if(is_numeric($ievadlauks)){
                            echo "$ievadlauks ir skaitlis";
                        }else if(empty($ievadlauks)){
                            echo "Ievadlauks ir tukšs";
                        }else{
                            echo "$ievadlauks ir teksts";
                        }
                    }
                ?>
            </p>
        </form>

        <br>
        
        <h3>Laika konvertēšana:</h3>
        <form method="POST"> <!-- method (POST vai GET); action (fails, kurš, veiks formas apstrādi) -->
            <input type="number" maxlength="10" name="laika_ievade" required>
            <button type="submit" name="konvertet">Konvertēt</button>
            <p>
                <?php
                    $sekundes = 0;
                    $minutes = 0;
                    $stundas = 0;

                    if(isset($_POST["konvertet"])){ // pārbauda vai poga ir nospiesta
                        $sekundes = $_POST["laika_ievade"];
                        echo $sekundes." sekundes = ";

                        if(is_numeric($sekundes)){
                            $stundas = intdiv($sekundes, 3600);
                            $minutes = intdiv($sekundes %3600, 60);
                            $sekundes = $sekundes %60;

                            echo round($stundas).' stundas, '.round($minutes).' minūtes, '.round($sekundes).' sekundes';
                        }else{
                            echo "Urķi, tinies prom! :@";
                        }
                    }
                ?>
            </p>
        </form>

        <br>

        <h3>Šifrēšana / atšifrēšana:</h3>
        <?php
            $nesifrets_teksts = "2PT ir laba grupa! :)";
            $atslega = "Shi!Ir!Ljoti!Laba!Atslega@123";

            $sifrets_teksts = openssl_encrypt($nesifrets_teksts, "AES-128-ECB", $atslega);
            $atsifrets_teksts = openssl_decrypt($sifrets_teksts, "AES-128-ECB", $atslega);

            echo "<p>Teksta šifrs: <b>$sifrets_teksts</b></p>";
            echo "<p>Atšifrēts teksts: <b>$atsifrets_teksts</b></p>";
        ?>

        <br>

        <h3>Šifrē un atšifrē:</h3>
        <form method="POST">
                <input type="text" maxlength="1000" name="sifresana">
                <button type="submit" name="encrypt">Šašifrēt</button>
                <p>
                    <?php
                        if(isset($_POST["encrypt"])){ 
                            $lietotaja_teksts = $_POST["sifresana"];

                            if(empty($lietotaja_teksts)){
                                echo "Ievadlauks ir tukšs";
                            } elseif(!isset($lietotaja_teksts)) {
                                echo "Urķi, tinies prom! :@";
                            } else {
                                $lietotaja_sifrets_teksts = openssl_encrypt($lietotaja_teksts, "AES-128-ECB", $atslega);
                                echo $lietotaja_sifrets_teksts;
                            }
                        }
                    ?>
                </p>
</form>


         <form method="POST">
                <input type="text" maxlength="1000" name="atsifresana">
                <button type="submit" name="decrypt">Atšifrēt</button>
                <p>
                    <?php
                        if(isset($_POST["decrypt"])){ 
                            $lietotaja_atsif_ievadteksts = $_POST["atsifresana"];

                            if(empty($lietotaja_atsif_ievadteksts)){
                                echo "Ievadlauks ir tukšs";
                            } elseif(!isset($lietotaja_atsif_ievadteksts)) {
                                echo "Nemēģini."; 
                            } else {
                                $lietotaja_atsifretais_teksts = openssl_decrypt($lietotaja_atsif_ievadteksts, "AES-128-ECB", $atslega);
                                echo $lietotaja_atsifretais_teksts;
                            }
                        }
                    ?>
                </p>
            </form>

    </main>
</body>
</html>