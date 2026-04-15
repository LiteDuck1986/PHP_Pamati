<?php
    $sadala = "PHP - Masīvi";
    require "assets/header.php";
?>

    <main>
        <?php
            $komponentes = array("procesors", "mātesplate", "videokarte", "operatīvā atmiņa", "barošanas bloks", "patstāvīgā atmiņa");
            echo "<p>Datorā esošie dati glabājas komponentē, ko sauc par <b>$komponentes[5]</b>.</p>";
            // var_dump($komponentes)
            $koki = array(
                array("Priede", "skujkoks"),
                array("Kļava", "lapukoks"),
                array("Egle", "skujkoks")
            );

            // 1.variants:
            echo "<p>*) ".$koki[0][0]." ir koks, kas skaitās ".$koki[0][1]."</p>";
            echo "<p>*) ".$koki[1][0]." ir koks, kas skaitās ".$koki[1][1]."</p>";
            echo "<p>*) ".$koki[2][0]." ir koks, kas skaitās ".$koki[2][1]."</p>";

            echo "<br>";

            // 2. variants:
            foreach($koki as $koks){
                echo "<p>*) ".$koks[0]." ir koks, kas skaitās ".$koks[1]."</p>";
            }
        ?>
        
    </main>
</body>
</html>