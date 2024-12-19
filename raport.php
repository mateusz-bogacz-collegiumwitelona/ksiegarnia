<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="icon" href="./image/books.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Księgarnia</h1>
    </header>
    <div class="container">
        <aside>
            <a href="./index.php">Strona główna</a>
            <a href="./model.php">Model bazy danych</a>
            <a href="./wprowadz.php">Wprowadź dane klienta</a>
            <a href="./wprowadz1.php">Wprowadź dane książki</a>
            <a href="./wyswietl.php">Wyświtel dane kliętów oraz książek</a>
            <a href="./kasuj.php">Skasuj dane klienta</a>
            <a href="./kasuj1.php">Skasuj dane książki</a>
            <a href="./mod.php">Modyfikuj dane klięta</a>
            <a href="./raport.php">Raport ze sprzedaży</a>
            <a href="./zakupy.php">Zakup</a>
        </aside>
        <main>
            <h2>Wyświtel Bazę</h2>
            <form action="raport.php" method="POST">
            <div class="input-group">
                    <p>Od: </p> <input type="text" name="od">
                    <p>Do: </p> <input type="text" name="do">
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane">
                <input type="reset" value="Wyczyść formularz">
            </form>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($conn->connect_error) {
                    die("Problem z połączeniem: " . $conn->connect_error);
                } 
                    $od = $_POST["od"];
                    $do = $_POST["do"];
                
                    $sql = '
                        SELECT k.id_klienta, CONCAT(k.imie, " ", k.nazwisko) AS klient, ROUND(SUM(p.cena), 2) AS suma_zakupow 
                        FROM zakupy z 
                        JOIN klienci k ON z.id_klienta = k.id_klienta 
                        JOIN produkty p ON z.id_produktu = p.id_produkt 
                        WHERE z.data BETWEEN "' . $od . '" AND "' . $do . '" 
                        GROUP BY k.id_klienta, k.imie, k.nazwisko 
                        ORDER BY suma_zakupow DESC LIMIT 25;
                    ';

                    $result = mysqli_query($conn, $sql);
                    echo "<div class='table-container'>
                            <table border=\"2\">
                                <tr>
                                    <th>Id klienta</th>
                                    <th>Dane Klienta</th>
                                    <th>Suma zakupów</th>
                                </tr>";
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<tr> 
                                <td>" . $row[0] . "</td>
                                <td>" . $row[1] . "</td>
                                <td>" . $row[2] . "</td>
                            </tr>";
                    }
                    echo "</table></div>";
            }
            mysqli_close($conn);
            ?>
        </main>
    </div>
    <footer>
            <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. Wszelie prawa zastrzeżone.</p>
    </footer>    
</body>
</html>