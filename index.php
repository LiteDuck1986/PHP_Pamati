<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP valoda - Ievads</title>
    <link rel="stylesheet" href="assets/style.css?v=0.1">
    <script src="assets/script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <i class="fa-solid fa-bars menu-toggle"></i>
        <p>Nosaukums</p>
        <a href="" class="btn">
            Lietotājs
            <i class="fa-solid fa-power-off"></i>
        </a>
    </header>

    <aside>
        <div class="aside-header">
            <h1>PHP piemēros</h1>
            <i class="fa-solid fa-xmark aside-close"></i>
        </div>

        <nav>
            <a href="">Ievads PHP</a>
            <a href="">PHP masīvi</a>
            <a href="">PHP kontroles struktūras</a>
            <a href="">PHP funkcijas</a>
            <a href="">PHP pārbaudījums</a>
            <a href="">PHP un MySQL</a>
        </nav>
    </aside>

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
                <input type="text" maxlength="10" name="sifrs" required>
                <button type="submit" name="sifret">Šifrēt</button>
        </form>

        <form>
            <button type="" name="atsifret">Atšifrēt</button>
        </form>

        <?php
            $nesifrets_t = "2PT ir laba grupa! :)";
            $atslega = "Shi!Ir!Ljoti!Laba!Atslega@123";

            $sifrets_teksts = openssl_encrypt($nesifrets_t, "AES-128-ECB", $atslega);
            $atsifrets_teksts = openssl_decrypt($sifrets_teksts, "AES-128-ECB", $atslega);

            if(isset($_POST["sifret"])){ // pārbauda vai poga ir nospiesta
                $atslega = $_POST["sifrs"];
                echo "<p>Teksta šifrs: <b>$sifrets_teksts</b></p>";
            }

            if(isset($_POST["sifret"])){ // pārbauda vai poga ir nospiesta
                $atslega = $_POST["atsifret"];
                echo "<p>Atšifrēts teksts: <b>$atsifrets_teksts</b></p>";
            }

            // echo "<p>Teksta šifrs: <b>$sifrets_teksts</b></p>";
            // echo "<p>Atšifrēts teksts: <b>$atsifrets_teksts</b></p>";
        ?>

    </main>
</body>
</html>