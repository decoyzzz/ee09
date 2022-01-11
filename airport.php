<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <section id="baner1">
        <h2>Odloty z lotniska</h2>
    </section>

    <section id="baner2">
        <img src="zad6.png" alt="logotyp">
    </section>

    <section id="glowny">
        <h4>Tabela odlotów</h4>
        <table>
            <tr><th>lp.</th> <th>numer rejsu</th> <th>czas</th> <th>kierunek</th> <th>status</th></tr>
            <?php
                $sql_conn=mysqli_connect('localhost','root','','egzamin');
                $sql_quer=mysqli_query($sql_conn,'SELECT id,nr_rejsu,czas,kierunek,status_lotu FROM odloty ORDER BY czas ASC;');
                while($wynik=mysqli_fetch_array($sql_quer))
                {
                    echo "<tr><td>".$wynik['id']."</td> <td>".$wynik['nr_rejsu']."</td> <td>".$wynik['czas']."</td> <td>".$wynik['kierunek']."</td> <td>".$wynik['status_lotu']."</td></tr>";
                }
                mysqli_close($sql_conn);
            ?>
        </table>
    </section>

    <section id="stopka1">
        <a href="zad6.png" target="_blank">Pobierz obraz</a>
    </section>

    <section id="stopka2">
        <?php
        if(!isset($_COOKIE['ciasteczko']))
        {
            echo '<p><i>Dzień dobry! Sprawdż regulamin naszej strony</i></p>';
            setcookie('ciasteczko','jest',time()+3600);
        }
        else echo '<p><b>Miło nam, że znowu nas odwidziłeś</b></p>';   
        ?>
    </section>

    <section id="stopka3">
        Autor: 1234567890
    </section>
</body>
</html>
