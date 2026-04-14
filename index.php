<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP valoda - Ievads</title>
    <link rel="stylesheet" href="assets/style.css">
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
        ?>

    </main>
</body>
</html>