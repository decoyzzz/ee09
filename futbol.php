<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <div id="baner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>

    <?php
        $qwer='SELECT zespol1,zespol2,wynik,data_rozgrywki FROM rozgrywka WHERE zespol1 = "EVG";';
        $sql_conn=mysqli_connect('localhost','root','','egzamin');
        $sql_qwer=mysqli_query($sql_conn,$qwer);
        while($wynik=mysqli_fetch_array($sql_qwer))
        {
            echo "
            <div id='roz'>
            <h3>".$wynik['zespol1']."-".$wynik['zespol2']."</h3><br>
            <h4>".$wynik['wynik']."</h4><br>
            <p>w dniu: ".$wynik['data_rozgrywki']."</p>
            </div>
            ";
        }
        mysqli_close($sql_conn);
    ?>

    <div id="mecze"></dib>

    <div id="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>

    <div id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napasnticy)</p>
        <form method="POST">
            <input type="number" name="numer1">
            <input type="submit" value="Sprawdż">
        </form>

        <?php
        if(!empty($_POST['numer1']))
        {
            $numer=$_POST['numer1'];
            $qwer='SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id='.$numer.';';
            $sql_conn=mysqli_connect('localhost','root','','egzamin');
            $sql_qwer=mysqli_query($sql_conn,$qwer);
            echo "<ul>";
            while($wynik=mysqli_fetch_array($sql_qwer))
            {
                echo "
                <li>".$wynik['imie']." ".$wynik['nazwisko']."</li>
                ";
            }
            echo "</ul>";
            mysqli_close($sql_conn);
        }
        ?>
    </div>

    <div id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 1234567890</p>
    </div>
</body>
</html>
