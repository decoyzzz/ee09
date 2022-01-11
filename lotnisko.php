<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </div>

    <div id="baner2">
        <h1>Przyloty</h1>
    </div>

    <div id="baner3">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </div>

    <div id="glowny">
        <table>
            <tr><th>czas</th> <th>kierunek</th> <th>numer rejsu</th> <th>status</th></tr>
            <?php
            $sql_conn=mysqli_connect('localhost','root','','egzamin5');
            $sql_quer=mysqli_query($sql_conn,'SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;');
            while($wynik=mysqli_fetch_array($sql_quer))
            {
                echo "<tr><td>".$wynik['czas']."</td> <td>".$wynik['kierunek']."</td> <td>".$wynik['nr_rejsu']."</td> <td>".$wynik['status_lotu']."</td></tr>";
            }
            mysqli_close($sql_conn);
            ?>
        </table>
    </div>

    <div id="stopka1">
        <?php
            setcookie('ciasteczka','wartosc',time()+7200);
            if(isset($_COOKIE['ciasteczka']))
            {
                echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
            }
            else
            {
                echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
            }
        ?>
    </div>

    <div id="stopka2">
        Autor: 1234567890
    </div>
</body>
</html>