<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>

    <div id="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>

    <div id="glowny">
        <table>
            <tr> <th>Interpretacja BMI</th> <th>Wartość minimalna</th> <th>Wartość maksymalna</th></tr>
            <?php
                $sql_conn=mysqli_connect('localhost','root','','egzamin');
                $sql_quer=mysqli_query($sql_conn,'SELECT informacja,wart_min,wart_max FROM bmi;');
                while($wynik=mysqli_fetch_array($sql_quer))
                {
                    echo "<tr><td>".$wynik['informacja']."</td><td>".$wynik['wart_min']."</td><td>".$wynik['wart_max']."</td></tr>";
                }
                mysqli_close($sql_conn);
            ?>
        </table>
    </div>

    <div id="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form method="POST" action="bmi.php">
            Waga:<input type="number" name="waga" min="1"><br>
            Wzrost w cm:<input type="number" name="wzrost" min="1">
            <input type="submit" value="Oblicz i zapamiętaj wynik">
        </form>
        <?php
        if(!empty($_POST['waga']) && !empty($_POST['wzrost']))
        {
            $waga=$_POST['waga'];
            $wzrost=$_POST['wzrost'];
            $temp=$wzrost^2;
            $temp2=$waga/$temp;
            $bmi=$temp2*100;
            $bmi=$bmi/2;
            $bmi=intval($bmi);
            echo "Twoja waga: ".$waga."; Twój wzrost: ".$wzrost."<br>BMI wynosi: ".$bmi;
            if($bmi>=0 && $bmi<=18)
            {
                $bmi_id=1;
            }
            if($bmi>=19 && $bmi<=25)
            {
                $bmi_id=2;
            }
            if($bmi>=26 && $bmi<=30)
            {
                $bmi_id=3;
            }
            if($bmi>=31 && $bmi<=100)
            {
                $bmi_id=4;
            }
            $sql_conn=mysqli_connect('localhost','root','','egzamin');
            $sql_quer=mysqli_query($sql_conn,'INSERT INTO wynik(bmi_id,data_pomiaru,wynik) VALUES('.$bmi_id.',CURRENT_DATE(),'.$bmi.');');
            mysqli_close($sql_conn);
        }
        ?>
    </div>

    <div id="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </div>

    <div id="stopka">
        Autor: 1234567890
        <a href="kwerendy.txt">Zobacz kwerendy</a>
    </div>
</body>
</html>