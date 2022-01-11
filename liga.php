<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>

    <div id="lewy">
        <form method="POST">
            <select name="lista">
                <option value="bramkarze">Bramkarze</option>
                <option value="obroncy">Obrońcy</option>
                <option value="pomocnicy">Pomocnicy</option>
                <option value="napastnicy">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 1234567890</p>
    </div>

    <div id="prawy">
        <?php
        if(!empty($_POST['lista']))
        {
            $opcja=$_POST['lista'];
            switch($opcja)
            {
                case "bramkarze":
                    $id=1;
                    break;

                case "obroncy":
                    $id=2;
                    break;

                case "pomocnicy":
                    $id=3;
                    break;

                case "napastnicy":
                    $id=4;
                    break;
            }
            $sql_conn=mysqli_connect('localhost','root','','egzamin');
            $sql_quer=mysqli_query($sql_conn,'SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id='.$id.';');
            echo "<ol>";
            while($wynik=mysqli_fetch_array($sql_quer))
            {
                echo "<li>".$wynik['imie']." ".$wynik['nazwisko']."</li>";
            }
            echo "</ol>";
            mysqli_close($sql_conn);
        }
        ?>
    </div>

    <div id="glowny">
        <h3>Liga mistrzów</h3>
    </div>

    <div id="liga">
        <?php
            $sql_conn=mysqli_connect('localhost','root','','egzamin');
            $sql_quer=mysqli_query($sql_conn,'SELECT zespol,punkty,grupa FROM liga ORDER BY punkty DESC;');
            while($wynik=mysqli_fetch_array($sql_quer))
            {
            echo "
                <div id='dru'>
                    <h2>".$wynik['zespol']."</h2>
                    <h1>".$wynik['punkty']."</h1>
                    <p>grupa: ".$wynik['grupa']."</p>
                </div>
            ";
            }
            mysqli_close($sql_conn);
        ?>
    </div>
</body>
</html>
