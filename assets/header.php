<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP valoda - <?= $sadala?></title>
    <link rel="stylesheet" href="assets/style.css?v=0.2">
    <script src="assets/script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <i class="fa-solid fa-bars menu-toggle"></i>
        <p><?= $sadala?></p>
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
            <a href="./">Ievads PHP</a>
            <a href="masivi.php">PHP masīvi</a>
            <a href="kontrole.php">PHP kontroles struktūras</a>
            <a href="funkcijas.php">PHP funkcijas</a>
            <a href="pd.php">PHP pārbaudījums</a>
            <a href="mysql.php">PHP un MySQL</a>
        </nav>
    </aside>



    
</body>
</html>