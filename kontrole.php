<?php
    $sadala = "PHP - Kontrole";
    require "assets/header.php";
?>
<body>
    <main>
        <h3> Gadalaiki </h3>

            <form method="POST">
                
                <select name="gadalaiks" id="Gadalaiks">
                <option hidden>Izvēlies</option>
                <option value="Ziema">Ziema</option>
                <option value="Pavasaris">Pavasaris</option>
                <option value="Vasara">Vasara</option>
                <option value="Rudenis">Rudenis</option>
            </select>

                <button type="SUBMIT" name="apskatit">Apskatīt</button>

                <p>
                    <?php 
                        if(isset($_POST['apskatit'])){
                            $gadalaiks = strtolower($_POST["gadalaiks"]);
                            
                            switch($gadalaiks){

                                case "ziema":
                                    echo "Sniegs, aukstums, svētki &#10052";
                                    break;
                                case "pavasaris":
                                    echo "Siltums, knauši, augi &#10047";
                                    break;
                                case "vasara":
                                    echo "Karstums, pludmale, darbs &#9728";
                                    break;
                                case "rudenis":
                                    echo "Skola, Slapjums, Orainžš &#9730";
                                    break;
                                default:
                                    echo "Nav īsts gadalaiks!";
                                    break;
                            };
                        };
                    ?>

                <br>
                
                <h3>Šaha lauka izveide</h3>

                <table class="square">
                    <?php 
                        for($rinda = 1; $rinda <= 8; $rinda++){
                            echo "<tr>";
                                for($kolona = 1; $kolona <= 8; $kolona++){
                                    $kopa = $rinda + $kolona;
                                    if($kopa%2==0){
                                        echo "<td class='white'> </td>";
                                    }else{
                                        echo "<td class='black'> </td>";
                                    };
                                };
                            echo "</tr>";   
                        };

                    ?>
                </table>

                <h3>Reiz rēķina tabula</h3>

                <table class="square">
                    <?php 
                        for($rinda = 1; $rinda <= 10; $rinda++){
                            echo "<tr>";
                                for($kolona = 1; $kolona <= 10; $kolona++){
                                    $reiz = $rinda * $kolona;
                                        echo "<td class>".$reiz."</td>";
                                };
                            echo "</tr>";   
                        };

                    ?>
                </table>

                <br>

                <h3>Kalendārs:</h3>
                <?php
                    $menesis = $_GET["month"] ?? date("n");
                    $gads = $_GET["year"] ?? date("Y");
                ?>

                <form method="GET">
                    <label>Mēnesis:</label>
                    <select name="month">
                        <?php
                            for($m = 1; $m <= 12; $m++){
                                switch ($m) {
                                case 1:
                                    $month = "Janvāris";
                                    break;
                                case 2:
                                    $month = "Februāris";
                                    break;
                                case 3:
                                    $month = "Marts";
                                    break;
                                case 4:
                                    $month = "Aprīlis";
                                    break;
                                case 5:
                                    $month = "Maijs";
                                    break;
                                case 6:
                                    $month = "Jūnijs";
                                    break;
                                case 7:
                                    $month = "Jūlijs";
                                    break;
                                case 8:
                                    $month = "Augusts";
                                    break;
                                case 9:
                                    $month = "Septembris";
                                    break;
                                case 10:
                                    $month = "Oktobris";
                                    break;
                                case 11:
                                    $month = "Novembris";
                                    break;
                                case 12:
                                    $month = "Decembris";
                                    break;
                                default:
                                    $month = "Janvāris";
                                }
                                $selected = ($menesis == $m) ? "selected" : "";
                                echo "<option value='$month' $selected>$month</option>";
                            }
                        ?>
                    </select>

                    <label>Gads:</label>
                    <select name="year">
                        <?php
                            for($g = 2026; $g <= 2030; $g++){
                                $selected = ($gads == $g) ? "selected" : "";
                                echo "<option value='$g' $selected>$g</option>";
                            }
                        ?>
                    </select>
                    <button type="submit">Parādīt</button>
                </form>

                <table class="square">
                    <tr>
                        <th>P</th>
                        <th>O</th>
                        <th>T</th>
                        <th>C</th>
                        <th>Pk.</th>
                        <th>S</th>
                        <th>Sv.</th>
                    </tr>
                    <tr>
                        <?php 
                            $diena = 1;
                            $pirmais_datums = new DateTime("$gads-$menesis-01"); // 2026-04-01
                            $diena_nedela = $pirmais_datums->format("N"); // 3
                            $dienas_menesi = $pirmais_datums->format("t"); // 30

                        for($t = 1; $t < $diena_nedela; $t++){ //tuksumi menesa sakuma
                            echo "<td></td>";
                        };

                        while($diena<=$dienas_menesi){
                            if($diena_nedela==6 || $diena_nedela==7){ //izcel sestdienas svetdienas
                                echo "<td class='red' id='diena'>".$diena."</td>";
                            }else{
                                echo "<td id='diena'>".$diena."</td>"; 
                            }
                            
                            if($diena_nedela==7 && $diena != $dienas_menesi){
                                echo "</tr><tr>";
                                $diena_nedela=1;
                            }else{
                                $diena_nedela++;
                            };
                            $diena++;

                        };
                    ?>
                    </tr>
                </table>

                </p>

            </form>

            <?php
                $jautajumi = array(
                    array(
                        "jautajums" => "Kurš ir garākais SDLC posms?",
                        "atbildes" => array("Plānošana", "Izstrāde", "Testēšana", "Uzturēšana"),
                        "parieza" => 3 // pareizās atbildes indekss (0,1,2,3)
                    ),
                    array(
                        "jautajums" => "Kā visbiežāk nosūta datus no formas?",
                        "atbildes" => array("Ar POST", "Ar GET", "Ar PUT", "Ar DELETE"),
                        "parieza" => 0 // pareizās atbildes indekss (0,1,2,3)
                    ),
                    array(
                        "jautajums" => "JavaScript ir tas pats, kas Java",
                        "atbildes" => array("Jā", "Nē"),
                        "parieza" => 1 // pareizās atbildes indekss (0,1,2,3)
                    ),
                    array(
                        "jautajums" => "Kuru tagu izmanto HTML dokumenta galvenē?",
                        "atbildes" => array("<title>", "<header>", "<main>", "<div>"),
                        "parieza" => 0 // pareizās atbildes indekss (0,1,2,3)
                    ),
                );

                $kopa = count($jautajumi);
            ?>

            <h3>Viktorīna:</h3>
            <form action="POST">
                <?php
                    foreach($jautajumi as $i)
                ?>
            </form>

    </main>
</body>
</html>