<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="icon" href="./image/books.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Księgarnia</h1>
    </header>
    <div class="container">
        <aside>
            <a href="./index.php" class="button-link">Strona główna</a> <br>
            <a href="./model.php" class="button-link">Model bazy danych</a> <br>
            <a href="./wprowadz.php" class="button-link">Wprowadź dane klienta</a> <br>
            <a href="./wprowadz1.php" class="button-link">Wprowadź dane książki</a> <br>
            <a href="./wyswietl.php" class="button-link">Wyświetl dane klientów oraz książek</a> <br>
            <a href="./kasuj.php" class="button-link">Skasuj dane klienta</a> <br>
            <a href="./kasuj1.php" class="button-link">Skasuj dane książki</a> <br>
            <a href="./mod.php" class="button-link">Modyfikuj dane klienta</a> <br>
            <a href="./raport.php" class="button-link">Raport ze sprzedaży</a> <br>
        </aside>
        <main>
            <h2>Wyświtel Bazę</h2>
            <form action="raport.php" method="POST">
            <div class="input-group">
                    <p>Od: </p> <input type="text" name="od" class="same_lenght">
                    <p>Do: </p> <input type="text" name="do" class="same_lenght">
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane" class="styled-button" class="same_lenght">
                <input type="reset" value="Wyczyść formularz" class="styled-button" class="same_lenght">
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
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>