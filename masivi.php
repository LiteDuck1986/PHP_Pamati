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

            $skoleni = array(
                array("vards"=>"Jānis", "uzvards"=>"Ozoliņš", "telefons"=>296788832),
                array("vards"=>"Edijs", "uzvards"=>"Kriščonka", "telefons"=>236785811),
                array("vards"=>"Mikjels", "uzvards"=>"Liecis", "telefons"=>224866844),
                array("vards"=>"Gordoms", "uzvards"=>"Šefiņš", "telefons"=>245723656),
                array("vards"=>"Edmunds", "uzvards"=>"Bode", "telefons"=>235422665)
            );

            ?>

            <table>
                <tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Tālrunis</th>
                </tr>
            
            <?php
            
            foreach($skoleni as $skolens){
                echo "
                <tr>
                    <td>".$skolens['vards']."</td>
                    <td>".$skolens['uzvards']."</td>
                    <td>".$skolens['telefons']."</td>
                </tr>
                ";
            }

        ?>

        </table>

        <?php
            foreach($skoleni as $skolens){
                echo "
                <div class='box'>
                    ".$skolens['vards']." ".$skolens['uzvards']."<br>
                    <small>".$skolens['telefons']."</small>
                </div>
                ";
            }
        ?>

        <hr>
        <h2>patstāvīgais darbs</h2>
        <h4>1.uzdevums:</h4>
        <?php
            $a = array(7, 8, 9, 10, 11, 12, 13, 14, 15);
            echo "<p><b>$a[7]</b></p>";
        ?>

        <h4>2.uzdevums:</h4>
        <?php
            $b = array("viens"=>1, "divi"=>2, "trīs"=>3, "četri"=>4, "pieci"=>5);
            echo "<p><b>".$b['trīs']."</b></p>";
        ?>

        <h4>3.uzdevums:</h4>
        <?php
            $skaitli = [1, 2, 3, 4, 5, 6];
            array_push($skaitli, '7');
            $index = array_search('7', $skaitli); // atrod kurā indeksā šis elements atrodās
            echo "<p>Skaitlis <b>7</b> atrodas indeksā (<b>$index</b>).</p>";
        ?>

        <h4>4.uzdevums:</h4>
        <?php
                $divdimensiju[1][]= "viens";
                $divdimensiju[1][]= "divi";
                $divdimensiju[1][]= "trīs";
                $divdimensiju[2][]= "četri";
                $divdimensiju[2][]= "pieci";
                $divdimensiju[2][]= "seši";

                echo "<p>".$divdimensiju[1][2]." un ".$divdimensiju[2][1]."</p>";
        ?>

        <h4>5.uzdevums:</h4>
        <?php
            $augusts
        ?>

        <h4>6.uzdevums:</h4>
        <?php

        ?>

        <h4>7.uzdevums:</h4>
        <?php

        ?>
        
    </main>
</body>
</html>